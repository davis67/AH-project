
@extends('layouts.app')
    @section('content')
    <div class="card">
      <div class="card-body">
    <div class="row">
        <div class="col-md-8">
          <div class="row">
              <div class="col-md-12">
                  <div class="card shadow">
                    <div class="card-body">
                      <h5 class="text-center">Leave Requests</h5>
                      @if(count($leaves)>0)
                          <table class="table table-sm example">
                          <thead>
                              <tr>
                              <th scope="col">Leave Type</th>
                              <th class="hidden-xs" scope="col">Starting</th>
                              <th class="hidden-xs" scope="col">Ending</th>
                              <th scope="col">Duration</th>
                              <th class="hidden-xs" scope="col">Modified</th>
                              <th scope="col">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                          @foreach($leaves as $leave)
                              <tr>
                                <td>{{$leave->leaveType}}</td>
                                <td class="hidden-xs">{{$leave->startdate}}</td>
                                <td class="hidden-xs">{{$leave->enddate}}</td>
                                <td>{{$leave->duration}} Days</td>
                                <td class="hidden-xs">{{$leave->startdate}}</td>
                                <td>
                                  <span class='fa fa-edit text-primary' id="{{$leave->id}}" title="Edit Leave"></span>
                                  <span class='fa fa-times text-danger ' id="{{$leave->id}}" title="Cancel Leave"></span>
                                </td>
                              </tr>
                          @endforeach
                          </tbody>
                      </table>
                      @else
                      <h4>No records found</h4>
                      @endif
                    </div>
                  </div>
                </div>
          </div>
        </div>

        <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <strong class="mb-3">Leave Summary</strong>
                        <button class="btn btn-outline-info btn-xs mb-3" id="leave_link_btn" style="float:right;" data-toggle="modal" data-leaveurl="{{ route('leaves.store', $user->id) }}" data-target="#addleave">
                          Request 
                          <i class="far fa-calendar-plus" aria-hidden="true"></i>
                        </button>  
                
                    <table class="table table-sm">
                      <tr><td><b>Leave Type</b></td><td><b>Annual</b></td><td><b>Booked</b></td></tr>
                      <tr><td>Carried forward to {{date('Y')}}</td><td><b>12</b></td><td><b>12</b></td></tr>
                      <tr><td>Annual Leave</td><td><b>12</b></td><td><b>12</b></td></tr>
                      <tr><td>Study Leave</td><td><b>12</b></td><td><b>12</b></td></tr>
                      <tr><td>Sick Leave</td><td><b>12</b></td><td><b>12</b></td></tr>
                      @if(Auth::user()->gender =='Female')
                      <tr><td>Maternity Leave</td><td><b>12</b></td><td><b>12</b></td></tr>
                      @else
                      <tr><td>Paternity Leave</td><td><b>12</b></td><td><b>12</b></td></tr>
                      @endif
                      <tr><td>Compassionate Leave</td><td><b>12</b></td><td><b>12</b></td></tr>
                    </table>
            </div>
          </div>
        </div>
          </div>
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('modals.leave_modal')
<!-- End of page content -->
    @endsection
@section('script')
<script type="text/javascript">
   const form = document.getElementById('leaveForm');
    const post_link = document.getElementById('leave_link_btn');
     console.log(post_link.dataset.leaveurl)
    form.addEventListener('submit', function(e){
        e.preventDefault();
        values={};
        const selectLeave =form.querySelector('select');
        const inputOthers=form.querySelector('input');
        const selectTextarea=form.querySelector('textarea');
              form.querySelectorAll('input').forEach(input =>{
              values[input.getAttribute('name')]= input.value;
              });
              values[selectLeave.getAttribute('name')]= selectLeave.value;
              values[inputOthers.getAttribute('name')]= inputOthers.value;
              values[selectTextarea.getAttribute('name')]= selectTextarea.value;
         console.log(values)
        axios
        .post(post_link.dataset.leaveurl, values)
        .then(response => {
          const leaveBtn = document.getElementById('leaveBtn');
          console.log(response)
          let submitAttribute = leaveBtn.dataset.dismiss;
          submitAttribute="modal";
          form.reset();
          window.location.reload();
            })
        .catch(({response}) =>{
            const {errors} = response.data;
            console.log(errors)
            displayErrors(errors, 'leave_errors');
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
        const leave_errors = document.getElementById(idValue);
        leave_errors.appendChild(ul);
    }
</script>
@endsection