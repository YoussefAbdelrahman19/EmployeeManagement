<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users=User::all();
        if($request->has('search')){
            $users=User::where('username','LIKE',"%{$request->search}%")->orWhere('email','LIKE',"%{$request->search}%")->get();
        }
        //
        return view('users.index' ,compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {


        //
        User::create([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name ,
            'email' => $request->email ,
            'password' => $request->password

        ]);
        return redirect()->route('users.index')->with('message' ,'User registerd successfully');
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
    public function edit(User $user)
    {
        //
        return view('users.edit',compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request,User $user)
    {
        // i removed , $id and put User $user instead
        $user->update([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name ,
            'email' => $request->email ,

        ]);
return redirect()->route('users.index')->with('success','User update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //i removed $id and put User $user
        if(auth()->user()->id==$user->id){
return redirect()->route('users.index')->with('message',"You are deleting yourself");

        }
$user->delete();
return redirect()->route('users.index')->with('message2','User deleted successfully');
    }
}
