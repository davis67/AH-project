<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opportunity;
use App\User;
use App\Models\Project;
use App\Models\Task;
use App\Models\Team;
use App\Models\Associate;
use Session;
use App\Models\Project_user;
use App\Models\Project_associate;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Opportunity $opportunity)
    {
        $projects = Project::all();

        return view('projects.index', compact('projects', 'opportunity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
        $users = User::all();
        $teams= Team::all();
        return view('projects.create', compact('users', 'teams','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // dd($request->all());
         $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required',
            'contractRefNo'=>'required',
            'team' => 'required'
         ]);
         $project = Project::create([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'contractRefNo'=>$request->contractRefNo,
            'team' => $request->team,
            'opportunity_id'=>$request->opportunity_id
           ]);
         Session::flash('success', 'You have successfully created a project');
         return redirect()->route('viewall');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        
                $tasks= Task::where('project_id', $project->id)->get();
                $associates = Associate::all();
                $users = User::all();
                $consultants = Project_user::where('project_id', $project->id)->get();
                $project_associates = Project_associate::where('project_id', $project->id)->get();
        
        return view('projects.show', compact('opportunity', 'associates','project', 'tasks', 'users', 'consultants', 'project_associates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }

    public function createProjectUser(Request $request,Project $project){
            // dd($project->id);
         $this->validate($request, [
            'project_id' => 'required',
            'consultant_name' =>'required'
        ]);
         $users = Project_user::create([
            'project_id' => $request->project_id,
            'consultant_name' =>$request->consultant_name
         ]);

         Session::flash('success', 'You have sucessively added a user to the project');
         return response()->json($users);

    }

    public function AddAssociate(Request $request, Project $project){

        $this->validate($request, [
            'project_id' => 'required',
            'associate_name' =>'required',
            'start_date' =>'required',
            'end_date' =>'required'
        ]);
         $associate = Project_associate::create([
            'project_id' => $request->project_id,
            'associate_name' =>$request->associate_name,
            'start_date' => $request->start_date,
            'end_date' =>$request->end_date
         ]);

         Session::flash('success', 'You have sucessively added a associate to the project');
         return response()->json($associate);
        
    }
}
