<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\User;
use Auth;
use Session;
use Illuminate\Http\Request;
use DB;
class leavesController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::all();
        foreach($users as $user){

        $supervisorleaves = Leave::where('status', 'submitted' && $user->assigned_to, Auth::user()->id)->get();
        $ekleaves = Leave::where('status', 'Endorsed' && $user->assigned_to, Auth::user()->id)->get();
        $hrleaves = Leave::where('status', 'Reviewed' && $user->assigned_to, Auth::user()->id)->get();

        return view('leaves.index', compact('supervisorleaves', 'ekleaves', 'hrleaves'));

       }
           return view('leaves.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leaves.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
              
       $leaves = Leave::create(request()->validate(
            ['leaveType'  => 'required',
             'startdate'  => 'required|date|after:tommorrow',
             'enddate'    => 'required|date|after:startdate',
             'leavedetail'=> 'required',
             'duration'   => 'nullable',
             'acivated'   => 'nullable'
            ])+['user_id' =>  Auth::user()->id]
        );
        Session::flash('success', "You have successfully requested for a leave");

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        return view('leaves.show', compact('leave'));
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
        //
    }
    /**
     * Approve reject or acccept.
     * 
     * This will be done by the supervisor, CEO, and the executive Director
     */
    public function acceptLeave(){
        DB::table('leaves') 
        ->where('status','submitted')
        ->update([
           'status' => 'Endorsed',
           'supervisor_comment' =>$request->supervisor_comment
        ]);
    }
    public function reviewLeave(){
        DB::table('leaves') 
        ->where('status','Endorsed')
        ->update([
           'status' => 'Reviewed',
           'ek_comment' =>$request->ek_comment

           
        ]);
    }
    public function approveLeave(){
        DB::table('leaves') 
        ->where('status','Reviewed')
        ->update([
           'status' => 'Approved',
           'hr_comment' =>$request->hr_comment

        ]);

    }
    public function rejectLeave($id){
        $leave = Leave::find($id);
        $leave->status = 'rejected';
        $leave->reject_comment = $request->reject_comment;
        $leave->save();
      
    }
}
