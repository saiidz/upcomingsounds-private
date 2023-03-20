<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\SendOffer;
use App\Models\SendOfferTransaction;
use App\Models\User;
use App\Notifications\SendNotification;
use App\Templates\IOfferTemplateStatus;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{
    const APPROVED = 1;

    /**
     * @var SendOffer
     */
    private $sendOffer;

    /**
     * @param SendOffer $sendOffer
     */
    public function __construct(SendOffer $sendOffer)
    {
        $this->sendOffer = $sendOffer;
    }

    /**
     * @return Application|Factory|View
     */
    public function offers()
    {
        $sendOffers = $this->sendOffer->where(['artist_id' => Auth::id(), 'is_approved' => self::APPROVED])->latest()->get();
        return view('pages.artists.artist-offers.offers', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function pending()
    {
        $sendOffers = $this->sendOffer->where(['artist_id' => Auth::id(), 'status' => IOfferTemplateStatus::PENDING, 'is_approved' => self::APPROVED])->latest()->get();
        return view('pages.artists.artist-offers.pending', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function accepted()
    {
        $sendOffers = $this->sendOffer->where(['artist_id' => Auth::id(), 'status' => IOfferTemplateStatus::ACCEPTED,'is_approved' => self::APPROVED])->latest()->get();
        return view('pages.artists.artist-offers.accepted', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function rejected()
    {
        $sendOffers = $this->sendOffer->where(['artist_id' => Auth::id(), 'status' => IOfferTemplateStatus::REJECTED, 'is_approved' => self::APPROVED])->latest()->get();
        return view('pages.artists.artist-offers.rejected', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function alternative()
    {
        $sendOffers = $this->sendOffer->where(['artist_id' => Auth::id(), 'status' => IOfferTemplateStatus::ALTERNATIVE, 'is_approved' => self::APPROVED])->latest()->get();
        return view('pages.artists.artist-offers.alternative', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function artistsSubmissions()
    {
        return view('pages.artists.artist-offers.artist-submissions', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function completed()
    {
        $sendOffers = $this->sendOffer->where(['artist_id' => Auth::id(), 'status' => IOfferTemplateStatus::COMPLETED,'is_approved' => self::APPROVED])->latest()->get();
        return view('pages.artists.artist-offers.completed', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function new()
    {
        return view('pages.artists.artist-offers.new', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function proposition()
    {
        return view('pages.artists.artist-offers.proposition', get_defined_vars());
    }

    /**
     * @param $send_offer
     * @return Application|Factory|View
     */
    public function offerShow($send_offer)
    {
        $send_offer = SendOffer::find(decrypt($send_offer));

        // create conversation
        $conversation_id = Conversation::where('sender_id', Auth::Id())->where('receiver_id', $send_offer->artist_id)->pluck('id')->first();

        if(is_null($conversation_id))
        {
            $conversation_id = Conversation::where('receiver_id', Auth::Id())->where('sender_id', $send_offer->artist_id)->pluck('id')->first();
        }

        if(is_null($conversation_id))
        {
            $conversation_id = Conversation::create([
                'sender_id' => Auth::Id(),
                'receiver_id' => $send_offer->artist_id
            ]);

            $conversation_id = $conversation_id->id;
        }

        $conversation_default = Conversation::where('sender_id', Auth::Id())->where('receiver_id',$send_offer->artist_id)->first();

        if(isset($conversation_default))
        {
            // get default chat
            $messages = Message::where('conversation_id', $conversation_default->id)->get();
            $messages = view('pages.chat.render_messages')->with('messages' , $messages)->render();
        }

        return view('pages.artists.artist-offers.curator-offer-details', get_defined_vars());
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function declineOffer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'offer_check' => "required",
            'description_details' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $sendOffer = SendOffer::where('id', decrypt($request->send_offer_id))->first();
        if(!empty($sendOffer))
        {
            $sendOffer->update([
                'status'      => IOfferTemplateStatus::REJECTED,
                'message'     => $request->description_details ?? null,
                'offer_check' => $request->offer_check ?? null,
            ]);

            $data['email'] = $sendOffer->userCurator->email;
            $data['username'] = $sendOffer->userCurator->name;
            $data["title"] = "Decline Offer Upcoming Sounds";
            $data['rejectMessage'] = $request->description_details ?? null;

            try {
                Mail::send('admin.emails.curator_email.send_reject_email_to_curator', $data, function($message)use($data) {
                    $message->from('no_reply@upcomingsounds.com');
                    $message->to($data["email"], $data["email"])
                        ->subject($data["title"]);
                });
            } catch (\Throwable $th) {
                //throw $th;
            }

        }
        return response()->json(['success' => 'Email and notify send successfully to taste maker']);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function freeAlternativeOffer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'offer_check' => "required",
            'description_details' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $sendOffer = SendOffer::where('id', decrypt($request->send_offer_id))->first();

        if(!empty($sendOffer))
        {
            $sendOffer->update([
                'status'      => IOfferTemplateStatus::ALTERNATIVE,
                'message'     => $request->description_details ?? null,
                'offer_check' => $request->offer_check ?? null,
            ]);

            $data['email'] = $sendOffer->userCurator->email;
            $data['username'] = $sendOffer->userCurator->name;
            $data["title"] = "Free Alternative Offer Upcoming Sounds";
            $data['rejectMessage'] = $request->description_details ?? null;

            try {
                Mail::send('admin.emails.curator_email.send_reject_email_to_curator', $data, function($message)use($data) {
                    $message->from('no_reply@upcomingsounds.com');
                    $message->to($data["email"], $data["email"])
                        ->subject($data["title"]);
                });
            } catch (\Throwable $th) {
                //throw $th;
            }

        }
        return response()->json(['success' => 'Email and notify send successfully to taste maker']);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function payUSCeOffer(Request $request)
    {
        if(empty($request->send_offer_id))
        {
            return response()->json(['error' => 'We are facing problem in your offer']);
        }

        // check artist balance
        $balance = User::artistBalance();
        $contribution = decrypt($request->contribution);
        if ($contribution > $balance)
        {
            return response()->json(['error_wallet' => 'You have insufficient '.$balance.'USC credits, please go to wallet and purchased credits']);
        }

        $sendOffer = SendOffer::where('id', decrypt($request->send_offer_id))->first();
        if(!empty($sendOffer))
        {
            $sendOffer->update([
                'status'      => IOfferTemplateStatus::ACCEPTED,
            ]);

            // save pay offer transaction
            $sendOfferTransaction = SendOfferTransaction::create([
                'send_offer_id' => $sendOffer->id,
                'artist_id'     => $sendOffer->artist_id,
                'contribution'  => $contribution,
                'curator_id'    => $sendOffer->curator_id,
                'is_approved'   => 0,
                'is_rejected'   => 0,
                'status'        => IOfferTemplateStatus::PAID,
            ]);
            Log::info('sendOfferTransaction');
            Log::info(json_encode($sendOfferTransaction));

            $data['email'] = $sendOffer->userCurator->email;
            $data['username'] = $sendOffer->userCurator->name;
            $data["title"] = "Accepted Offer Upcoming Sounds";
            $data['rejectMessage'] = "Your offer has been accepted. Please submit work and admin send you money in your wallet.";

            try {
                Mail::send('admin.emails.curator_email.send_reject_email_to_curator', $data, function($message)use($data) {
                    $message->from('no_reply@upcomingsounds.com');
                    $message->to($data["email"], $data["email"])
                        ->subject($data["title"]);
                });
            } catch (\Throwable $th) {
                //throw $th;
            }

            // send notification
            $data   =   [
                'title' =>  Auth::user()->name.' (Paid Offer)',
                'link'  =>  route('curator.send.offer.show',encrypt($sendOffer->id)),
                'date'  =>  getDateFormat($sendOffer->created_at),
            ];

            $params =   [
                'channel_name'  =>  'paid_offer_notification',
                'data'          =>  $data,
            ];

            $user = !empty($sendOffer->userCurator) ? $sendOffer->userCurator : null;
            if(!empty($user))
            {
                $user->notify(new SendNotification($params));
            }

        }
        return response()->json(['success' => 'Payment USC successfully Paid and Email send successfully to taste maker']);
    }

}
