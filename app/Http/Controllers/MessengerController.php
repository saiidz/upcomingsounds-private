<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessengerController extends Controller
{
    public function getChat(Request $request)
    {
        // get conversatin id
        $conversation_id = Conversation::where('sender_id', Auth::Id())->where('receiver_id', $request->customer_id)->pluck('id')->first();

        if(is_null($conversation_id))
        {
            $conversation_id = Conversation::where('receiver_id', Auth::Id())->where('sender_id', $request->customer_id)->pluck('id')->first();
        }

        // find customer
        $customer = User::find($request->customer_id);
        if(isset($conversation_id))
        {
            $messages = Message::where('conversation_id', $conversation_id)->get();
            $messages = view('pages.chat.render_messages')->with('messages', $messages)->render();
            return response()->json([
                'conversation_id' => $conversation_id,
                'messages'     => $messages,
                'customer'     => $customer,
                'success'      => 'Messages get!',
            ]);
            // return view('pages.chat.render_messages', get_defined_vars());
        }else{
            return response()->json([
                'success' => 'Conversatin id not found',
            ]);
        }

    }

    public function saveMessage(Request $req)
    {

        $m = new Message();
        $m->conversation_id = $req->con_id;
        $m->user_id = Auth::Id();
        $m->message = $req->message;
        $m->send_offer_id = $req->send_offerID;
        $m->ip = $req->ip();
        $m->save();

        // customer messages
        $messages = Message::where('conversation_id', $req->con_id)->where('send_offer_id',$req->send_offerID)->get();
        $messages = view('pages.chat.render_messages')->with('messages', $messages)->render();

        return response()->json([
            'success'  => 'sent',
            'con_id'   => $req->con_id,
            'messages' => $messages,
        ]);
    }
    public function getCustomerChat(Request $request)
    {
        if(!empty($request->id))
        {
            $messages = Message::where('conversation_id', $request->id)->where('send_offer_id',$request->send_offerID)->get();
            return view('pages.chat.render_messages', get_defined_vars());
        }

    }
}
