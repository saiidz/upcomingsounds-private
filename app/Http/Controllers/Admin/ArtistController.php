<?php

namespace App\Http\Controllers\Admin;

use App\Models\Campaign;
use App\Models\User;
use App\Templates\IEmails;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ArtistTrack;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ArtistController extends Controller
{
    /**
     * approvedArtist function
     *
     * @return void
     */

    public function approvedArtist()
    {
        $approved_artists = User::GetApprovedArtists()->latest()->get();
        return view('admin.pages.artists.artist_approved', get_defined_vars());
    }

     /**
     * approvedArtist function
     *
     * @return void
     */

    public function pendingArtist()
    {
        $pending_artists = User::GetPendingArtists()->latest()->get();
        return view('admin.pages.artists.artist_pending', get_defined_vars());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteArtist($id)
    {
        User::where('id',$id)->delete();
        return redirect()->back()->with('success','Artist deleted successfully');
    }

    /**
     * profileArtist function
     *
     * @return void
     */

    public function profileArtist(User $user)
    {
        // dd($user);
        return view('admin.pages.artists.artist_view', get_defined_vars());
    }

    /**
     * storeApprovedArtist function
     *
     * @return void
     */

    public function storeApprovedArtist(Request $request,User $user)
    {
        $validator = Validator::make($request->all(), [
            'description_details' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if(!empty($user))
        {
            $user->update([
                'is_approved' => 1,
                'is_rejected' => 0,
            ]);

            $data['email'] = $user->email;
            $data['username'] = $user->name;
            $data["title"] = "Welcome to our family :)";
//            $data["title"] = "Approved Artist Upcoming Sounds";
            $data['approvedMessage'] = $request->description_details ?? null;

            try {
                Mail::send('admin.emails.artist_email.send_approved_email_to_artist', $data, function($message)use($data) {
                    $message->from(IEmails::GARY_EMAIL);
                    $message->to($data["email"], $data["email"])
                        ->subject($data["title"]);
                });
            } catch (\Throwable $th) {
                //throw $th;
            }

        }
        return response()->json(['success' => 'Artist Approved successfully and send email to Artist.']);
        // return redirect()->back()->with('success','Artist Approved successfully and send email to artist.');
    }

     /**
     * storeRejectArtist function
     *
     * @return void
     */

    public function storeRejectArtist(Request $request,User $user)
    {
        $validator = Validator::make($request->all(), [
            'description_details' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if(!empty($user))
        {
            $user->update([
                'is_approved' => 0,
                'is_rejected' => 1,
            ]);

            $data['email'] = $user->email;
            $data['username'] = $user->name;
            $data["title"] = "Submission rejected";
//            $data["title"] = "Artist Rejected";
            $data['rejectMessage'] = $request->description_details ?? null;

            try {
                Mail::send('admin.emails.artist_email.send_reject_email_to_artist', $data, function($message)use($data) {
                    $message->from('no_reply@upcomingsounds.com');
                    $message->to($data["email"], $data["email"])
                        ->subject($data["title"]);
                });
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        return response()->json(['success' => 'Artist Reject successfully and send email to Artist.']);
        // return redirect()->back()->with('success','Artist Reject successfully and send email to artist.');
    }

    /**
     * approvedTrack function
     *
     * @return void
     */

    public function approvedTrack()
    {
        $approved_tracks = ArtistTrack::GetApprovedTrack()->latest()->get();
        return view('admin.pages.artist-tracks.artist_approved_tracks', get_defined_vars());
    }

    /**
     * pendingTrack function
     *
     * @return void
     */

    public function pendingTrack()
    {
        $pending_tracks = ArtistTrack::GetPendingTrack()->latest()->get();
        return view('admin.pages.artist-tracks.artist_pending_tracks', get_defined_vars());
    }

    /**
     * trackDetails function
     *
     * @return void
     */

    public function trackDetails(ArtistTrack $artist_track)
    {
//        dd($artist_track);
        return view('admin.pages.artist-tracks.artist_track_view', get_defined_vars());
    }

    /**
     * storeApprovedTrack function
     *
     * @return void
     */

    public function storeApprovedTrack(Request $request,ArtistTrack $artist_track)
    {
        $validator = Validator::make($request->all(), [
            'description_details' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if(!empty($artist_track))
        {
            $artist_track->update([
                'is_approved' => 1,
                'is_rejected' => 0,
            ]);

            $data['email'] = $artist_track->user->email;
            $data['username'] = $artist_track->user->name;
            $data["title"] = "Submission approved";
//            $data["title"] = "Approved Track Artist Upcoming Sounds";
            $data['approvedTrackMessage'] = $request->description_details ?? null;

            try {
                Mail::send('admin.emails.track_artist_email.send_approved_email_to_artist', $data, function($message)use($data) {
                    $message->from(IEmails::GARY_EMAIL);
                    $message->to($data["email"], $data["email"])
                        ->subject($data["title"]);
                });
            } catch (\Throwable $th) {
                //throw $th;
            }

        }
        return response()->json(['success' => 'Track Approved successfully and send email to Artist.']);
    }

    /**
     * storeRejectTrack function
     *
     * @return void
     */

    public function storeRejectTrack(Request $request,ArtistTrack $artist_track)
    {
        $validator = Validator::make($request->all(), [
            'description_details' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if(!empty($artist_track))
        {
            $artist_track->update([
                'is_approved' => 0,
                'is_rejected' => 1,
                'request_edit_des' => null,
            ]);

            $data['email'] = $artist_track->user->email;
            $data['username'] = $artist_track->user->name;
            $data["title"] = "Submission rejected";
//            $data["title"] = "Rejected Track Artist Upcoming Sounds";
            $data['rejectTrackMessage'] = $request->description_details ?? null;

            try {
                Mail::send('admin.emails.track_artist_email.send_reject_email_to_artist', $data, function($message)use($data) {
                    $message->from(IEmails::GARY_EMAIL);
//                    $message->from('no_reply@upcomingsounds.com');
                    $message->to($data["email"], $data["email"])
                        ->subject($data["title"]);
                });
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        return response()->json(['success' => 'Track Reject successfully and send email to Artist.']);
    }

    /**
     * @return Application|Factory|View
     */
    public function activeCampaign()
    {
        $activeCampaigns = Campaign::where('user_id', '!=' ,Auth::id())->latest()->get();
        return view('admin.pages.artist-active-campaign.active-campaign', get_defined_vars());
    }

    /**
     * @param Campaign $campaign
     * @param Request $request
     * @return JsonResponse
     */
    public function addDays(Campaign $campaign, Request $request)
    {
        if(!empty($campaign))
        {
            $campaign->update([
                'add_days' => $request->add_days ?? null
            ]);
            return response()->json(['success' => 'Days Updated Successfully.']);
        }else{
            return response()->json(['errors' => 'Errors in Days']);
        }
    }

    /**
     * @param Campaign $campaign
     * @param Request $request
     * @return JsonResponse
     */
    public function bannerAdd(Campaign $campaign, Request $request)
    {
        if(!empty($campaign))
        {
            $campaign->update([
                'add_remove_banner' => $request->add_remove_banner ?? 0
            ]);
            return redirect()->back()->with('success','Banner added Successfully');
        }else{
            return redirect()->back()->with('error','Errors in Banner');
        }
    }

    /**
     * @param Campaign $campaign
     * @param Request $request
     * @return JsonResponse
     */
    public function bannerRemove(Campaign $campaign, Request $request)
    {
        if(!empty($campaign))
        {
            $campaign->update([
                'add_remove_banner' => $request->add_remove_banner ?? 1
            ]);
            return redirect()->back()->with('success','Banner remove Successfully');
        }else{
            return redirect()->back()->with('error','Errors in Banner');
        }
    }
}
