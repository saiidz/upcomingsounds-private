<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;


class SystemUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $system_users = User::GetSystemUsers()->paginate(10);
        return view('admin.pages.system_users.index', compact('system_users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.system_users.create');
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
            return redirect()->route('system-users.create')
                ->withErrors($validator)
                ->withInput();
        }

        $deleted_users = User::where('email', $request->email)->whereNull('deleted_at')->get();

        if( isset($deleted_users[0]) ) {
            return redirect()->route('system-users.create')->with('error','System User already exists with the entered email address.');
        } else {
            $input             = $request->all();
            $input['password'] = Hash::make($request->get('password'));
            $input['type']     = 'admin';
    //        $input['status']   = $request->get('status');

            User::create($input);

            return redirect()->route('system-users.create')->with('success','System User created successfully.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(User $system_user)
    {
        return view('admin.pages.system_users.edit', compact('system_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request,User $system_user)
    {
        $validator = Validator::make($request->all(), [
            'name'         => 'required|string|min:2|max:60',
            'email'        => 'required|string|email|min:10|max:60|unique:users,email,'. $system_user->id,
            'phone_number' => 'regex:/^([0-9\s\-\+\(\)]*)$/|max:14|unique:users,phone_number,'. $system_user->id,
            'address'      => 'required|string|max:255',
            'password'     =>  Rules\Password::defaults(),
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $input             = $request->all();
        $input['password'] = $request->get('password') ? Hash::make($request->get('password')) : $system_user->password;
        $input['type']     = 'admin';
//        $input['status']   = $request->get('status');

        $system_user->update($input);

        return redirect()->back()->with('success','System User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(User $system_user)
    {
        $system_user->delete();
        return response()->json([
            'success' => 'System User deleted successfully.',
        ]);
    }
    /**
     * viewBidder
     */
    public function viewSystemUser(Request $request)
    {
        $system_user = User::find($request->system_user_id);
        return response()->json([
            'system_user' => $system_user,
        ]);
    }
}
