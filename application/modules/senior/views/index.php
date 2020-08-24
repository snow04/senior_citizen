<div class="container-fluid">
    <h2>Senior Citizen <i class="fa fa-user-plus"></i></h2> 

    <div class="row">
        <div class="col-md-3">
            <form action="" id="seniorForm">
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastanme" id="lastanme" class="form-control">
                </div>
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" id="firstname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="middlename">Middlename</label>
                    <input type="text" name="middlename" id="middlename" class="form-control">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="purok">Purok</label>
                    <select name="purok" id="purok" class="form-control"></select>
                </div>
                <div class="form-group">
                    <label for="barangay">Barangay</label>
                    <select name="barangay" id="barangay" class="form-control"></select>
                </div>
                <button class="btn btn-primary" type="submit">Save Profile <i class="fa fa-save"></i></button>
            </form><br>
        </div>

        <div class="col-md-9">
            <div class="table-responsive">
                <table class="table table-stripe" style="width=100%" id="seniorTable">
                    <thead>
                        <tr>
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