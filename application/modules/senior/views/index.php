<div class="container-fluid">
    <h2>Senior Citizen <i class="fa fa-user-plus"></i></h2> 
    <h3>
        
    </h3>
    <div class="row">
        <div class="col-md-12">
            <form action="" id="seniorForm">
                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="lastname">Lastname</label>
                        <input type="text" name="lastanme" id="lastanme" class="form-control">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="firstname">Firstname</label>
                        <input type="text" name="firstname" id="firstname" class="form-control">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="middlename">Middlename</label>
                        <input type="text" name="middlename" id="middlename" class="form-control">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="birthdate col-md-3">Birthdate</label>
                        <input type="date" name="birthdate" id="birthdate" class="form-control">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="barangay">Barangay</label>
                        <select name="barangay" id="barangay" class="form-control">
                            <option value="" selected disabled>Select Barangay</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="purok">Purok</label>
                        <select name="purok" id="purok" class="form-control"></select>
                    </div>
                    
                </div>
                <button class="btn btn-primary" type="submit">Save Profile <i class="fa fa-save"></i></button>
            </form><br>
        </div>

        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-stripe" style="width=100%" id="seniorTable">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                            <th>P</th>
                            <th>S</th>
                            <th>T</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        

    </div>
</div>

<!-- The Modal -->
<div class="modal" id="pictureUpload">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Upload Picture</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form id="imageForm1" action="<?php echo base_url() ?>welcome/upload" method="POST">
            
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div><input type="submit" class="btn btn-info" value="UPLOAD ALL IMAGES"></div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div style="float: right;">
                                <label class="label" data-toggle="tooltip" title="Upload your images">
                                    <img class="rounded avatar" src="<?php echo base_url() ?>uploads/upload-cloud-flat.png" alt="choose image click here...">
                                    <input type="file" id="input" class="sr-only" name="image" accept="image/*" >
                                </label>
                            </div>
                        </div>
                    </div>

                    <div id="image_crop_data"></div>
                    
                </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>


  <!-- MODEL POPUP -->
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Crop the image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="img-container">
              <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="crop">Crop</button>
          </div>
        </div>
      </div>
    </div>
		<!-- MODEL POPUP -->