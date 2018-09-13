
<div class="modal fade" id="addAssociate" tabindex="-1"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color:#fff;">
                <div class="modal-header text-center">
                    <h4 class="modal-title " id="exampleModalLabel">Add An Associate to the Project</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <span id="associate_errors">
                   
                  </span>
                    <form id="associateForm">
    
                        <div class="row">
                            <div class="col-md-12"><label>Associate Name</label>
                                <div class="input-group mb-3">
                                       <input type="hidden" name="project_id" value="{{ $project->id }}">
                                <select name="associate_name" class="form-control">
                                    <option value="">**choose one here**</option>
                                    @foreach($associates as $associate)
                                    <option value="{{ $associate->name }}">{{ $associate->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Start Date</label>
                                <div class="input-group mb-3">
                                    <input type="date" name="start_date" id="startdate" class="form-control form-control-sm" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>End Date</label>
                                <div class="input-group mb-3">
                                    <input type="date" name="end_date" id="enddate" class="form-control form-control-sm" >
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" id="associateleaveBtn" class="btn btn-sm btn-outline-danger" data-dismiss ="">
                              Submit
                            </button>
                          <button type="button" class="btn btn-sm  btn-outline-secondary" data-dismiss="modal">
                              Close
                            </button>
                      </div>
                    </form>
                </div>   
            </div>
        </div>
      </div>
      