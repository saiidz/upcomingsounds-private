<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\SendOffer;
use App\Models\User;
use App\Notifications\SendNotification;
use Illuminate\Http\JsonResponse;
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

    /**
     * @param Request $req
     * @return JsonResponse
     */
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

        // send notification
        if(Auth::user()->type == "curator")
        {
            $link = route('artist.offer.show',encrypt($req->send_offerID));
        }elseif (Auth::user()->type == "artist"){
            $link = route('curator.send.offer.show',encrypt($req->send_offerID));
        }

        $data   =   [
            'title' =>  Auth::user()->name.' (Received Message)',
            'link'  =>  !empty($link) ? $link : null,
            'date'  =>  getDateFormat($m->created_at),
        ];

        $params =   [
            'channel_name'  =>  'send_message_notification',
            'data'          =>  $data,
        ];

        $user = User::find($req->receiver_id);
        if(!empty($user))
        {
            $user->notify(new SendNotification($params));
        }

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
