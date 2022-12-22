
<!-- End of Register Department Modal -->


<!-- End of Update Department Modal -->




<!-- Register Disease Modal -->
<div class="modal fade" id="registerDiseaseModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-save"></i> Disease Registration Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">
                        <form action="#" method="POST" id="registerDiseaseForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Department Name</label>
                                            <select class="form-control" style="width: 100%;"
                                                name="cmDiseaseDepartmentName" id="cmDiseaseDepartmentName" required>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Disease Name</label>
                                            <input class="form-control" type="text" name="txtDiseaseName"
                                                id="txtDiseaseName" placeholder="Ex: General Surgery" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Disease Drug</label>
                                            <input class="form-control" type="text" name="txtDiseaseDrug"
                                                id="txtDiseaseDrug" placeholder="Ex: General Surgery" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <input class="form-control" type="hidden" name="txtRegisterUser"
                                                id="txtRegisterUser" value="<?php echo $_SESSION['userIdd']; ?>"
                                                required>
                                            <input class="form-control" type="hidden" name="txtRegisterDate"
                                                id="txtRegisterDate" value="<?php echo date("Y-m-d H:i:s"); ?>"
                                                required>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tile-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary" name="btnRegisterDisease"
                                    id="btnRegisterDisease"><i class="fa fa-fw fa-lg fa-save"></i>Register
                                    Disease</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End of Register Diseases Modal -->


<!-- Update Disease Modal -->
<div class="modal fade" id="updateDiseaseModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-save"></i> Disease Update Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">
                        <form action="#" method="POST" id="updateDiseaseForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Department Name</label>
                                            <input class="form-control" type="hidden" name="txtDiseaseIdd"
                                                id="txtDiseaseIdd" required>
                                            <select class="form-control" style="width: 100%;"
                                                name="cmDiseaseDepartmentNameU" id="cmDiseaseDepartmentNameU" required>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Disease Name</label>
                                            <input class="form-control" type="text" name="txtDiseaseNameU"
                                                id="txtDiseaseNameU" placeholder="Ex: General Surgery" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Disease Drug</label>
                                            <input class="form-control" type="text" name="txtDiseaseDrugU"
                                                id="txtDiseaseDrugU" placeholder="Ex: General Surgery" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <input class="form-control" type="hidden" name="txtUpdatedBy"
                                                id="txtUpdatedBy" value="<?php echo $_SESSION['userIdd']; ?>" required>
                                            <input class="form-control" type="hidden" name="txtUpdateDate"
                                                id="txtUpdateDate" value="<?php echo date("Y-m-d H:i:s"); ?>" required>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tile-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary" name="btnUpdateDisease"
                                    id="btnUpdateDisease"><i class="fa fa-fw fa-lg fa-save"></i>Update
                                    Disease</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End of Update Diseases Modal -->





<!-- Register Patient Modal -->
<div class="modal fade" id="registerPatientsModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-save"></i> Patients Registration Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">
                        <form action="#" method="POST" id="registerPatientsForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-2" align="center">
                                    <br>
                                    <img class='img-responsive' src="img/no-image.jpg" id="doctorTarget" width="150px"
                                        height="150px" />
                                    <br><br>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Patient Name</label>
                                        <input class="form-control" type="text" name="txtPatientName"
                                            id="txtPatientName" placeholder="Ex: Salaad Suufi Saciid" required>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label class="control-label">Age</label>
                                        <input class="form-control" type="number" name="txtPatientAge"
                                            id="txtPatientAge" placeholder="Ex: 20" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Sex</label>
                                        <select class="form-control" style="width: 100%;" name="cmPatientSex"
                                            id="cmPatientSex" required>
                                            <option value="">SELECT SEX</option>
                                            <option value="0">Male</option>
                                            <option value="1">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="control-label">Address</label>
                                        <input type="text" class="form-control" name="txtPatientAddress"
                                            id="txtPatientAddress" placeholder="Ex: Waaberi" required>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label class="control-label">Tell</label>
                                        <input type="number" class="form-control" name="txtPatientTell"
                                            id="txtPatientTell" placeholder="Ex: 617336622" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <input class="form-control" type="hidden" name="txtRegisterUser"
                                            id="txtRegisterUser" value="<?php echo $_SESSION['userIdd']; ?>" required>
                                        <input class="form-control" type="hidden" name="txtRegisterDate"
                                            id="txtRegisterDate" value="<?php echo date("Y-m-d H:i:s"); ?>" required>

                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="tile-footer" style="text-align: right;">
                        <button type="submit" class="btn btn-primary" name="btnRegisterPatient"
                            id="btnRegisterPatient"><i class="fa fa-fw fa-lg fa-save"></i>Register
                            Patient</button>&nbsp;&nbsp;&nbsp;
                        <button type="reset" class="btn btn-danger" data-dismiss="modal"><i
                                class="fa fa-fw fa-lg fa-times"></i>Close</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
</div>
<!-- End of Register Patient Modal -->

<!-- Update Patient Modal -->
<div class="modal fade" id="updatePatientModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-save"></i> Update Patient Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">
                        <form action="#" method="POST" id="updatePatientsForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Patient Name</label>
                                            <input class="form-control" type="hidden" name="txtPatientId"
                                                id="txtPatientId" required>
                                            <input class="form-control" type="text" name="txtPatientNameU"
                                                id="txtPatientNameU" required>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label class="control-label">Age</label>
                                            <input class="form-control" type="number" name="txtPatientAgeU"
                                                id="txtPatientAgeU" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Sex</label>
                                            <select class="form-control" style="width: 100%;" name="cmPatientSexU"
                                                id="cmPatientSexU" required>
                                                <option value="">SELECT SEX</option>
                                                <option value="0">Male</option>
                                                <option value="1">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Address</label>
                                            <input type="text" class="form-control" name="txtPatientAddressU"
                                                id="txtPatientAddressU" required>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            <label class="control-label">Tell</label>
                                            <input type="number" class="form-control" name="txtPatientTellU"
                                                id="txtPatientTellU" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <input class="form-control" type="hidden" name="txtUpdatedUser"
                                                id="txtUpdatedUser" value="<?php echo $_SESSION['userIdd']; ?>"
                                                required>
                                            <input class="form-control" type="hidden" name="txtUpdateDate"
                                                id="txtUpdateDate" value="<?php echo date("Y-m-d H:i:s"); ?>" required>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tile-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary" name="btnUpdatePatient"
                                    id="btnUpdatePatient"><i class="fa fa-fw fa-lg fa-save"></i>Update
                                    Patient</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End of Update Patient Modal -->



<!-- Register Doctor Modal -->
<div class="modal fade" id="registerDoctorModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-save"></i> Doctor Registration Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">
                        <form action="#" method="POST" id="registerDoctorForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-2" align="center">
                                    <br>
                                    <img class='img-responsive' src="img/no-image.jpg" id="doctorTarget" width="150px"
                                        height="150px" /><br><br>
                                    <label class="btn btn-info col-md-12">
                                        <i class="fa fa-upload"> </i> Upload Photo <input type="file"
                                            class="form-control" name="doctorPhoto" id="doctorPhoto" hidden>
                                    </label>

                                    <script>
                                    var src = document.getElementById("doctorPhoto");
                                    var target = document.getElementById("doctorTarget");

                                    function showmemberImage(src, target) {
                                        var upl = new FileReader();
                                        upl.onload = function(e) {
                                            target.src = this.result;
                                        };
                                        src.addEventListener("change", function() {
                                            upl.readAsDataURL(src.files[0]);
                                        })
                                    }
                                    showmemberImage(src, target);
                                    </script>

                                </div>

                                <div class="form-group col-md-10">

                                    <div class="row">

                                        <div class="form-group col-md-5">
                                            <label class="control-label">Doctor Name</label>
                                            <input class="form-control" type="text" name="txtDoctorName"
                                                id="txtDoctorName" placeholder="Enter Doctor name..." required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Place of Birth</label>
                                            <input class="form-control" type="text" name="txtDoctorBirthPlace"
                                                id="txtDoctorBirthPlace" placeholder="Example: Mogadishu" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label">Date of Birth</label>
                                            <input class="form-control date" type="date" name="txtDoctorBirthDate"
                                                id="txtDoctorBirthDate" required>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Sex</label>
                                            <select class="form-control" style="width: 100%;" name="cmbDoctorSex"
                                                id="cmbDoctorSex" required>
                                                <option selected disabled="" value="">-- Choose Sex --</option>
                                                <option value="1">Male</option>
                                                <option value="0">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Address</label>
                                            <input type="text" class="form-control" name="txtDoctorAdress"
                                                id="txtDoctorAdress" required placeholder="Example: Hodan">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Telephone</label>
                                            <input type="number" class="form-control" name="txtDoctorTell"
                                                id="txtDoctorTell" required placeholder="Example: 615787878">
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Email</label>
                                            <input type="email" class="form-control" name="txtDoctorEmail"
                                                id="txtDoctorEmail" required placeholder="Example:warsame@gmail.com">
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Doctor Department</label>
                                            <select class="form-control" style="width: 100%;" name="cmbDoctorDepartment"
                                                id="cmbDoctorDepartment" required>
                                            </select>
                                        </div>

                                        <input class="form-control" type="hidden" name="txtDoctorRegisteredBy"
                                            id="txtDoctorRegisteredBy" value="<?php echo $_SESSION['userIdd']; ?>"
                                            required>
                                        <input type="hidden" class="form-control" name="txtDoctorRegisterDate"
                                            id="txtDoctorRegisterDate" value="<?php echo date("Y-m-d H:i:s"); ?>"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <div class="tile-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary" name="btnRegisterDoctor"
                                    id="btnRegisterDoctor"><i class="fa fa-fw fa-lg fa-save"></i>Register
                                    Doctor</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Update Doctor Modal -->
<div class="modal fade" id="updateDoctorModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit"></i> Update Doctor Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">

                        <form action="#" method="POST" id="updateDoctorForm" enctype="multipart/form-data">
                            <div class="row">

                                <div class="form-group col-md-2" align="center">
                                    <br>
                                    <img class='img-responsive' src="img/no-image.jpg" id="doctorTargetUpdate"
                                        width="150px" height="150px" /><br><br>
                                    <label class="btn btn-info col-md-12">
                                        <i class="fa fa-upload"> </i> Upload Photo <input type="file"
                                            class="form-control" name="doctorPhotoUpdate" id="doctorPhotoUpdate" hidden>
                                        <input type="hidden" class="form-control" name="doctorPhotoU" id="doctorPhotoU">
                                    </label>
                                    <script>
                                    var src = document.getElementById("doctorPhotoUpdate");
                                    var target = document.getElementById("doctorTargetUpdate");

                                    function showmemberImage(src, target) {
                                        var upl = new FileReader();
                                        upl.onload = function(e) {
                                            target.src = this.result;
                                        };
                                        src.addEventListener("change", function() {
                                            upl.readAsDataURL(src.files[0]);
                                        })
                                    }
                                    showmemberImage(src, target);
                                    </script>

                                </div>

                                <div class="form-group col-md-10">

                                    <div class="row">

                                        <div class="form-group col-md-5">
                                            <input class="form-control" type="hidden" name="txtDoctorId"
                                                id="txtDoctorId" required>
                                            <label class="control-label">Doctor Name</label>
                                            <input class="form-control" type="text" name="txtDoctorNameU"
                                                id="txtDoctorNameU" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Place of Birth</label>
                                            <input class="form-control" type="text" name="txtDoctorBirthPlaceU"
                                                id="txtDoctorBirthPlaceU" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label">Date of Birth</label>
                                            <input class="form-control date" type="date" name="txtDoctorBirthDateU"
                                                id="txtDoctorBirthDateU" required>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Sex</label>
                                            <select class="form-control" style="width: 100%;" name="cmbDoctorSexU"
                                                id="cmbDoctorSexU" required>
                                                <option selected disabled="" value="">-- Choose Sex --</option>
                                                <option value="1">Male</option>
                                                <option value="0">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Address</label>
                                            <input type="text" class="form-control" name="txtDoctorAdressU"
                                                id="txtDoctorAdressU" required>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Telephone</label>
                                            <input type="number" class="form-control" name="txtDoctorTellU"
                                                id="txtDoctorTellU" required>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Email</label>
                                            <input type="email" class="form-control" name="txtDoctorEmailU"
                                                id="txtDoctorEmailU" required>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Doctor Department</label>
                                            <select class="form-control" style="width: 100%;"
                                                name="cmbDoctorDepartmentU" id="cmbDoctorDepartmentU" required>
                                            </select>
                                        </div>

                                        <input class="form-control" type="hidden" name="txtDoctorUpdatedBy"
                                            id="txtDoctorUpdatedBy" value="<?php echo $_SESSION['userIdd']; ?>"
                                            required>
                                        <input type="hidden" class="form-control" name="txtDoctorUpdateDate"
                                            id="txtDoctorUpdateDate" value="<?php echo date("Y-m-d H:i:s"); ?>"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <div class="tile-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary" name="btnUpdateDoctor"
                                    id="btnUpdateDoctor"><i class="fa fa-fw fa-lg fa-save"></i>Update
                                    Doctor</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End of Update Doctor Modal -->



<!-- Register Appointment Modal -->
<div class="modal fade" id="registerAppointmentModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-save"></i> Appointment Registration Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">
                        <form action="#" method="POST" id="registerAppointmentForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label class="control-label">Patient Name</label>
                                            <select class="form-control" style="width: 100%;" name="cmbPatientName"
                                                id="cmbPatientName" required>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Department</label>
                                            <select class="form-control" style="width: 100%;" name="cmDepartmentName"
                                                id="cmDepartmentName" required>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Doctor Name</label>

                                            <select class="form-control" style="width: 100%;" name="cmbDoctorNameApp"
                                                id="cmbDoctorNameApp" required>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Appointment Number</label>
                                            <input class="form-control" type="text" name="txtAppointmentNumber"
                                                id="txtAppointmentNumber" required readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Charge Appointment Fee</label>
                                            <input class="form-control" type="number" name="txtChargeAppointmentFee"
                                                id="txtChargeAppointmentFee" required readonly>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Discount Fee</label>
                                            <input class="form-control" value="0" type="number" name="txtDiscountFee"
                                                id="txtDiscountFee" required>

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="control-label">Paid Fee</label>
                                            <input type="number" class="form-control" name="txtPaidFee" id="txtPaidFee"
                                                required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Description</label>
                                            <input type="text" class="form-control" name="txtDescription"
                                                id="txtDescription" required placeholder="Example: ">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <input type="hidden" value="0" name="cmbAppointmentStatus"
                                                id="cmbAppointmentStatus">

                                        </div>



                                        <input class="form-control" type="hidden" name="txtRegisterUser"
                                            id="txtRegisterUser" value="<?php echo $_SESSION['userIdd']; ?>" required>
                                        <input type="hidden" class="form-control" name="txtRegisterDate"
                                            id="txtRegisterDate" value="<?php echo date("Y-m-d H:i:s"); ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="tile-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary" name="btnRegisterAppointment"
                                    id="btnRegisterAppointment"><i class="fa fa-fw fa-lg fa-save"></i>Register
                                    Appointment</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End of Register Appointment Modal -->


<!-- Update Appointment Modal -->
<div class="modal fade" id="updateAppointmentModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-save"></i> Appointment Update Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">
                        <form action="#" method="POST" id="updateAppointmentForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label class="control-label">Patient Name</label>
                                            <input type="hidden" name="txtAppointmentId" id="txtAppointmentId" required>
                                            <select class="form-control" style="width: 100%;" name="cmbPatientNameU"
                                                id="cmbPatientNameU" required>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Department</label>
                                            <select class="form-control" style="width: 100%;" name="cmDepartmentName"
                                                id="cmDepartmentNameU" required>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Doctor Name</label>
                                            <select class="form-control" style="width: 100%;" name="cmbDoctorNameAppU"
                                                id="cmbDoctorNameAppU" required>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Appointment Number</label>
                                            <input class="form-control" type="text" name="txtAppointmentNumberU"
                                                id="txtAppointmentNumberU" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Charge Appointment Fee</label>
                                            <input class="form-control" type="number" name="txtChargeAppointmentFeeU"
                                                id="txtChargeAppointmentFeeU" required readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Discount Fee</label>
                                            <input class="form-control" value="0" type="number" name="txtDiscountFeeU"
                                                id="txtDiscountFeeU" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="control-label">Paid Fee</label>
                                            <input type="number" class="form-control" name="txtPaidFeeU"
                                                id="txtPaidFeeU" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Description</label>
                                            <input type="text" class="form-control" name="txtDescriptionU"
                                                id="txtDescriptionU" required>
                                        </div>

                                        <input class="form-control" type="hidden" name="txtUpdatedBy" id="txtUpdatedBy"
                                            value="<?php echo $_SESSION['userIdd']; ?>" required>
                                        <input type="hidden" class="form-control" name="txtUpdatedDate"
                                            id="txtUpdatedDate" value="<?php echo date("Y-m-d H:i:s"); ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="tile-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary" name="btnUpdateAppointment"
                                    id="btnUpdateAppointment"><i class="fa fa-fw fa-lg fa-save"></i>Update
                                    Appointment</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End of Update Appointment Modal -->


<!-- Register Appointment Patient Modal -->
<div class="modal fade" id="AppointmentPatientModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-save"></i> Register Appointment Patient Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">
                        <form action="#" method="POST" id="updatePatientsForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Patient Name</label>
                                            <input class="form-control" type="hidden" name="txtPatientIdd"
                                                id="txtPatientIdd" required>
                                            <input class="form-control" type="text" name="txtPatientNameApp"
                                                id="txtPatientNameApp" required>

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Age</label>
                                            <input class="form-control" type="number" name="txtPatientAgeApp"
                                                id="txtPatientAgeApp" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Sex</label>
                                            <input class="form-control" type="text" name="txtPatientSexApp"
                                                id="txtPatientSexApp" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Diseases</label>
                                            <select class="form-control" style="width: 100%;" name="cmbDiseasesName"
                                                id="cmbDiseasesName" required>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Drugs</label>
                                            <select class="form-control" style="width: 100%;" name="cmbDiseaseDrug"
                                                id="cmbDiseaseDrug" required>
                                            </select>
                                            <!-- <input type="checkbox" id="cmbDiseaseDrug" name="cmbDiseaseDrug" value="Bike">
                                            <label for="cmbDiseaseDrug"> </label><br> -->
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <input class="form-control" type="hidden" name="txtUpdatedUser"
                                                id="txtUpdatedUser" value="<?php echo $_SESSION['userIdd']; ?>"
                                                required>
                                            <input class="form-control" type="hidden" name="txtUpdateDate"
                                                id="txtUpdateDate" value="<?php echo date("Y-m-d H:i:s"); ?>" required>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tile-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary" name="btnUpdatePatient"
                                    id="btnUpdatePatient"><i class="fa fa-fw fa-lg fa-save"></i>Register
                                    Patient</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End of Appointment Patient Modal -->























<!-- Add New Contribution Type Modal -->
<div class="modal fade" id="addContributionTypeModal" style="z-index: 3094;" data-backdrop="static"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-plus"></i> Add Contribution Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="addContributionTypeForm">
                    <div class="tile">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="control-label">Contribution Type</label>
                                <input class="form-control" type="text" name="txtContributionTypeName"
                                    id="txtContributionTypeName" placeholder="Example: Monthly Contribution" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="control-label">Contribution Amount ($)</label>
                                <input class="form-control" type="text" name="txtContributionTypeAmount"
                                    id="txtContributionTypeAmount" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="control-label">Contribution Description</label>
                                <textarea class="form-control" name="txtContributionTypeDescription"
                                    id="txtContributionTypeDescription" placeholder="Contribution Description"
                                    required></textarea>
                                <input class="form-control" type="hidden" name="txtContributionTypeRegisteredBy"
                                    id="txtContributionTypeRegisteredBy" value="<?php echo $_SESSION['userIdd']; ?>"
                                    required>
                                <input class="form-control" type="hidden" name="txtContributionTypeRegDate"
                                    id="txtContributionTypeRegDate" value="<?php echo date("Y-m-d H:i:s"); ?>" required>

                            </div>
                        </div>

                        <div class="row" style="text-align: right;">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="btnAddContributionType"
                                    id="btnAddContributionType"><i class="fa fa-fw fa-lg fa-plus"></i>Add Contribution
                                    Type</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" class="close" data-dismiss="modal"
                                    aria-label="Close"><i class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- New Contribution Type Modal Ends Here  -->

<!--Update Contribution Type Modal -->
<div class="modal fade" id="updateContributionTypeModal" style="z-index: 3094;" data-backdrop="static"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-plus"></i> Add Contribution Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="updateContributionTypeForm">
                    <div class="tile">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="control-label">Contribution Type</label>
                                <input type="hidden" name="txtContributionTypeID" id="txtContributionTypeID"
                                    value="<?php echo $_SESSION['userIdd']; ?>" required>
                                <input class="form-control" type="text" name="txtContributionTypeNameUp"
                                    id="txtContributionTypeNameUp" placeholder="Example: Monthly Contribution" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="control-label">Contribution Amount ($)</label>
                                <input class="form-control" type="text" name="txtContributionTypeAmountUp"
                                    id="txtContributionTypeAmountUp" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="control-label">Contribution Description</label>
                                <textarea class="form-control" name="txtContributionTypeDescriptionUp"
                                    id="txtContributionTypeDescriptionUp" placeholder="Contribution Description"
                                    required></textarea>
                                <input type="hidden" name="txtContributionTypeUpdatedBy"
                                    id="txtContributionTypeUpdatedBy" value="<?php echo $_SESSION['userIdd']; ?>"
                                    required>
                                <input type="hidden" name="txtContributionTypeUpdateDate"
                                    id="txtContributionTypeUpdateDate" value="<?php echo date("Y-m-d H:i:s"); ?>"
                                    required>

                            </div>
                        </div>

                        <div class="row" style="text-align: right;">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="btnUpdateContributionType"
                                    id="btnUpdateContributionType"><i class="fa fa-fw fa-lg fa-pencil"></i>Update
                                    Contribution Type</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" class="close" data-dismiss="modal"
                                    aria-label="Close"><i class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Update Contribution Type Modal Ends Here  -->

<!-- Register Member Modal -->
<div class="modal fade" id="registerMemberModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-save"></i> Member Registration Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">

                        <form action="#" method="POST" id="registerMemberForm" enctype="multipart/form-data">
                            <div class="row">

                                <div class="form-group col-md-2" align="center">
                                    <br>
                                    <img class='img-responsive' src="img/no-image.jpg" id="memberTarget" width="150px"
                                        height="150px" /><br><br>
                                    <label class="btn btn-info col-md-12">
                                        <i class="fa fa-upload"> </i> Upload Photo <input type="file"
                                            class="form-control" name="memberPhoto" id="memberPhoto" hidden>
                                    </label>

                                    <script>
                                    var src = document.getElementById("memberPhoto");
                                    var target = document.getElementById("memberTarget");

                                    function showmemberImage(src, target) {
                                        var upl = new FileReader();
                                        upl.onload = function(e) {
                                            target.src = this.result;
                                        };
                                        src.addEventListener("change", function() {
                                            upl.readAsDataURL(src.files[0]);
                                        })
                                    }
                                    showmemberImage(src, target);
                                    </script>

                                </div>

                                <div class="form-group col-md-10">

                                    <div class="row">

                                        <div class="form-group col-md-5">
                                            <label class="control-label">Member Name</label>
                                            <input class="form-control" type="text" name="txtMembersMemberName"
                                                id="txtMembersMemberName" placeholder="Enter member name..." required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Place of Birth</label>
                                            <input class="form-control" type="text" name="txtMembersBirthPlace"
                                                id="txtMembersBirthPlace" placeholder="Example: Mogadishu" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label">Date of Birth</label>
                                            <input class="form-control date" type="date" name="txtMembersBirthDate"
                                                id="txtMembersBirthDate" required>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Sex</label>
                                            <select class="form-control" style="width: 100%;" name="cmbMembersSex"
                                                id="cmbMembersSex" required>
                                                <option selected disabled="" value="">-- Choose Sex --</option>
                                                <option value="1">Male</option>
                                                <option value="0">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Marital Status</label>
                                            <select class="form-control" style="width: 100%;"
                                                name="cmbMembersMaritalStatus" id="cmbMembersMaritalStatus" required>
                                                <option selected disabled="" value="">-- Choose Status --</option>
                                                <option value="0">Single</option>
                                                <option value="1">Married</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Job Status</label>
                                            <select class="form-control" style="width: 100%;" name="cmbMembersJobStatus"
                                                id="cmbMembersJobStatus" required>
                                                <option selected disabled="" value="">-- Choose Status --</option>
                                                <option value="0">Not Working</option>
                                                <option value="1">Working</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Profession Experience</label>
                                            <select class="form-control" style="width: 100%;"
                                                name="cmbMembersProfessionalExperience"
                                                id="cmbMembersProfessionalExperience" required>
                                                <option selected disabled="" value="">-- Choose Years --</option>
                                                <option value="1">0 Years</option>
                                                <option value="2">1 - 5 Years</option>
                                                <option value="3">6 - 10 Years</option>
                                                <option value="4">11 - 15 Years</option>
                                                <option value="5">16 - 20 Years</option>
                                                <option value="6">Above 20 Years</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-8">
                                            <label class="control-label">Teaching Subjects</label>
                                            <textarea class="form-control" name="txtMembersTeachingSubjects"
                                                id="txtMembersTeachingSubjects" placeholder="Example: Math, Arabic..."
                                                required></textarea>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Contribution Type</label>
                                            <select class="form-control" style="width: 100%;"
                                                name="cmbMembersMemberContributionType"
                                                id="cmbMembersMemberContributionType" required>

                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Amount ($)</label>
                                            <input type="text" class="form-control" name="txtMembersContributionAmount"
                                                id="txtMembersContributionAmount" placeholder="Example: 2" required
                                                disabled>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Reason for Joining</label>
                                            <input class="form-control" type="text" name="txtMembersReasonForJoining"
                                                id="txtMembersReasonForJoining" placeholder="Example: Helping" required>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Member Address</label>
                                            <input type="text" class="form-control" name="txtMembersMemberAddress"
                                                id="txtMembersMemberAddress" placeholder="Example: Mogadishu" required>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Telephone Number</label>
                                            <input type="text" class="form-control" name="txtMembersTelephoneNo"
                                                id="txtMembersTelephoneNo" placeholder="Ex: 615555555" maxlength="9"
                                                required>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Email Address</label>
                                            <input type="email" class="form-control" name="txtMembersEmailAddress"
                                                id="txtMembersEmailAddress" placeholder="Enter Email Address"
                                                maxlength="70" required>
                                        </div>

                                        <input class="form-control" type="hidden" name="txtMembersRegisteredBy"
                                            id="txtMembersRegisteredBy" value="<?php echo $_SESSION['userIdd']; ?>"
                                            required>
                                        <input type="hidden" class="form-control" name="txtMembersRegisterDate"
                                            id="txtMembersRegisterDate" value="<?php echo date("Y-m-d H:i:s"); ?>"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <div class="tile-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary" name="btnRegisterMember"
                                    id="btnRegisterMember"><i class="fa fa-fw fa-lg fa-save"></i>Register
                                    Member</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Update Member Modal -->
<div class="modal fade" id="updateMemberModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit"></i> Update Member Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">

                        <form action="#" method="POST" id="updateMemberForm" enctype="multipart/form-data">
                            <div class="row">

                                <div class="form-group col-md-2" align="center">
                                    <br>
                                    <img class='img-responsive' src="img/no-image.jpg" id="memberTargetUp" width="150px"
                                        height="150px" /><br><br>
                                    <label class="btn btn-info col-md-12">
                                        <i class="fa fa-upload"> </i> Upload Photo <input type="file"
                                            class="form-control" name="memberPhotoUp" id="memberPhotoUp" hidden>
                                    </label>
                                    <input type="hidden" name="photoMemberUpdate" id="photoMemberUpdate" readonly />

                                    <script>
                                    var upd_member_src = document.getElementById("memberPhotoUp");
                                    var upd_member_target = document.getElementById("memberTargetUp");

                                    function showUpdateMemberImage(upd_member_src, upd_member_target) {
                                        var upl = new FileReader();
                                        upl.onload = function(e) {
                                            upd_member_target.src = this.result;
                                        };
                                        upd_member_src.addEventListener("change", function() {
                                            upl.readAsDataURL(upd_member_src.files[0]);
                                        })
                                    }
                                    showUpdateMemberImage(upd_member_src, upd_member_target);
                                    </script>

                                </div>

                                <div class="form-group col-md-10">

                                    <div class="row">

                                        <div class="form-group col-md-5">
                                            <label class="control-label">Member Name</label>
                                            <input type="hidden" name="txtMembersMemberIddd" id="txtMembersMemberIddd"
                                                required readonly>
                                            <input class="form-control" type="text" name="txtMembersMemberNameUp"
                                                id="txtMembersMemberNameUp" placeholder="Enter member name..." required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Place of Birth</label>
                                            <input class="form-control" type="text" name="txtMembersBirthPlaceUp"
                                                id="txtMembersBirthPlaceUp" placeholder="Example: Mogadishu" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label">Date of Birth</label>
                                            <input class="form-control date" type="date" name="txtMembersBirthDateUp"
                                                id="txtMembersBirthDateUp" required>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Sex</label>
                                            <select class="form-control" style="width: 100%;" name="cmbMembersSexUp"
                                                id="cmbMembersSexUp" required>
                                                <option selected disabled="" value="">-- Choose Sex --</option>
                                                <option value="1">Male</option>
                                                <option value="0">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Marital Status</label>
                                            <select class="form-control" style="width: 100%;"
                                                name="cmbMembersMaritalStatusUp" id="cmbMembersMaritalStatusUp"
                                                required>
                                                <option selected disabled="" value="">-- Choose Status --</option>
                                                <option value="0">Single</option>
                                                <option value="1">Married</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Job Status</label>
                                            <select class="form-control" style="width: 100%;"
                                                name="cmbMembersJobStatusUp" id="cmbMembersJobStatusUp" required>
                                                <option selected disabled="" value="">-- Choose Status --</option>
                                                <option value="0">Not Working</option>
                                                <option value="1">Working</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Profession Experience</label>
                                            <select class="form-control" style="width: 100%;"
                                                name="cmbMembersProfessionalExperienceUp"
                                                id="cmbMembersProfessionalExperienceUp" required>
                                                <option selected disabled="" value="">-- Choose Years --</option>
                                                <option value="1">0 Years</option>
                                                <option value="2">1 - 5 Years</option>
                                                <option value="3">6 - 10 Years</option>
                                                <option value="4">11 - 15 Years</option>
                                                <option value="5">16 - 20 Years</option>
                                                <option value="6">Above 20 Years</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-8">
                                            <label class="control-label">Teaching Subjects</label>
                                            <textarea class="form-control" name="txtMembersTeachingSubjectsUp"
                                                id="txtMembersTeachingSubjectsUp" placeholder="Example: Math, Arabic..."
                                                required></textarea>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Contribution Type</label>
                                            <select class="form-control" style="width: 100%;"
                                                name="cmbMembersMemberContributionTypeUp"
                                                id="cmbMembersMemberContributionTypeUp" required>

                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Amount ($)</label>
                                            <input type="text" class="form-control"
                                                name="txtMembersContributionAmountUp"
                                                id="txtMembersContributionAmountUp" placeholder="Example: 2" required
                                                disabled>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Reason for Joining</label>
                                            <input class="form-control" type="text" name="txtMembersReasonForJoiningUp"
                                                id="txtMembersReasonForJoiningUp" placeholder="Example: Helping"
                                                required>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Member Address</label>
                                            <input type="text" class="form-control" name="txtMembersMemberAddressUp"
                                                id="txtMembersMemberAddressUp" placeholder="Example: Mogadishu"
                                                required>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Telephone Number</label>
                                            <input type="text" class="form-control" name="txtMembersTelephoneNoUp"
                                                id="txtMembersTelephoneNoUp" placeholder="Ex: 615555555" maxlength="9"
                                                required>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Email Address</label>
                                            <input type="email" class="form-control" name="txtMembersEmailAddressUp"
                                                id="txtMembersEmailAddressUp" placeholder="Enter Email Address"
                                                maxlength="70" required>
                                        </div>

                                        <input class="form-control" type="hidden" name="txtMembersUpdatedBy"
                                            id="txtMembersUpdatedBy" value="<?php echo $_SESSION['userIdd']; ?>"
                                            required>
                                        <input type="hidden" class="form-control" name="txtMembersUpdateDate"
                                            id="txtMembersUpdateDate" value="<?php echo date("Y-m-d H:i:s"); ?>"
                                            required>
                                    </div>
                                </div>
                            </div>

                            <div class="tile-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary" name="btnUpdateMember"
                                    id="btnUpdateMember"><i class="fa fa-fw fa-lg fa-pencil"></i>Update
                                    Member</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End of Update Member Modal -->

<!-- Update Member Modal -->
<div class="modal fade" id="updateMemberPasscodeModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit"></i> Update Member Passcode Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">

                        <form action="#" method="POST" id="updateMemberPasscodeForm">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="control-label">New Member Passcode</label>
                                    <input class="form-control" type="hidden" name="txtNewMemberPasscodeID"
                                        id="txtNewMemberPasscodeID" placeholder="Enter new member passcode .." required>
                                    <input class="form-control" type="text" name="txtNewMemberPasscodeUp"
                                        id="txtNewMemberPasscodeUp" placeholder="Enter new member passcode .." required>
                                </div>

                                <input class="form-control" type="hidden" name="txtNewMembersPasscodeUpdatedBy"
                                    id="txtNewMembersPasscodeUpdatedBy" value="<?php echo $_SESSION['userIdd']; ?>"
                                    required>
                                <input type="hidden" class="form-control" name="txtNewMembersPasscodeUpdateDate"
                                    id="txtNewMembersPasscodeUpdateDate" value="<?php echo date("Y-m-d H:i:s"); ?>"
                                    required>
                            </div>


                            <div class="tile-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary" name="btnChangeNewMemberPasscode"
                                    id="btnChangeNewMemberPasscode"><i class="fa fa-fw fa-lg fa-refresh"></i>Change
                                    Passcode</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End of Update Member Modal -->



<!-- Register Member Payment Modal -->
<div class="modal fade" id="registerMemberPaymentModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-save"></i> Member Payment Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">

                        <form action="#" method="POST" name="registerMemberPaymentForm" id="registerMemberPaymentForm">

                            <div class="row" style="margin-left: 0px; margin-right: 0px;">

                                <div class="form-group col-md-12">

                                    <div class="row">

                                        <div class="form-group col-md-8">
                                            <label class="control-label">Member Name</label>
                                            <select class="form-control" style="width: 100%;"
                                                name="cmbMemberPaymentsMemberName" id="cmbMemberPaymentsMemberName"
                                                required>

                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Dept Amount ($)</label>
                                            <input type="text" class="form-control" name="txtMemberPaymentsDeptAmount"
                                                id="txtMemberPaymentsDeptAmount" placeholder="Example: 2" min="0"
                                                required readonly>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="control-label">Paid Amount ($)</label>
                                            <input type="text" class="form-control" name="txtMemberPaymentsPaidAmount"
                                                id="txtMemberPaymentsPaidAmount" placeholder="Example: 2" required>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label class="control-label">Amount in Words</label>
                                            <input type="text" class="form-control" name="txtMemberPaymentsAmountWords"
                                                id="txtMemberPaymentsAmountWords" style="font-weight: bold;" required
                                                readonly>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label">Remaining ($)</label>
                                            <input type="text" class="form-control" name="txtMemberPaymentsRemainAmount"
                                                id="txtMemberPaymentsRemainAmount" placeholder="Example: 2" value="0"
                                                required readonly>
                                        </div>

                                        <div class="form-group col-md-8">
                                            <label class="control-label">Account Name</label>
                                            <select class="form-control" style="width: 100%;"
                                                name="cmbMemberPaymentsAccountName" id="cmbMemberPaymentsAccountName"
                                                required>

                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Account Number</label>
                                            <input class="form-control" type="text"
                                                name="txtMemberPaymentsAccountNumber"
                                                id="txtMemberPaymentsAccountNumber" min="1" required readonly>
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Remarks</label>
                                            <textarea class="form-control" name="txtMemberPaymentsPaymentRemarks"
                                                id="txtMemberPaymentsPaymentRemarks"
                                                placeholder="Enter payment remarks..." required></textarea>
                                            <input class="form-control" type="hidden"
                                                name="txtMemberPaymentsRegisteredBy" id="txtMemberPaymentsRegisteredBy"
                                                value="<?php echo $_SESSION['userIdd']; ?>" required>
                                            <input type="hidden" name="txtMemberPaymentsRegisterDate"
                                                id="txtMemberPaymentsRegisterDate"
                                                value="<?php echo date("Y-m-d H:i:s"); ?>" required>
                                        </div>
                                    </div>

                                    <div class="tile-footer" style="text-align: right;">
                                        <button type="submit" class="btn btn-primary" name="btnRegisterMemberPayment"
                                            id="btnRegisterMemberPayment"><i class="fa fa-fw fa-lg fa-save"></i>Register
                                            Payment</button>&nbsp;&nbsp;&nbsp;
                                        <button type="reset" class="btn btn-danger" data-dismiss="modal"><i
                                                class="fa fa-fw fa-lg fa-times"></i>Close</button>
                                    </div>
                                </div>

                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- member Change Password Modal -->
<div class="modal fade" id="memberChangePasswordModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit"></i> Member Change Password Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">

                        <form action="#" method="POST" id="memberChangePasswordForm">

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="control-label">Old Password</label>
                                    <input class="form-control" type="password" placeholder="Enter old password..."
                                        name="memberOldPasswordChange" id="memberOldPasswordChange" required
                                        autocomplete="off">
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="control-label">New Password</label>
                                    <input type="password" class="form-control" type="text" name="memberPass1Change"
                                        id="memberPass1Change" placeholder="Enter new password..." maxlength="12"
                                        required>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label class="control-label">Confirm Password</label>
                                    <input type="password" class="form-control" type="text"
                                        name="memberConfirmPassChange" id="memberConfirmPassChange"
                                        placeholder="Confirm password..." maxlength="12" required>
                                </div>
                            </div>

                            <div class="tile-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary" name="btnMemberChangePassword"
                                    id="btnMemberChangePassword"><i class="fa fa-fw fa-lg fa-pencil"></i>Change
                                    Password</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Add Qualification Modal -->
<div class="modal fade" id="addQualificationModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-graduation-cap"></i> Add Qualification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">

                        <form action="#" method="POST" id="addQualificationForm" enctype="multipart/form-data">

                            <div class="row">

                                <div class="form-group col-md-4">
                                    <input type="hidden" name="memberrrIddQualification" id="memberrrIddQualification"
                                        class="form-control" value="<?php echo $_SESSION['memberrIddd']; ?>" required
                                        readonly>
                                    <label class="control-label">Level</label>
                                    <select class="form-control" name="qualificationLevel" id="qualificationLevel"
                                        style="width: 100%;" required>
                                        <option disabled selected value="">---- Qualification level ----</option>
                                        <option value="Bachelor Degree">Bachelor Degree</option>
                                        <option value="Master Degree">Master Degree</option>
                                        <option value="Postgraduate Diploma">Postgraduate Diploma</option>
                                        <option value="PhD">PhD</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label">Institution</label>
                                    <input class="form-control" type="text" name="institutionGraduated"
                                        id="institutionGraduated" placeholder="Ex: University of Africa" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="control-label">Faculty</label>
                                    <input class="form-control" type="text" name="graduatedFaculty"
                                        id="graduatedFaculty" placeholder="Ex: Public Health" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label">Status</label>
                                    <select class="form-control" name="qualificationStatus" id="qualificationStatus"
                                        style="width: 100%;" required>
                                        <option disabled selected value="">---- Select status ----</option>
                                        <option value="Continue">Continue</option>
                                        <option value="Graduated">Graduated</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 graduationDate">
                                    <label class="control-label">Graduation Date</label>
                                    <select class="form-control" name="graduationDate" id="graduationDate"
                                        style="width: 100%;">
                                        <option disabled selected value="">---- Graduation year ----</option>
                                        <?php
											$currYear = date("Y");
											for ($year = $currYear; $year >= 1980; $year--) {
												?><option value="<?php echo $year; ?>"><?php echo $year; ?></option> <?php
											}
										?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label">Percentage (%)</label>
                                    <input class="form-control" type="text" name="obtainedPercentage"
                                        id="obtainedPercentage" placeholder="Ex: 92, 3.8" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="control-label">&nbsp;</label>
                                    <label class="btn btn-primary col-md-12">
                                        <i class="fa fa-upload"> </i> Certificate/Testimonial <input type="file"
                                            id="uploadCertificateTestimoni" name="uploadCertificateTestimoni" hidden
                                            required>
                                    </label>
                                    <input type="hidden" name="qualificationRegDate" id="qualificationRegDate"
                                        value="<?php echo date("Y-m-d H:i:s"); ?>" required readonly />
                                </div>

                            </div>

                            <br><br>

                            <div class="modal-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-success btnRestyle" name="btnAddQualification"
                                    id="btnAddQualification"><i class="fa fa-fw fa-lg fa-plus"></i> Add
                                    Qualification</button>&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Add Work Experience Modal -->
<div class="modal fade" id="addWorkExperienceModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-briefcase"></i> Add Work Experience</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">

                        <form action="#" method="POST" id="addWorkExperienceForm">

                            <div class="row">

                                <div class="form-group col-md-4">
                                    <input type="hidden" name="memberrrIddWorkExperience" id="memberrrIddWorkExperience"
                                        class="form-control" value="<?php echo $_SESSION['memberrIddd']; ?>" required
                                        readonly>
                                    <label class="control-label">Work Type</label>
                                    <select class="form-control" name="workExperienceType" id="workExperienceType"
                                        style="width: 100%;" required>
                                        <option disabled selected value="">---- Work type ----</option>
                                        <option value="Full Time">Full Time</option>
                                        <option value="Part Time">Part Time</option>
                                        <option value="Volunteer">Volunteer</option>
                                        <option value="Internship">Internship</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label">Employer Name</label>
                                    <input class="form-control" type="text" name="employerName" id="employerName"
                                        placeholder="Ex: WFP, WHO" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="control-label">Title / Position</label>
                                    <input class="form-control" type="text" name="titlePosition" id="titlePosition"
                                        placeholder="Ex: Finance Officer" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label">Start Date</label>
                                    <input class="form-control" type="date" name="workStartDate" id="workStartDate"
                                        required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label">Status</label>
                                    <select class="form-control" name="workStatus" id="workStatus" style="width: 100%;"
                                        required>
                                        <option disabled selected value="">---- Select status ----</option>
                                        <option value="Working">Working</option>
                                        <option value="Left">Left</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 workLeftDate">
                                    <label class="control-label">Left Date</label>
                                    <input class="form-control" type="date" name="workLeftDate" id="workLeftDate">
                                    <input type="hidden" name="workExperienceRegDate" id="workExperienceRegDate"
                                        value="<?php echo date("Y-m-d H:i:s"); ?>" required readonly />
                                </div>

                            </div>

                            <br><br>

                            <div class="modal-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-success btnRestyle" name="btnAddWorkExperience"
                                    id="btnAddWorkExperience"><i class="fa fa-fw fa-lg fa-plus"></i> Add Work
                                    Experience</button>&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>