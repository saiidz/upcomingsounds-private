<?php

namespace App\Http\Controllers\Curator;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\CuratorOfferTemplate;
use App\Models\Message;
use App\Models\SendOffer;
use App\Notifications\SendNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SendOfferController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function sendOffer(Request $request)
    {
        if($request->ajax()){
            if ($request->offer_template_ID)
           // --- START OF CUSTOM CODE ---
            // 1. Get the Template and the Artist
            $templateObj = CuratorOfferTemplate::find($request->offer_template_ID);
            $artistObj = \App\Models\User::find($request->artistID);

            // 2. Swap {ARTIST} with the real name
            // (Note: If your template column is named 'message' instead of 'description', change it below)
            $finalMessage = str_replace('{ARTIST}', $artistObj->name, $templateObj->description);
            // --- END OF CUSTOM CODE ---
            {
                $sendOffer = SendOffer::create([
                    'curator_id'  => Auth::id(),
                    'offer_template_id' => $request->offer_template_ID,
                    'artist_id' => $request->artistID,
                    'track_id' => $request->trackID,
                    'campaign_id' => $request->campaign_ID,
                    'expiry_date' => $request->offer_expiry,
                    'publish_date' => $request->offer_publish,
                    'is_approved' => 1,
                    'message' => $finalMessage,                           
                ]);

                // send notification
                $data   =   [
                    'title' =>  Auth::user()->name.' (New Offer)',
                    'link'  =>  url("/artist-offers"),
                    'date'  =>  getDateFormat($sendOffer->created_at),
                ];

                $params =   [
                    'channel_name'  =>  'offer_notification',
                    'data'          =>  $data,
                ];

                $user = !empty($sendOffer->userArtist) ? $sendOffer->userArtist : null;
                if(!empty($user))
                {
                    $user->notify(new SendNotification($params));
                }

                return response()->json([
                    'success' => 'Offer send successfully',
                ]);
            }else
            {
                return response()->json(['error' => 'Error In Ajax call.']);
            }
        }else
        {
            return response()->json(['error' => 'Error In Ajax call.']);
        }
    }

    /**
     * @param $send_offer
     * @return Application|Factory|View
     */
    public function sendOfferShow($send_offer)
    {
        $send_offer = SendOffer::find(decrypt($send_offer));

        if(Auth::user()->type == "curator")
        {
            $receiver_id = $send_offer->artist_id;
        }elseif (Auth::user()->type == "artist"){
            $receiver_id = $send_offer->curator_id;
        }

        // create conversation
        $conversation_id = Conversation::where('sender_id', Auth::Id())->where('receiver_id', $receiver_id)->pluck('id')->first();

        if(is_null($conversation_id))
        {
            $conversation_id = Conversation::where('receiver_id', Auth::Id())->where('sender_id', $receiver_id)->pluck('id')->first();
        }

        if(is_null($conversation_id))
        {
            $conversation_id = Conversation::create([
                'sender_id' => Auth::Id(),
                'receiver_id' => $receiver_id
            ]);

            $conversation_id = $conversation_id->id;
        }

        $conversation_default = Conversation::where('sender_id', Auth::Id())->where('receiver_id',$receiver_id)->first();

        if(isset($conversation_default))
        {
            // get default chat
            $messages = Message::where('conversation_id', $conversation_default->id)->get();
            $messages = view('pages.chat.render_messages')->with('messages' , $messages)->render();
        }

        if(Auth::user()->type == "curator")
        {
            return view('pages.curators.curator-offers.send-offer-details', get_defined_vars());
        }else{
            return view('pages.artists.artist-offers.curator-offer-details', get_defined_vars());
        }
    }
}
