
@extends('layouts.app')
@section('content')
        <div class="card">
            <div class="card-body">
              <div class="card-title row">
                <div class="text col-md-6">
                    View All Associates
                </div>
                    
                <div class=" col-md-6">
                    <a href="{{ route('associates.create') }}" id="link_associate" style="float:right" class="btn btn-outline-danger btn-sm"><i class="fa fa-fw fa-plus"></i>Add New Associates</a>
                </div>
              </div>  

              <table class="table table-bordered example" id="example">
                <thead>
                  <th>Associate Name</th>
                  <th>Field of Experience</th>
                  <th>Contact</th>
                  <th>Email</th>
                  <th>CV</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  
                    @foreach($associates as $associate)
                    <tr>
                    <td>{{ $associate->name }}</td>
                    <td>{{ $associate->experience }}</td>
                    <td>{{ $associate->contacts }}</td>
                    <td>{{ $associate->email }}</td>
                    <td>
                      <a href="{{ route('downloadcv', $associate->id) }}" class="btn btn-outline-primary btn-xs">
                        dowmload
                        <i class="fa fa-download"></i>
                      </a>
                    </td>
                    <td>
                      
                        <a href="{{ route('associates.index') }}">
                          <span class="fa fa-eye text-info"></span>
                        </a>
                      |
                      <span class="fa fa-pencil text-success"></span>|
                      <span class="fa fa-times text-danger"></span>
                    </td>
                  </tr>
                    @endforeach
                  
                </tbody>
              </table>   
          </div>
        </div>
@endSection
