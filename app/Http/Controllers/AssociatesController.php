<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Associate;
use Illuminate\Support\Facades\Storage;
use Session;
class AssociatesController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $associates = Associate::all();

        return view('associates.index', compact('associates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('associates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'experience' => 'required',
            'area_of_expertise' =>'required',
            'email' => 'required',
            'contacts' =>'required',
            'country' =>'required'
        ]);

        $file = $request->file('document');
        $data = Associate::create([
            'name' => $request->name,
            'experience' => $request->experience,
            'area_of_expertise' =>$request->area_of_expertise,
            'email' => $request->email,
            'contacts' =>$request->contacts,
            'country' =>$request->country,
            'document_path' => $file->store('public/storage')
        ]);

        Session::flash('success', "You have successively added an Associate");
        return redirect()->route('associates.index');
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

    /*****Download associates cv**/

     public function downloadCV($id)
    {
         $associate = Associate::find($id);
        return Storage::download($associate->document_path, $associate->name);
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
}
