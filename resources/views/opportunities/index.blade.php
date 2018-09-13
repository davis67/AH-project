@extends('layouts.app')
@section('content')

          <div class="row">
          	<div class="col-lg-12 grid-margin stretch-card">
          	<div class="card">
			
			<div class="card-body">
				<div class="card-title row">
					<div class="text col-md-4">
							Showing all Opportunities
					</div>
				
				<div class=" col-md-8">
						<a href="{{ route('opportunities.create') }}" style="float:right" class="btn btn-outline-danger btn-sm pull-right"><i class="fa fa-fw fa-reply-all"></i>Create Opportunity</a>
					</div>
				 </div>
				 
				<table class="table example table-responsive table-sm table-bordered" >
					<thead>
						<tr>
							<th>Opportunity Name</th>
							<th>Close Date</th>
							<th>OM_number</th>
							<th>ClientName</th>
							<th>Status</th>
							<th>Team</th>
							<th>country</th>
							<th>Options</th>
						</tr>
					</thead>
					<tbody>
						
							@foreach($opportunities as $opportunity)
							<tr>
							<td>{{$opportunity->opportunity_name}}</td>
							<td>{{$opportunity->expected_date}}</td>
							<td><strong>AH-{{$opportunity->OM_number}}-OM</strong></td>
							<td>{{ $opportunity->client_name }}</td>
							<td class="text-success"><i>{{ $opportunity->sales_stage }}</i></td>
							<td>{{$opportunity->team}}</td>
							<td>{{$opportunity->country}}</td>
							<td>
										<div class="btn-group">
												<a href="{{ route('opportunities.show', $opportunity->id) }}" class="btn btn-outline-danger btn-sm text-danger"><i class="fa fa-eye"></i></a>
										</div>
								
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
@endSection
