<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opportunity;
use App\Models\Team;
use App\Mail\opportunityEmail;
use Session;
use App\User;
use DB;
use Auth;
class OpportunityController extends Controller
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
        $opportunities = User::find(Auth::User()->id)->opportunities;
        return view('opportunities.index', compact('opportunities'));
    }

    public function viewAll(){
        
        $opportunities = Opportunity::all();
        // dd($opportunities);
        return view('opportunities.viewall', compact('opportunities'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $users = User::all();
        $teams = Team::all();
        return view('opportunities.create', compact('users', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $opportunity = new Opportunity();
        
        $latest = $opportunity->latestOmnumber();   
      $this->validate($request,[
           'opportunity_name'=>'required',
           'client_name'=>'required',
           'country'=>'required',
            'expected_date'=>'required',
            'revenue'=>'required',
            'currency'=>'required',
            'leads_name'=>'required',
            'internal_deadline'=>'required',
            'team'=>'required',
           'probability'=>'required',
            'reference_number'=>'nullable',
           'next_step'=>'required',
            'number_of_licence'=>'nullable',
           'partners'=>'required',
           'funded_by'=>'required',
           'year'=>'required',
           'assigned_to'=>'required',
           'description'=>'nullable'
           
        ]);
        $opportunity=Opportunity::create([
            'opportunity_name'=>$request->opportunity_name,
            'client_name'=>$request->client_name,
            'country'=>$request->country,
             'expected_date'=>$request->expected_date,
             'revenue'=>$request->revenue,
             'currency'=>$request->currency,
             'leads_name'=>$request->leads_name,
             'internal_deadline'=>$request->internal_deadline,
             'team'=>$request->team,
            'probability'=>$request->probability,
             'reference_number'=>$request->reference_number,
            'next_step'=>$request->next_step,
             'number_of_licence'=>$request->number_of_licence,
            'partners'=>$request->partners,
            'funded_by'=>$request->funded_by,
            'year'=>$request->year,
            'description'=>$request->description
            
         ]+['OM_number'=>$latest + 1]);
         $opportunity->users()->attach($request->assigned_to);

         // foreach($request->assigned_to as $assigned){
         //    $assignEmail = User::where('id', $assigned)->get();
         //    \Mail::to($assignEmail)->send(new opportunityEmail);
         //    // dd($assignEmail);
         // }
         if($opportunity){
        Session::flash('success', "You have successively created an opportunity");
    }
        return redirect()->route('opportunities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Opportunity $opportunity)
    {
        $users = User::all();
        return view('opportunities.show', compact('opportunity', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Opportunity $opportunity)
    {
        $users = User::all();
        return view('opportunities.edit', compact('opportunity', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opportunity $opportunity)
    {
         // dd(request()->all());
        // $opportunity = new Opportunity();
        $latest = $opportunity->latestOmnumber();
        $this->validate($request,[
            'opportunity_name'=>'required',
            'client_name'=>'required',
            'country'=>'required',
             'expected_date'=>'required',
             'revenue'=>'required',
             'currency'=>'required',
             'leads_name'=>'required',
             'internal_deadline'=>'required',
             'team'=>'required',
            'probability'=>'required',
             'reference_number'=>'nullable',
            'next_step'=>'required',
             'number_of_licence'=>'nullable',
            'partners'=>'required',
            'funded_by'=>'required',
            'year'=>'required',
            'assigned_to'=>'required',
            'description'=>'nullable'
            
         ]);          
      $opportunity->update([
        'opportunity_name'=>$request->opportunity_name,
        'client_name'=>$request->client_name,
        'country'=>$request->country,
         'expected_date'=>$request->expected_date,
         'revenue'=>$request->revenue,
         'currency'=>$request->currency,
         'leads_name'=>$request->leads_name,
         'internal_deadline'=>$request->internal_deadline,
         'team'=>$request->team,
        'probability'=>$request->probability,
         'reference_number'=>$request->reference_number,
        'next_step'=>$request->next_step,
         'number_of_licence'=>$request->number_of_licence,
        'partners'=>$request->partners,
        'funded_by'=>$request->funded_by,
        'year'=>$request->year,
        'description'=>$request->description
           
        ]+['OM_number'=>$latest]);
        $opportunity->users()->sync($request->assigned_to);

        Session::flash('success', "You have successively updated an opportunity");
        return redirect()->route('opportunities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opportunity $opportunity)
    {
        $opportunity->forceDelete();
        Session::flash('success', 'You have successively trashed an opportunity');
        return redirect()->back();
    }
  /**
     * change the status of an opportunity
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function changeStatus(Request $request){
            $opportunityName= $request->input('opportunity_name');
             $salesStage= $request->input('sales_stage');
            DB::table('opportunities') 
            ->where('opportunity_name',$opportunityName)
            ->update([
               'sales_stage' => $salesStage
            ]);
            
            Session::flash('success', 'You have successively updated an opportunity');
            return redirect()->route('viewall');
             
     }
   
}
