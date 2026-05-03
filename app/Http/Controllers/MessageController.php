<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::where('user_id', auth()->id())
                            ->whereIn('type', ['justificante', 'aviso'])
                            ->orderBy('created_at', 'desc')
                            ->get();

        $notices  = Message::where('type', 'notificacion')
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('messages.index', compact('messages', 'notices'));
    }

    public function create()
    {
        return view('messages.create');
    }

    public function store(MessageRequest $request)
    {
        $message = new Message();
        $message->type     = $request->input('type');
        $message->subject  = $request->input('subject');
        $message->body     = $request->input('body');
        $message->document = $request->file('document');
        $message->save();

        return redirect()->route('messages.index');
    }

    public function show(Message $message)
    {
        return view('messages.show', compact('message'));
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('messages.index');
    }
}

