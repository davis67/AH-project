
<div class="modal fade" id="addTask" tabindex="-1"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color:#fff;">
                <div class="modal-header text-center">
                    <h4 class="modal-title " id="exampleModalLabel">Add A Task</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <span id="tasks_errors">
                   
                  </span>
                    <form id="taskForm">
                        <div class="row">
                        <div class="col-md-12">
                            <label>Add A  Project Task</label>
                            <input type="text" class="form-control" name="task_title">
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><label>Start Date</label>
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
                          <button type="submit" id="leaveBtn" class="btn btn-sm btn-outline-danger" data-dismiss ="">
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
      