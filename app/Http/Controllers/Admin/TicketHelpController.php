<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Models\Country;
use App\Models\TicketHelp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketHelpController extends Controller
{
    /**
     * helpTicket
     */
    public function helpTicket()
    {
        $ticket_helps = TicketHelp::latest()->get();

        return view('admin.pages.help-tickets.index',get_defined_vars());
    }

    /**
     * viewTicketHelp
     */
    public function viewTicketHelp(TicketHelp $ticket_help)
    {
        $countries = Country::all();

        return view('admin.pages.help-tickets.show',get_defined_vars());
    }

    /**
     * storeTicketHelp function
     *
     * @return void
     */

    public function storeTicketHelp(TicketHelp $ticket_help)
    {
        if(!empty($ticket_help))
        {
            $ticket_help->update([
                'status' => 1
            ]);

            if($ticket_help->phone_number)
            {
                try {
                    Helper::twilioOtp($ticket_help->phone_number, 'Your ticket no '.$ticket_help->ticket_no.' against issue is resolved.');
                } catch (\Throwable $th) {
                    //throw $th;
                }
            }
        }
        return redirect()->back()->with('success','Ticket solved successfully');
    }
}
