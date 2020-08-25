<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            
            <div class="row">
                <div class="col-md-2">

                    <ul class="nav flex-column nav-pills" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#users">Users</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#groups">Groups</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#settings">Settings</a>
                        </li>
                    </ul>

                </div>
                <div class="col-md-10">

                    <div class="tab-content">
                        <div id="users" class="container tab-pane active">
                            <div class="table-resonsive">
                                <table class="table table-stripe" id="usersTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Usertype</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="groups" class="container tab-pane fade">
                            <div class="table-responsive">
                                <table class="table table-stipe" id="groupTable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Usertype</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div id="settings" class="container tab-pane fade">
                        </div>
                    </div>
                    
                </div>
            </div>
            

        </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal" id="usersModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Users Form</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" id="usersForm">

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">Firstname</span>
                </div>
                <input type="text" name="firstname" id="firstname" class="form-control">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">Lastname</span>
                </div>
                <input type="text" name="lastname" id="lastname" class="form-control">
            </div>
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">Email</span>
                </div>
                <input type="email" name="email" id="email" class="form-control">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">Username</span>
                </div>
                <input type="text" name="username" id="username" class="form-control">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">Password</span>
                </div>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">Usertype</span>
                </div>
                <select name="usertype" id="usertype" class="form-control">

                </select>
            </div>

            
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Profile<i class="fa fa-save"></i></button>
        </form>
      </div>

    </div>
  </div>
</div>