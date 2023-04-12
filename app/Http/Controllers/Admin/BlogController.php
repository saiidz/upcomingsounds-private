<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Templates\IUserType;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogUsers = User::where('type',IUserType::BLOG)->latest()->get();
        return view('admin.pages.blog-users.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.blog-users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'password' => "required|min:8",
            'email' => "required|email|unique:users",
            'name' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $input                      = $request->all();
        $input['password']          = Hash::make($request->password);
        $input['email_verified_at'] = Carbon::now();
        $input['type']              = IUserType::BLOG;
        $input['is_blog']           = IUserType::IS_BLOG;

        User::create($input);

        return response()->json(['success' => 'Blog User created successfully.']);
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $blogUser)
    {
        return view('admin.pages.blog-users.create', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $blogUser)
    {
        $validator = Validator::make($request->all(), [
            'email'    => "required|email|unique:users,email,".$blogUser->id,
            'name'     => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $input                      = $request->all();
        $input['password']          = (!empty($request->password)) ? Hash::make($request->password) : $blogUser->password;
        $input['email_verified_at'] = Carbon::now();
        $input['type']              = IUserType::BLOG;
        $input['is_blog']           = IUserType::IS_BLOG;

        $blogUser->update($input);

        return response()->json(['success' => 'Blog User updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $blogUser)
    {
        $blogUser->delete();
        return redirect()->back()->with('success','Blog User deleted successfully');
    }
}
