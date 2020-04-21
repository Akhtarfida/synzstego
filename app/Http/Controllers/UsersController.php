<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Auth;
Use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function  __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.users.index')->with('users', User::all());
    }

    public function stats()
    {
        return view('admin.index');
    }

    public function trashed()
    {
        $users = User::onlyTrashed()->get();


        return view('admin.users.trashed')->with('users', $users);
    }

    public function restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();

        $user->restore();

        Session::flash('success', 'User Restored!');

        return redirect()->route('users');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        Session::flash('success', 'User Trashed');

        return redirect()->back();        

    }

    public function kill($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();

        $user->profile->delete();
        $user->forceDelete();

        Session::flash('success', 'User Deleted');

        return redirect()->back();


    }

    public function admin($id)
    {
        $user = User::find($id);    

        $user->admin = 1;

        $user->save();

        Session::flash('success', 'Successfully changed users permissions');

        return redirect()->back();
    }

    public function not_admin($id)
    {
        $user = User::find($id);    

        $user->admin = 0;

        $user->save();

        Session::flash('success', 'Successfully changed users permissions');

        return redirect()->back();
    }
}
