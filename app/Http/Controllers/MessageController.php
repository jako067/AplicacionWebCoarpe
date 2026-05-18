<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Carga inicial: Solo los mensajes donde el usuario actual es destinatario
        $messages = Message::with('user')
            ->whereHas('users', function($q) use ($user) {
                $q->where('users.id', $user->id);
            })
            ->orderBy('created_at', 'desc')->get();

        $groups = in_array($user->rol, ['admin', 'foreman']) ? Group::orderBy('name')->get() : [];
        $workers = in_array($user->rol, ['admin', 'foreman']) ? User::where('id', '!=', $user->id)->orderBy('name')->get() : [];
        $type = 'inbox';

        return view('messages.index', compact('messages', 'groups', 'workers', 'type'));
    }

    public function filter(Request $request)
    {
        $user = Auth::user();
        $type = $request->get('type', 'inbox');

        $query = Message::with('user');

        // Separación estricta usando solo el estado del Toggle Switch
        if ($type === 'inbox') {
            $query->whereHas('users', function($q) use ($user) {
                $q->where('users.id', $user->id);
            });
        } else {
            $query->where('user_id', $user->id); // Enviados por mí
        }

        $query->when($request->search, function ($q, $search) {
            $q->where(function($sub) use ($search) {
                $sub->where('subject', 'like', "%{$search}%")
                    ->orWhere('body', 'like', "%{$search}%");
            });
        })->when($request->user_search, function ($q, $userSearch) {
            $q->whereHas('user', function($sub) use ($userSearch) {
                $sub->where('name', 'like', "%{$userSearch}%");
            });
        });

        $messages = $query->orderBy('created_at', $request->get('sort', 'desc'))->get();

        return view('messages.partials._table_rows', compact('messages', 'type'))->render();
    }



    public function store(MessageRequest $request)
    {
        $documentPath = null;
        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('documents', 'public');
        }

        $message = new Message();
        $message->subject  = $request->input('subject');
        $message->body     = $request->input('body');
        $message->document = $documentPath;
        $message->user_id  = Auth::id();
        $message->save();

        $user = Auth::user();

        if (in_array($user->rol, ['admin', 'foreman'])) {
            if ($request->filled('group_id')) {
                $group = Group::with('users')->find($request->input('group_id'));
                if ($group) {
                    $message->users()->attach($group->users->pluck('id')->toArray());
                }
            } elseif ($request->filled('recipient_id')) {
                $message->users()->attach($request->input('recipient_id'));
            }
        } else {
            $admins = User::where('rol', 'admin')->pluck('id')->toArray();
            $message->users()->attach($admins);
        }

        return redirect()->route('messages.index');
    }

     public function show(Message $message)
    {
        // Limpio: Solo muestra la vista sin intentar tocar la tabla intermedia
        return view('messages.show', compact('message'));
    }

    public function edit(Message $message)
    {
        return view('messages.edit', compact('message'));
    }

    public function update(MessageRequest $request, Message $message)
    {
        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('documents', 'public');
            $message->document = $documentPath;
        }
        $message->user_id = Auth::id();
        $message->subject = $request->input('subject');
        $message->body    = $request->input('body');
        $message->save();

        return redirect()->route('messages.index');
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);

        // Ruptura manual de restricciones de clave foránea en message_user
        $message->users()->detach();
        $message->delete();

        return redirect()->route('messages.index');
    }
}
