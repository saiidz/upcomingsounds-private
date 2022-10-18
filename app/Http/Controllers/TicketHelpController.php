<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\TicketHelp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class TicketHelpController extends Controller
{
    /**
     * helpTicket
     */
    public function helpTicket()
    {
        $countries = Country::all();
        return view('help-ticket',get_defined_vars());
    }

    /**
     * postHelpTicket
     */
    public function postHelpTicket(Request $request)
    {
        if(Auth::check())
        {
            if(Auth::user()->type == 'admin')
            {
                return redirect()->back()->with('error', 'Sorry!, You are admin, you cannot submit ticket.');
            }
        }
        $validator = Validator::make($request->all(), [
            'name'                 => 'required|string',
            'email'                => 'required|string|email|max:255',
            'description'          => 'required',
            'phone_number'         => 'required|numeric',
            'ticket_issue'         => 'required',
            'country_name'         => 'required',
            'image'                => 'required',
            'image.*'              => 'mimes:jpeg,jpg,png|max:2048',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        $input['ticket_no']  = $this->generateAccNo();
        $input['country_id'] = $request->get('country_name');

        $path = public_path().'/uploads/tickets';
        if(!File::exists($path)) {
            File::makeDirectory($path, 0775, true, true);
        }
        // upload image help ticket
        if ($request->file('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image_path = 'default_'.time().$name;
            $file->move(public_path() . '/uploads/tickets/', $image_path);
            //store image file into directory and db
            $input['image'] = $image_path;
        }

        $ticket_help = TicketHelp::create($input);

        // Send Email of newsletter subscriptions emails
        $data['name']         = $ticket_help->name;
        $data['email']        = $ticket_help->email;
        $data['phone_number'] = $ticket_help->phone_number;
        $data['ticket_no']    = $ticket_help->ticket_no;
        $data['description']  = $ticket_help->description;
        $data['ticket_issue'] = $ticket_help->ticket_issue;
        $data['image']        = $ticket_help->image;
        $data['country_name'] = ($ticket_help->country) ? $ticket_help->country->name : '' ;

        $data["title"] = "Help Ticket Upcoming Sounds";

        Mail::send('emails.helpTicketEmail', $data, function($message)use($data) {
            $message->from('support@upcomingsounds.com');
            $message->to($data["email"], $data["email"])
                ->subject($data["title"]);
        });

        return redirect()->back()->with('success', 'Ticket sent successfully.');
    }

    public function generateAccNo(){
        $rend  = rand(10000000, 99999999). rand(10000000, 99999999);
        $check = TicketHelp::where('ticket_no', $rend)->first();

        if($check == true){
            $rend = $this->generateAccNo();
        }
        return $rend;
    }
}
