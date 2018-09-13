
@extends('layouts.app')
@section('content')
<div class="card">
              <div class="card-body">
                  <div class="card-title row">
                      <div class="text col-md-6">
                          Register An Associate
                      </div>
                    
                    <div class=" col-md-6">
                        <a href="{{ route('associates.index') }}" style="float:right" class="btn btn-outline-danger btn-sm pull-right mr-3"><i class="fa fa-fw fa-eye"></i>View All Associates</a>
                      </div>
                     </div>
              <form  method="post" action="{{ route('associates.index') }}" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Name:</label>
  
                            <div class="col-md-8">
                               <input type="text" name="name" class="form-control form-control-sm" id="">
                              </div>
                        </div>
                      <div class="form-group row">
                          <label for="contacts" class="col-md-2 col-form-label text-md-right">Contacts:</label>

                          <div class="col-md-8">
                              <input type="text" class="form-control form-control-sm" name="contacts">
                          </div>
                      </div>
                        <div class="form-group row">
                          <label for="expertise" class="col-md-2 col-form-label text-md-right">Area of Expertise:</label>

                          <div class="col-md-8">
                              <input type="text" class="form-control form-control-sm" name="area_of_expertise">
                          </div>
                      </div>
                        <div class="form-group row">
                          <label for="date" class="col-md-2 col-form-label text-md-right">Year of Experience:</label>

                          <div class="col-md-8">
                              <input type="text" class="form-control form-control-sm" name="experience">
                          </div>
                      </div>
                       <div class="form-group row">
                          <label for="date" class="col-md-2 col-form-label text-md-right">Country:</label>

                          <div class="col-md-8">
                              <input type="text" class="form-control form-control-sm" name="country">
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="date" class="col-md-2 col-form-label text-md-right">Email:</label>

                          <div class="col-md-8">
                              <input id="email" type="email" class="form-control form-control-sm" name="email">
                          </div>
                      </div>

                       <div class="form-group row" >
                        <label class="col-md-2 col-form-label text-md-right">Upload CV:</label>
                        <div class="col-md-8">      
                            <label>Drop the associate's cv here</label>
                                <input type="file" name="document" class="form-control"/>  
                        </div>  
                      </div>

                      <div class="form-group row">
                          <label  class="col-md-3 col-form-label text-md-right"></label>

                          <div class="col-md-8">
                          <button type="submit" class="btn btn-md btn-outline-danger" style="border-radius:none;"><i class="fa fa-plus"></i>Add an Associate</button>                            
                      </div>
                      </div>

                    </form>
          </div>
        </div>
@endSection
