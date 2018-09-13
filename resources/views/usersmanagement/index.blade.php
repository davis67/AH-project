@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                
                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                                <a style="margin-bottom:80px;" class="btn btn-outline-default btn-xs dropdown-toggle" data-toggle="dropdown" title="New User" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        Show Users Management Menu
                                    </span>
                                </a>
                               
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/users/create">
                                        <i class="fa fa-fw fa-user-plus" aria-hidden="true"></i>
                                        New User
                                    </a>
                                    <a class="dropdown-item" href="/users/deleted">
                                        <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                        Show Deleted User
                                    </a>
                                </div>
                               
                            </div>
                        </div>
                        <div class="table-responsive users-table ">
                            <table class="table  example table-sm table-bordered">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th class="hidden-xs">  Email</th>
                                        <th class="hidden-xs">First Name</th>
                                        <th class="hidden-xs">Last Name</th>
                                        <th>Role</th>
                                        <th>Actions</th>
            
                                    </tr>
                                </thead>
                                <tbody id="users_table">
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td class="hidden-xs"><a href="mailto:{{ $user->email }}" title="email {{ $user->email }}">{{ $user->email }}</a></td>
                                            <td class="hidden-xs">{{$user->first_name}}</td>
                                            <td class="hidden-xs">{{$user->last_name}}</td>
                                            <td>
                                                {{ $user->is_permitted }}
                                            </td>
                                            <td>
                                            <form action="{{ route('users.destroy', $user->id)}}" method="post">
                                                    @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <div class="btn-group">
                                                        <a href="{{ URL::to('users/' . $user->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
                                                        <a href="{{ URL::to('users/' . $user->id . '/edit') }}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i></a>
                                                        <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                                                        </div>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                             

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection