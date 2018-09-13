
<div class="modal fade" id="addTeam" tabindex="-1"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color:#fff;">
                <div class="modal-header text-center">
                    <h4 class="modal-title text-center" id="exampleModalLabel">Add A Team</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <span id="team_errors">
                   
                  </span>
                   <form class="needs-validation" id="addTeamForm">
                            <div class="form-group row">
                                <label for="team" class="col-md-3 control-label">Team</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="team" placeholder="create a team" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="team_description" class="col-md-3 control-label">Team Description</label>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="team_description" name="team_description" placeholder="create a team description" />

                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="team_leader" class="col-md-3 control-label">Team Leader</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                       <select name="team_leader" class="form-control multipleSelect" >
                                           <option value="">None</option>
                                           @foreach($users as $user)
                                           <option value="{{ $user->id }}">{{ $user->name }}</option>
                                           @endforeach
                                      
                                       </select>
                                    </div>
                                    
                                </div>
                            </div>
                        <div class="modal-footer">
                          <button type="submit" id="addTeamBtn" class="btn btn-sm btn-outline-danger" data-dismiss =""><i class="fa fa-plus"></i>
                             Add Team
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
      