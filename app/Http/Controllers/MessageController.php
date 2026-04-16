<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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
        $message->save();

        return redirect()->route('messages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MessageRequest $request, Message $message)
    {
        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('documents', 'public');
            $message->document = $documentPath;
        }

        $message->subject = $request->input('subject');
        $message->body    = $request->input('body');
        $message->save();

        return redirect()->route('messages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('messages.index');
    }
}
