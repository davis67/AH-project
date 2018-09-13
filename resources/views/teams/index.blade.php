@extends('layouts.app')
@section('content')

          <div class="row">
          	<div class="col-lg-12 grid-margin stretch-card">
          	<div class="card">
			
			<div class="card-body">
				<div class="card-title row">
					<div class="text col-md-4">
							Showing all Teams
					</div>
				
				<div class=" col-md-8">
						<a href="{{ route('teams.create') }}" style="float:right" id="addTeamBtn" class="btn btn-outline-danger btn-sm pull-right" data-toggle="modal" data-target="#addTeam" data-teamUrl ="{{ route('teams.store') }}"><i class="fa fa-fw fa-plus"></i>Add a Team</a>

					</div>
				</div>
				<table class="table example table-bordered" >
					<thead>
						<tr>
							<th>Team Name</th>
							<th>Team Leader</th>
							<th>Description</th>
							<th>Action</th>
							
						</tr>
					</thead>
					<tbody>
						@foreach($teams as $team)
							<tr>
							<td>{{$team->team}}</td>
							<td>
								@if($team->team_leader == '')
								 None
								 @else
								{{$team->team_leader}}
								@endif
							</td>
							<td>{{ $team->team_description }}</td>
							<td>
							<form action="{{ route('teams.destroy', $team->id)}}" method="post">
									@csrf
								<input name="_method" type="hidden" value="DELETE">
								<div class="btn-group">
										<a href="{{ route('teams.edit', $team->id) }}" class="btn btn-outline-info btn-xs"><i class="fa fa-edit"></i></a>
										<button type="submit" class="btn btn-outline-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
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
      @include('modals.add_team_modal')
		
</div>
@endSection
@section('script')
<script type="text/javascript">
   const form = document.getElementById('addTeamForm');
    const add_link = document.getElementById('addTeamBtn');
    form.addEventListener('submit', function(e){
        e.preventDefault();
        values={};
        const selectLeave =form.querySelector('select');
        const inputOthers=form.querySelector('input');
              form.querySelectorAll('input').forEach(input =>{
              values[input.getAttribute('name')]= input.value;
              });
              values[selectLeave.getAttribute('name')]= selectLeave.value;
              values[inputOthers.getAttribute('name')]= inputOthers.value;
        axios
        .post(add_link.dataset.teamurl, values)
        .then(response => {
          const teamBtn = document.getElementById('addTeamBtn');
          let submitAttribute = teamBtn.dataset.dismiss;
          submitAttribute="modal";
          form.reset();
          window.location.reload();
            })
        .catch(({response}) =>{
            const {errors} = response.data;
            displayErrors(errors, 'team_errors');
        });
    });

    ul = document.createElement('ul');
    function displayErrors(errors, idValue){
        ul.innerHTML = "";
        // console.log(errors)
        Object.values(errors).forEach(fields =>{
            fields.forEach(error =>{
              
                const li = document.createElement('li');
                li.classList.add('text-danger');
                li.textContent = error;
                ul.appendChild(li);           
            });     
        });
        // console.log(ul)
        const team_errors = document.getElementById(idValue);
        team_errors.appendChild(ul);
    }
</script>
@endsection