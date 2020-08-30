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