@extends('layouts.app');
@section('content')
@foreach($supervisorleaves as $leave)
<div class="card mt-3">
    <div class="card-body">
            <h3> Leaves Requested</h3>
            
            <div class="row">
                <div class="col-md-5">
                <p style="font-size: 20px;">Hello, <i style="text-transform: uppercase;">{{ $leave->user->name }}</i> has requested for {{ $leave->duration }} days a {{ $leave->leaveType}}.</p>
                </div>
                <div class="col-md-7">
            <textarea class="form-control" placeholder="comment here please">
             </textarea>
                <button type="submit" class="btn btn-sm btn-outline-info mt-3">
                              <i class="fa fa-success"></i>Accept Leave
                            </button>
                          <button type="button" class="btn btn-sm btn-outline-danger mt-3">
                              <i class="fa fa-times"></i>Collapse
                            </button>
             </div>   
            </div>
    </div>
</div>
 @endforeach
@stop