<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Team;
use App\Models\Opportunity;
use Validator;
use Auth;
class UsersManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return View('usersmanagement.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        $users = User::all();

        return view('usersmanagement.create', compact('teams', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $validator = Validator::make($request->all(),
            [
                'name'                  => 'required|max:255|unique:users',
                'first_name'            => '',
                'last_name'             => '',
                'email'                 => 'required|email|max:255|unique:users',
                'password'              => 'required|min:6|max:20|confirmed',
                'password_confirmation' => 'required|same:password',
                'is_permitted'          => 'required',
                'employee_no'           => 'required',
                'is_permitted'          => 'required',
                'assigned_to'          =>  'nullable',
                'team'                 =>  'required'
            ],
            [
                'name.unique'         => 'This name is already taken',
                'name.required'       => 'Your name is required',
                'first_name.required' => 'First Name is required',
                'last_name.required'  => 'Last Name is required',
                'email.required'      => 'Email is required',
                'email.email'         => 'Opps..!!!Invalid email.Try again..',
                'password.required'   => 'Password is required for your safety',
                'password.min'        => 'Password is fake',
                'team.required'       =>  'Your must belong to a certain team.',
                'password.max'        => 'Password is normal',
                'is_permitted.required'       => 'You must be having a role in this company',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name'             => $request->name,
            'first_name'       => $request->first_name,
            'last_name'        => $request->last_name,
            'email'            => $request->email,
            'is_permitted'     => $request->is_permitted,
            'password'         => bcrypt($request->password),
            'activated'        => 1,
            'team'             => $request->team,
            'assigned_to'      =>$request->assigned_to,
            'employee_no'     =>$request->employee_no
        ]);

        return redirect('users')->with('success', 'You have successfully created a user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('usersmanagement.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
        return view('usersmanagement.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $this->validate($request, [
            'name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            ]);
       $user->update([
        'name' => $request->name,
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
            ]);

        return back()->with('success', 'You have successfully updated a user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $currentUser = Auth::user();
        $user = User::findOrFail($id);
        if ($user->id != $currentUser->id) {
            $user->save();
            $user->delete();

            return redirect('users')->with('success', 'You have successfully trashed a user');
        }

        return back()->with('info', 'Opps..How can you even think about that?Are you the one who created your self?');
    }
    
}
