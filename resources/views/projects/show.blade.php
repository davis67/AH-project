@extends('layouts.app')
@section('content')
<div class="row">
     <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          
         <div class="text-center">Project Details</div>
	
        <div class="card">
            <div class="card-body">
             <div>
              <a href=""  class="btn btn-xs btn-outline-info" id="addConsultantbtn" data-toggle="modal" data-target="#addConsultant" data-consultantUrl ="{{ route('addconsultants', $project->id) }}">
                 <span class="text-center">
                     +Add
                    </span>
                </a> 
               Consultants:<i class="badge">{{ $consultants->count() }}</i>
            </div>
                <hr>
             <div><a  data-toggle="modal" data-target="#addAssociate"  class="btn btn-xs btn-outline-info" id="addAssociatebtn" data-associateUrl ="{{ route('addassociates', $project->id) }}">
                 <span class="text-center">
                     +Add
                    </span>
                </a>
                 Associates:<i class="badge">{{ $project_associates->count() }}</i>
                </div>
             <hr>
             <div>OM Number: <span class="text-danger"><br/> AH-{{ $project->opportunity->OM_number }}-OM</span></div>
             <hr>
             <div >Start Date: <span class="text-danger"><br/> ({{ $project->start_date }})</span></div>
             <hr>
             <div>End Date: <span class="text-danger"><br/> ( {{ $project->end_date }})</span></div>
                <hr>
             <div>Remaining Time:</div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-md-8">
    <div class="card">
        <div class="card-body">
            <div class="row">
            <h4 class="col-md-4">Project Tasks</h4>
            <div class="col-md-8">
            <a href=""  data-toggle="modal" data-target="#addTask" data-post_url ="{{ route('projects.tasks.store', $project->id) }}"  class="btn btn-xs btn-outline-info float-right" id="link_btn">
                <span class="text-center mb-3">
                    + Add Task
                </span>
            </a>
            </div>
        </div>

        <table class="table table-bordered examples mt-3" id="tbody">
         <thead>
           <th>Task Title</th>
           <th>Start Date</th>
           <th>End Date</th>
           <th>Action</th>
         </thead>
         <tbody>
          
         @foreach($tasks as $task)
         <tr>
          <td>{{ $task->task_title }}</td>
          <td>{{ $task->start_date }}</td>
          <td>{{ $task->end_date }}</td>
          <td>
            <span class="fa fa-eye text-info"></span>
            <a  class="fa fa-pencil text-info eTask" data-toggle="modal" data-target="#editTask" data-projectshow="{{ route('projects.tasks.edit', [$project->id,$task->id]) }}" data-updatetaskurl="{{ route('projects.tasks.update', [$project->id,$task->id]) }}" id="updateTask"></a>
            <span class="fa fa-times text-danger"></span>
          </td>
          </tr>
        @endforeach
         
        </tbody>
        </table>
        

            </div>
        </div>
    </div>
    @include('modals.tasks_modal')
    @include('modals.associate_modal')
     @include('modals.project_employee')
     @include('modals.edit_task_modal')

</div>
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
         <div class="card">
          <div class="card-body">
            <h4 class="card-title text-center">Overall Consultants on a Project</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th class="hidden-xs">Team</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 
                    @foreach($consultants as $consultant)
                     <tr>
                    <td> {{ $consultant->id }}</td>
                    <td> {{ $consultant->consultant_name }}</td>
                    <td class="xs-hidden">
                      Tcs
                    </td>
                    <td>
                                  <span class="fa fa-times text-danger"></span>
                    </td>
                     </tr>
                    @endforeach
                 
                
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
       <div class="col-md-6">
         <h4 class="card-title text-center">Associates on a Project</h4>
            <div class="table-responsive table-bordered">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th class="hidden-xs">Start Date</th>
                    <th class="hidden-xs">EndDate</th>
                    <th>Remove</th>
                  </tr>
                </thead>
                <tbody>
                  
                    @foreach($project_associates as $project_associate)
                    <tr>
                    <td> {{ $project_associate->id }}</td>
                    <td> {{ $project_associate->associate_name }}</td>
                    <td>
                     {{ $project_associate->start_date }}
                    </td>
                    <td>
                      {{ $project_associate->end_date }}
                    </td>
                    <td>
                         <span class="fa fa-times text-danger"></span>
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
@section('script')
<script type="text/javascript">
   const form = document.getElementById('taskForm');
    const post_link = document.getElementById('link_btn');
    // console.log(post_link)
    form.addEventListener('submit', function(e){
        e.preventDefault();
        values={};
        form.querySelectorAll('input').forEach(input =>{
        values[input.getAttribute('name')]= input.value;
        });

        axios
        .post(post_link.dataset.post_url, values)
        .then(response => {
          const leaveBtn = document.getElementById('leaveBtn');
          let submitAttribute = leaveBtn.dataset.dismiss;
          submitAttribute="modal";
          form.reset();
          window.location.reload();
            })
        .catch(({response}) =>{
            const {errors} = response.data;
            displayErrors(errors, 'tasks_errors');
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
        const tasks_errors = document.getElementById(idValue);
        tasks_errors.appendChild(ul);
    }


/*
*Add a consultant to the project
*/

const consultant = document.getElementById('addConsultantbtn');
const consultantform = document.getElementById('consultantForm');


    consultantform.addEventListener('submit', function(e){
        e.preventDefault();
        
        formvalues={};
        const selectUser =consultantform.querySelector('select');
        const inputProject=consultantform.querySelector('input');

        formvalues[selectUser.getAttribute('name')]= selectUser.value;
        formvalues[inputProject.getAttribute('name')]= inputProject.value;
        // console.log(formvalues)

        axios
        .post(consultant.dataset.consultanturl, formvalues)
        .then(response => {
          // console.log(response)
          const consultantleaveBtn = document.getElementById('consultantleaveBtn');
          let submitAttribute = consultantleaveBtn.dataset.dismiss;
          submitAttribute="modal";
          form.reset();
          window.location.reload();
        })
        .catch(({response}) =>{
            const {errors} = response.data;
            displayErrors(errors, 'consultant_errors');
      })
     });

/*
*Add a associate  to the project
*/

const associate = document.getElementById('addAssociatebtn');
// console.log(associate)
// console.log(associate.dataset.associateurl)

const associateform = document.getElementById('associateForm');

    associateform.addEventListener('submit', function(e){
        e.preventDefault();
        
        form_values={};
        const selectUser =associateform.querySelector('select');
        associateform.querySelectorAll('input').forEach(input =>{
        form_values[input.getAttribute('name')]= input.value;
        });

        form_values[selectUser.getAttribute('name')]= selectUser.value;
        //console.log(form_values)

        axios
        .post(associate.dataset.associateurl, form_values)
        .then(response => {
          const associateleaveBtn = document.getElementById('associateleaveBtn');
          let submitAttribute = associateleaveBtn.dataset.dismiss;
          submitAttribute="modal";
          form.reset();
          window.location.reload();
        })
        .catch(({response}) =>{
            const {errors} = response.data;
            displayErrors(errors, 'associate_errors');
      })
     });

    /************ edit task.......*/
    let updateUrl;
      document.querySelectorAll('.eTask').forEach(selectOption => {
        let editTaskForm = document.getElementById('editTaskForm');
        selectOption.addEventListener('click',function(e){
        console.log(selectOption.dataset.projectshow);
         axios
         .get(selectOption.dataset.projectshow).then(({ data }) => {

        editTaskForm.querySelectorAll("input").forEach(input => {
        input.value = data[input.getAttribute("name")];

      // let project_id = data[project_id];
      //  let task_id = data[id];


      //   // let updatebtn =  document.getElementById("updateTaskBtn");
      //   //     updatebtn.dataset.updateurl = "projects.tasks.update"+project_id+","+task_id+"]) }}";
            console.log({data})

                  });
               });
      
             });
         });
     
          console.log(updateUrl);
        /** updating a task to the databasse******/
    //   let updateTaskForm = document.getElementById('editTaskForm');

    // updateTaskForm.addEventListener('submit', function(e){
    //     e.preventDefault();
    //   const updateTaskBtn = document.getElementById('updateTaskBtn');

    //     update_form_values={};
    //     updateTaskForm.querySelectorAll('input').forEach(input =>{
    //     update_form_values[input.getAttribute('name')]= input.value;
    //     });
    //     console.log(update_form_values)

    //     axios
    //     .put( "projects/"+id+"/tasks/"+id+, update_form_values)
    //     .then(response => {
    //       const associateleaveBtn = document.getElementById('associateleaveBtn');
    //       let submitAttribute = associateleaveBtn.dataset.dismiss;
    //       submitAttribute="modal";
    //       form.reset();
    //       window.location.reload();
    //     })
    //     .catch(({response}) =>{
    //         const {errors} = response.data;
    //         displayErrors(errors, 'associate_errors');
    //   })
    //   });


   
</script>
@endsection