<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;


class BidderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $bidders = User::GetActiveBidders()->paginate(10);
        return view('admin.pages.bidders.index', compact('bidders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.bidders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'         => 'required|string|min:2|max:60',
            'email'        => 'required|string|email|min:10|max:60',
            'password'     => ['required', Rules\Password::defaults()],
            'phone_number' => 'regex:/^([0-9\s\-\+\(\)]*)$/|max:14',
            'address'      => 'required|string|min:3|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->route('bidders.create')
                ->withErrors($validator)
                ->withInput();
        }

        $deleted_users = User::where('email', $request->email)->whereNull('deleted_at')->get();

        if( isset($deleted_users[0]) ) {
            return redirect()->route('bidders.create')->with('error','Bidder already exists with the entered email address.');
        } else {
            $input             = $request->all();
            $input['password'] = Hash::make($request->get('password'));
            $input['type']     = 'user';
            $input['status']   = $request->get('status');

            User::create($input);

            return redirect()->route('bidders.create')->with('success','Bidder created successfully.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $bidder)
    {
        return view('admin.pages.bidders.edit', compact('bidder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,User $bidder)
    {
        $validator = Validator::make($request->all(), [
            'name'         => 'required|string|min:2|max:60',
            'email'        => 'required|string|email|min:10|max:60|unique:users,email,'. $bidder->id,
            'phone_number' => 'regex:/^([0-9\s\-\+\(\)]*)$/|max:14|unique:users,phone_number,'. $bidder->id,
            'address'      => 'required|string|max:255',
            'password'     => ['required', Rules\Password::defaults()],
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $input             = $request->all();
        $input['password'] = $request->get('password') ? Hash::make($request->get('password')) : $bidder->password;
        $input['type']     = 'user';
        $input['status']   = $request->get('status');
        if($input['status'] == 'suspend') {
            $input['suspended_at'] = date("Y-m-d");
        }

        $bidder->update($input);

        return redirect()->back()->with('success','Bidder updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $bidder)
    {
        $bidder->delete();
        return response()->json([
            'success' => 'Bidder deleted successfully.',
        ]);
    }

    /**
     * viewBidder
     */
    public function viewBidder(Request $request)
    {
        $bidder = User::find($request->bidder_id);
        return response()->json([
            'bidder' => $bidder,
        ]);
    }

    /**
     * Display a listing of the suspend bidders.
     *
     */
    public function suspendBidders()
    {
        $bidders = User::GetSuspendBidders()->paginate(10);
        return view('admin.pages.bidders.suspend', compact('bidders'));
    }

    /**
     * Display a listing of the block bidders.
     *
     */
    public function blockBidders()
    {
        $bidders = User::GetBlockBidders()->paginate(10);
        return view('admin.pages.bidders.block', compact('bidders'));
    }
}
