<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($reseiverId)
    {
        $data['reseiver_id'] = $reseiverId;
        return view('message.new', $data);
    }

    public function send(Request $request)
    {
        $message = new Message();
        $message->sender_id = Auth::id();
        $message->reseiver_id = $request->reseiver_id;
        $message->message = $request->message;
        $message->seen = 0;
        $message->save();
    }

    public function inbox()
    {
        $userId = Auth::id();
        $messagesData = Message::where('sender_id', $userId)->orWhere('reseiver_id', $userId)->get();
        $messages = [];

        foreach ($messagesData as $message){
            if($message->sender_id != $userId){
                $key = $message->sender_id;
            }else{
                $key = $message->reseiver_id;
            }
            $messages[$key] = $message;
        }

        return view('message.inbox', ['messages'=> $messages]);

    }

    public function read($chatFrienId)
    {
        $userId = Auth::id();

        $data['reseiver'] = User::find($chatFrienId);
        $data['messages'] = Message::where('reseiver_id', $chatFrienId)
            ->where('sender_id', $userId)
            ->orWhere('reseiver_id', $userId)
            ->where('sender_id', $chatFrienId)
            ->get();

        $unreadMessages = Message::where('reseiver_id', $userId)
            ->where('seen', 0)
            ->get();

        foreach ($unreadMessages as $msg){
            $msg->seen = 1;
            $msg->save();
        }

        return view('message.read', $data);

    }
}
