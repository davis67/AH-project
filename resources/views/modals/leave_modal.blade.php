<div class="modal fade" id="addleave" tabindex="-1"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color:#fff;">
                <div class="modal-header text-center">
                    <h4 class="modal-title " id="exampleModalLabel">Leave Request</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <span id="leave_errors">
                   
                  </span>
                    <form id="leaveForm" autocomplete="off">
                       
                        <div class="row">
                            <div class="col-md-12">
                                <label>Leave Requested</label>
                                <select class="form-control" name="leaveType" id="leaveType">
                                    <option  value="">-- Select Request --</option>
                                    <option  value="Annual Leave">Annual Leave</option>
                                    <option  value="Compassionate Leave">Compassionate Leave</option>
                                    <option  value="Sick Leave">Sick Leave</option>
                                    <option  value="Maternity Leave">Maternity Leave</option>
                                    <option  value="Paternity Leave">Paternity Leave</option>
                                    <option  value="Study Leave">Study Leave</option>
                                </select>
                                @if($errors->has('leaveType'))
                                        <span class="text-danger">
                                          {{$errors->first('leaveType')}}
                                        </span>
                                      @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><label>Start Date</label>
                                <div class="input-group mb-3">
                                <input type="date" name="startdate" id="startdate" class="form-control form-control-sm" >
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"></i></span>
                                </div>
                                </div>
                                @if($errors->has('startdate'))
                                <span class="text-danger">
                                  {{ $errors->first('startdate') }}
                                  </span>
                                   @endif
                            </div>
                           <div class="col-md-6"><label>End Date</label>
                                  <div class="input-group mb-3">
                                  <input type="date" name="enddate" id="enddate" class="form-control form-control-sm" >
                                  <div class="input-group-append">
                                      <span class="input-group-text" id="basic-addon2"><i class="fa fa-calendar"></i></span>
                                  </div>
                                  </div>
                                  @if($errors->has('enddate'))
                                  <span class="text-danger">
                                    {{ $errors->first('enddate') }}
                                    </span>
                                     @endif
                              </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Request Details</label>
                                <textarea type="text" name="leavedetail" id="leavedetail" class="form-control"></textarea>
                                @if($errors->has('leavedetail'))
                                <span class="text-danger">
                                  {{ $errors->first('leavedetail') }}
                                  </span>
                                  @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" id="leaveBtn" class="btn btn-outline-danger">Submit</button>
                          <button type="button" class="btn  btn-outline-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </form>
                </div>
                
            </div>
        </div>
      </div> 