
<div class="modal fade" id="addConsultant" tabindex="-1"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color:#fff;">
                <div class="modal-header text-center">
                    <h4 class="modal-title " id="exampleModalLabel">Add Consultants</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <span id="consultant_errors">
                   
                  </span>
                    <form id="consultantForm">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Register One or More Consultants</label>
                                <div class="form-group mb-3">
                                  <input type="hidden" name="project_id" value="{{ $project->id }}">
                                <select class="form-control" name="consultant_name">
                                    <option value="">Choose consultant</option>
                                    @foreach($users as $user)
                                      <option value="{{ $user->name }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" id="consultantleaveBtn" class="btn btn-sm btn-outline-danger" data-dismiss ="">
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
      