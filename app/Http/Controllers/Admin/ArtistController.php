<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
            $data["title"] = "Approved Artist Upcoming Sounds";
            $data['approvedMessage'] = $request->description_details ?? null;

            try {
                Mail::send('admin.emails.artist_email.send_approved_email_to_artist', $data, function($message)use($data) {
                    $message->from('gary@upcomingsounds.com');
                    $message->to($data["email"], $data["email"])
                        ->subject($data["title"]);
                });
            } catch (\Throwable $th) {
                //throw $th;
            }

        }
        return response()->json(['success' => 'Artist Approved successfully and send email to artist.']);
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
            $data["title"] = "Artist Rejected";
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
        return response()->json(['success' => 'Artist Reject successfully and send email to artist.']);
        // return redirect()->back()->with('success','Artist Reject successfully and send email to artist.');
    }
}
