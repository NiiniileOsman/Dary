<!-- Add New Main Menu Modal -->
<div class="modal fade" style="z-index: 3000; overflow-y: auto;" id="createNewMenuModal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5><i class="fa fa-plus"></i> <b>Add New Main Menu</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" style="margin: 0px;">
                <div class="row" style="margin: 0px;">
                    <div class="form-group col-md-12" align="right">
                        <a class="btn btn-primary btn-lg" href="#" id="addNewMainMenu" style="padding-bottom: 8px; padding-top: 7px;"> &nbsp;<i class="fa fa-plus fa-lg"></i> ADD MAIN MENU</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="#" method="POST" name="addNewMainMenuForm" id="addNewMainMenuForm">
                            <div class="row" id="mainMenuArea">
                                &nbsp;
                            </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="addNewMainMenuBtn" id="addNewMainMenuBtn"><i class="fa fa-fw fa-lg fa-plus"></i>Add Main Menu(s)</button>&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.reload()"><i class="fa fa-fw fa-lg fa-close"></i>Close</button>
            </div>
        </div>
        </form>
    </div>
</div>

<!-- Update Main Menu Modal -->
<div class="modal fade" style="z-index: 3040; overflow-y: auto;" id="updateMainMenuModal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5><i class="fa fa-pencil"></i> <b>Update Main Menu</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" style="margin: 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <form action="#" method="POST" id="updateMainMenuForm">
                            <div class="row mainMenusClass" style="margin: 0px;" id="mainMenuArea">

                                <div class="form-group col-md-3">
                                    <label class="form-group">Main Menu Text</label>
                                    <input type="hidden" name="main_menu_id" id="main_menu_id" />
                                    <input class="form-control" type="text" name="updateMainMenuText" id="updateMainMenuText" placeholder="Enter Main Menu Text " + mainMenuCount + "" maxlength="25" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-group">Main Menu Icon</label>
                                    <input class="form-control" type="text" name="updateMainMenuIcon" id="updateMainMenuIcon" placeholder="Enter Main Menu Icon" maxlength="40" required>
                                </div>
                                <div class="form-group col-md-5">
                                    <label class="form-group">Main Menu Link</label>
                                    <input class="form-control" type="text" name="updateMainMenuLink" id="updateMainMenuLink" placeholder="Enter Main Menu Link (URL)" maxlength="100" required>
                                </div>

                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="updateMainMenuBtn" id="updateMainMenuBtn"><i class="fa fa-fw fa-lg fa-pencil"></i>Update Menu</button>&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.reload()"><i class="fa fa-fw fa-lg fa-close"></i>Close</button>
            </div>
        </div>
        </form>

    </div>
</div>
<!-- End of Update Main Menu Modal -->

<!-- Add New Submenu Modal -->
<div class="modal fade" style="z-index: 3001; overflow-y: auto;" id="createNewSubMenuModal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5><i class="fa fa-plus"></i> <b>Add New Sub Menu</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" style="margin: 0px;">
                <div class="row" style="margin: 0px;">
                    <div class="form-group col-md-12" align="right">
                        <a class="btn btn-info btn-lg" href="#" id="addNewSubMenu" style="padding-bottom: 8px; padding-top: 7px;"> &nbsp;<i class="fa fa-plus fa-lg"></i> ADD SUB MENU</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="#" method="POST" name="addNewSubMenuForm" id="addNewSubMenuForm">
                            <div class="row" id="subMenuArea">
                                &nbsp;
                            </div>

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-info" name="addNewSubMenuBtn" id="addNewSubMenuBtn"><i class="fa fa-fw fa-lg fa-plus"></i>Add Sub Menu(s)</button>&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.reload()"><i class="fa fa-fw fa-lg fa-close"></i>Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Add New Submenu Modal -->


<!-- Update Sub Menu Modal -->
<div class="modal fade" style="z-index: 3042; overflow-y: auto;" id="updateSubMenuModals" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5><i class="fa fa-pencil"></i> <b>Update Sub Menu</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body" style="margin: 0px;">
                <div class="row">
                    <div class="col-md-12">
                        <form action="#" method="POST" name="updateSubMenuForm" id="updateSubMenuForm">
                            <div class="row updateSubMenusClass" style="margin: 0px;" id="updateSubMenuArea">

                                <div class="form-group col-md-3">
                                    <label class="form-group">Sub Menu Text</label>
                                    <input type="hidden" name="sub_menu_id" id="sub_menu_id" />
                                    <input class="form-control" type="text" name="updateSubMenuText" id="updateSubMenuText" placeholder="Enter Main Menu Text " + mainMenuCount + "" maxlength="25" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="form-group">Sub Menu Icon</label>
                                    <input class="form-control" type="text" name="updateSubMenuIcon" id="updateSubMenuIcon" placeholder="Enter Main Menu Icon" maxlength="40" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-group">Sub Menu Link</label>
                                    <input class="form-control" type="text" name="updateSubMenuLink" id="updateSubMenuLink" placeholder="Enter Main Menu Link (URL)" maxlength="100" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="form-group">Select Main Menu</label>
                                    <select class="form-control" name="selectMainMenuIDD" id="selectMainMenuIDD" style="font-size: 16px;" required>

                                    </select>
                                </div>

                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="updateSubMenuBtn" id="updateSubMenuBtn"><i class="fa fa-fw fa-lg fa-pencil"></i> Update Sub Menu</button>&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="location.reload()"><i class="fa fa-fw fa-lg fa-close"></i>Close</button>
            </div>

            </form>
        </div>
    </div>
</div>
<!-- Enf of Update Sub Menu Modal -->

<!-- Register Employee Modal -->
<div class="modal fade" id="registerEmployeeModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-save"></i> Register Employee Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">

                        <form action="#" method="POST" id="registerEmployeeForm" enctype="multipart/form-data">
                            <div class="row">

                                <div class="form-group col-md-2" align="center">
                                    <br>
                                    <img class='img-responsive' src="img/no-image.jpg" id="employeeTarget" width="148px" height="148px" /><br><br>
                                    <label class="btn btn-info col-md-12">
                                        <i class="fa fa-upload"> </i> Upload Photo <input type="file" class="form-control" name="employeePhoto" id="employeePhoto" hidden>
                                    </label>

                                    <script>
                                        var src = document.getElementById("employeePhoto");
                                        var target = document.getElementById("employeeTarget");

                                        function showImage(src, target) {
                                            var upl = new FileReader();
                                            upl.onload = function(e) {
                                                target.src = this.result;
                                            };
                                            src.addEventListener("change", function() {
                                                upl.readAsDataURL(src.files[0]);
                                            })
                                        }
                                        showImage(src, target);
                                    </script>

                                </div>

                                <div class="form-group col-md-10">

                                    <div class="row">

                                        <div class="form-group col-md-5">
                                            <label class="control-label">Employee Name</label>
                                            <input class="form-control" type="text" name="txtEmployeesEmployeeName" id="txtEmployeesEmployeeName" placeholder="Enter employee name" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Place of Birth</label>
                                            <input class="form-control" type="text" name="txtEmployeesBirthPlace" id="txtEmployeesBirthPlace" placeholder="Enter place of birth" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label">Date of Birth</label>
                                            <input class="form-control date" type="date" name="txtEmployeesBirthDate" id="txtEmployeesBirthDate" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="control-label">Position / Title</label>
                                            <select class="form-control" style="width: 100%;" name="cmbEmployeesEmployeeTitle" id="cmbEmployeesEmployeeTitle" required>
                                                <option selected disabled="" value="">-- Choose position --</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Finance</option>
                                                <option value="3">Registrar</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Salary</label>
                                            <input class="form-control" type="number" name="txtEmployeesEmployeeSalary" id="txtEmployeesEmployeeSalary" placeholder="Enter salary" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Hire Date</label>
                                            <input class="form-control date" type="date" name="txtEmployeesEmployeeHireDate" id="txtEmployeesEmployeeHireDate" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="control-label">Identification Type</label>
                                            <select class="form-control" style="width: 100%;" name="cmbEmployeesEmployeeIdentiDocType" id="cmbEmployeesEmployeeIdentiDocType" required>
                                                <option value="">-- Choose type --</option>
                                                <option value="1">Passport</option>
                                                <option value="2">National Card</option>
                                                <option value="3">Driver License</option>
                                                <option value="4">Employment Card</option>
                                                <option value="5">International Card</option>
                                                <option value="6">Others</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Identification Document</label>
                                            <label class="btn btn-primary col-md-12">
                                                <i class="fa fa-upload"> </i> Upload Document <input type="file" class="form-control" name="txtEmployeesEmployeeIdentificationDoc" id="txtEmployeesEmployeeIdentificationDoc" hidden>
                                            </label>
                                            <input type="hidden" id="docEmp1" name="docEmp1" />
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="control-label">Address</label>
                                            <input type="text" class="form-control" name="txtEmployeesEmployeeAddress" id="txtEmployeesEmployeeAddress" placeholder="Enter address" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Telephone</label>
                                            <input type="text" class="form-control" name="txtEmployeesEmployeeTelephoneNo" id="txtEmployeesEmployeeTelephoneNo" placeholder="Enter telephone" maxlength="9" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Email Address</label>
                                            <input type="email" class="form-control" name="txtEmployeesEmployeeEmailAddress" id="txtEmployeesEmployeeEmailAddress" placeholder="Enter employee" maxlength="70" required>
                                            <input class="form-control" type="hidden" name="txtEmployeeRegisteredBy" id="txtEmployeeRegisteredBy" value="<?php echo $_SESSION['userIdd']; ?>" required>
                                            <input type="hidden" class="form-control" name="txtEmployeesEmployeeRegisterDate" id="txtEmployeesEmployeeRegisterDate" value="<?php echo date("Y-m-d H:i:s"); ?>" required>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="tile-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary" name="btnRegisterEmployee" id="btnRegisterEmployee"><i class="fa fa-fw fa-lg fa-save"></i> Register Employee</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End of Insert Employee Modal -->



<!-- Update Employee Modal -->
<div class="modal fade" id="updateEmployeeModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit"></i> Update Employee Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">

                        <form action="#" method="POST" id="updateEmployeeForm" enctype="multipart/form-data">
                            <div class="row">

                                <div class="form-group col-md-2" align="center">
                                    <br>
                                    <img class='img-responsive' src="img/no-image.jpg" id="employeeTargetUp" width="148px" height="148px" /><br><br>
                                    <label class="btn btn-info col-md-12">
                                        <i class="fa fa-upload"> </i> Upload Photo <input type="file" class="form-control" name="employeePhotoUp" id="employeePhotoUp" hidden>
                                    </label>
                                    <input type="hidden" id="photoEmpUp1" name="photoEmpUp1" />

                                    <script>
										var upd_emp_src = document.getElementById("employeePhotoUp");
										var upd_emp_target = document.getElementById("employeeTargetUp");

										function showUpdateEmployeeImage(upd_emp_src, upd_emp_target) {
											var upl = new FileReader();
											upl.onload = function(e) {
												upd_emp_target.src = this.result;
											};
											upd_emp_src.addEventListener("change", function() {
												upl.readAsDataURL(upd_emp_src.files[0]);
											})
										}
										showUpdateEmployeeImage(upd_emp_src, upd_emp_target);
									</script>

                                </div>

                                <div class="form-group col-md-10">

                                    <div class="row">

                                        <div class="form-group col-md-5">
                                            <label class="control-label">Employee Name</label>
                                            <input type="hidden" name="txtEmployeesEmployeeID" id="txtEmployeesEmployeeID" required readonly>
                                            <input class="form-control" type="text" name="txtEmployeesEmployeeNameUp" id="txtEmployeesEmployeeNameUp" placeholder="Enter employee name" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Place of Birth</label>
                                            <input class="form-control" type="text" name="txtEmployeesBirthPlaceUp" id="txtEmployeesBirthPlaceUp" placeholder="Enter place of birth" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label">Date of Birth</label>
                                            <input class="form-control date" type="date" name="txtEmployeesBirthDateUp" id="txtEmployeesBirthDateUp" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="control-label">Position / Title</label>
                                            <select class="form-control" style="width: 100%;" name="cmbEmployeesEmployeeTitleUp" id="cmbEmployeesEmployeeTitleUp" required>
                                                <option selected disabled="" value="">-- Choose position --</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Finance</option>
                                                <option value="3">Registrar</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Salary</label>
                                            <input class="form-control" type="number" name="txtEmployeesEmployeeSalaryUp" id="txtEmployeesEmployeeSalaryUp" placeholder="Enter salary" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Hire Date</label>
                                            <input class="form-control date" type="date" name="txtEmployeesEmployeeHireDateUp" id="txtEmployeesEmployeeHireDateUp" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="control-label">Identification Type</label>
                                            <select class="form-control" style="width: 100%;" name="cmbEmployeesEmployeeIdentiDocTypeUp" id="cmbEmployeesEmployeeIdentiDocTypeUp" required>
                                                <option value="">-- Choose type --</option>
                                                <option value="1">Passport</option>
                                                <option value="2">National Card</option>
                                                <option value="3">Driver License</option>
                                                <option value="4">Employment Card</option>
                                                <option value="5">International Card</option>
                                                <option value="6">Others</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Identification Document</label>
                                            <label class="btn btn-primary col-md-12">
                                                <i class="fa fa-upload"> </i> Upload Document <input type="file" class="form-control" name="txtEmployeesEmployeeIdentificationDocUp" id="txtEmployeesEmployeeIdentificationDocUp" hidden>
                                            </label>
                                            <input type="hidden" id="docEmp1" name="docEmp1" />
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Address</label>
                                            <input type="text" class="form-control" name="txtEmployeesEmployeeAddressUp" id="txtEmployeesEmployeeAddressUp" placeholder="Enter address" required>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="control-label">Telephone</label>
                                            <input type="text" class="form-control" name="txtEmployeesEmployeeTelephoneNoUp" id="txtEmployeesEmployeeTelephoneNoUp" placeholder="Enter telephone" maxlength="9" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Email Address</label>
                                            <input type="email" class="form-control" name="txtEmployeesEmployeeEmailAddressUp" id="txtEmployeesEmployeeEmailAddressUp" placeholder="Enter employee" maxlength="70" required>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Employee status</label>
                                            <select class="form-control" name="cmbEmployeesEmployeeStatusUp" id="cmbEmployeesEmployeeStatusUp" style="width: 100%;" required>
                                                <option selected disabled="" value="">-- Select Status ---</option>
                                                <option value="1">Working</option>
                                                <option value="2">Left</option>
                                            </select>
                                            <input class="form-control" type="hidden" name="txtEmployeeUpdatedBy" id="txtEmployeeUpdatedBy" value="<?php echo $_SESSION['userIdd']; ?>" required>
                                            <input type="hidden" class="form-control" name="txtEmployeesEmployeeUpdateDate" id="txtEmployeesEmployeeUpdateDate" value="<?php echo date("Y-m-d H:i:s"); ?>" required>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="tile-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary" name="btnUpdateEmployee" id="btnUpdateEmployee"><i class="fa fa-fw fa-lg fa-pencil"></i> Update Employee</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End of Update Employee Modal -->

<!-- Register User Modal -->
<div class="modal fade" id="registerUserModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-save"></i> User Registration Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">

                        <form action="#" method="POST" id="registerUserForm">

                            <div class="row">

                                <div class="form-group col-md-12">
                                    <label class="control-label">Name</label>
                                    <select class="form-control" name="users" id="users" style="font-size: 16px; width: 100%;" required>
                                        <option value="1">Employee</option>
                                        <option value="2">Doctor</option>
                                        <option value="3">Pharmacy</option>
                                        <option value="4">Lab Test</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label">Full Name</label>
                                    <select class="form-control" name="userEmpID" id="userEmpID" style="font-size: 16px; width: 100%;" required>

                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label">User Name</label>
                                    <input class="form-control" type="text" name="userName" id="userName" placeholder="Example: Nasiimpc " required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="control-label">Password</label>
                                    <input class="form-control" type="text" name="passWord" id="passWord" placeholder="Enter password..." required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="control-label">2-Step Verification</label>
                                    <select class="form-control" style="width: 100%;" name="cmb2StepVerification" id="cmb2StepVerification" required>
                                        <option value="">-- Select mode --</option>
                                        <option value="Enabled">Enabled</option>
                                        <option value="Disabled">Disabled</option>
                                    </select>
                                    <input class="form-control" type="hidden" name="txtUserrIddd" id="txtUserrIddd" value="<?php echo $_SESSION['userIdd']; ?>" required>
                                    <input type="hidden" class="form-control" name="registerDate" id="registerDate" value="<?php echo date("Y-m-d H:i:s"); ?>" required>
                                </div>

                            </div>

                            <div class="tile-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary" name="regUser" id="regUser"><i class="fa fa-fw fa-lg fa-save"></i>Register User</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End of Register User Modal -->

<!-- Update User Modal -->
<div class="modal fade" id="updateUserModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-edit"></i> User Update Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">

                        <form action="#" method="POST" id="updateUserForm">

                            <div class="row">

                                <div class="form-group col-md-12">
                                    <input type="hidden" name="empUserIDUp" id="empUserIDUp" class="form-control" required readonly="">
                                    <label class="control-label">Full Name</label>
                                    <select class="form-control" name="userEmpIDUp" id="userEmpIDUp" style="font-size: 16px; width: 100%;" required>

                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label">User Name</label>
                                    <input class="form-control" type="text" name="userNameUp" id="userNameUp" placeholder="Example: Nasiimpc " required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="control-label">Password</label>
                                    <input class="form-control" type="text" name="passWordUp" id="passWordUp" placeholder="Enter password..." required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label">2-Step Verification</label>
                                    <select class="form-control" style="width: 100%;" name="cmb2StepVerificationUp" id="cmb2StepVerificationUp" required>
                                        <option value="">-- Select mode --</option>
                                        <option value="Enabled">Enabled</option>
                                        <option value="Disabled">Disabled</option>
                                    </select>
                                </div>
                                <input class="form-control" type="hidden" name="txtUserrIddd" id="txtUserrIddd" value="<?php echo $_SESSION['userIdd']; ?>" required>
                                <input type="hidden" class="form-control" name="registerDate" id="registerDate" value="<?php echo date("Y-m-d H:i:s"); ?>" required>
                            </div>
                    </div>

                    <div class="tile-footer" style="text-align: right;">
                        <button type="submit" class="btn btn-primary" name="updateUser" id="updateUser"><i class="fa fa-fw fa-lg fa-pencil"></i>Update User</button>&nbsp;&nbsp;&nbsp;
                        <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times"></i>Close</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
</div>
<!-- End of Update User Modal -->

<!-- Register Payment Gateway Modal -->
<div class="modal fade" id="registerPaymentGatewaysModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-save"></i> Payment Gateway Registration Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">

                        <form action="#" method="POST" id="registerPaymentGatewayForm" enctype="multipart/form-data">
                            <div class="row">

                                <div class="form-group col-sm-12">
                                    <label class="control-label">Gateway Type</label>
                                    <select class="form-control" style="width: 100%;" name="cmbGatewayType" id="cmbGatewayType" required>
                                        <option selected value="">-- Select Type --</option>
                                        <option value="1">Bank Payment</option>
                                        <option value="2">Mobile Payment</option>
                                        <option value="3">Cash Payment</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="control-label" id="gatewayNameLabel">Name</label>
                                    <input type="text" class="form-control" name="txtGatewaysGatewayName" id="txtGatewaysGatewayName" placeholder="Enter name" required>
                                    <input class="form-control" type="hidden" name="txtUserrIddd" id="txtUserrIddd" value="<?php echo $_SESSION['userIdd']; ?>" required>
                                    <input class="form-control" type="hidden" name="txtGatewayRegisterDate" id="txtGatewayRegisterDate" value="<?php echo date("Y-m-d H:i:s"); ?>" required>
                                </div>

                                <div class="form-group col-md-5" align="center">
                                    <br>
                                    <img class='img-responsive' src="img/upload_gateway_image.png" id="gatewayTarget" width="80%" height="100px" /><br><br>
                                    <label class="btn btn-success col-md-12">
                                        <i class="fa fa-upload"> </i> Upload <input type="file" name="gatewayPhoto" id="gatewayPhoto" hidden>
                                    </label>

                                    <script>
                                        var gateway_src = document.getElementById("gatewayPhoto");
                                        var gateway_target = document.getElementById("gatewayTarget");

                                        function showGatewayImage(gateway_src, gateway_target) {
                                            var upl = new FileReader();
                                            upl.onload = function(e) {
                                                gateway_target.src = this.result;
                                            };
                                            gateway_src.addEventListener("change", function() {
                                                upl.readAsDataURL(gateway_src.files[0]);
                                            })
                                        }
                                        showGatewayImage(gateway_src, gateway_target);
                                    </script>
                                </div>

                            </div>

                            <div class="tile-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary" name="btnRegisterGateway" id="btnRegisterGateway"><i class="fa fa-fw fa-lg fa-save"></i>Register Gateway</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End of Register Payment Gateway Modal -->

<!-- Update Payment Gateway Modal -->
<div class="modal fade" id="updatePaymentGatewaysModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-save"></i> Update Payment Gateways Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">

                        <form action="#" method="POST" id="updatePaymentGatewayForm" enctype="multipart/form-data">
                            <div class="row">

                                <div class="form-group col-sm-12">
                                    <input type="hidden" name="txtGatewayIdd" id="txtGatewayIdd">
                                    <label class="control-label">Gateway Type</label>
                                    <select class="form-control" style="width: 100%;" name="cmbGatewayTypeUp" id="cmbGatewayTypeUp" required>
                                        <option selected value="">-- Select Type --</option>
                                        <option value="1">Bank Payment</option>
                                        <option value="2">Mobile Payment</option>
                                        <option value="3">Cash Payment</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="control-label" id="gatewayNameLabelUp">Name</label>
                                    <input type="text" class="form-control" name="txtGatewaysGatewayNameUp" id="txtGatewaysGatewayNameUp" placeholder="Enter name" required>
                                    <input class="form-control" type="hidden" name="txtUserrIddd" id="txtUserrIddd" value="<?php echo $_SESSION['userIdd']; ?>" required>
                                    <input class="form-control" type="hidden" name="txtGatewayUpdateDate" id="txtGatewayUpdateDate" value="<?php echo date("Y-m-d H:i:s"); ?>" required>
                                </div>

                                <div class="form-group col-md-5" align="center">
                                    <br>
                                    <img class='img-responsive' src="img/upload_gateway_image.png" id="gatewayTargetUp" width="80%" height="100px" /><br><br>
                                    <label class="btn btn-success col-md-12">
                                        <i class="fa fa-upload"> </i> Upload <input type="file" name="gatewayPhotoUp" id="gatewayPhotoUp" hidden>
                                    </label>
                                    <input type="hidden" name="photoGatewayUpdate" id="photoGatewayUpdate">


                                    <script>
                                        var up_gateway_src = document.getElementById("gatewayPhotoUp");
                                        var up_gateway_target = document.getElementById("gatewayTargetUp");

                                        function showGatewayImageUp(up_gateway_src, up_gateway_target) {
                                            var upl = new FileReader();
                                            upl.onload = function(e) {
                                                up_gateway_target.src = this.result;
                                            };
                                            up_gateway_src.addEventListener("change", function() {
                                                upl.readAsDataURL(up_gateway_src.files[0]);
                                            })
                                        }
                                        showGatewayImageUp(up_gateway_src, up_gateway_target);
                                    </script>
                                </div>

                            </div>

                            <div class="tile-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary" name="btnUpdateGateway" id="btnUpdateGateway"><i class="fa fa-fw fa-lg fa-pencil"></i>Update Gateway</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End of Update Payment Gateway Modal -->


<!-- Add New Account Modal -->
<div class="modal fade" id="addNewAccountNumberModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-save"></i> Register New Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" id="addNewkAccountNumberForm">
                    <div class="tile">
                        <div class="row">

                            <div class="form-group col-sm-5">
                                <label class="control-label">Account Type</label>
                                <select class="form-control" style="width: 100%;" name="cmbAccountNumbersAccountType" id="cmbAccountNumbersAccountType" required>
                                    <option selected value="">-- Select Type --</option>
                                    <option value="1">Bank Account</option>
                                    <option value="2">Mobile Account</option>
                                    <option value="3">Cash Account</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-7">
                                <label class="control-label" id="accountGatewayNameLabel"> &nbsp; </label>
                                <select class="form-control" style="width: 100%;" name="cmbAccountNumbersGatewayName" id="cmbAccountNumbersGatewayName" required>

                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label" id="bankAccountNameLabel"> &nbsp; </label>
                                <input class="form-control" type="text" name="txtAccountNumbersAccountName" id="txtAccountNumbersAccountName" placeholder="Example: Salam Somali Bank" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label" id="bankAccountNumberLabel"> &nbsp; </label>
                                <input class="form-control" type="text" name="txtAccountNumbersAccountNumber" id="txtAccountNumbersAccountNumber" placeholder="Example: 30343536" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label">Openning Balance</label>
                                <input class="form-control" type="text" name="txtBankAccountNumberOpenningBalance" id="txtBankAccountNumberOpenningBalance" value="0" required>
                                <input class="form-control" type="hidden" name="txtUserrIddd" id="txtUserrIddd" value="<?php echo $_SESSION['userIdd']; ?>" required>
                                <input class="form-control" type="hidden" name="txtBankAccountRegisterDate" id="txtBankAccountRegisterDate" value="<?php echo date("Y-m-d H:i:s"); ?>" required>
                            </div>

                        </div>

                        <div class="row" style="text-align: right;">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="btnRegisterAccountNumber" id="btnRegisterAccountNumber"><i class="fa fa-fw fa-lg fa-save"></i>Register Account Number</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Add New Account Number -->


<!-- Register Account Transactions Modal -->
<div class="modal fade" id="registerAccountTransactionModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-save"></i> Account Transaction Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">

                        <form action="#" method="POST" name="registerAccountTransactionForm" id="registerAccountTransactionForm">

                            <div class="row" style="margin-left: 0px; margin-right: 0px;">

                                <div class="form-group col-md-12">

                                    <div class="row">

                                        <div class="form-group col-md-12">
                                            <label class="control-label">Account Name</label>
                                            <select class="form-control" style="width: 100%;" name="cmbAccountTransactionsAccountName" id="cmbAccountTransactionsAccountName" required>

                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Account Number</label>
                                            <input class="form-control" type="text" name="txtAccountTransactionsAccountNumber" id="txtAccountTransactionsAccountNumber" min="1" required readonly>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="control-label">Transaction Type</label>
                                            <select class="form-control" style="width: 100%;" name="cmbAccountTransactionsTransactionType" id="cmbAccountTransactionsTransactionType" required>
                                                <option value="">--- Select type ---</option>
                                                <option value="1">Deposit</option>
                                                <option value="2">Withdrawal</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label" id="transactedAmountFromAccount">&nbsp;</label>
                                            <input type="text" class="form-control" name="txtAccountTransactionsTransactedAmount" id="txtAccountTransactionsTransactedAmount" placeholder="Example: 130" min="0" required>
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Amount in Words</label>
                                            <input type="text" class="form-control" name="txtAccountTransactionsAmountWords" id="txtAccountTransactionsAmountWords" style="font-weight: bold;" required readonly>
                                        </div>

                                        <div class="form-group col-sm-8">
                                            <label class="control-label">Remarks</label>
                                            <textarea class="form-control" name="txtAccountTransactionsTransactionRemarks" id="txtAccountTransactionsTransactionRemarks" placeholder="Enter transaction remarks..." required></textarea>
                                            <input class="form-control" type="hidden" name="txtUserrIddd" id="txtUserrIddd" value="<?php echo $_SESSION['userIdd']; ?>" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label" id="transactedDateFromAccount">&nbsp;</label>
                                            <input class="form-control" type="date" name="txtAccountTransactionsTransactionDate" id="txtAccountTransactionsTransactionDate" max="<?php echo date("Y-m-d"); ?>" required>
                                        </div>
                                    </div>

                                    <div class="tile-footer" style="text-align: right;">
                                        <button type="submit" class="btn btn-primary" name="btnRegisterAccountTransaction" id="btnRegisterAccountTransaction"><i class="fa fa-fw fa-lg fa-save"></i>Register Transaction</button>&nbsp;&nbsp;&nbsp;
                                        <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times"></i>Close</button>
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
<!-- End of Register Account Transactions Modal -->

<!-- Employee Salaries Modal -->
<div class="modal fade" id="employeeSalariesModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employeeSalariesModalTitle"><i class="fa fa-save"></i> Salary Payment Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">

                        <form action="#" id="employeeSalaryPaymentForm" method="POST">

                            <div class="row" style="margin-left: 0px; margin-right: 0px;">

                                <div class="form-group col-md-12">
                                    <div class="row">

                                        <div class="form-group col-md-8">
                                            <label class="control-label">Employee Name</label>
                                            <select class="form-control" name="cmbSalaryPaymentEmployeeName" id="cmbSalaryPaymentEmployeeName" style="width: 100%;" required>

                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Title / Position</label>
                                            <input type="text" class="form-control" name="txtSalaryPaymentEmployeeTitle" id="txtSalaryPaymentEmployeeTitle" placeholder="Example: Finance Officer" required readonly>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="control-label">Salary Month</label>
                                            <select class="form-control" style="width: 100%;" name="cmbSalaryPaymentSalaryMonth" id="cmbSalaryPaymentSalaryMonth" required>
                                                <option value="">-- Select month --</option>
                                                <?php
                                                $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                                                $currentYearNo = date("Y");
                                                $thisMonth = date("n") - 1;
                                                for ($i = 0; $i <= $thisMonth; $i++) { ?>
                                                    <option option="<?php echo $months[$i] . " " . $currentYearNo; ?>"><?php echo $months[$i] . " " . $currentYearNo; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Charged Salary ($)</label>
                                            <input type="number" class="form-control" name="txtSalaryPaymentChargedAmount" id="txtSalaryPaymentChargedAmount" placeholder="Example: 300" readonly required>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Remaining Balance ($)</label>
                                            <input type="number" class="form-control" name="txtSalaryPaymentRemainingBalance" id="txtSalaryPaymentRemainingBalance" placeholder="Example: 300" min=1 required readonly>
                                        </div>

                                        <div class="form-group col-md-5">
                                            <label class="control-label">Withdrawal Account</label>
                                            <select class="form-control" style="width: 100%;" name="cmbEmployeeSalariesWithdrawalAccount" id="cmbEmployeeSalariesWithdrawalAccount" required>

                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Account Number</label>
                                            <input class="form-control" type="text" name="txtEmployeeSalariesAccountNumber" id="txtEmployeeSalariesAccountNumber" min="1" required readonly>
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label class="control-label">Paid Amount ($)</label>
                                            <input type="number" class="form-control" name="txtSalaryPaymentPaidAmount" id="txtSalaryPaymentPaidAmount" placeholder="Example: 300" min=1 required>
                                        </div>

                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Amount in Words</label>
                                            <input type="text" class="form-control" name="txtSalaryPaymentAmountInWords" id="txtSalaryPaymentAmountInWords" placeholder="Example: Two Hundered Dollars" required readonly>
                                        </div>

                                        <div class="form-group col-sm-8">
                                            <label class="control-label">Remarks</label>
                                            <textarea class="form-control" name="txtSalaryPaymentSalaryDescription" id="txtSalaryPaymentSalaryDescription" placeholder="Enter Salary Remarks..." required></textarea>
                                            <input type="hidden" name="txtUserrIddd" id="txtUserrIddd" value="<?php echo $_SESSION['userIdd']; ?>" required>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Payment Date</label>
                                            <input type="date" class="form-control" name="txtSalaryPaymentDate" id="txtSalaryPaymentDate" max="<?php echo date("Y-m-d"); ?>" required>
                                        </div>

                                    </div>

                                    <div class="tile-footer" style="text-align: right;">
                                        <button type="submit" class="btn btn-primary" name="btnPayEmployeeSalary" id="btnPayEmployeeSalary"><i class="fa fa-fw fa-lg fa-save"></i>Register Salary Payment</button>&nbsp;&nbsp;&nbsp;
                                        <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times"></i>Close</button>
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
<!-- End of Employee Salaries Modal -->

<!-- Register Expense Modal -->
<div class="modal fade" id="registerExpenseModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-save"></i> Expense Registration Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">

                        <form action="#" method="POST" name="registerExpenseForm" id="registerExpenseForm">

                            <div class="row" style="margin-left: 0px; margin-right: 0px;">

                                <div class="form-group col-md-12">

                                    <div class="row">

                                        <div class="form-group col-sm-12">
                                            <label class="control-label">Expense Description</label>
                                            <input type="text" class="form-control" name="txtExpenseDesc" id="txtExpenseDesc" placeholder="Example: Expense of room maintenance..." required>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label class="control-label">Expense Amount ($)</label>
                                            <input type="text" class="form-control" name="txtExpenseAmount" id="txtExpenseAmount" placeholder="Example: 130" min="0" required>
                                        </div>
                                        <div class="form-group col-sm-8">
                                            <label class="control-label">Amount in Words</label>
                                            <input type="text" class="form-control" name="txtExpenseAmountWords" id="txtExpenseAmountWords" style="font-weight: bold;" required readonly>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="control-label">Withdrawal Account</label>
                                            <select class="form-control" style="width: 100%;" name="cmbExpensesWithdrawalAccount" id="cmbExpensesWithdrawalAccount" required>

                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">Account/Number</label>
                                            <input class="form-control" type="text" name="txtExpensesWithdrawnFromAccountNumber" id="txtExpensesWithdrawnFromAccountNumber" min="1" required readonly>
                                        </div>

                                        <div class="form-group col-sm-8">
                                            <label class="control-label">Remarks</label>
                                            <textarea class="form-control" name="txtExpensePaymentRemarks" id="txtExpensePaymentRemarks" placeholder="Enter Expense Remarks..." required></textarea>
                                            <input class="form-control" type="hidden" name="txtUserrIddd" id="txtUserrIddd" value="<?php echo $_SESSION['userIdd']; ?>" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label">Payment Date</label>
                                            <input class="form-control" type="date" name="txtExpenseRegisterDate" id="txtExpenseRegisterDate" required>
                                        </div>
                                    </div>


                                    <div class="tile-footer" style="text-align: right;">
                                        <button type="submit" class="btn btn-primary" name="btnRegisterExpense" id="btnRegisterExpense"><i class="fa fa-fw fa-lg fa-save"></i>Register Expense</button>&nbsp;&nbsp;&nbsp;
                                        <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times"></i>Close</button>
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
<!-- End of Register Expense Modal -->

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-key"></i> Change Password Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">

                        <form action="#" method="POST" id="changePasswordForm">

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="control-label">Old Password</label>
                                    <input class="form-control" type="password" placeholder="Enter old password..." name="oldPasswordChange" id="oldPasswordChange" required autocomplete="off">
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="control-label">New Password</label>
                                    <input type="password" class="form-control" type="text" name="pass1Change" id="pass1Change" placeholder="Enter new password..." required>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label class="control-label">Confirm Password</label>
                                    <input type="password" class="form-control" type="text" name="confirmPassChange" id="confirmPassChange" placeholder="Confirm password..." required>
                                </div>
                            </div>

                            <div class="tile-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary" name="btnChangePassword" id="btnChangePassword"><i class="fa fa-fw fa-lg fa-pencil"></i>Change Password</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End of Change Password Modal -->


<!-- Update Profile Modal -->
<div class="modal fade" id="updateProfileModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProfileModalTitle"><i class="fa fa-edit"></i> Update Profile Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">

                        <form action="#" method="POST" id="updateUserProfileForm" enctype="multipart/form-data">
                            <div class="row" align="center">
                                <div class="form-group col-md-12">
                                    <img class='img-responsive' src="<?php echo $_SESSION['userPhoto']; ?>" id="updateProfileSrcTarget" width="60%" /><br><br>
                                    <input class="form-control col-sm-8" type="file" id="updateProfileSrc" name="updateUserPhoto">
                                    <input type="hidden" id="updateUserPhotoPath" name="updateUserPhotoPath" value="<?php echo $_SESSION['userPhoto']; ?>" />
                                    <script>
                                        var updateSrc = document.getElementById("updateProfileSrc");
                                        var updateTarget = document.getElementById("updateProfileSrcTarget");

                                        function showPhoto(updateSrc, updateTarget) {
                                            var upload = new FileReader();
                                            upload.onload = function(e) {
                                                updateTarget.src = this.result;
                                            };
                                            updateSrc.addEventListener("change", function() {
                                                upload.readAsDataURL(updateSrc.files[0]);
                                            })
                                        }
                                        showPhoto(updateSrc, updateTarget);
                                    </script>
                                </div>

                                <div class="form-group col-md-12 text-left">
                                    <label class="control-label">Full Name</label>
                                    <input class="form-control" type="text" name="updateFullName" id="updateFullName" placeholder="Enter full name..." value="<?php echo $_SESSION['fullName']; ?>" maxlength="35" required>
                                </div>

                            </div>

                            <div class="tile-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-primary" name="updateProfileBtn" id="updateProfileBtn"><i class="fa fa-fw fa-lg fa-pencil"></i>Update Profile</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times"></i>Close</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End of Update Profile Modal -->


<!-- 2-Step Verification Modal -->
<div class="modal fade" id="securitySettingsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-toggle-on"></i> Security Settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.reload()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">

                        <div class="row">
                            <div class="form-group col-md-8">
                                <label class="control-label">Enable 2-Step Verification</label>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="toggle lg">
                                    <label>
                                        <input type="checkbox" id="twoStepVerificationToggle" name="twoStepVerificationToggle"><span class="button-indecator"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End of 2-Step Verification Modal -->
