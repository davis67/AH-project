@extends('layouts.app')
@section('content')
   <div class="container">
    <div class="row">
     <div class="col-md-12">
        <div class="card">
            <div class="card-body">
              <div class="mb-3" style="display: flex; justify-content: space-between; align-items: center;">
                <div class="pull-right">
                 <a href="{{ route('users.index') }}" class="btn btn-outline-danger btn-sm float-right" data-toggle="tooltip" data-placement="left" title="Back to Users">
                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                    <span class="hidden-sm hidden-xs">Back to </span><span class="hidden-xs">Users</span>
                 </a>
                </div>
              </div>
                <form method="post" action="{{ route('users.store') }}" class="needs-validation">
                    @csrf
                <div class="row">
                 <div class="col-md-6">
                    <div class="form-group has-feedback row {{ $errors->has('email') ? ' has-error ' : '' }}">
                        <label role="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <input type="email" id="email" class="form-control form-control-sm" placeholder="create an email" name="email">
                                <div class="input-group-append">
                                    <label for="email" class="input-group-text">
                                        <i class="fa fa-fw fa-envelope-o" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block text-danger">
                                    <span>{{ $errors->first('email') }}</span>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                        <label role="username" class="col-md-3 control-label">Username</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <input type="text" name="name" class="form-control form-control-sm" placeholder="create a username">
                                <div class="input-group-append">
                                    <label class="input-group-text" for="name">
                                        <i class="fa fa-fw fa-user" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            @if ($errors->has('name'))
                                <span class="help-block text-danger">
                                    <span>{{ $errors->first('name') }}</span>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group has-feedback row {{ $errors->has('first_name') ? ' has-error ' : '' }}">
                        <label role="username" class="col-md-3 control-label">First Name</label>
                        <div class="col-md-9">
                            <div class="input-group">

                                    <input type="text" name="first_name" class="form-control form-control-sm" id="first_name" placeholder="First Name">

                                <div class="input-group-append">
                                    <label class="input-group-text" for="first_name">
                                        <i class="fa fa-fw fa-user" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            @if ($errors->has('first_name'))
                                <span class="help-block text-danger">
                                    <span>{{ $errors->first('first_name') }}</span>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group has-feedback row {{ $errors->has('last_name') ? ' has-error ' : '' }}">
                            <label role="last name" class="col-md-3 control-label">Last Name</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                    <input type="text" name="last_name" id="last_name" class="form-control form-control-sm" placeholder="last name here">

                                <div class="input-group-append">
                                    <label class="input-group-text" for="last_name">
                                        <i class="fa fa-fw fa-user" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            @if ($errors->has('last_name'))
                                <span class="help-block text-danger">
                                    <span>{{ $errors->first('last_name') }}</span>
                                </span>
                            @endif
                        </div>
                    </div>
                 
                    <div class="form-group has-feedback row {{ $errors->has('role') ? ' has-error ' : '' }}">
                            <label role="role" class="col-md-3 control-label">Role</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <select class="custom-select form-control form-control-sm" name="is_permitted" id="role">
                                    <option value="">Select User Role</option>

                                        @foreach([
                                                    'Consultant',
                                                    'Manager',
                                                    'Assistant Manager',
                                                    'Director',
                                                    'CEO',
                                                    'Deputy Managing Director',
                                                    'Chief Of Staffs',
                                                    'Managing Director',] as $index => $value)
                                            <option value="{{ $index }}">{{ $value }}</option>
                                        @endforeach
                                    
                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="role">
                                        <i class="fa fa-fw fa-shield" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            @if ($errors->has('role'))
                                <span class="help-block text-danger">
                                    <span>{{ $errors->first('role') }}</span>
                                </span>
                            @endif
                        </div>
                    </div>
                 </div>
                    <div class="col-md-6">
                    <div class="form-group has-feedback row {{ $errors->has('team') ? ' has-error ' : '' }}">
                            <label role="team" class="col-md-3 control-label">Team</label>

                        <div class="col-md-9">
                            <div class="input-group">
                                <select class="custom-select form-control form-control-sm" name="team" id="team">
                                    <option value="">Select A Team</option>
                                    @if ($teams)
                                        @foreach($teams as $team)
                                            <option value="{{ $team->team }}">{{ $team->team }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="role">
                                        <i class="fa fa-fw fa-shield" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            @if ($errors->has('team'))
                                <span class="help-block text-danger">
                                    <span>{{ $errors->first('team') }}</span>
                                </span>
                            @endif
                        </div>
                    </div>
                
                    <div class="form-group has-feedback row {{ $errors->has('assigned_to') ? ' has-error ' : '' }}">
                            <label role="assigned_to" class="col-md-3 control-label">Assigned To</label>
                            <div class="col-md-9">
                            <div class="input-group">
                                <select class="custom-select form-control form-control-sm" name="assigned_to" id="assigned_to">
                                    <option value="">Select A User</option>
                                    @if ($users)
                                        @foreach($users as $user)
                                            <option value="{{ $user->id}}">{{ $user->name }}</option>
                                        @endforeach
                                    @endif
                                </select> 
                                </select>
                                <div class="input-group-append">
                                    <label class="input-group-text" for="role">
                                        <i class="fa fa-fw fa-shield" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            @if ($errors->has('assigned_to'))
                                <span class="help-block text-danger">
                                    <span>{{ $errors->first('assigned_to') }}</span>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group has-feedback row {{ $errors->has('employee_no') ? ' has-error ' : '' }}">
                            <label role="employeeno" class="col-md-3 control-label">Employee No</label>
                            <div class="col-md-9">
                            <div class="input-group">
                                <input type="text" name="employee_no" class="form-control form-control-sm" placeholder="Employee No">
                                <div class="input-group-append">
                                    <label class="input-group-text" for="employee_no">
                                        <i class="fa fa-fw fa-user" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            @if ($errors->has('employee_no'))
                                <span class="help-block text-danger">
                                    <span>{{ $errors->first('employee_no') }}</span>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group has-feedback row {{ $errors->has('password') ? ' has-error ' : '' }}">
                            <label role="password" class="col-md-3 control-label">Password</label>

                        <div class="col-md-9">
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control form-control-sm">
                                <div class="input-group-append">
                                    <label class="input-group-text" for="password">
                                        <i class="fa fa-fw fa-lock" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block text-danger">
                                    <span>{{ $errors->first('password') }}</span>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group has-feedback row {{ $errors->has('password_confirmation') ? ' has-error ' : '' }}">
                            <label role="password_confirmation" class="col-md-3 control-label">Confirm Password</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-sm">
                                    <div class="input-group-append">
                                    <label class="input-group-text" for="password_confirmation">
                                        <i class="fa fa-fw fa-lock" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block text-danger">
                                    <span>{{ $errors->first('password_confirmation') }}</span>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                  <button type="submit" class="btn btn-outline-danger margin-bottom-1 mb-1 float-right"><i class="fa fa-plus"></i>Add a New User</button>
                </form>
            </div>
          </div>
        </div>
     </div>
  </div>

@endsection
