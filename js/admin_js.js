//Global variables of the system
var dn = "OEZPc1BsRDF6OWtGUThxaFIrdVpnQT09Ojo+gTnhuvAEZYuiobR8YGB6";

var btnAction = "Insert";
$(document).ready(function () {
  //Global events of the system
  $("#telNo").bind("keypress", function (e) {
    var keyCode = e.which ? e.which : e.keyCode;
    if (!(keyCode >= 48 && keyCode <= 57)) {
      return false;
    }
  });

  //Allow only numbers and dot, float numbers
  $(
    "#txtSalaryPaymentPaidAmount, #txtBankAccountNumberOpenningBalance, #txtExpenseAmount, #txtAccountTransactionsTransactedAmount"
  ).keypress(function (event) {
    if (
      (event.which != 46 || $(this).val().indexOf(".") != -1) &&
      (event.which < 48 || event.which > 57)
    ) {
      event.preventDefault();
    }
  });

  //Global functions of the system
  fillEmpNameUsers();
  FillEmpNameEmployeesReport();
  fillAccountDetails();
  fillAccountDetailsReports();
  fill_patientAppointmentDoctor();
  //================================ Start of System Configuraions ===============================================

  // ----------------------- Update Sysem FavIcon ---------------------
  $("#updateSystemFaviconForm").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    var vl = $("#txtSystemIdd").val();
    var cm =
      "Nno1am42V0x5dVRIQzUzcHRoZlU1aE52QTBhZzhDQ0FLWVdIL05PczRaUT06Opq5l4P5AAKdub/NZ0odFd8=";
    var photoNames = $("#photoUpdateFavicon").val();
    var docNames = ""; // Means no documents in this update
    var hasFile = "Yes";
    var files = "photoUpdateFavicon";
    var tn =
      "S2hBWUZZUWFpNXFKUWpuZVgzeFg0dWs2QkMveWdDajRuSDVGVW5DUVRZaz06OvI5LZd/lMpddE5xJHGfNqI=";
    var commandType = "update_command";
    var objName = "Favicon";
    formData.append("action", "ins_upd_del_everything");
    formData.append("vl", vl);
    formData.append("cm", cm);
    formData.append("hasFile", hasFile);
    formData.append("files", files);
    formData.append("photoUpdateFavicon", $("#systemFavIconPhoto")[0].files[0]);
    formData.append("photoNames", photoNames);
    formData.append("docNames", docNames);
    formData.append("commandType", commandType);
    formData.append("tn", tn);
    formData.append("objName", objName);

    $.ajax({
      url: "api/main.php",
      type: "POST",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        $("#btnUpdateSystemFavIcon").prop("disabled", true);
        $("#btnUpdateSystemFavIcon").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnUpdateSystemFavIcon").prop("disabled", false);
        $("#btnUpdateSystemFavIcon").html(
          "<i class='fa fa-lg fa-pencil'></i> Update System Favicon"
        );
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          swal(
            {
              title: "",
              text: Message,
              type: "success",
              showCancelButton: false,
              closeOnConfirm: false,
              closeOnCancel: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                location.reload();
              }
            }
          );
        } else {
          Message.forEach(function (error) {
            bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {
              type: "danger",
              position: "topright",
              appendType: "append",
            });
          });
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  //------------------------ Update System Name ----------------------------------------------
  $("#updateSystemNameForm").on("submit", function (e) {
    e.preventDefault();

    var vl =
      $("#txtSystemNameSystemIddd").val() +
      "###" +
      $("#txtUpdateSystemName").val();
    var cm =
      "ZFZ2eGdheDczcDA3WjFoc005Q3pST0hIVFptMkpMZUg4VmdDaUdQNTNhTT06OozxMDhyuAmfiIA21QRiCLw=";
    var tn =
      "eEhxQ1dvZ3htWFp4WXlLSEJqZG1OVlhvWG9LSG05V0VxdDJXL2dSMTNBVT06OsHloSaFIWAEYhPT44ag91Q=";
    var commandType = "update_command";
    var hasFile = "No";
    var objName = "System name";

    var post = {
      action: "ins_upd_del_everything",
      vl: vl,
      cm: cm,
      hasFile: hasFile,
      commandType: commandType,
      tn: tn,
      objName: objName,
    };

    $.ajax({
      url: "api/main.php",
      type: "POST",
      data: post,
      dataType: "JSON",
      beforeSend: function () {
        $("#btnUpdateSystemName").prop("disabled", true);
        $("#btnUpdateSystemName").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnUpdateSystemName").prop("disabled", false);
        $("#btnUpdateSystemName").html(
          "<i class='fa fa-lg fa-pencil'></i> Update System Name"
        );
        var Message = data.Message;
        var status = data.Status;
        if (status === true) {
          swal(
            {
              title: "",
              text: Message,
              type: "success",
              showCancelButton: false,
              closeOnConfirm: false,
              closeOnCancel: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                location.reload();
              }
            }
          );
        } else {
          Message.forEach(function (error) {
            bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {
              type: "danger",
              position: "topright",
              appendType: "append",
            });
          });
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  // ----------------------- Update Sysem FavIcon ---------------------
  $("#updateLoginPageImageForm").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    var vl = $("#txtLoginPageImageSystemIdd").val();
    var cm =
      "SjBGOHRubE5Gei9ucG13QVVtQ3ZUWGthSGdvdldKdHVYWWFnajJ6Mitsdz06OqZH1wRhHWzC9X+1+9qzjSg=";
    var photoNames = $("#photoUpdateLoginPageImage").val();
    var docNames = ""; // Means no documents in this update
    var hasFile = "Yes";
    var files = "photoUpdateLoginPageImage";
    var tn =
      "eEhxQ1dvZ3htWFp4WXlLSEJqZG1OVlhvWG9LSG05V0VxdDJXL2dSMTNBVT06OsHloSaFIWAEYhPT44ag91Q=";
    var commandType = "update_command";
    var objName = "Login page image";
    formData.append("action", "ins_upd_del_everything");
    formData.append("vl", vl);
    formData.append("cm", cm);
    formData.append("hasFile", hasFile);
    formData.append("files", files);
    formData.append(
      "photoUpdateLoginPageImage",
      $("#systemLoginPagePhoto")[0].files[0]
    );
    formData.append("photoNames", photoNames);
    formData.append("docNames", docNames);
    formData.append("commandType", commandType);
    formData.append("tn", tn);
    formData.append("objName", objName);

    $.ajax({
      url: "api/main.php",
      type: "POST",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        $("#btnUpdateLoginPageImage").prop("disabled", true);
        $("#btnUpdateLoginPageImage").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnUpdateLoginPageImage").prop("disabled", false);
        $("#btnUpdateLoginPageImage").html(
          "<i class='fa fa-lg fa-pencil'></i> Update Image"
        );
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          swal(
            {
              title: "",
              text: Message,
              type: "success",
              showCancelButton: false,
              closeOnConfirm: false,
              closeOnCancel: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                location.reload();
              }
            }
          );
        } else {
          Message.forEach(function (error) {
            bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {
              type: "danger",
              position: "topright",
              appendType: "append",
            });
          });
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  //------------------------ Update System Dashboard Header ----------------------------------------------
  $("#updateDashboardHeaderTileForm").on("submit", function (e) {
    e.preventDefault();
    var icon = $("#txtHeaderTitleIcon").val();
    var title = $("#txtHeaderTitleLabel").val();
    var jumlo = icon + "*#*#*#" + title;
    alert(jumlo);
    var vl = $("#txtSystemheaderSystemIddd").val() + "###" + jumlo;
    // alert(vl);
    // fa fa-graduation-cap*#*#*#CITY LIGHT TRAVEL & CARGO AGENCY
    var cm =
      "MHpyb2R3Q1hWcHM4VWdkV0NCQVRWd2x5c05xOGFIQlQ3bVBPSFN1N0NZcz06OoYcdxlIkBmvCcP+NZgNUQE=";
    var tn =
      "eEhxQ1dvZ3htWFp4WXlLSEJqZG1OVlhvWG9LSG05V0VxdDJXL2dSMTNBVT06OsHloSaFIWAEYhPT44ag91Q=";
    var commandType = "update_command";
    var hasFile = "No";
    var objName = "System Header Dashboard";

    var post = {
      action: "ins_upd_del_everything",
      vl: vl,
      cm: cm,
      hasFile: hasFile,
      commandType: commandType,
      tn: tn,
      objName: objName,
    };

    $.ajax({
      url: "api/main.php",
      type: "POST",
      data: post,
      dataType: "JSON",
      beforeSend: function () {
        $("#btnUpdateHeaderTitle").prop("disabled", true);
        $("#btnUpdateHeaderTitle").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnUpdateHeaderTitle").prop("disabled", false);
        $("#btnUpdateHeaderTitle").html(
          "<i class='fa fa-lg fa-pencil'></i> Update Header"
        );
        var Message = data.Message;
        var status = data.Status;
        if (status === true) {
          swal(
            {
              title: "",
              text: Message,
              type: "success",
              showCancelButton: false,
              closeOnConfirm: false,
              closeOnCancel: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                location.reload();
              }
            }
          );
        } else {
          Message.forEach(function (error) {
            bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {
              type: "danger",
              position: "topright",
              appendType: "append",
            });
          });
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });
  //------------------------ Update System Footer ----------------------------------------------
  $("#updateFooterCaptionsForm").on("submit", function (e) {
    e.preventDefault();
    var vl =
      $("#txtSystemfooterSystemIddd").val() +
      "###" +
      $("#txtFooterTitleLabel").val() +
      "###" +
      $("#txtfooterversionLabel").val();

    var cm =
      "S1J0dU5QT09qMll3VERtNWpkQzcydXV5RzFlZ0hpVzZPK3J4bkNQWDh2VXJ4clNyQ0E1MDNsL01CUTJEWUM3ZDo6aqIMwtO9joNdpy6kWaBz7A==";
    var tn =
      "eEhxQ1dvZ3htWFp4WXlLSEJqZG1OVlhvWG9LSG05V0VxdDJXL2dSMTNBVT06OsHloSaFIWAEYhPT44ag91Q=";
    var commandType = "update_command";
    var hasFile = "No";
    var objName = "System Footer Caption";

    var post = {
      action: "ins_upd_del_everything",
      vl: vl,
      cm: cm,
      hasFile: hasFile,
      commandType: commandType,
      tn: tn,
      objName: objName,
    };

    $.ajax({
      url: "api/main.php",
      type: "POST",
      data: post,
      dataType: "JSON",
      beforeSend: function () {
        $("#btnUpdateFooterSection").prop("disabled", true);
        $("#btnUpdateFooterSection").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnUpdateFooterSection").prop("disabled", false);
        $("#btnUpdateFooterSection").html(
          "<i class='fa fa-lg fa-pencil'></i> Update Footer"
        );
        var Message = data.Message;
        var status = data.Status;
        if (status === true) {
          swal(
            {
              title: "",
              text: Message,
              type: "success",
              showCancelButton: false,
              closeOnConfirm: false,
              closeOnCancel: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                location.reload();
              }
            }
          );
        } else {
          Message.forEach(function (error) {
            bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {
              type: "danger",
              position: "topright",
              appendType: "append",
            });
          });
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  // ----------------------- Update Sysem Header Logo ---------------------
  $("#updateHeaderLogoImageForm").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    var vl = $("#txtheaderImageSystemIdd").val();

    var cm =
      "V1drdTB0TEQ5QmJGODdYMWRXVTBzOHQ1NEN0VjNBRy9VbG9SMW5uL29lRT06OmM4ptnMYrmA18yFrRbHA1c=";
    var photoNames = $("#photoUpdateheaderPageImage").val();
    var docNames = ""; // Means no documents in this update
    var hasFile = "Yes";
    var files = "photoUpdateheaderPageImage";
    var tn =
      "eEhxQ1dvZ3htWFp4WXlLSEJqZG1OVlhvWG9LSG05V0VxdDJXL2dSMTNBVT06OsHloSaFIWAEYhPT44ag91Q=";
    // var commandType = "update_command";
    var objName = "Header page image";
    formData.append("action", "headerImageReport");
    formData.append("vl", vl);
    formData.append("cm", cm);
    formData.append("hasFile", hasFile);
    formData.append("files", files);
    formData.append(
      "photoUpdateheaderPageImage",
      $("#systemHeaderLogoPhoto")[0].files[0]
    );
    formData.append("photoNames", photoNames);
    // formData.append("docNames", docNames);
    // formData.append("commandType", commandType);
    formData.append("tn", tn);
    formData.append("objName", objName);

    $.ajax({
      url: "api/main.php",
      type: "POST",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        $("#btnUpdateHeaderLogoImage").prop("disabled", true);
        $("#btnUpdateHeaderLogoImage").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnUpdateHeaderLogoImage").prop("disabled", false);
        $("#btnUpdateHeaderLogoImage").html(
          "<i class='fa fa-lg fa-pencil'></i> Update Image"
        );
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          swal(
            {
              title: "",
              text: Message,
              type: "success",
              showCancelButton: false,
              closeOnConfirm: false,
              closeOnCancel: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                location.reload();
              }
            }
          );
        } else {
          Message.forEach(function (error) {
            bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {
              type: "danger",
              position: "topright",
              appendType: "append",
            });
            // console.log(Message);
          });
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
        console.log(e);
      },
    });
  });
  // ----------------------- Update Sysem Header Report Logo ---------------------
  $("#updateReportsHeaderImageForm").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    var vl = $("#txtreportHeaderImageSystemIdd").val();
    var cm =
      "cGphaE9HMGx6LzhKMTdjQnBocFFBR0VGSExNOCs5bENUYkllWW1TbFY1Yz06OreS22Sd+iiIzN8vwt6/HHk=";
    var photoNames = $("#photoUpdateheaderReportPageImage").val();
    var docNames = ""; // Means no documents in this update
    var hasFile = "Yes";
    var files = "photoUpdateheaderReportPageImage";
    var tn =
      "eEhxQ1dvZ3htWFp4WXlLSEJqZG1OVlhvWG9LSG05V0VxdDJXL2dSMTNBVT06OsHloSaFIWAEYhPT44ag91Q=";
    var commandType = "update_command";
    var objName = "Report Header page image";
    formData.append("action", "ins_upd_del_everything");
    formData.append("vl", vl);
    formData.append("cm", cm);
    formData.append("hasFile", hasFile);
    formData.append("files", files);
    formData.append(
      "photoUpdateheaderReportPageImage",
      $("#systemReportsHeaderPhoto")[0].files[0]
    );
    formData.append("photoNames", photoNames);
    formData.append("docNames", docNames);
    formData.append("commandType", commandType);
    formData.append("tn", tn);
    formData.append("objName", objName);

    $.ajax({
      url: "api/main.php",
      type: "POST",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        $("#btnUpdateReportsHeaderImage").prop("disabled", true);
        $("#btnUpdateReportsHeaderImage").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnUpdateReportsHeaderImage").prop("disabled", false);
        $("#btnUpdateReportsHeaderImage").html(
          "<i class='fa fa-lg fa-pencil'></i> Update Image"
        );
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          swal(
            {
              title: "",
              text: Message,
              type: "success",
              showCancelButton: false,
              closeOnConfirm: false,
              closeOnCancel: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                location.reload();
              }
            }
          );
        } else {
          Message.forEach(function (error) {
            bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {
              type: "danger",
              position: "topright",
              appendType: "append",
            });
          });
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  //================================ End of System Configuraions =================================================

  //================================ Start of Manage Menus =======================================================

  $("#addNewMainMenuBtn").attr("disabled", true);
  $("#addNewSubMenuBtn").attr("disabled", true);
  fillMainMenu();
  var mainMenuCount = 0;
  var subMenuCount = 0;

  // >>>>>>>>>>>>>>>>>>>>>>> Main Menu Activities >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

  // ----------------------- Add dynamic main menu textboxes to the popup modal -------------------------------
  $("#addNewMainMenu").click(function (e) {
    e.preventDefault();
    mainMenuCount += 1;
    $("#mainMenuArea").after(
      "<div class='row mainMenusClass' style='margin: 0px;' id='mainMenuArea" +
        mainMenuCount +
        "'><div class='form-group col-md-3'><input class='form-control' type='text' name='mainMenuText[]' id='mainMenuText" +
        mainMenuCount +
        "' placeholder='Enter Main Menu Text " +
        mainMenuCount +
        "' maxlength='25' required></div><div class='form-group col-md-3'><input class='form-control' type='text' name='mainMenuIcon[]' id='mainMenuIcon" +
        mainMenuCount +
        "' placeholder='Enter Main Menu Icon' maxlength='40' required></div><div class='form-group col-md-5'><input class='form-control' type='text' name='mainMenuLink[]' id='mainMenuLink" +
        mainMenuCount +
        "' placeholder='Enter Main Menu Link (URL)' maxlength='100' required></div><div class='form-group col-md-1' align='left'><a class='btn btn-danger btn-md' href='#'  id='removeMenuOnce' data-id='" +
        mainMenuCount +
        "' style='padding-bottom: 8px; padding-top: 7px;'> &nbsp;<i class='fa fa-close fa-lg'></i></a></div></div>"
    );
    $("#addNewMainMenuBtn").attr("disabled", false);
    $("#mainMenuText" + mainMenuCount + "").focus();
  });

  // ----------------------- Add new main menu ----------------------------------------------------------------
  $("#addNewMainMenuForm").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize() + "&action=" + "addNewMainMenu";
    $.ajax({
      url: "api/main.php",
      method: "POST",
      data: formData,
      beforeSend: function () {
        $("#addNewMainMenuBtn").prop("disabled", true);
        $("#addNewMainMenuBtn").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait"
        );
      },
      success: function (data) {
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          swal(
            {
              title: "",
              text: Message,
              type: "success",
              showCancelButton: false,
              closeOnConfirm: false,
              closeOnCancel: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                location.reload();
              }
            }
          );
        } else {
          swal("", Message, "error");
        }
      },
      error: function (data) {},
    });
  });

  // ----------------------- Filling Data into Main Menu Modal ---------------------
  $(document).on("click", ".updateMainMenu", function (e) {
    e.preventDefault();
    var objectID = $(this).attr("data-id");
    var tn = "cHpYTEM1SUlXeko1Zmk0cEIvY0Vidz09OjpmEf11VmaVi80fCVZDFjct";
    var cm = "RWJnNk5NbEhNQWYvMlc4OTRQZHQvdz09Ojq1ZF7F7ZJeC8RXhLuwDMal";
    var post = {
      action: "fetch_parameterized_everything",
      dn: dn,
      tn: tn,
      cm: cm,
      objectID: objectID,
    };
    $(".modal-body").load(objectID);
    $.ajax({
      method: "POST",
      url: "api/main.php",
      data: post,
      dataType: "JSON",
      success: function (data) {
        var Message = data.Message;
        var status = data.Status;
        if (status === true) {
          var returned_info = Message.split("###");
          $("#main_menu_id").val(returned_info[0]);
          $("#updateMainMenuText").val(returned_info[1]);
          $("#updateMainMenuIcon").val(returned_info[2]);
          $("#updateMainMenuLink").val(returned_info[3]);
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  // ----------------------- Update main menu ----------------------------------------------------------
  $("#updateMainMenuForm").on("submit", function (e) {
    e.preventDefault();
    var vl =
      $("#main_menu_id").val() +
      "###" +
      $("#updateMainMenuText").val() +
      "###" +
      $("#updateMainMenuIcon").val() +
      "###" +
      $("#updateMainMenuLink").val();
    var cm =
      "TkZhbmcyRkw1dG9UNG42NVVIOXNvK2pSOWNUdmNSVmw5SnVEMm1kMTRXNGxTUnp1ajl3ME1JanZsVndnaExSNUhncExWMTNqMldULzM2TFNXVjJlQXc9PTo6EJiD0XWnN/FKV9MmrODaYw==";
    var tn = "cHpYTEM1SUlXeko1Zmk0cEIvY0Vidz09OjpmEf11VmaVi80fCVZDFjct";
    var commandType = "update_command";
    var hasFile = "No";
    var objName = "Main menu";
    var post = {
      action: "ins_upd_del_everything",
      vl: vl,
      cm: cm,
      hasFile: hasFile,
      commandType: commandType,
      tn: tn,
      objName: objName,
    };
    $.ajax({
      url: "api/main.php",
      type: "POST",
      data: post,
      dataType: "JSON",
      beforeSend: function () {
        $("#updateMainMenuBtn").prop("disabled", true);
        $("#updateMainMenuBtn").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#updateMainMenuBtn").prop("disabled", false);
        $("#updateMainMenuBtn").html(
          "<i class='fa fa-lg fa-pencil'></i> Update Main Menu"
        );
        var Message = data.Message;
        var status = data.Status;
        if (status === true) {
          swal(
            {
              title: "",
              text: Message,
              type: "success",
              showCancelButton: false,
              closeOnConfirm: false,
              closeOnCancel: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                location.reload();
              }
            }
          );
        } else {
          Message.forEach(function (error) {
            bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {
              type: "danger",
              position: "topright",
              appendType: "append",
            });
          });
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  // ----------------------- Update main menu mode change to ALLOWED or NOT ALLOWED ------------------------------
  $(document).on("change", "#allowMainMenu", function () {
    var thisAllowMain = $(this).attr("data-id");
    if (this.checked) {
      var post = { action: "mainMenuAllowed", thisAllowMain: thisAllowMain };
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: post,
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            bs4pop.notice(
              "<i class='fa fa-check-circle'></i> &nbsp;" + Message,
              { type: "success", position: "bottomright", appendType: "append" }
            );
            setTimeout(function () {
              location.reload();
            }, 1000);
          } else {
            swal("", Message, "error");
          }
        },
        error: function (data) {},
      });
    } else {
      var post = { action: "mainMenuNotAllowed", thisAllowMain: thisAllowMain };
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: post,
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            bs4pop.notice(
              "<i class='fa fa-times-circle'></i> &nbsp;" + Message,
              { type: "danger", position: "bottomright", appendType: "append" }
            );
            setTimeout(function () {
              location.reload();
            }, 1000);
          } else {
            swal("", Message, "error");
          }
        },
        error: function (data) {},
      });
    }
  });

  // ----------------------- Change main menu rank -------------------------------------------------------------
  $(document).on("change", ".mainMRank", function () {
    var mainMenuID = $(this).attr("data-id");
    var mainMenuRank = $(this).val();
    var post = {
      action: "changeMainMenuRank",
      mainMenuID: mainMenuID,
      mainMenuRank: mainMenuRank,
    };
    $.ajax({
      method: "POST",
      url: "api/main.php",
      data: post,
      dataType: "JSON",
      success: function (data) {
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          bs4pop.notice(
            "<i class='fa fa-check-circle'></i> <b>Main-menu</b> rank changed to <b>" +
              mainMenuRank +
              "</b>",
            { type: "success", position: "bottomright", appendType: "append" }
          );
          setTimeout(function () {
            location.reload();
          }, 1000);
        } else {
          swal("", Message, "error");
        }
      },
      error: function (data) {},
    });
  });

  // ----------------------- Remove dynamically added main menu textboxes in the popup modal ---------------
  $(document).on("click", "#removeMenuOnce", function (e) {
    var thisID = $(this).attr("data-id");
    e.preventDefault();
    $("#mainMenuArea" + thisID + "").remove();
  });

  // ----------------------- Delete main menu --------------------------------------------------------------
  $(".mainMenuDeletion").on("click", function (e) {
    e.preventDefault();
    const getMainMenu = $(this).attr("data-src");
    const getMainMenuID = $(this).attr("data-id");
    swal(
      {
        title: "Are you sure ?",
        text: "You want to delete this menu " + getMainMenu + " ?",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false,
      },
      function (isConfirm) {
        if (isConfirm) {
          $.ajax({
            method: "POST",
            url: "api/main.php",
            data: { action: "deleteMainMenu", getMainMenuID: getMainMenuID },
            dataType: "JSON",
            success: function (data) {
              var Message = data.Message;
              var status = data.Status;
              if (status == true) {
                swal(
                  {
                    title: "",
                    text: Message,
                    type: "success",
                    showCancelButton: false,
                    closeOnConfirm: false,
                    closeOnCancel: false,
                  },
                  function (isConfirm) {
                    if (isConfirm) {
                      location.reload();
                    }
                  }
                );
              } else {
                swal("", Message, "error");
              }
            },
            error: function (data) {},
          });
        } else {
          swal("Cancelled", getMainMenu + " menu deletion cancelled.", "error");
        }
      }
    );
  });

  // >>>>>>>>>>>>>>>>>>>>>>> Sub Menu Activities >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

  // ----------------------- Add dynamic sub menu textboxes to the popup modal -----------------------------
  $("#addNewSubMenu").click(function (e) {
    e.preventDefault();
    subMenuCount += 1;
    $("#subMenuArea").after(
      "<div class='row subMenusClass' style='margin: 0px;' id='subMenuArea" +
        subMenuCount +
        "'><div class='form-group col-md-3'><input class='form-control' type='text' name='subMenuText[]' id='subMenuText" +
        subMenuCount +
        "' placeholder='Enter Sub Menu Text " +
        subMenuCount +
        "' maxlength='25' required></div><div class='form-group col-md-2'><input class='form-control' type='text' name='subMenuIcon[]' id='subMenuIcon" +
        subMenuCount +
        "' placeholder='Enter Sub Menu Icon' maxlength='40' required></div><div class='form-group col-md-4'><input class='form-control' type='text' name='subMenuLink[]' id='mainMenuLink" +
        subMenuCount +
        "' placeholder='Enter Sub Menu Link (URL)' maxlength='100' required></div><div class='form-group col-md-2'><select class='form-control' name='selectMainMenuID[]' id='selectMainMenuID' data-id='" +
        subMenuCount +
        "' style='font-size: 16px;' required></select></div><div class='form-group col-md-1' align='left'><a class='btn btn-danger btn-md' href='#'  id='removeSubMenuOnce' data-id='" +
        subMenuCount +
        "' style='padding-bottom: 8px; padding-top: 7px;'> &nbsp;<i class='fa fa-close fa-lg'></i></a></div></div>"
    );
    fillMainMenu();
    $("#addNewSubMenuBtn").attr("disabled", false);
    $("#subMenuText" + subMenuCount + "").focus();
  });

  // ----------------------- Add new sub menu --------------------------------------------------------------
  $("#addNewSubMenuForm").submit(function (e) {
    e.preventDefault();
    var formData = $(this).serialize() + "&action=" + "addNewSubMenu";
    $.ajax({
      url: "api/main.php",
      method: "POST",
      data: formData,
      beforeSend: function () {
        $("#addNewSubMenuBtn").prop("disabled", true);
        $("#addNewSubMenuBtn").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait"
        );
      },
      success: function (data) {
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          swal(
            {
              title: "",
              text: Message,
              type: "success",
              showCancelButton: false,
              closeOnConfirm: false,
              closeOnCancel: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                location.reload();
              }
            }
          );
        } else {
          swal("", Message, "error");
        }
      },
      error: function (data) {},
    });
  });

  // ----------------------- Filling Data into Sub Menu Modal ---------------------
  $(document).on("click", ".updateSubMenu", function (e) {
    e.preventDefault();
    var objectID = $(this).attr("data-id");
    var tn = "RmdUVWtlVXA1b0puWGxCKzdZYU5RUT09OjqVuvZ1gE0sSvT/0dD6itjP";
    var cm = "eU42ZVlCMHFvMDJ4QmZsQlhjSis2QT09OjrSkndGencw9bX5Fdsg2YFX";
    var post = {
      action: "fetch_parameterized_everything",
      dn: dn,
      tn: tn,
      cm: cm,
      objectID: objectID,
    };
    $(".modal-body").load(objectID);
    $.ajax({
      method: "POST",
      url: "api/main.php",
      data: post,
      dataType: "JSON",
      success: function (data) {
        var Message = data.Message;
        var status = data.Status;
        if (status === true) {
          var returned_info = Message.split("###");
          $("#sub_menu_id").val(returned_info[0]);
          $("#updateSubMenuText").val(returned_info[1]);
          $("#updateSubMenuIcon").val(returned_info[2]);
          $("#updateSubMenuLink").val(returned_info[3]);
          $("#selectMainMenuIDD").val(returned_info[4]);
          $("#MainMenu" + returned_info[0]).val(returned_info[4]);
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  // ----------------------- Update sub menu ----------------------------------------------------
  $("#updateSubMenuForm").submit(function (e) {
    e.preventDefault();
    var update_s_m_id = $("#sub_menu_id").val();
    var update_s_m_text = $("#updateSubMenuText").val();
    var update_s_m_icon = $("#updateSubMenuIcon").val();
    var update_s_m_link = $("#updateSubMenuLink").val();
    var select_m_m_id = $("#selectMainMenuIDD").val();
    var originalMainMenu = $("#MainMenu" + update_s_m_id).attr("data-id");
    var post = {
      action: "updateSubMenus",
      update_s_m_id: update_s_m_id,
      update_s_m_text: update_s_m_text,
      update_s_m_icon: update_s_m_icon,
      update_s_m_link: update_s_m_link,
      select_m_m_id: select_m_m_id,
      originalMainMenu: originalMainMenu,
    };
    $.ajax({
      method: "POST",
      url: "api/main.php",
      data: post,
      dataType: "JSON",
      beforeSend: function () {
        $("#updateSubMenuBtn").prop("disabled", true);
        $("#updateSubMenuBtn").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait"
        );
      },
      success: function (data) {
        $("#updateSubMenuBtn").prop("disabled", false);
        $("#updateSubMenuBtn").html(
          "<i class='fa fa-lg fa-pencil'></i> Update Sub Menu"
        );
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          swal(
            {
              title: "",
              text: Message,
              type: "success",
              showCancelButton: false,
              closeOnConfirm: false,
              closeOnCancel: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                location.reload();
              }
            }
          );
        } else {
          swal("", Message, "error");
        }
      },
      error: function (data) {},
    });
  });

  // ----------------------- Update sub menu mode change to ALLOWED or NOT ALLOWED -------------------------
  $(document).on("change", "#allowSubMenu", function () {
    var thisAllowSub = $(this).attr("data-id");
    if (this.checked) {
      var post = { action: "subMenuAllowed", thisAllowSub: thisAllowSub };
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: post,
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            bs4pop.notice(
              "<i class='fa fa-check-circle'></i> &nbsp;" + Message,
              { type: "success", position: "bottomright", appendType: "append" }
            );
            setTimeout(function () {
              location.reload();
            }, 1000);
          } else {
            swal("", Message, "error");
          }
        },
        error: function (data) {},
      });
    } else {
      var post = { action: "subMenuNotAllowed", thisAllowSub: thisAllowSub };
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: post,
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            bs4pop.notice(
              "<i class='fa fa-times-circle'></i> &nbsp;" + Message,
              { type: "danger", position: "bottomright", appendType: "append" }
            );
            setTimeout(function () {
              location.reload();
            }, 1000);
          } else {
            swal("", Message, "error");
          }
        },
        error: function (data) {},
      });
    }
  });

  // ----------------------- Change sub menu rank --------------------------------------------------------------
  $(document).on("change", ".subMRank", function () {
    var subMenuID = $(this).attr("data-id");
    var subMenuRank = $(this).val();
    var mainMenuID = $(this).attr("data-src");
    var post = {
      action: "changeSubMenuRank",
      subMenuID: subMenuID,
      subMenuRank: subMenuRank,
      mainMenuID: mainMenuID,
    };
    $.ajax({
      method: "POST",
      url: "api/main.php",
      data: post,
      dataType: "JSON",
      success: function (data) {
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          bs4pop.notice(
            "<i class='fa fa-check-circle'></i> <b>Sub-menu</b> rank changed to <b>" +
              subMenuRank +
              "</b>",
            { type: "success", position: "bottomright", appendType: "append" }
          );
          setTimeout(function () {
            location.reload();
          }, 1000);
        } else {
          swal("", Message, "error");
        }
      },
      error: function (data) {},
    });
  });

  // ----------------------- Remove dynamically added sub menu textboxes in the popup modal ----------------
  $(document).on("click", "#removeSubMenuOnce", function (e) {
    e.preventDefault();
    var thisID = $(this).attr("data-id");
    $("#subMenuArea" + thisID + "").remove();
  });

  // ----------------------- Delete sub menu ---------------------------------------------------------------
  $(".subMenuDeletion").on("click", function (e) {
    e.preventDefault();
    const href = $(this).attr("href");
    const getSubMenu = $(this).attr("data-src");
    const getSubMenuID = $(this).attr("data-id");
    swal(
      {
        title: "Are you sure ?",
        text: "You want to delete " + getSubMenu + " Menu?",
        type: "",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false,
      },
      function (isConfirm) {
        if (isConfirm) {
          $.ajax({
            method: "POST",
            url: "api/main.php",
            data: { action: "deleteSubMenu", getSubMenuID: getSubMenuID },
            dataType: "JSON",
            success: function (data) {
              var Message = data.Message;
              var status = data.Status;
              if (status == true) {
                swal(
                  {
                    title: "",
                    text: Message,
                    type: "success",
                    showCancelButton: false,
                    closeOnConfirm: false,
                    closeOnCancel: false,
                  },
                  function (isConfirm) {
                    if (isConfirm) {
                      location.reload();
                    }
                  }
                );
              } else {
                swal("", Message, "error");
              }
            },
            error: function (data) {},
          });
        } else {
          swal("Cancelled", getSubMenu + " menu deletion cancelled.", "error");
        }
      }
    );
  });

  //================================ End of Manage Menus =========================================================

  //================================ Start of User Privileges ====================================================
  fillUserNamesForPriv();
  // ----------------------- Fill usernames in the user privileges page ------------------------------------
  $("#userNameForPrivileges").change(function () {
    var thisUser = $(this).val();
    var post = { action: "fetchUserPrivileges", currentUser: thisUser, dn: dn };
    if (thisUser == "") {
    } else {
      $.ajax({
        url: "api/main.php",
        method: "POST",
        data: post,
        dataType: "text",
        success: function (result) {
          $(".userPrivilegesSection").html(result);
        },
      });
    }
  });

  // ----------------------- Update user main menu mode, set ALLOWED, NOT ALLOWED --------------------------
  $(document).on("change", "#allowUserMainMenu", function () {
    var roleUserID = $(this).attr("data-src");
    var thisAllowMain = $(this).attr("data-id");
    if (this.checked) {
      var post = {
        action: "userMainMenuAllowed",
        thisAllowMain: thisAllowMain,
        roleUserID: roleUserID,
      };
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: post,
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            bs4pop.notice(
              "<i class='fa fa-check-circle'></i> &nbsp;" + Message,
              { type: "success", position: "bottomright", appendType: "append" }
            );
          } else {
            swal("", Message, "error");
          }
        },
        error: function (data) {},
      });
    } else {
      var post = {
        action: "userMainMenuNotAllowed",
        thisAllowMain: thisAllowMain,
        roleUserID: roleUserID,
      };
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: post,
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            bs4pop.notice(
              "<i class='fa fa-times-circle'></i> &nbsp;" + Message,
              { type: "danger", position: "bottomright", appendType: "append" }
            );
          } else {
            swal("", Message, "error");
          }
        },
        error: function (data) {},
      });
    }
  });

  // ----------------------- Update user sub menu mode, set ALLOWED, NOT ALLOWED ---------------------------
  $(document).on("change", "#allowUserSubMenu", function () {
    var roleUserID = $(this).attr("data-src");
    var thisAllowSub = $(this).attr("data-id");
    if (this.checked) {
      var post = {
        action: "userSubMenuAllowed",
        thisAllowSub: thisAllowSub,
        roleUserID: roleUserID,
      };
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: post,
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            bs4pop.notice(
              "<i class='fa fa-check-circle'></i> &nbsp;" + Message,
              { type: "success", position: "bottomright", appendType: "append" }
            );
          } else {
            swal("", Message, "error");
          }
        },
        error: function (data) {},
      });
    } else {
      var post = {
        action: "userSubMenuNotAllowed",
        thisAllowSub: thisAllowSub,
        roleUserID: roleUserID,
      };
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: post,
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            bs4pop.notice(
              "<i class='fa fa-times-circle'></i> &nbsp;" + Message,
              { type: "danger", position: "bottomright", appendType: "append" }
            );
          } else {
            swal("", Message, "error");
          }
        },
        error: function (data) {},
      });
    }
  });

  // ----------------------- Update user Insert role privilege, set ALLOWED, NOT ALLOWED --------------
  $(document).on("change", "#insertRoleAllowed", function () {
    var roleUserID = $(this).attr("data-src");
    var userRoleID = $(this).attr("data-id");
    if (this.checked) {
      var post = {
        action: "userInsertAllowed",
        userRoleID: userRoleID,
        roleUserID: roleUserID,
      };
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: post,
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            bs4pop.notice(
              "<i class='fa fa-check-circle'></i> &nbsp;" + Message,
              { type: "success", position: "bottomright", appendType: "append" }
            );
          } else {
            swal("", Message, "error");
          }
        },
        error: function (data) {},
      });
    } else {
      var post = {
        action: "userInsertNotAllowed",
        userRoleID: userRoleID,
        roleUserID: roleUserID,
      };
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: post,
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            bs4pop.notice(
              "<i class='fa fa-times-circle'></i> &nbsp;" + Message,
              { type: "danger", position: "bottomright", appendType: "append" }
            );
          } else {
            swal("", Message, "error");
          }
        },
        error: function (data) {},
      });
    }
  });

  // ----------------------- Update user Update role privilege, set ALLOWED, NOT ALLOWED --------------
  $(document).on("change", "#updateRoleAllowed", function () {
    var roleUserID = $(this).attr("data-src");
    var userRoleID = $(this).attr("data-id");
    if (this.checked) {
      var post = {
        action: "userUpdateAllowed",
        userRoleID: userRoleID,
        roleUserID: roleUserID,
      };
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: post,
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            bs4pop.notice(
              "<i class='fa fa-check-circle'></i> &nbsp;" + Message,
              { type: "success", position: "bottomright", appendType: "append" }
            );
          } else {
            swal("", Message, "error");
          }
        },
        error: function (data) {},
      });
    } else {
      var post = {
        action: "userUpdateNotAllowed",
        userRoleID: userRoleID,
        roleUserID: roleUserID,
      };
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: post,
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            bs4pop.notice(
              "<i class='fa fa-times-circle'></i> &nbsp;" + Message,
              { type: "danger", position: "bottomright", appendType: "append" }
            );
          } else {
            swal("", Message, "error");
          }
        },
        error: function (data) {},
      });
    }
  });

  // ----------------------- Update user Delete role privilege, set ALLOWED, NOT ALLOWED --------------
  $(document).on("change", "#deleteRoleAllowed", function () {
    var roleUserID = $(this).attr("data-src");
    var userRoleID = $(this).attr("data-id");
    if (this.checked) {
      var post = {
        action: "userDeleteAllowed",
        userRoleID: userRoleID,
        roleUserID: roleUserID,
      };
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: post,
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            bs4pop.notice(
              "<i class='fa fa-check-circle'></i> &nbsp;" + Message,
              { type: "success", position: "bottomright", appendType: "append" }
            );
          } else {
            swal("", Message, "error");
          }
        },
        error: function (data) {},
      });
    } else {
      var post = {
        action: "userDeleteNotAllowed",
        userRoleID: userRoleID,
        roleUserID: roleUserID,
      };
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: post,
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            bs4pop.notice(
              "<i class='fa fa-times-circle'></i> &nbsp;" + Message,
              { type: "danger", position: "bottomright", appendType: "append" }
            );
          } else {
            swal("", Message, "error");
          }
        },
        error: function (data) {},
      });
    }
  });

  // =============================== End of User Privileges ======================================================

  // =============================== Start of Login Process ======================================================

  //Direct Login
  $("#loginForm").submit(function (e) {
    e.preventDefault();
    var user_name = $("#user_Name").val();
    var pass_word = $("#pass_Word").val();
    var post = {
      action: "login_process",
      user_name: user_name,
      pass_word: pass_word,
    };
    $.ajax({
      method: "POST",
      url: "api/main.php",
      data: post,
      dataType: "JSON",
      beforeSend: function () {
        $("#loginNow").prop("disabled", true);
        $("#loginNow").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#loginNow").prop("disabled", false);
        $("#loginNow").html("<i class='fa fa-sign-in fa-lg fa-fw'></i>SIGN IN");
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          if (Message === "enabled2StepVerifying") {
            location = "verification";
          } else {
            location = "dashboard";
          }
        } else {
          Message.forEach(function (error) {
            bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {
              type: "danger",
              position: "topright",
              appendType: "append",
            });
          });
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  //Login with Verification
  $("#verificationCodeForm").submit(function (e) {
    e.preventDefault();
    var verify_code = $("#txtVerificationCode").val();
    var post = {
      action: "login_with_2step_verification",
      verify_code: verify_code,
    };
    $.ajax({
      method: "POST",
      url: "api/main.php",
      data: post,
      dataType: "JSON",
      beforeSend: function () {
        $("#btnVerifyNow").prop("disabled", true);
        $("#btnVerifyNow").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnVerifyNow").prop("disabled", false);
        $("#btnVerifyNow").html(
          "<i class='fa fa-check-circle fa-lg fa-fw'></i>Verify"
        );
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          location = "dashboard";
        } else {
          Message.forEach(function (error) {
            bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {
              type: "danger",
              position: "topright",
              appendType: "append",
            });
          });
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  //Resend Verification Code
  $(document).on("click", "#btnResendVerificationCode", function (e) {
    e.preventDefault();
    var post = { action: "resend_verification_code" };
    $.ajax({
      method: "POST",
      url: "api/main.php",
      data: post,
      dataType: "JSON",
      beforeSend: function () {
        $("#btnResendVerificationCode").prop("disabled", true);
        $("#btnResendVerificationCode").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnResendVerificationCode").prop("disabled", false);
        $("#btnResendVerificationCode").html(
          "<i class='fa fa-send fa-lg fa-fw'></i>Re-send Code"
        );
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          //Make the verification code textbox focus
          $("#txtVerificationCode").val("M-");
          var input = $("#txtVerificationCode");
          var len = input.val().length;
          input[0].focus();
          input[0].setSelectionRange(len, len);
          bs4pop.notice("<i class='fa fa-check-circle'></i> &nbsp;" + Message, {
            type: "success",
            position: "topright",
            appendType: "append",
          });
        } else {
          Message.forEach(function (error) {
            bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {
              type: "danger",
              position: "topright",
              appendType: "append",
            });
          });
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  // ============================ End of Login Process ============================================================

  // ============================ Start of Employees Information Section ==========================================

  // ----------------------- Register Employee Modal ---------------------

  $("#registerEmployeeForm").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    var vl =
      $("#txtEmployeesEmployeeName").val() +
      "###" +
      $("#txtEmployeesBirthPlace").val() +
      "###" +
      $("#txtEmployeesBirthDate").val() +
      "###" +
      $("#cmbEmployeesEmployeeTitle").val() +
      "###" +
      $("#txtEmployeesEmployeeSalary").val() +
      "###" +
      $("#txtEmployeesEmployeeHireDate").val() +
      "###" +
      $("#cmbEmployeesEmployeeIdentiDocType").val() +
      "###" +
      $("#txtEmployeesEmployeeAddress").val() +
      "###" +
      $("#txtEmployeesEmployeeTelephoneNo").val() +
      "###" +
      $("#txtEmployeesEmployeeEmailAddress").val() +
      "###" +
      "1" +
      "###" +
      $("#txtEmployeeRegisteredBy").val() +
      "###" +
      $("#txtEmployeesEmployeeRegisterDate").val() +
      "###" +
      "-" +
      "###" +
      "-";
    var photoNames = $("#photoEmp1").val();
    var docNames = $("#docEmp1").val();
    var hasFile = "Yes";
    var files = "photoEmp1###docEmp1";
    var tn = "S2tLajZpRzNneVFwMVg2M0ladkxWUT09OjqvGV6loHhOl7kpdvi9HGFc";
    var commandType = "insert_command";
    var objName = "Employee";
    var objPre = "EM";
    formData.append("action", "ins_upd_del_everything");
    formData.append("vl", vl);
    formData.append("hasFile", hasFile);
    formData.append("files", files);
    formData.append("photoEmp1", $("#employeePhoto")[0].files[0]);
    formData.append(
      "docEmp1",
      $("#txtEmployeesEmployeeIdentificationDoc")[0].files[0]
    );
    formData.append("photoNames", photoNames);
    formData.append("docNames", docNames);
    formData.append("commandType", commandType);
    formData.append("tn", tn);
    formData.append("objName", objName);
    formData.append("objPre", objPre);
    $.ajax({
      url: "api/main.php",
      type: "POST",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        $("#btnRegisterEmployee").prop("disabled", true);
        $("#btnRegisterEmployee").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnRegisterEmployee").prop("disabled", false);
        $("#btnRegisterEmployee").html(
          "<i class='fa fa-lg fa-save'></i> Register Employee"
        );
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          swal(
            {
              title: "",
              text: Message,
              type: "success",
              showCancelButton: false,
              closeOnConfirm: false,
              closeOnCancel: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                location.reload();
              }
            }
          );
        } else {
          Message.forEach(function (error) {
            bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {
              type: "danger",
              position: "topright",
              appendType: "append",
            });
          });
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  // ----------------------- Filling Data into Employee Modal ---------------------
  $(document).on("click", ".btnUpdateEmployee", function (e) {
    e.preventDefault();
    var objectID = $(this).attr("data-id");
    var tn = "S2tLajZpRzNneVFwMVg2M0ladkxWUT09OjqvGV6loHhOl7kpdvi9HGFc";
    var cm = "dzlNVkQwTW1HTDRvakRkWUxNK0c2Zz09OjrE8fnc/RFCOfa/raoRPw2d";
    var post = {
      action: "fetch_parameterized_everything",
      dn: dn,
      tn: tn,
      cm: cm,
      objectID: objectID,
    };
    $(".modal-body").load(objectID);
    $.ajax({
      method: "POST",
      url: "api/main.php",
      data: post,
      dataType: "JSON",
      success: function (data) {
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          var returned_info = Message.split("###");
          $("#txtEmployeesEmployeeID").val(returned_info[1]);
          $("#txtEmployeesEmployeeNameUp").val(returned_info[2]);
          $("#txtEmployeesBirthPlaceUp").val(returned_info[3]);
          $("#txtEmployeesBirthDateUp").val(returned_info[4]);
          $("#cmbEmployeesEmployeeTitleUp")
            .select2()
            .val(returned_info[5])
            .trigger("change");
          $("#txtEmployeesEmployeeSalaryUp").val(returned_info[6]);
          $("#txtEmployeesEmployeeHireDateUp").val(returned_info[7]);
          $("#cmbEmployeesEmployeeIdentiDocTypeUp")
            .select2()
            .val(returned_info[8])
            .trigger("change");
          $("#txtEmployeesEmployeeAddressUp").val(returned_info[9]);
          $("#txtEmployeesEmployeeTelephoneNoUp").val(returned_info[10]);
          $("#txtEmployeesEmployeeEmailAddressUp").val(returned_info[11]);
          $("#employeeTargetUp").attr("src", returned_info[17]);
          $("#photoEmpUp1").val(returned_info[17]);
          $("#docEmpUp1").val(returned_info[18]);
          $("#cmbEmployeesEmployeeStatusUp")
            .select2()
            .val(returned_info[12])
            .trigger("change");
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  // ----------------------- Update Employee Modal ---------------------

  $("#updateEmployeeForm").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    var vl =
      $("#txtEmployeesEmployeeID").val() +
      "###" +
      $("#txtEmployeesEmployeeNameUp").val() +
      "###" +
      $("#txtEmployeesBirthPlaceUp").val() +
      "###" +
      $("#txtEmployeesBirthDateUp").val() +
      "###" +
      $("#cmbEmployeesEmployeeTitleUp").val() +
      "###" +
      $("#txtEmployeesEmployeeSalaryUp").val() +
      "###" +
      $("#txtEmployeesEmployeeHireDateUp").val() +
      "###" +
      $("#cmbEmployeesEmployeeIdentiDocTypeUp").val() +
      "###" +
      $("#txtEmployeesEmployeeAddressUp").val() +
      "###" +
      $("#txtEmployeesEmployeeTelephoneNoUp").val() +
      "###" +
      $("#txtEmployeesEmployeeEmailAddressUp").val() +
      "###" +
      $("#cmbEmployeesEmployeeStatusUp").val() +
      "###" +
      $("#txtEmployeeUpdatedBy").val() +
      "###" +
      $("#txtEmployeesEmployeeUpdateDate").val();
    var cm =
      "enc1L3hvK1RRZlJoWkZsb2xhditEUmZtdU9tTlRmUHA2SDQyTmdqTUJ2cEcrQXZUU1FHbVMrcUJNZW1QbFRFZTRPd1hoTGoxaWZqMFJmdFZJcElBK2RydkhXY3FKUEYvM2s4MjduM2YycTdDOEM3SmpXd3ZzUW5vM0dsbWdsWExPaFZlQ0crdEx5QUJiN2lsUlZTZnRZM2M1Q3QzdzliV3QxY2dyUzhVKys4ellER2U4UlRqc3BZaXJQUjlmOHRmckVhWkc4WGliTXUxdGt5aWFvZ1hLUGZRcmJ2eGp5L2xtclJiVm1RYzFZYU1PQkhlOFdNTEFTQ1M2YjFmMzFmUmRxU2o0WlBDU2Fmb1hiSysrZjk3amc9PTo6qO9bHifeuSnHHSNVy13//w==";
    var photoNames = $("#photoEmpUp1").val();
    var docNames = $("#docEmpUp1").val();
    var hasFile = "Yes";
    var files = "photoEmpUp1###docEmpUp1";
    var tn = "S2tLajZpRzNneVFwMVg2M0ladkxWUT09OjqvGV6loHhOl7kpdvi9HGFc";
    var commandType = "update_command";
    var objName = "Employee";
    formData.append("action", "ins_upd_del_everything");
    formData.append("vl", vl);
    formData.append("cm", cm);
    formData.append("hasFile", hasFile);
    formData.append("files", files);
    formData.append("photoEmpUp1", $("#employeePhotoUp")[0].files[0]);
    formData.append(
      "docEmpUp1",
      $("#txtEmployeesEmployeeIdentificationDocUp")[0].files[0]
    );
    formData.append("photoNames", photoNames);
    formData.append("docNames", docNames);
    formData.append("commandType", commandType);
    formData.append("tn", tn);
    formData.append("objName", objName);
    $.ajax({
      url: "api/main.php",
      type: "POST",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        $("#btnUpdateEmployee").prop("disabled", true);
        $("#btnUpdateEmployee").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnUpdateEmployee").prop("disabled", false);
        $("#btnUpdateEmployee").html(
          "<i class='fa fa-lg fa-pencil'></i> Update Employee"
        );
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          swal(
            {
              title: "",
              text: Message,
              type: "success",
              showCancelButton: false,
              closeOnConfirm: false,
              closeOnCancel: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                location.reload();
              }
            }
          );
        } else {
          Message.forEach(function (error) {
            bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {
              type: "danger",
              position: "topright",
              appendType: "append",
            });
          });
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  // ----------------------- Deleting Employee Information ---------------------
  $(document).on("click", ".btnDeleteEmployee", function (e) {
    e.preventDefault();
    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var cm = "dzlNVkQwTW1HTDRvakRkWUxNK0c2Zz09OjrE8fnc/RFCOfa/raoRPw2d";
    var tn = "S2tLajZpRzNneVFwMVg2M0ladkxWUT09OjqvGV6loHhOl7kpdvi9HGFc";
    var commandType = "delete_command";
    var objName = "Employee";
    var post = {
      action: "ins_upd_del_everything",
      vl: vl,
      cm: cm,
      tn: tn,
      commandType: commandType,
      objName: objName,
    };
    swal(
      {
        title: "Are you sure?",
        text: "You want to delete this employee?",
        type: "",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false,
      },
      function (isConfirm) {
        if (isConfirm) {
          $.ajax({
            method: "POST",
            url: "api/main.php",
            data: post,
            dataType: "JSON",
            success: function (data) {
              var Message = data.Message;
              var status = data.Status;
              if (status == true) {
                swal("", Message, "success");
                $("#" + deleteBtnID)
                  .parents("tr")
                  .remove();
              } else {
                swal("", Message, "error");
              }
            },
            error: function (data) {},
          });
        } else {
          swal("Cancelled", "Employee deletion has been cancelled", "error");
        }
      }
    );
  });

  // ============================ End of Employees Information Section ========================================

  // ============================ Start of Users Information Section ==========================================

  // ----------------------- Register User Modal ---------------------

  $("#registerUserForm").on("submit", function (e) {
    e.preventDefault();
    var vl =
      $("#userEmpID").val() +
      "###" +
      $("#userName").val() +
      "###" +
      $("#passWord").val() +
      "###" +
      $("#cmb2StepVerification").val() +
      "###" +
      "M-23CT6YH7" +
      "###" +
      "Offline" +
      "###" +
      $("#txtUserrIddd").val() +
      "###" +
      $("#registerDate").val() +
      "###" + "-" + "###" + "-";
	  alert($("#userEmpID").val());
    var hasFile = "No";
    var tn = "WkpyWFh0eVdDUXIrc0Q5VGo5dEpCdz09OjoFI4/87JExUB7/yGHukP2H";
    var commandType = "insert_command";
    var objName = "User";
    var objPre = "US";
    var post = {
      action: "ins_upd_del_everything",
      vl: vl,
      hasFile: hasFile,
      commandType: commandType,
      dn: dn,
      tn: tn,
      objName: objName,
      objPre: objPre,
    };
    $.ajax({
      url: "api/main.php",
      type: "POST",
      data: post,
      dataType: "JSON",
      beforeSend: function () {
        $("#regUser").prop("disabled", true);
        $("#regUser").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#regUser").prop("disabled", false);
        $("#regUser").html("<i class='fa fa-lg fa-save'></i> Register User");
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          swal(
            {
              title: "",
              text: Message,
              type: "success",
              showCancelButton: false,
              closeOnConfirm: false,
              closeOnCancel: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                location.reload();
              }
            }
          );
        } else {
          Message.forEach(function (error) {
            bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {
              type: "danger",
              position: "topright",
              appendType: "append",
            });
			console.log(Message);
          });
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
		console.log(e);
      },
    });
  });

  // ------------------- Filling Data into Users Modal -------------------------
  $(document).on("click", ".btnUpdateUser", function (e) {
    e.preventDefault();
    $("#userNameUp").prop("readonly", true);
    var objectID = $(this).attr("data-id");
    var tn = "MjVvcXl3dzZZRDJJVERFOGljaVJrZz09Ojpq46IOLDLvMVUQa+kjIZlF";
    var cm = "MU1jblB5aWpHbVZ1K21tdlQ2UitDZz09OjogoLpCwOglDjCVExm55koz";
    var post = {
      action: "fetch_parameterized_everything",
      dn: dn,
      tn: tn,
      cm: cm,
    };
    $(".modal-body").load(objectID);
    $.ajax({
      method: "POST",
      url: "api/main.php",
      data: post,
      dataType: "JSON",
      success: function (data) {
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          var returned_info = Message.split("###");
          $("#empUserIDUp").val(returned_info[1]);
          $("#userEmpIDUp").select2().val(returned_info[2]).trigger("change");
          $("#userNameUp").val(returned_info[3]);
          $("#passWordUp").val(returned_info[4]);
          $("#cmb2StepVerificationUp")
            .select2()
            .val(returned_info[5])
            .trigger("change");
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  // ----------------------- Update User Modal ---------------------

  $("#updateUserForm").on("submit", function (e) {
    e.preventDefault();
    var vl =
      $("#empUserIDUp").val() +
      "###" +
      $("#userEmpIDUp").val() +
      "###" +
      $("#passWordUp").val() +
      "###" +
      $("#cmb2StepVerificationUp").val() +
      "###" +
      $("#txtUserrIddd").val() +
      "###" +
      $("#updateDate").val();
    var cm =
      "T0RZQTUwNnVDQlMxZmUrbkpjdk1oeXp0V0RjTlNVZno3RUtiZXpkWmIxZDFUQ1pwRW9aaXA3MG9SYjdvQXQxeFQzek8wZkUzL3FjOGt1ODZ2YjIwcnJaM085R3k2Q0sxYVFlYytndUxFdHM9Ojo62F3i8VX8oxeXQTSV+N5V";
    var hasFile = "No";
    var tn = "WkpyWFh0eVdDUXIrc0Q5VGo5dEpCdz09OjoFI4/87JExUB7/yGHukP2H";
    var commandType = "update_command";
    var objName = "User";
    var post = {
      action: "ins_upd_del_everything",
      vl: vl,
      cm: cm,
      hasFile: hasFile,
      commandType: commandType,
      tn: tn,
      objName: objName,
    };
    $.ajax({
      url: "api/main.php",
      type: "POST",
      data: post,
      dataType: "JSON",
      beforeSend: function () {
        $("#updateUser").prop("disabled", true);
        $("#updateUser").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#updateUser").prop("disabled", false);
        $("#updateUser").html("<i class='fa fa-lg fa-pencil'></i> Update User");
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          swal(
            {
              title: "",
              text: Message,
              type: "success",
              showCancelButton: false,
              closeOnConfirm: false,
              closeOnCancel: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                location.reload();
              }
            }
          );
        } else {
          Message.forEach(function (error) {
            bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {
              type: "danger",
              position: "topright",
              appendType: "append",
            });
          });
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  // ------------------- Deleting User Information ---------------------
  $(document).on("click", ".btnDeleteUser", function (e) {
    e.preventDefault();
    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var cm = "MU1jblB5aWpHbVZ1K21tdlQ2UitDZz09OjogoLpCwOglDjCVExm55koz";
    var tn = "eHFyTzI2ckhvVFNOY0R1Z2E1WG5MZz09Ojq9pDH3ZhZhatKqmkea0O6t";
    var commandType = "delete_command";
    var objName = "User";
    var post = {
      action: "ins_upd_del_everything",
      vl: vl,
      cm: cm,
      tn: tn,
      commandType: commandType,
      objName: objName,
    };
    swal(
      {
        title: "Are you sure?",
        text: "You want to delete this user?",
        type: "",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false,
      },
      function (isConfirm) {
        if (isConfirm) {
          $.ajax({
            method: "POST",
            url: "api/main.php",
            data: post,
            dataType: "JSON",
            success: function (data) {
              var Message = data.Message;
              var status = data.Status;
              if (status == true) {
                swal("", Message, "success");
                $("#" + deleteBtnID)
                  .parents("tr")
                  .remove();
              } else {
                swal("", Message, "error");
              }
            },
            error: function (data) {},
          });
        } else {
          swal("Cancelled", "User deletion has been cancelled", "error");
        }
      }
    );
  });

  // ============================ End of Users Information Section ============================================

  // ============================ Start of Payment Gateways Management Section ================================

  //Change gateway name label description
  $(document).on("change", "#cmbGatewayType", function () {
    var selectedGatewayType = $(this).val();
    if (selectedGatewayType === "") {
      $("#gatewayNameLabel").html("<span>Gateway Name</span>");
      $("#txtGatewaysGatewayName").attr("placeholder", "Enter gateway name");
    } else if (selectedGatewayType === "1") {
      $("#gatewayNameLabel").html("<span>Bank Name</span>");
      $("#txtGatewaysGatewayName").attr("placeholder", "Enter bank name");
    } else if (selectedGatewayType === "2") {
      $("#gatewayNameLabel").html("<span>Company Name</span>");
      $("#txtGatewaysGatewayName").attr("placeholder", "Enter company name");
    } else if (selectedGatewayType === "3") {
      $("#gatewayNameLabel").html("<span>Description Name</span>");
      $("#txtGatewaysGatewayName").attr(
        "placeholder",
        "Enter description name"
      );
    }
  });

  // ----------------------- Register Bank / Company Modal ---------------------
  $("#registerPaymentGatewayForm").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    var vl =
      $("#cmbGatewayType").val() +
      "###" +
      $("#txtGatewaysGatewayName").val() +
      "###" +
      $("#txtUserrIddd").val() +
      "###" +
      $("#txtGatewayRegisterDate").val() +
      "###" +
      "-" +
      "###" +
      "-";
    var hasFile = "Yes";
    var files = "photoGateway";
    var tn =
      "NC9UOU0xS1NHS3dGRnJuVzNYZ0ZBNHZKRlQzZHFGLzBNYWh6Q09SLzZoaz06OgqBHhs6/wOOl2QB7FubsRg=";
    var commandType = "insert_command";
    var objName = "Payment gateway";
    var objPre = "GTW";
    formData.append("action", "ins_upd_del_everything");
    formData.append("vl", vl);
    formData.append("hasFile", hasFile);
    formData.append("files", files);
    formData.append("photoGateway", $("#gatewayPhoto")[0].files[0]);
    formData.append("commandType", commandType);
    formData.append("tn", tn);
    formData.append("objName", objName);
    formData.append("objPre", objPre);
    $.ajax({
      url: "api/main.php",
      type: "POST",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        $("#btnRegisterGateway").prop("disabled", true);
        $("#btnRegisterGateway").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnRegisterGateway").prop("disabled", false);
        $("#btnRegisterGateway").html(
          "<i class='fa fa-lg fa-save'></i> Register Gateway"
        );
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          swal(
            {
              title: "",
              text: Message,
              type: "success",
              showCancelButton: false,
              closeOnConfirm: false,
              closeOnCancel: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                location.reload();
              }
            }
          );
        } else {
          Message.forEach(function (error) {
            bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {
              type: "danger",
              position: "topright",
              appendType: "append",
            });
          });
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  // ----------------------- Filling Data into Update Gatway Modal ---------------------
  $(document).on("click", ".btnUpdateGateway", function (e) {
    e.preventDefault();
    var objectID = $(this).attr("data-id");
    var tn =
      "NC9UOU0xS1NHS3dGRnJuVzNYZ0ZBNHZKRlQzZHFGLzBNYWh6Q09SLzZoaz06OgqBHhs6/wOOl2QB7FubsRg=";
    var cm = "Q1VUc245YnBGNi90OGQ3bmVvR3UwUT09OjpcT1AjCFW7uITb/RY1qJOI";
    var post = {
      action: "fetch_parameterized_everything",
      dn: dn,
      tn: tn,
      cm: cm,
      objectID: objectID,
    };
    $(".modal-body").load(objectID);
    $.ajax({
      method: "POST",
      url: "api/main.php",
      data: post,
      dataType: "JSON",
      success: function (data) {
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          var returned_info = Message.split("###");
          $("#txtGatewayIdd").val(returned_info[1]);
          $("#cmbGatewayTypeUp")
            .select2()
            .val(returned_info[2])
            .trigger("change");
          if (returned_info[2] === "1") {
            $("#gatewayNameLabelUp").html("<span>Bank Name</span>");
            $("#txtGatewaysGatewayNameUp").attr(
              "placeholder",
              "Enter bank name"
            );
          } else if (returned_info[2] === "2") {
            $("#gatewayNameLabelUp").html("<span>Company Name</span>");
            $("#txtGatewaysGatewayNameUp").attr(
              "placeholder",
              "Enter company name"
            );
          } else if (returned_info[2] === "3") {
            $("#gatewayNameLabelUp").html("<span>Description Name</span>");
            $("#txtGatewaysGatewayNameUp").attr(
              "placeholder",
              "Enter description name"
            );
          }
          $("#txtGatewaysGatewayNameUp").val(returned_info[3]);
          $("#gatewayTargetUp").attr("src", returned_info[8]);
          $("#photoGatewayUpdate").val(returned_info[8]);
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  //Change gateway name label description in the update modal
  $(document).on("change", "#cmbGatewayTypeUp", function () {
    var selectedGatewayType = $(this).val();
    if (selectedGatewayType === "") {
      $("#gatewayNameLabelUp").html("<span>Gateway Name</span>");
      $("#txtGatewaysGatewayNameUp").attr("placeholder", "Enter gateway name");
    } else if (selectedGatewayType === "1") {
      $("#gatewayNameLabelUp").html("<span>Bank Name</span>");
      $("#txtGatewaysGatewayNameUp").attr("placeholder", "Enter bank name");
    } else if (selectedGatewayType === "2") {
      $("#gatewayNameLabelUp").html("<span>Company Name</span>");
      $("#txtGatewaysGatewayNameUp").attr("placeholder", "Enter company name");
    } else if (selectedGatewayType === "3") {
      $("#gatewayNameLabelUp").html("<span>Description Name</span>");
      $("#txtGatewaysGatewayNameUp").attr(
        "placeholder",
        "Enter description name"
      );
    }
  });

  // ----------------------- Update Payment Gateway Modal ---------------------
  $("#updatePaymentGatewayForm").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    var vl =
      $("#txtGatewayIdd").val() +
      "###" +
      $("#cmbGatewayTypeUp").val() +
      "###" +
      $("#txtGatewaysGatewayNameUp").val() +
      "###" +
      $("#txtUserrIddd").val() +
      "###" +
      $("#txtGatewayUpdateDate").val();
    var cm =
      "d0MzUnJiV1hIQWwzbnBXRHhucUxiNWpod0ROazlRN0RENXM0NXFudEdQM3pxaFprNkUwSnVTSDljTksya05pSTMrY1NyRWs2RFVBOEVoU0tySXZTNEVnWWppN0dNc08vd1FSRGJTOUVtSmM9OjrCbSWwOInsNFgJjRwX3+99";
    var photoNames = $("#photoGatewayUpdate").val();
    var docNames = ""; // Means no documents in this update
    var hasFile = "Yes";
    var files = "photoGatewayUpdate";
    var tn =
      "NC9UOU0xS1NHS3dGRnJuVzNYZ0ZBNHZKRlQzZHFGLzBNYWh6Q09SLzZoaz06OgqBHhs6/wOOl2QB7FubsRg=";
    var commandType = "update_command";
    var objName = "Payment gateway";
    formData.append("action", "ins_upd_del_everything");
    formData.append("vl", vl);
    formData.append("cm", cm);
    formData.append("hasFile", hasFile);
    formData.append("files", files);
    formData.append("photoGatewayUpdate", $("#gatewayPhotoUp")[0].files[0]);
    formData.append("photoNames", photoNames);
    formData.append("docNames", docNames);
    formData.append("commandType", commandType);
    formData.append("tn", tn);
    formData.append("objName", objName);

    $.ajax({
      url: "api/main.php",
      type: "POST",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        $("#btnUpdateGateway").prop("disabled", true);
        $("#btnUpdateGateway").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnUpdateGateway").prop("disabled", false);
        $("#btnUpdateGateway").html(
          "<i class='fa fa-lg fa-pencil'></i> Update Gateway"
        );
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          swal(
            {
              title: "",
              text: Message,
              type: "success",
              showCancelButton: false,
              closeOnConfirm: false,
              closeOnCancel: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                location.reload();
              }
            }
          );
        } else {
          Message.forEach(function (error) {
            bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {
              type: "danger",
              position: "topright",
              appendType: "append",
            });
          });
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  // ----------------------- Deleting Payment Gateway Data ---------------------
  $(document).on("click", ".btnDeleteGateway", function (e) {
    e.preventDefault();

    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var tn =
      "NC9UOU0xS1NHS3dGRnJuVzNYZ0ZBNHZKRlQzZHFGLzBNYWh6Q09SLzZoaz06OgqBHhs6/wOOl2QB7FubsRg=";
    var cm = "Q1VUc245YnBGNi90OGQ3bmVvR3UwUT09OjpcT1AjCFW7uITb/RY1qJOI";
    var commandType = "delete_command";
    var objName = "Payment gateway";

    var post = {
      action: "ins_upd_del_everything",
      vl: vl,
      tn: tn,
      cm: cm,
      commandType: commandType,
      objName: objName,
    };

    swal(
      {
        title: "Are your sure?",
        text: "You want to delete this payment gateway permenantly?",
        type: "",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false,
      },
      function (isConfirm) {
        if (isConfirm) {
          $.ajax({
            method: "POST",
            url: "api/main.php",
            data: post,
            dataType: "JSON",
            success: function (data) {
              var Message = data.Message;
              var status = data.Status;
              if (status == true) {
                swal("success", Message, "success");
                $("#" + deleteBtnID)
                  .parents("tr")
                  .remove();
              } else {
                swal("", Message, "error");
              }
            },
            error: function (data) {},
          });
        } else {
          swal(
            "Cancelled",
            "Payment gateway deletion has been cancelled",
            "error"
          );
        }
      }
    );
  });

  // ============================ End of Payment Gateways Management Section ==================================

  // ============================ Start of Bank Accounts Management Section ===================================

  // Account type change
  $("#cmbAccountNumbersAccountType").change(function () {
    var selectedAccountType = $(this).val();
    if (selectedAccountType == "") {
      $("#cmbAccountNumbersGatewayName").select2().val("").trigger("change");
      $("#bankAccountNameLabel").html("");
      $("#txtAccountNumbersAccountName").attr(
        "placeholder",
        "Enter account name"
      );
    } else {
      var post = {
        action: "fetch_gateway_name_data",
        selectedAccountType: selectedAccountType,
      };
      //Fetch the data of the selected employee using the above thisEmp variable
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: post,
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          var html = "";
          if (status == true) {
            if (selectedAccountType == "1") {
              $("#accountGatewayNameLabel").html("<span>Bank Name</span>");
              $("#bankAccountNameLabel").html("<span>Bank Account Name</span>");
              $("#txtAccountNumbersAccountName").attr(
                "placeholder",
                "Enter bank account name"
              );
              $("#bankAccountNumberLabel").html(
                "<span>Bank Account Number</span>"
              );
              $("#txtAccountNumbersAccountNumber").attr(
                "placeholder",
                "Enter bank account number"
              );

              html += `<option value="">-- Select bank name --</option>`;
              Message.forEach(function (fetched_gateway_result, i) {
                html += `<option value="${fetched_gateway_result["gatewayID"]}">${fetched_gateway_result["gatewayName"]}</option>`;
              });
            } else if (selectedAccountType == "2") {
              $("#accountGatewayNameLabel").html("<span>Company Name</span>");
              $("#bankAccountNameLabel").html("<span>Payment Type</span>");
              $("#txtAccountNumbersAccountName").attr(
                "placeholder",
                "Example: evc plus, e-dahab, merchant"
              );
              $("#bankAccountNumberLabel").html("<span>Payment Number</span>");
              $("#txtAccountNumbersAccountNumber").attr(
                "placeholder",
                "Enter mobile or merchant number"
              );

              html += `<option value="">-- Select company name --</option>`;
              Message.forEach(function (fetched_gateway_result, i) {
                html += `<option value="${fetched_gateway_result["gatewayID"]}">${fetched_gateway_result["gatewayName"]}</option>`;
              });
            } else if (selectedAccountType == "3") {
              $("#accountGatewayNameLabel").html("<span>Payment Type</span>");
              $("#txtAccountNumbersAccountName").val("Cash Account");
              $("#bankAccountNameLabel").html("<span>Cash Account Name</span>");
              $("#txtAccountNumbersAccountName").attr(
                "placeholder",
                "Ex: evc, e-bahab, merchant"
              );
              $("#bankAccountNumberLabel").html(
                "<span>Cash Account Number</span>"
              );
              $("#txtAccountNumbersAccountNumber").val("10000001");

              Message.forEach(function (fetched_gateway_result, i) {
                html += `<option value="${fetched_gateway_result["gatewayID"]}">${fetched_gateway_result["gatewayName"]}</option>`;
              });
            }

            $("#cmbAccountNumbersGatewayName").html(html);
          }
        },
        error: function (data) {},
      });
    }
  });

  $("#addNewkAccountNumberForm").on("submit", function (e) {
    e.preventDefault();

    var vl =
      $("#cmbAccountNumbersGatewayName").val() +
      "###" +
      $("#txtAccountNumbersAccountName").val() +
      "###" +
      $("#txtAccountNumbersAccountNumber").val() +
      "###" +
      $("#txtBankAccountNumberOpenningBalance").val() +
      "###" +
      $("#txtUserrIddd").val() +
      "###" +
      $("#txtBankAccountRegisterDate").val() +
      " 00:00:00" +
      "###" +
      "-" +
      "###" +
      "-";
    var hasFile = "No";
    var tn = "N1d0VzE5Z0h5RlBFWGQvREIreVJmQT09Ojq7/V46Voj6xnLwkjydURKc";
    var commandType = "insert_command";
    var objName = "Account number";
    var objPre = "ACC";
    var post = {
      action: "ins_upd_del_everything",
      vl: vl,
      hasFile: hasFile,
      commandType: commandType,
      tn: tn,
      objName: objName,
      objPre: objPre,
    };

    $.ajax({
      url: "api/main.php",
      type: "POST",
      data: post,
      dataType: "JSON",
      beforeSend: function () {
        $("#btnRegisterAccountNumber").prop("disabled", true);
        $("#btnRegisterAccountNumber").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnRegisterAccountNumber").prop("disabled", false);
        $("#btnRegisterAccountNumber").html(
          "<i class='fa fa-lg fa-save'></i> Register Account Number"
        );
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          swal(
            {
              title: "",
              text: Message,
              type: "success",
              showCancelButton: false,
              closeOnConfirm: false,
              closeOnCancel: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                location.reload();
              }
            }
          );
        } else {
          Message.forEach(function (error) {
            bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {
              type: "danger",
              position: "topright",
              appendType: "append",
            });
          });
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  // ----------------------- Deleting Account Number Data ---------------------------------
  $(document).on("click", ".btnDeleteAccountNumber", function (e) {
    e.preventDefault();

    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var tn = "N1d0VzE5Z0h5RlBFWGQvREIreVJmQT09Ojq7/V46Voj6xnLwkjydURKc";
    var cm = "dm5DQVlhK3hIZlR3QkhwRHdUNXZHUT09OjqsBH51E9zHsgRfEfMR1qk2";
    var commandType = "delete_command";
    var objName = "Account number";

    var post = {
      action: "ins_upd_del_everything",
      vl: vl,
      tn: tn,
      cm: cm,
      commandType: commandType,
      objName: objName,
    };

    swal(
      {
        title: "Are your sure?",
        text: "You want to delete this account number permenantly?",
        type: "",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false,
      },
      function (isConfirm) {
        if (isConfirm) {
          $.ajax({
            method: "POST",
            url: "api/main.php",
            data: post,
            dataType: "JSON",
            success: function (data) {
              var Message = data.Message;
              var status = data.Status;
              if (status == true) {
                swal("", Message, "success");
                $("#" + deleteBtnID)
                  .parents("tr")
                  .remove();
              } else {
                swal("", Message, "error");
              }
            },
            error: function (data) {},
          });
        } else {
          swal(
            "Cancelled",
            "Account number deletion has been cancelled",
            "error"
          );
        }
      }
    );
  });

  // ============================ End of Bank Account Number Management Section ===============================

  // ============================ Start of Account Transactions Section =======================================

  //Fill the account no, evc plus and so when deposited to is changed
  $(document).on("change", "#cmbAccountTransactionsAccountName", function () {
    var selectedAccountNo = $(this).val();

    if (selectedAccountNo === "") {
      $("#txtAccountTransactionsAccountNumber").val("");
    } else {
      var post = {
        action: "fetch_account_number",
        selectedAccountNo: selectedAccountNo,
      };
      //Fetch the data of the selected employee using the above thisEmp variable
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: post,
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            $("#txtAccountTransactionsAccountNumber").val(Message);
          }
        },
        error: function (data) {},
      });
    }
  });

  //Change transaction name label description
  $(document).on(
    "change",
    "#cmbAccountTransactionsTransactionType",
    function () {
      var selectedTransactionType = $(this).val();
      if (selectedTransactionType === "") {
        $("#transactedAmountFromAccount").html("");
        $("#transactedDateFromAccount").html("");
        $("#txtAccountTransactionsTransactionRemarks").attr(
          "placeholder",
          "Enter transaction remarks"
        );
        $("#btnRegisterAccountTransaction").html(
          "<i class='fa fa-fw fa-lg fa-save'></i>Register Transaction"
        );
      } else if (selectedTransactionType === "1") {
        $("#transactedAmountFromAccount").html(
          "<span>Deposit Amount ($)</span>"
        );
        $("#transactedDateFromAccount").html("<span>Deposit Date ($)</span>");
        $("#txtAccountTransactionsTransactionRemarks").attr(
          "placeholder",
          "Enter deposit remarks"
        );
        $("#btnRegisterAccountTransaction").html(
          "<i class='fa fa-fw fa-lg fa-save'></i>Register Deposit"
        );
      } else if (selectedTransactionType === "2") {
        $("#transactedAmountFromAccount").html(
          "<span>Withdrawal Amount ($)</span>"
        );
        $("#transactedDateFromAccount").html(
          "<span>Withdrawal Date ($)</span>"
        );
        $("#txtAccountTransactionsTransactionRemarks").attr(
          "placeholder",
          "Enter withdrawal remarks"
        );
        $("#btnRegisterAccountTransaction").html(
          "<i class='fa fa-fw fa-lg fa-save'></i>Register Withdrawal"
        );
      }
    }
  );

  $(document).on(
    "keyup",
    "#txtAccountTransactionsTransactedAmount",
    function () {
      if ($(this).val() === "") $("#txtAccountTransactionsAmountWords").val("");
      else {
        $("#txtAccountTransactionsAmountWords").val(
          moneyValueToWords($(this).val())
        );
      }
    }
  );

  // ------------------- Registering account transaction -------------------------

  $("#registerAccountTransactionForm").submit(function (e) {
    e.preventDefault();

    var withdrawal_amount = 0;
    var deposit_amount = 0;

    var transactionType = $("#cmbAccountTransactionsTransactionType").val();

    if (transactionType === "1") {
      deposit_amount = $("#txtAccountTransactionsTransactedAmount").val();
    } else if (transactionType === "2") {
      withdrawal_amount = $("#txtAccountTransactionsTransactedAmount").val();
    }

    var vl =
      $("#cmbAccountTransactionsAccountName").val() +
      "###" +
      withdrawal_amount +
      "###" +
      deposit_amount +
      "###" +
      "0" +
      "###" +
      $("#txtAccountTransactionsTransactionRemarks").val() +
      "###" +
      "1" +
      "###" +
      $("#txtUserrIddd").val() +
      "###" +
      $("#txtAccountTransactionsTransactionDate").val() +
      " 00:00:00" +
      "###" +
      "-" +
      "###" +
      "-";
    var hasFile = "No";
    var tn =
      "WnJFeVRwTkI4dVlUWVV0YVIyVTJoak9veUhSVFdiQWF0TVVKci9jMjlGMD06OpQJm7T8HV9EKo51U8Pa+KU=";
    var commandType = "insert_command";
    var objName = "Transaction";
    var objPre = "TR";
    var post = {
      action: "ins_upd_del_everything",
      vl: vl,
      hasFile: hasFile,
      commandType: commandType,
      tn: tn,
      objName: objName,
      objPre: objPre,
    };

    if (transactionType === "1") {
      $.ajax({
        url: "api/main.php",
        type: "POST",
        data: post,
        dataType: "JSON",
        beforeSend: function () {
          $("#btnRegisterAccountTransaction").prop("disabled", true);
          $("#btnRegisterAccountTransaction").html(
            "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
          );
        },
        success: function (data) {
          $("#btnRegisterAccountTransaction").prop("disabled", false);
          $("#btnRegisterAccountTransaction").html(
            "<i class='fa fa-lg fa-save'></i> Register Transaction"
          );
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            swal(
              {
                title: "",
                text: Message,
                type: "success",
                showCancelButton: false,
                closeOnConfirm: false,
                closeOnCancel: false,
              },
              function (isConfirm) {
                if (isConfirm) {
                  location.reload();
                }
              }
            );
          } else {
            Message.forEach(function (error) {
              bs4pop.notice(
                "<i class='fa fa-times-circle'></i> &nbsp;" + error,
                { type: "danger", position: "topright", appendType: "append" }
              );
            });
          }
        },
        error: function (e) {
          bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
            type: "danger",
            position: "topright",
            appendType: "append",
          });
        },
      });
    } else if (transactionType === "2") {
      //Check the account balance first
      var withdrawalAccount = $("#cmbAccountTransactionsAccountName").val();
      var currentWithdwaralAmount = Number(
        $("#txtAccountTransactionsTransactedAmount").val()
      );
      var check_acc_balance_post = {
        action: "check_account_balance",
        selectedAccountNo: withdrawalAccount,
      };
      $.ajax({
        url: "api/main.php",
        type: "POST",
        data: check_acc_balance_post,
        dataType: "JSON",
        beforeSend: function () {
          $("#btnRegisterAccountTransaction").prop("disabled", true);
          $("#btnRegisterAccountTransaction").html(
            "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
          );
        },
        success: function (rs) {
          var Account_Balance = rs.Message;
          var Acc_Bala_Status = rs.Status;

          if (Acc_Bala_Status == true) {
            if (Number(Account_Balance) >= currentWithdwaralAmount) {
              $.ajax({
                url: "api/main.php",
                type: "POST",
                data: post,
                dataType: "JSON",
                beforeSend: function () {
                  $("#btnRegisterAccountTransaction").prop("disabled", true);
                  $("#btnRegisterAccountTransaction").html(
                    "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
                  );
                },
                success: function (data) {
                  $("#btnRegisterAccountTransaction").prop("disabled", false);
                  $("#btnRegisterAccountTransaction").html(
                    "<i class='fa fa-lg fa-save'></i> Register Transaction"
                  );
                  var Message = data.Message;
                  var status = data.Status;
                  if (status == true) {
                    swal(
                      {
                        title: "",
                        text: Message,
                        type: "success",
                        showCancelButton: false,
                        closeOnConfirm: false,
                        closeOnCancel: false,
                      },
                      function (isConfirm) {
                        if (isConfirm) {
                          location.reload();
                        }
                      }
                    );
                  } else {
                    Message.forEach(function (error) {
                      bs4pop.notice(
                        "<i class='fa fa-times-circle'></i> &nbsp;" + error,
                        {
                          type: "danger",
                          position: "topright",
                          appendType: "append",
                        }
                      );
                    });
                  }
                },
                error: function (e) {
                  bs4pop.notice(
                    "<i class='fa fa-times-circle'></i> &nbsp;" + e,
                    {
                      type: "danger",
                      position: "topright",
                      appendType: "append",
                    }
                  );
                },
              });
            } else {
              $("#btnRegisterAccountTransaction").prop("disabled", false);
              $("#btnRegisterAccountTransaction").html(
                "<i class='fa fa-lg fa-save'></i> Register Transaction"
              );
              swal(
                {
                  title: "",
                  text: "Your account balance is not sufficient",
                  type: "error",
                  showCancelButton: false,
                  closeOnConfirm: true,
                  closeOnCancel: false,
                },
                function (isConfirm) {
                  if (isConfirm) {
                    /* location.reload(); */
                  }
                }
              );
            }
          }
        },
        error: function (e) {
          bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
            type: "danger",
            position: "topright",
            appendType: "append",
          });
        },
      });
    }
  });

  // ----------------------- Cancelling Account Transaction Data ---------------------
  $(document).on("click", ".btnCancelAccountTransaction", function (e) {
    e.preventDefault();

    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var tn =
      "WnJFeVRwTkI4dVlUWVV0YVIyVTJoak9veUhSVFdiQWF0TVVKci9jMjlGMD06OpQJm7T8HV9EKo51U8Pa+KU=";
    var cm =
      "U3c1SWo5ZHdmUlRoMDFaYkdrS1E1dkNhRmJqZFh2WWVWOG1GWmRNdEZEYjhUQ0NzSG5ZcEh1Y1hTeloxMlM4SXhobXloSmtpcEk4c1luVlV2THJzOVE9PTo6UPGcB/SA83Ltu8LqKXzs6Q==";
    var commandType = "update_command";
    var hasFile = "No";
    var objName = "Transaction";

    var post = {
      action: "ins_upd_del_everything",
      vl: vl,
      cm: cm,
      hasFile: hasFile,
      commandType: commandType,
      tn: tn,
      objName: objName,
    };

    swal(
      {
        title: "Are your sure?",
        text: "You want to cancel this transaction?",
        type: "",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false,
      },
      function (isConfirm) {
        if (isConfirm) {
          $.ajax({
            method: "POST",
            url: "api/main.php",
            data: post,
            dataType: "JSON",
            success: function (data) {
              var Message = data.Message;
              var status = data.Status;
              if (status == true) {
                swal(
                  "success",
                  "Transaction has been cancelled successfully",
                  "success"
                );
                $("#" + deleteBtnID)
                  .parents("tr")
                  .remove();
              } else {
                swal("", Message, "error");
              }
            },
            error: function (data) {},
          });
        } else {
          swal(
            "Cancelled",
            "Transaction cancelletion has been cancelled",
            "error"
          );
        }
      }
    );
  });

  // ------------------- Deleting Account Transaction ------------------------------
  $(document).on("click", ".btnDeleteTransaction", function (e) {
    e.preventDefault();
    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var cm = "TXNoOUczbVN5UWFCSXdrKzlGeCtDQT09OjrPk++Lfh1c+8G68zgCLxbi";
    var tn =
      "WnJFeVRwTkI4dVlUWVV0YVIyVTJoak9veUhSVFdiQWF0TVVKci9jMjlGMD06OpQJm7T8HV9EKo51U8Pa+KU=";
    var commandType = "delete_command";
    var objName = "Transaction";
    var post = {
      action: "ins_upd_del_everything",
      vl: vl,
      cm: cm,
      tn: tn,
      commandType: commandType,
      objName: objName,
    };
    swal(
      {
        title: "Are you sure?",
        text: "You want to delete this transaction permenently?",
        type: "",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false,
      },
      function (isConfirm) {
        if (isConfirm) {
          $.ajax({
            method: "POST",
            url: "api/main.php",
            data: post,
            dataType: "JSON",
            success: function (data) {
              var Message = data.Message;
              var status = data.Status;
              if (status == true) {
                swal("", Message, "success");
                $("#" + deleteBtnID)
                  .parents("tr")
                  .remove();
              } else {
                swal("", Message, "error");
              }
            },
            error: function (data) {},
          });
        } else {
          swal(
            "Deletion Cancelled",
            "Transaction deletion has been cancelled",
            "error"
          );
        }
      }
    );
  });

  // ============================ End of Account Transactions Section =========================================

  // ============================ Start of Salaries Section ===================================================

  // ------------------- Charging employee salaries -----------------

  $("#salaryChargeForm").submit(function (e) {
    e.preventDefault();
    var empNameSalaryCharge = $("#empNameChargeSalaries").val();
    var salMonthSalaryCharge = $("#salaryMonthChargeSalaries").val();
    var post = {
      action: "fetch_employee_charge_salary",
      salMonthSalChar: salMonthSalaryCharge,
    };
    $.ajax({
      type: "POST",
      url: "api/main.php",
      data: post,
      dataType: "text",
      beforeSend: function () {
        $("#btnChargeSalaries").prop("disabled", true);
        $("#btnChargeSalaries").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (response) {
        $("#btnChargeSalaries").prop("disabled", false);
        $("#btnChargeSalaries").html(
          "<i class='fa fa-lg fa-search'></i> Search"
        );
        $("#employeeChargeSalaries").html(response);
      },
    });
  });

  $(document).on("change", "#empChargeCheckAll", function () {
    if ($(this).is(":checked")) {
      var checkNoCheckBox = $("input:checkbox[id=empChargeCheck]").length;
      if (checkNoCheckBox <= 0) {
        //Dont show the Charge All Button if there are no checkboxes
      } else {
        $(".showHideChargeBtn").show();
        $(".allEmpCharge :checkbox").prop("checked", true);
        $("#chargeAllEmpSal").html('<i class="fa fa-send"></i> Charge All');
      }
    } else {
      $(".showHideChargeBtn").hide();
      $(".allEmpCharge :checkbox").prop("checked", false);
      $("#chargeAllEmpSal").html('<i class="fa fa-send"></i> Charge All');
    }
  });

  $(document).on("change", "#empChargeCheck", function () {
    var allEmpCheckBox = $("input:checkbox[id=empChargeCheck]").length;
    var checkAllEmpCheck = $("#empChargeCheck:checked").length;
    if (checkAllEmpCheck <= 0) {
      $("#empChargeCheckAll").prop("checked", false);
      $("#chargeAllEmpSal").html('<i class="fa fa-send"></i> Charge All');
      $(".showHideChargeBtn").hide();
    } else if (checkAllEmpCheck == allEmpCheckBox) {
      $(".showHideChargeBtn").show();
      $("#empChargeCheckAll").prop("checked", true);
      $("#chargeAllEmpSal").html('<i class="fa fa-send"></i> Charge All');
    } else {
      $(".showHideChargeBtn").show();
      $("#empChargeCheckAll").prop("checked", false);
      $("#chargeAllEmpSal").html('<i class="fa fa-send"></i> Charge Selected');
    }
  });

  $("#chargeAllEmpSal").on("click", function () {
    var selectedEmpToCharge = "";
    $("input[name='empChargeCheck']:checked").each(function () {
      selectedEmpToCharge += this.value + "###";
    });
    var embToBeCharged = selectedEmpToCharge.slice(0, -3);
    var salChargeMonth = $("#salaryMonthChargeSalaries").val();
    var post = {
      action: "charge_employee_salaries",
      embToBeCharged: embToBeCharged,
      salChargeMonth: salChargeMonth,
    };
    swal(
      {
        title: "Are you sure ?",
        text: "You want to charge the salaries of this month?",
        type: "",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false,
      },
      function (isConfirm) {
        if (isConfirm) {
          $.ajax({
            method: "POST",
            url: "api/main.php",
            data: post,
            dataType: "JSON",
            success: function (data) {
              var Message = data.Message;
              var status = data.Status;
              if (status == true) {
                swal(
                  {
                    title: "",
                    text: Message,
                    type: "success",
                    showCancelButton: false,
                    closeOnConfirm: false,
                    closeOnCancel: false,
                  },
                  function (isConfirm) {
                    if (isConfirm) {
                      location.reload();
                    }
                  }
                );
              } else {
                swal("", Message, "error");
              }
            },
            error: function (data) {},
          });
        } else {
          swal("Charge Cancelled", "Salary charge has been cancelled", "error");
        }
      }
    );
  });

  // ----------------------- Cancelling Employee Salary Charge ---------------------
  $(document).on("click", ".btnCancelSalaryCharge", function (e) {
    e.preventDefault();

    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var tn =
      "VUhJZEJ6ZGM3dXl4dXFlVEVXd0NnaSswUjR3TDRuemtnaGNiZXFRQ0hkWT06OvISCq1Q7Jcb0HhL5iYYqkY=";
    var cm =
      "WEtPWGVwZmZycHRQSHhBOG9IYXBpUkFOTWU4Sk9XWXhDbnU4YlNCcDQ3Y3M2Q1E5QkhpVnptWU1Xc2hDamV3TkV6WEVzT2lXM3RwRkdLS3k3UWFsRXc9PTo6VaJ1vwYdUq5UhGazKvpOFQ==";
    var commandType = "update_command";
    var hasFile = "No";
    var objName = "Salary charge";

    var post = {
      action: "ins_upd_del_everything",
      vl: vl,
      cm: cm,
      hasFile: hasFile,
      commandType: commandType,
      tn: tn,
      objName: objName,
    };

    swal(
      {
        title: "Are your sure?",
        text: "You want to cancel this salary charge?",
        type: "",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false,
      },
      function (isConfirm) {
        if (isConfirm) {
          $.ajax({
            method: "POST",
            url: "api/main.php",
            data: post,
            dataType: "JSON",
            success: function (data) {
              var Message = data.Message;
              var status = data.Status;
              if (status == true) {
                swal(
                  "success",
                  "Salary charge has been cancelled successfully",
                  "success"
                );
                $("#" + deleteBtnID)
                  .parents("tr")
                  .remove();
              } else {
                swal("", Message, "error");
              }
            },
            error: function (data) {},
          });
        } else {
          swal(
            "Cancelled",
            "Salary charge cancelletion has been cancelled",
            "error"
          );
        }
      }
    );
  });

  // ------------------- Deleting salary charge ---------------------
  $(document).on("click", ".chargeSalaryDeletion", function (e) {
    e.preventDefault();
    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var cm = "ZTQyTVN3aWh0N0VVU24xclZZZWxudz09OjoIbVBNkAC4Mejemg7HW8ZF";
    var tn =
      "dFExaFhZZzU1VGNqd1VDT3RnV0dBakdOWDVFenFOVjBmRENyL0RBZlY2ST06OsZd7og4xKUjJF57ODTdTOM=";
    var commandType = "delete_command";
    var objName = "Charge salary";
    var post = {
      action: "ins_upd_del_everything",
      vl: vl,
      cm: cm,
      tn: tn,
      commandType: commandType,
      objName: objName,
    };
    swal(
      {
        title: "Are you sure?",
        text: "You want to delete this salary charge?",
        type: "",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false,
      },
      function (isConfirm) {
        if (isConfirm) {
          $.ajax({
            method: "POST",
            url: "api/main.php",
            data: post,
            dataType: "JSON",
            success: function (data) {
              var Message = data.Message;
              var status = data.Status;
              if (status == true) {
                swal("", Message, "success");
                $("#" + deleteBtnID)
                  .parents("tr")
                  .remove();
              } else {
                swal("", Message, "error");
              }
            },
            error: function (data) {},
          });
        } else {
          swal(
            "Cancelled",
            "Salary charge deletion has been cancelled",
            "error"
          );
        }
      }
    );
  });

  // ========================== End of Charge Employee Salaries Section ========================

  // ========================== Start of Employee Salary Payments Section ======================

  // Employee name changed, if another employee is selected
  $("#cmbSalaryPaymentEmployeeName").change(function () {
    var selectedEmployeeID = $(this).val();
    if (selectedEmployeeID == "") {
      $("#txtSalaryPaymentEmployeeTitle").val("");
      $("#cmbSalaryPaymentSalaryMonth").select2().val("").trigger("change");
      $("#cmbEmployeeSalariesWithdrawalAccount")
        .select2()
        .val("")
        .trigger("change");
      $("#txtEmployeeSalariesAccountNumber").val("");
      $("#txtSalaryPaymentPaidAmount").val("");
      $("#txtSalaryPaymentAmountInWords").val("");
      $("#txtSalaryPaymentSalaryDescription").val("");
    } else {
      $("#cmbSalaryPaymentSalaryMonth").select2().val("").trigger("change");
      $("#cmbEmployeeSalariesWithdrawalAccount")
        .select2()
        .val("")
        .trigger("change");
      $("#txtEmployeeSalariesAccountNumber").val("");
      $("#txtSalaryPaymentPaidAmount").val("");
      $("#txtSalaryPaymentAmountInWords").val("");
      $("#txtSalaryPaymentSalaryDescription").val("");
      var post = { action: "fetch_employee_data", thisEmp: selectedEmployeeID };
      //Fetch the data of the selected employee using the above thisEmp variable
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: post,
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            var position_array = [
              "Super Admin",
              "Admin",
              "Finance",
              "Registrar",
            ];
            Message.forEach(function (item) {
              $("#txtSalaryPaymentEmployeeTitle").val(
                position_array[item["titlePosition"]]
              );
            });
          }
        },
        error: function (data) {},
      });
    }
  });

  // Salary month is changed, if another month is selected
  $("#cmbSalaryPaymentSalaryMonth").change(function () {
    var employeeIdddd = $("#cmbSalaryPaymentEmployeeName").val();
    var selectedSalaryMonth = $(this).val();
    if (selectedSalaryMonth == "" && employeeIdddd === "") {
      $("#txtSalaryPaymentChargedAmount").val("");
      $("#txtSalaryPaymentRemainingBalance").val("");
    } else {
      var post = {
        action: "fetch_employee_charged_remain",
        employeeIdddd: employeeIdddd,
        selectedSalaryMonth: selectedSalaryMonth,
      };
      //Fetch the data of the selected employee using the above thisEmp variable
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: post,
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            var returned_info = Message.split("###");
            $("#txtSalaryPaymentChargedAmount").val(returned_info[0]);
            $("#txtSalaryPaymentRemainingBalance").val(returned_info[1]);
            $("#txtSalaryPaymentPaidAmount").prop("max", returned_info[1]);
          }
        },
        error: function (data) {},
      });
    }
  });

  //Fill the account no, evc plus and so when withdarawn to is changed
  $(document).on(
    "change",
    "#cmbEmployeeSalariesWithdrawalAccount",
    function () {
      var selectedAccountNo = $(this).val();

      if (selectedAccountNo === "") {
        $("#txtEmployeeSalariesAccountNumber").val("");
      } else {
        var post = {
          action: "fetch_account_number",
          selectedAccountNo: selectedAccountNo,
        };
        //Fetch the data of the selected employee using the above thisEmp variable
        $.ajax({
          method: "POST",
          url: "api/main.php",
          data: post,
          dataType: "JSON",
          success: function (data) {
            var Message = data.Message;
            var status = data.Status;
            if (status == true) {
              $("#txtEmployeeSalariesAccountNumber").val(Message);
            }
          },
          error: function (data) {},
        });
      }
    }
  );

  $(document).on(
    "keyup keypress blur change focusout",
    "#txtSalaryPaymentPaidAmount",
    function () {
      if ($(this).val() == "") $("#txtSalaryPaymentAmountInWords").val("");
      else {
        $("#txtSalaryPaymentAmountInWords").val(
          moneyValueToWords($(this).val())
        );
      }
    }
  );

  //Pay Salary button click on employee-salary page
  $("#employeeSalaryPaymentForm").submit(function (e) {
    e.preventDefault();

    var employeeIdd = $("#cmbSalaryPaymentEmployeeName").val();
    var salaryMonth = $("#cmbSalaryPaymentSalaryMonth").val();
    var salaryWithdrawalAccount = $(
      "#cmbEmployeeSalariesWithdrawalAccount"
    ).val();
    var paidAmmount = $("#txtSalaryPaymentPaidAmount").val();
    var salDescription = $("#txtSalaryPaymentSalaryDescription").val();
    var salaryPaymentDate = $("#txtSalaryPaymentDate").val() + " 00:00:00";
    var post = {
      action: "pay_employee_salary",
      employeeIdd: employeeIdd,
      salaryMonth: salaryMonth,
      salaryWithdrawalAccount: salaryWithdrawalAccount,
      paidAmmount: paidAmmount,
      salDescription: salDescription,
      salaryPaymentDate: salaryPaymentDate,
    };

    swal(
      {
        title: "Are you sure",
        text:
          "You want to pay the salary of " +
          salaryMonth +
          " for this employee?",
        type: "",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false,
      },
      function (isConfirm) {
        if (isConfirm) {
          //Check the bank account balance first
          var currentPaidAmount = Number(
            $("#txtSalaryPaymentPaidAmount").val()
          );
          var check_acc_balance_post = {
            action: "check_account_balance",
            selectedAccountNo: salaryWithdrawalAccount,
          };

          $.ajax({
            url: "api/main.php",
            type: "POST",
            data: check_acc_balance_post,
            dataType: "JSON",
            beforeSend: function () {
              $("#btnPayEmployeeSalary").prop("disabled", true);
              $("#btnPayEmployeeSalary").html(
                "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
              );
            },
            success: function (rs) {
              var Account_Balance = rs.Message;
              var Acc_Bala_Status = rs.Status;

              if (Acc_Bala_Status == true) {
                if (Number(Account_Balance) >= currentPaidAmount) {
                  $.ajax({
                    method: "POST",
                    url: "api/main.php",
                    data: post,
                    dataType: "JSON",
                    success: function (data) {
                      var Message = data.Message;
                      var status = data.Status;
                      if (status == true) {
                        swal(
                          {
                            title: "Success",
                            text: Message,
                            type: "success",
                            showCancelButton: false,
                            closeOnConfirm: false,
                            closeOnCancel: false,
                          },
                          function (isConfirm) {
                            if (isConfirm) {
                              location.reload();
                            }
                          }
                        );
                      } else {
                        //swal("", Message, "error")
                        Message.forEach(function (error) {
                          bs4pop.notice(
                            "<i class='fa fa-times-circle'></i> &nbsp;" + error,
                            {
                              type: "danger",
                              position: "topright",
                              appendType: "append",
                            }
                          );
                        });
                      }
                    },
                    error: function (data) {},
                  });
                } else {
                  $("#btnPayEmployeeSalary").prop("disabled", false);
                  $("#btnPayEmployeeSalary").html(
                    "<i class='fa fa-lg fa-save'></i> Register Salary Payment"
                  );
                  swal(
                    {
                      title: "",
                      text:
                        "Your account balance is not sufficient, " +
                        Account_Balance,
                      type: "error",
                      showCancelButton: false,
                      closeOnConfirm: true,
                      closeOnCancel: false,
                    },
                    function (isConfirm) {
                      if (isConfirm) {
                        /* location.reload(); */
                      }
                    }
                  );
                }
              }
            },
            error: function (e) {
              bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
                type: "danger",
                position: "topright",
                appendType: "append",
              });
            },
          });
        } else {
          swal("Cancelled", "Salary payment has been cancelled", "error");
        }
      }
    );
  });

  // ----------------------- Cancelling Salary Payment ---------------------
  $(document).on("click", ".btnCancelSalaryPayment", function (e) {
    e.preventDefault();

    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var tn =
      "dFExaFhZZzU1VGNqd1VDT3RnV0dBakdOWDVFenFOVjBmRENyL0RBZlY2ST06OsZd7og4xKUjJF57ODTdTOM=";
    var cm =
      "b1pPUHQ3aG5LbjhoWUNQdjdPT0UrV1drU2JKZFdPaHZLYm8wcUNhTUtITUxONXdmNWJtdmh4cmVwSHJtOHM1cWxSaDVhQTJpc3JGN3V0TGxRZ1JsSVE9PTo6MGbm1C2SrXMsR4CbS/P4tw==";
    var commandType = "update_command";
    var hasFile = "No";
    var objName = "Salary payment";

    var post = {
      action: "ins_upd_del_everything",
      vl: vl,
      cm: cm,
      hasFile: hasFile,
      commandType: commandType,
      tn: tn,
      objName: objName,
    };

    swal(
      {
        title: "Are your sure?",
        text: "You want to cancel this salary payment?",
        type: "",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false,
      },
      function (isConfirm) {
        if (isConfirm) {
          $.ajax({
            method: "POST",
            url: "api/main.php",
            data: post,
            dataType: "JSON",
            success: function (data) {
              var Message = data.Message;
              var status = data.Status;
              if (status == true) {
                swal(
                  "success",
                  "Salary payment has been cancelled successfully",
                  "success"
                );
                $("#" + deleteBtnID)
                  .parents("tr")
                  .remove();
              } else {
                swal("", Message, "error");
              }
            },
            error: function (data) {},
          });
        } else {
          swal(
            "Cancelled",
            "Salary charge cancelletion has been cancelled",
            "error"
          );
        }
      }
    );
  });

  // ------------------- Deleting employee salary ---------------------
  $(document).on("click", ".salaryPaymentDeletion", function (e) {
    e.preventDefault();
    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var cm = "WHYyaUk2TG5XK3ZzUG5BNktueW56dz09OjqV8D0DDH87u9003f7nZy6A";
    var tn =
      "b0lqOGk0akZud1ZORzhvdGhkcktSWlBlK0N4OUVmdktxNHVITHlqSFF0UT06OiGIx+6zq6oQD6mpLibND2w=";
    var commandType = "delete_command";
    var objName = "Salary payment";
    var post = {
      action: "ins_upd_del_everything",
      vl: vl,
      cm: cm,
      tn: tn,
      commandType: commandType,
      objName: objName,
    };

    swal(
      {
        title: "Are you sure?",
        text: "You want to delete this salary payment?",
        type: "",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false,
      },
      function (isConfirm) {
        if (isConfirm) {
          $.ajax({
            method: "POST",
            url: "api/main.php",
            data: post,
            dataType: "JSON",
            success: function (data) {
              var Message = data.Message;
              var status = data.Status;
              if (status == true) {
                swal("", Message, "success");
                $("#" + deleteBtnID)
                  .parents("tr")
                  .remove();
              } else {
                swal("", Message, "error");
              }
            },
            error: function (data) {},
          });
        } else {
          swal(
            "Deletion Cancelled",
            "Salary payment deletion has been cancelled",
            "error"
          );
        }
      }
    );
  });

  // ========================== End of Employee Salary Payments Section ========================

  // ========================== Start of Expenses Section ======================================

  $(document).on("keyup", "#txtExpenseAmount", function () {
    if ($(this).val() == "") $("#txtExpenseAmountWords").val("");
    else {
      $("#txtExpenseAmountWords").val(moneyValueToWords($(this).val()));
    }
  });

  //Fill the account no, evc plus and so when withdarawn to is changed
  $(document).on("change", "#cmbExpensesWithdrawalAccount", function () {
    var selectedAccountNo = $(this).val();

    if (selectedAccountNo === "") {
      $("#txtExpensesWithdrawnFromAccountNumber").val("");
    } else {
      var post = {
        action: "fetch_account_number",
        selectedAccountNo: selectedAccountNo,
      };
      //Fetch the data of the selected employee using the above thisEmp variable
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: post,
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            $("#txtExpensesWithdrawnFromAccountNumber").val(Message);
          }
        },
        error: function (data) {},
      });
    }
  });

  // ------------------- Registering expense -------------------------

  $("#registerExpenseForm").submit(function (e) {
    e.preventDefault();

    var vl =
      $("#txtExpenseDesc").val() +
      "###" +
      $("#txtExpenseAmount").val() +
      "###" +
      $("#cmbExpensesWithdrawalAccount").val() +
      "###" +
      $("#txtExpensePaymentRemarks").val() +
      "###" +
      "1" +
      "###" +
      $("#txtUserrIddd").val() +
      "###" +
      $("#txtExpenseRegisterDate").val() +
      " 00:00:00" +
      "###" +
      "-" +
      "###" +
      "-" +
      "###" +
      "-" +
      "###" +
      "-";
    var hasFile = "No";
    var tn = "bGZNVFlEZGlmYURwVFhyeTMwVWcvZz09OjpLMiEsbO05D8slVm7o+xnR";
    var commandType = "insert_command";
    var objName = "Expense";
    var objPre = "EXP";
    var post = {
      action: "ins_upd_del_everything",
      vl: vl,
      hasFile: hasFile,
      commandType: commandType,
      tn: tn,
      objName: objName,
      objPre: objPre,
    };

    //Check the bank account balance first
    var expenseWithdrawalAccount = $("#cmbExpensesWithdrawalAccount").val();
    var currentExpenseAmount = Number($("#txtExpenseAmount").val());
    var check_acc_balance_post = {
      action: "check_account_balance",
      selectedAccountNo: expenseWithdrawalAccount,
    };

    $.ajax({
      url: "api/main.php",
      type: "POST",
      data: check_acc_balance_post,
      dataType: "JSON",
      beforeSend: function () {
        $("#btnRegisterExpense").prop("disabled", true);
        $("#btnRegisterExpense").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (rs) {
        var Account_Balance = rs.Message;
        var Acc_Bala_Status = rs.Status;

        if (Acc_Bala_Status == true) {
          if (Number(Account_Balance) >= currentExpenseAmount) {
            $.ajax({
              url: "api/main.php",
              type: "POST",
              data: post,
              dataType: "JSON",
              beforeSend: function () {
                $("#btnRegisterExpense").prop("disabled", true);
                $("#btnRegisterExpense").html(
                  "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
                );
              },
              success: function (data) {
                $("#btnRegisterExpense").prop("disabled", false);
                $("#btnRegisterExpense").html(
                  "<i class='fa fa-lg fa-save'></i> Register Expense"
                );
                var Message = data.Message;
                var status = data.Status;
                if (status == true) {
                  swal(
                    {
                      title: "",
                      text: Message,
                      type: "success",
                      showCancelButton: false,
                      closeOnConfirm: false,
                      closeOnCancel: false,
                    },
                    function (isConfirm) {
                      if (isConfirm) {
                        location.reload();
                      }
                    }
                  );
                } else {
                  Message.forEach(function (error) {
                    bs4pop.notice(
                      "<i class='fa fa-times-circle'></i> &nbsp;" + error,
                      {
                        type: "danger",
                        position: "topright",
                        appendType: "append",
                      }
                    );
                  });
                }
              },
              error: function (e) {
                bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
                  type: "danger",
                  position: "topright",
                  appendType: "append",
                });
              },
            });
          } else {
            $("#btnRegisterExpense").prop("disabled", false);
            $("#btnRegisterExpense").html(
              "<i class='fa fa-lg fa-save'></i> Register Expense"
            );
            swal(
              {
                title: "",
                text: "Your account balance is not sufficient",
                type: "error",
                showCancelButton: false,
                closeOnConfirm: true,
                closeOnCancel: false,
              },
              function (isConfirm) {
                if (isConfirm) {
                  /* location.reload(); */
                }
              }
            );
          }
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  $(document).on("keyup", "#txtExpenseAmountUp", function () {
    if ($(this).val() == "") $("#txtExpenseAmountWordsUp").val("");
    else {
      $("#txtExpenseAmountWordsUp").val(moneyValueToWords($(this).val()));
    }
  });

  // ----------------------- Cancelling Expense Data ---------------------
  $(document).on("click", ".btnCancelExpense", function (e) {
    e.preventDefault();

    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var tn = "cGRVZzhXbjlKMCsrbnRMWHJwaDJyUT09OjqnVAfRTer/TWiak6mWwqP5";
    var cm =
      "RW8yOGx5L1lZS3c2enpLWGtOSEdIMVRSVVhTNHp1aDRocEhYc0dCSzdmdjlnU0NxVUt0bjdacVI3OWJXMTB6OElGVXdRcS9oTmp1dDZqdGdPYkpzZWc9PTo6DkGqfahHiBrPHRVtImyKaA==";
    var commandType = "update_command";
    var hasFile = "No";
    var objName = "Expense";

    var post = {
      action: "ins_upd_del_everything",
      vl: vl,
      cm: cm,
      hasFile: hasFile,
      commandType: commandType,
      tn: tn,
      objName: objName,
    };

    swal(
      {
        title: "Are your sure?",
        text: "You want to cancel this expense?",
        type: "",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false,
      },
      function (isConfirm) {
        if (isConfirm) {
          $.ajax({
            method: "POST",
            url: "api/main.php",
            data: post,
            dataType: "JSON",
            success: function (data) {
              var Message = data.Message;
              var status = data.Status;
              if (status == true) {
                swal(
                  "success",
                  "Expense has been cancelled successfully",
                  "success"
                );
                $("#" + deleteBtnID)
                  .parents("tr")
                  .remove();
              } else {
                swal("", Message, "error");
              }
            },
            error: function (data) {},
          });
        } else {
          swal("Cancelled", "Expense cancelletion has been cancelled", "error");
        }
      }
    );
  });

  // ------------------- Deleting expenses ------------------------------
  $(document).on("click", ".btnDeleteExpense", function (e) {
    e.preventDefault();
    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var cm = "MXo0VE9zQ053VEttWWU0QnZBQ08yUT09Ojp2/6XWpnzKUQYVfd40FI0b";
    var tn = "b3dZaGVJbGs0Q3YyTWw5QlVYOFZyUT09OjoNdkMiRuKtwi3kHprhHEnR";
    var commandType = "delete_command";
    var objName = "Expense";
    var post = {
      action: "ins_upd_del_everything",
      vl: vl,
      cm: cm,
      tn: tn,
      commandType: commandType,
      objName: objName,
    };
    swal(
      {
        title: "Are you sure?",
        text: "You want to delete this expense permenently?",
        type: "",
        showCancelButton: true,
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false,
      },
      function (isConfirm) {
        if (isConfirm) {
          $.ajax({
            method: "POST",
            url: "api/main.php",
            data: post,
            dataType: "JSON",
            success: function (data) {
              var Message = data.Message;
              var status = data.Status;
              if (status == true) {
                swal("", Message, "success");
                $("#" + deleteBtnID)
                  .parents("tr")
                  .remove();
              } else {
                swal("", Message, "error");
              }
            },
            error: function (data) {},
          });
        } else {
          swal(
            "Deletion Cancelled",
            "Expense deletion has been cancelled",
            "error"
          );
        }
      }
    );
  });

  // ========================== End of Expenses Section ======================================

  // ========================== Start of Change Password =====================================

  // ----------------------- Compare password mactch in confirm password ----------------
  $(document).on("focusout", "#confirmPassChange", function () {
    var pass = $("#pass1Change").val();
    if ($(this).val() != pass) {
      bs4pop.notice(
        "<i class='fa fa-exclamation-triangle text-danger'></i> &nbsp; Password and confirm password must match each other, please check!",
        { type: "warning", position: "topright", appendType: "append" }
      );
      $("#btnChangePassword").prop("disabled", true);
    } else {
      $("#btnChangePassword").prop("disabled", false);
    }
  });
  $(document).on("keyup", "#confirmPassChange", function () {
    var pass = $("#pass1Change").val();
    if ($(this).val() == pass) {
      $("#btnChangePassword").prop("disabled", false);
    } else {
      $("#btnChangePassword").prop("disabled", true);
    }
  });

  $("#changePasswordForm").submit(function (e) {
    e.preventDefault();
    var oldPassChange = $("#oldPasswordChange").val();
    var newPassChange = $("#pass1Change").val();
    var confPassChange = $("#confirmPassChange").val();

    $.ajax({
      method: "POST",
      url: "api/main.php",
      beforeSend: function () {
        $("#btnChangePassword").prop("disabled", true);
        $("#btnChangePassword").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      data: {
        action: "changePassword",
        oldPassChange: oldPassChange,
        newPassChange: newPassChange,
        confPassChange: confPassChange,
      },
      dataType: "JSON",
      success: function (data) {
        $("#btnChangePassword").prop("disabled", false);
        $("#btnChangePassword").html(
          "<i class='fa fa-fw fa-lg fa-key'></i>Change Password"
        );
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          swal(
            {
              title: "Success",
              text: Message,
              type: "success",
              showCancelButton: false,
              closeOnConfirm: false,
              closeOnCancel: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                location.reload();
              }
            }
          );
        } else {
          swal("", Message, "error");
        }
      },
      error: function (data) {},
    });
  });

  // ========================== End of Change Password ================================================

  // ========================== Fetch 2-Step Verification Status ======================================

  $(document).on("click", "#securitySubMenu, #securityMenu", function (e) {
    e.preventDefault();

    var objectID = $(this).attr("data-id");
    var tn = "MXYyWUNGNmtMcHdXcnVKODZ5RW14dz09OjqZwDjU4mFxH3T5N9WM3+9L";
    var cm = "YzhxdFhuWlJFQnJGQy9wU3FqSTR6UT09OjpDkHi5cvvKt7XcWWq7FYt/";

    var post = {
      action: "fetch_parameterized_everything",
      dn: dn,
      tn: tn,
      cm: cm,
      objectID: objectID,
    };

    $(".modal-body").load(objectID);

    $.ajax({
      method: "POST",
      url: "api/main.php",
      data: post,
      dataType: "JSON",
      success: function (data) {
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
          var returned_info = Message.split("###");

          var verification_status = returned_info[5];
          if (verification_status === "Enabled") {
            $("#twoStepVerificationToggle").prop("checked", true);
          } else {
            $("#twoStepVerificationToggle").prop("checked", false);
          }
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  // ========================== End of Fetch 2-Step Verification Status ======================

  // ========================== Start of Enable 2-Step Verification ==========================

  $(document).on("change", "#twoStepVerificationToggle", function (e) {
    e.preventDefault();

    var post = { action: "enable_disable_2step_verification" };

    $.ajax({
      method: "POST",
      url: "api/main.php",
      data: post,
      dataType: "JSON",
      success: function (data) {
        var Message = data.Message;
        var status = data.Status;
        if (status == true) {
        } else {
          Message.forEach(function (error) {
            bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {
              type: "danger",
              position: "topright",
              appendType: "append",
            });
          });
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });

  // ========================== End of Enable 2-Step Verification ============================

  // ========================== Start of Update Profile ======================================

  //Clicking of update user button in the update user model
  $("#updateUserProfileForm").on("submit", function (evt) {
    evt.preventDefault();

    var formData = new FormData(this);
    formData.append("action", "updateUserProfile");

    $.ajax({
      url: "api/main.php",
      type: "POST",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        $("#updateProfileBtn").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
        $("#updateProfileBtn").attr("readonly", true);
      },
      success: function (data) {
        $("#updateProfileBtn").html(
          "<i class='fa fa-fw fa-lg fa-pencil'></i> Update Profile"
        );
        $("#updateProfileBtn").attr("readonly", false);
        var sts = data.Status;
        var msg = data.Message;

        if (sts == true) {
          swal(
            {
              title: "",
              text: "Astaanta waa la update gareeyay",
              type: "success",
              showCancelButton: false,
              closeOnConfirm: false,
              closeOnCancel: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                location.reload();
              }
            }
          );
        } else {
          bs4pop.notice(
            "<i class='fa fa-times-circle text-danger'></i> &nbsp; " + msg,
            { type: "warning", position: "topright", appendType: "append" }
          );
        }
      },
      error: function (e) {
        alert(e);
      },
    });
  });

  // ========================== End of Update Profile ========================================

  // ========================== Start of System Reports ======================================

  // ------------------ Employees Report Section ---------------------------------

  $("#customEmployeesReportDate").prop("checked", true);
  $("#employeesReportStartFrom").prop("readonly", true);
  $("#employeesReportEndTo").prop("readonly", true);

  $("#customEmployeesReportDate").on("change", function () {
    if ($(this).is(":checked")) {
      $("#employeesReportStartFrom").prop("readonly", true);
      $("#employeesReportStartFrom").val("");
      $("#employeesReportEndTo").prop("readonly", true);
      $("#employeesReportEndTo").val("");
      $("#empNameEmployeesReport").prop("disabled", false);
    } else {
      $("#employeesReportStartFrom").prop("readonly", false);
      $("#employeesReportEndTo").prop("readonly", false);
      $("#empNameEmployeesReport").prop("disabled", true);
    }
  });

  $("#empNameEmployeesReport").on("change", function () {
    if ($(this).val() != "") {
      $("#employeesReportStartFrom").prop("readonly", true);
      $("#employeesReportStartFrom").val("");
      $("#employeesReportEndTo").prop("readonly", true);
      $("#employeesReportEndTo").val("");
    } else {
      // Do nothing
    }
  });

  $("#employeesReportForm").on("submit", function (e) {
    e.preventDefault();
    var emplInfoEmpReport = $("#empNameEmployeesReport").val();
    var strDateEmpReport = $("#employeesReportStartFrom").val();
    var endTooEmpReport = $("#employeesReportEndTo").val();

    $.ajax({
      type: "POST",
      url: "api/main.php",
      data: {
        action: "employeesReport",
        emplInfoEmpReport: emplInfoEmpReport,
        strDateEmpReport: strDateEmpReport,
        endTooEmpReport: endTooEmpReport,
      },
      dataType: "text",
      beforeSend: function () {
        $("#btnEmployeesReport").prop("disabled", true);
        $("#btnEmployeesReport").html(
          "<i class='fa fa-spinner fa-pulse' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
      },
      success: function (response) {
        $("#btnEmployeesReport").prop("disabled", false);
        $("#btnEmployeesReport").html(
          "<i class='fa fa-search' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
        $("#empReportSection").html(response);
      },
    });
  });

  $(document).on("click", "#printEmployeesReport", function () {
    //Display and open the print dialog box to print the report
    var empReportRestorePage = document.body.innerHTML;
    var empReportPrintArea = document.getElementById(
      "employeesReportPrintArea"
    ).innerHTML;
    document.body.innerHTML = empReportPrintArea;
    window.print();
    document.body.innerHTML = empReportRestorePage;
  });

  // ------------- Print Bank Account Balances --------------------
  $(document).on("click", "#printBankAccountBalances", function () {
    //Display and open the print dialog box to print the report
    var bankAccountBalancesRestorePage = document.body.innerHTML;
    var bankAccountBalancesPrintArea = document.getElementById(
      "bankAccountBalancesPrintArea"
    ).innerHTML;
    document.body.innerHTML = bankAccountBalancesPrintArea;
    window.print();
    document.body.innerHTML = bankAccountBalancesRestorePage;
  });

  // ------------------ Account Statement Section ---------------------------------

  function today() {
    let d = new Date();
    let currDate = d.getDate();
    let currMonth = d.getMonth() + 1;
    let currYear = d.getFullYear();
    return (
      currYear +
      "-" +
      (currMonth < 10 ? "0" + currMonth : currMonth) +
      "-" +
      (currDate < 10 ? "0" + currDate : currDate)
    );
  }

  $("#customDateAccountNumberStatement").prop("checked", true);
  $("#startFromAccountStatement").prop("readonly", true);
  $("#endTooAccountNo").prop("readonly", true);

  $("#customDateAccountNumberStatement").on("change", function () {
    if ($(this).is(":checked")) {
      $("#startFromAccountStatement").prop("readonly", true);
      $("#startFromAccountStatement").val("");
      $("#endTooAccountNo").prop("readonly", true);
      $("#endTooAccountNo").val("");
    } else {
      $("#startFromAccountStatement").prop("readonly", false);
      $("#endTooAccountNo").prop("readonly", false);
    }
  });

  $("#cmbAccountStatementTransacionType").on("change", function () {
    if ($(this).val() === "") {
      $("#customDateAccountNumberStatement").prop("disabled", false);
    } else {
      $("#customDateAccountNumberStatement").prop("disabled", true);
      $("#customDateAccountNumberStatement").prop("checked", true);
      $("#startFromAccountStatement").prop("readonly", false);
      $("#startFromAccountStatement").val(today());
      $("#endTooAccountNo").prop("readonly", false);
      $("#endTooAccountNo").val(today());
    }
  });

  $("#accountNumberStatementReportForm").on("submit", function (e) {
    e.preventDefault();
    var accountNumberID = $("#cmbAccountStatementAccountName").val();
    var transactionTypeID = $("#cmbAccountStatementTransacionType").val();
    var strDateAccountNo = $("#startFromAccountStatement").val();
    var endTooAccountNo = $("#endTooAccountNo").val();

    //alert("Customer: " + emplInfo + " -- " + "Room: " + monthInfo + " -- " + "Start Date: " + strDate + " -- " + "End Date: " + endToo + " -- ");

    $.ajax({
      type: "POST",
      url: "api/main.php",
      data: {
        action: "account_number_statements_report",
        accountNumberID: accountNumberID,
        transactionTypeID: transactionTypeID,
        strDateAccountNo: strDateAccountNo,
        endTooAccountNo: endTooAccountNo,
      },
      dataType: "text",
      beforeSend: function () {
        $("#btnAccountNoStatement").prop("disabled", true);
        $("#btnAccountNoStatement").html(
          "<i class='fa fa-spinner fa-pulse' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
      },
      success: function (response) {
        $("#btnAccountNoStatement").prop("disabled", false);
        $("#btnAccountNoStatement").html(
          "<i class='fa fa-search' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
        $("#accountNumberStatementSection").html(response);
      },
    });
  });

  $(document).on("click", "#printAccountNumberStatement", function () {
    //Display and open the print dialog box to print the report
    var accountNumberStatementRestorePage = document.body.innerHTML;
    var accountNumberStatementPrintArea = document.getElementById(
      "accountNumberStatementPrintArea"
    ).innerHTML;
    document.body.innerHTML = accountNumberStatementPrintArea;
    window.print();
    document.body.innerHTML = accountNumberStatementRestorePage;
  });

  // ------------------ Charged Salaries Report Section ---------------------------------

  $("#customDateChargeSalariesReport").prop("checked", true);
  $("#startFromChargeSalariesReport").prop("readonly", true);
  $("#endToChargeSalariesReport").prop("readonly", true);

  $("#customDateChargeSalariesReport").on("change", function () {
    if ($(this).is(":checked")) {
      $("#startFromChargeSalariesReport").prop("readonly", true);
      $("#startFromChargeSalariesReport").val("");
      $("#endToChargeSalariesReport").prop("readonly", true);
      $("#endToChargeSalariesReport").val("");
    } else {
      $("#startFromChargeSalariesReport").prop("readonly", false);
      $("#endToChargeSalariesReport").prop("readonly", false);
    }
  });

  $("#chargedSalariesReportForm").on("submit", function (e) {
    e.preventDefault();
    var emplInfoChargeSalRep = $("#empNameChargeSalariesReport").val();
    var monthInfoChargeSalRep = $("#salaryMonthChargeSalariesReport").val();
    var strDateChargeSalRep = $("#startFromChargeSalariesReport").val();
    var endTooChargeSalRep = $("#endToChargeSalariesReport").val();

    //alert("Customer: " + emplInfo + " -- " + "Room: " + monthInfo + " -- " + "Start Date: " + strDate + " -- " + "End Date: " + endToo + " -- ");

    $.ajax({
      type: "POST",
      url: "api/main.php",
      data: {
        action: "charged_salaries_report",
        emplInfoChargeSalRep: emplInfoChargeSalRep,
        monthInfoChargeSalRep: monthInfoChargeSalRep,
        strDateChargeSalRep: strDateChargeSalRep,
        endTooChargeSalRep: endTooChargeSalRep,
      },
      dataType: "text",
      beforeSend: function () {
        $("#btnChargeSalariesReport").prop("disabled", true);
        $("#btnChargeSalariesReport").html(
          "<i class='fa fa-spinner fa-pulse' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
      },
      success: function (response) {
        $("#btnChargeSalariesReport").prop("disabled", false);
        $("#btnChargeSalariesReport").html(
          "<i class='fa fa-search' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
        $("#chargeSalariesReportSection").html(response);
      },
    });
  });

  $(document).on("click", "#printChargeSalariesReport", function () {
    //Display and open the print dialog box to print the report
    var chargeSalReportRestorePage = document.body.innerHTML;
    var chargeSalReportPrintArea = document.getElementById(
      "chargeSalariesPrintArea"
    ).innerHTML;
    document.body.innerHTML = chargeSalReportPrintArea;
    window.print();
    document.body.innerHTML = chargeSalReportRestorePage;
  });

  // ------------------ Salary Payments Report Section ---------------------------------

  $("#customDateSalaryPaymentsReport").prop("checked", true);
  $("#startFromSalaryPaymentsReport").prop("readonly", true);
  $("#endToSalaryPaymentsReport").prop("readonly", true);

  $("#customDateSalaryPaymentsReport").on("change", function () {
    if ($(this).is(":checked")) {
      $("#startFromSalaryPaymentsReport").prop("readonly", true);
      $("#startFromSalaryPaymentsReport").val("");
      $("#endToSalaryPaymentsReport").prop("readonly", true);
      $("#endToChargeSalariesReport").val("");
    } else {
      $("#startFromSalaryPaymentsReport").prop("readonly", false);
      $("#endToSalaryPaymentsReport").prop("readonly", false);
    }
  });

  $("#salaryPaymentsReportForm").on("submit", function (e) {
    e.preventDefault();
    var emplInfoSalaPaymRep = $("#empNameSalaryPaymentsReport").val();
    var monthInfoSalaPaymRep = $("#salaryMonthSalaryPaymentsReport").val();
    var strDateSalaPaymRep = $("#startFromSalaryPaymentsReport").val();
    var endTooSalaPaymRep = $("#endToSalaryPaymentsReport").val();

    //alert("Customer: " + emplInfo + " -- " + "Room: " + monthInfo + " -- " + "Start Date: " + strDate + " -- " + "End Date: " + endToo + " -- ");

    $.ajax({
      type: "POST",
      url: "api/main.php",
      data: {
        action: "chargeSalaryPaymentReport",
        emplInfoSalaPaymRep: emplInfoSalaPaymRep,
        monthInfoSalaPaymRep: monthInfoSalaPaymRep,
        strDateSalaPaymRep: strDateSalaPaymRep,
        endTooSalaPaymRep: endTooSalaPaymRep,
      },
      dataType: "text",
      beforeSend: function () {
        $("#btnSalaryPaymentsReport").prop("disabled", true);
        $("#btnSalaryPaymentsReport").html(
          "<i class='fa fa-spinner fa-pulse' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
      },
      success: function (response) {
        $("#btnSalaryPaymentsReport").prop("disabled", false);
        $("#btnSalaryPaymentsReport").html(
          "<i class='fa fa-search' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
        $("#salaryPaymentsReportSection").html(response);
      },
    });
  });

  $(document).on("click", "#printSalaryPaymentsReport", function () {
    //Display and open the print dialog box to print the report
    var salPaymReportRestorePage = document.body.innerHTML;
    var salPaymReReportPrintArea = document.getElementById(
      "salaryPaymentsPrintArea"
    ).innerHTML;
    document.body.innerHTML = salPaymReReportPrintArea;
    window.print();
    document.body.innerHTML = salPaymReportRestorePage;
    location.reload(true);
  });

  // ------------------ Expenses Report Section ---------------------------------

  $("#customDateExpensesReport").prop("checked", true);
  $("#startFromExpensesReport").prop("readonly", true);
  $("#endToExpensesReport").prop("readonly", true);

  $("#customDateExpensesReport").on("change", function () {
    if ($(this).is(":checked")) {
      $("#startFromExpensesReport").prop("readonly", true);
      $("#startFromExpensesReport").val("");
      $("#endToExpensesReport").prop("readonly", true);
      $("#endToExpensesReport").val("");
    } else {
      $("#startFromExpensesReport").prop("readonly", false);
      $("#endToExpensesReport").prop("readonly", false);
    }
  });

  $("#expensesReportForm").on("submit", function (e) {
    e.preventDefault();
    var expenseExpenseType = $("#expenseExpenseTypeReport").val();
    var strDateExpensesReport = $("#startFromExpensesReport").val();
    var endTooExpensesReport = $("#endToExpensesReport").val();

    //alert("Customer: " + emplInfo + " -- " + "Room: " + monthInfo + " -- " + "Start Date: " + strDate + " -- " + "End Date: " + endToo + " -- ");

    $.ajax({
      type: "POST",
      url: "api/main.php",
      data: {
        action: "expensesReport",
        expenseExpenseType: expenseExpenseType,
        strDateExpensesReport: strDateExpensesReport,
        endTooExpensesReport: endTooExpensesReport,
      },
      dataType: "text",
      beforeSend: function () {
        $("#btnExpensesReport").prop("disabled", true);
        $("#btnExpensesReport").html(
          "<i class='fa fa-spinner fa-pulse' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
      },
      success: function (response) {
        $("#btnExpensesReport").prop("disabled", false);
        $("#btnExpensesReport").html(
          "<i class='fa fa-search' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
        $("#expesesReportSection").html(response);
      },
    });
  });

  $(document).on("click", "#printExpensesReport", function () {
    //Display and open the print dialog box to print the report
    var expensesReportRestorePage = document.body.innerHTML;
    var ExpensesReportPrintArea = document.getElementById(
      "expensesReportPrintArea"
    ).innerHTML;
    document.body.innerHTML = ExpensesReportPrintArea;
    window.print();
    document.body.innerHTML = expensesReportRestorePage;
  });

  //========================== End of System Reports ================================================

  //========================== System Logout Process ================================================

  // Admins and Normal Users Logout.....
  $(document).on("click", "#logoutOutSide, #logoutMenu", function (e) {
    e.preventDefault();
    const href = $(this).attr("href");
    const getUserName = $(this).attr("data-id");
    swal(
      {
        title: "Are you sure ?",
        text: "You want to logout as " + getUserName + " ?",
        type: "success",
        showCancelButton: true,
        confirmButtonText: "Yes, logout!",
        cancelButtonText: "No, don't logout!",
        closeOnConfirm: false,
        closeOnCancel: false,
      },
      function (isConfirm) {
        if (isConfirm) {
          swal(
            "",
            "Logged out successfully, Good Bye " + getUserName,
            "success"
          );
          setTimeout(function () {
            document.location = href;
          }, 500);
        } else {
          swal("", "Logout process cancelled.", "error");
        }
      }
    );
  });

  // Member Logout.....
  $(document).on(
    "click",
    "#memberLogoutOutSide, #memberLogoutMenu",
    function (e) {
      e.preventDefault();
      const href = $(this).attr("href");
      const getUserName = $(this).attr("data-id");
      swal(
        {
          title: "Are you sure ?",
          text: "You want to logout as " + getUserName + " ?",
          type: "success",
          showCancelButton: true,
          confirmButtonText: "Yes, logout!",
          cancelButtonText: "No, don't logout!",
          closeOnConfirm: false,
          closeOnCancel: false,
        },
        function (isConfirm) {
          if (isConfirm) {
            swal(
              "",
              "Logged out successfully, Good Bye " + getUserName,
              "success"
            );
            setTimeout(function () {
              document.location = href;
            }, 500);
          } else {
            swal("", "Logout process cancelled.", "error");
          }
        }
      );
    }
  );
});

// ----------------------- Filling Employee Name Select Option ---------------------------
function fillEmpNameUsers() {
  var tn = "S2tLajZpRzNneVFwMVg2M0ladkxWUT09OjqvGV6loHhOl7kpdvi9HGFc";
  var post = { action: "fetch_emp_name_users", dn: dn, tn: tn };
  $.ajax({
    method: "POST",
    url: "api/main.php",
    data: post,
    dataType: "JSON",
    success: function (data) {
      var Message = data.Message;
      var status = data.Status;
      if (status == true) {
        var returned_info = Message.split("###");
        var options = "";
        options += "<option value=''> -- Choose employee -- </option>";
        for (var i = 0; i <= returned_info.length - 1; i++) {
          var row = returned_info[i].split("***");
          options +=
            "<option value='" +
            row[(i, 1)] +
            "'>" +
            row[(i, 2)] +
            " - " +
            row[(i, 10)] +
            "</option>";
        }
       
        $("#userEmpIDUp").html(options);
        $("#emplyID").html(options);
        $("#cmbSalaryPaymentEmployeeName").html(options);
      }
    },
    error: function (e) {
      bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
        type: "danger",
        position: "topright",
        appendType: "append",
      });
    },
  });
}
// ----------------------- Filling Employee Name Select Option ---------------------------
function fillEmpNameU() {
  var tn = "S2tLajZpRzNneVFwMVg2M0ladkxWUT09OjqvGV6loHhOl7kpdvi9HGFc";
  var post = { action: "fetch_emp_name_users", dn: dn, tn: tn };
  $.ajax({
    method: "POST",
    url: "api/main.php",
    data: post,
    dataType: "JSON",
    success: function (data) {
      var Message = data.Message;
      var status = data.Status;
      if (status == true) {
        var returned_info = Message.split("###");
        var options = "";
        options += "<option value=''> -- Choose employee -- </option>";
        for (var i = 0; i <= returned_info.length - 1; i++) {
          var row = returned_info[i].split("***");
          options +=
            "<option value='" +
            row[(i, 1)] +
            "'>" +
            row[(i, 2)] +
            " - " +
            row[(i, 10)] +
            "</option>";
        }
        $("#userEmpID").html(options);
       
      }
    },
    error: function (e) {
      bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
        type: "danger",
        position: "topright",
        appendType: "append",
      });
    },
  });
}

// ----------------------- Filling Employee Name Select Option ---------------------------
function FillEmpNameEmployeesReport() {
  var tn = "S2tLajZpRzNneVFwMVg2M0ladkxWUT09OjqvGV6loHhOl7kpdvi9HGFc";
  var post = { action: "fetch_emp_name_users", dn: dn, tn: tn };
  $.ajax({
    method: "POST",
    url: "api/main.php",
    data: post,
    dataType: "JSON",
    success: function (data) {
      var Message = data.Message;
      var status = data.Status;
      if (status == true) {
        var returned_info = Message.split("###");
        var options = "";
        options += "<option value=''> General (All) </option>";
        for (var i = 0; i <= returned_info.length - 1; i++) {
          var row = returned_info[i].split("***");
          options +=
            "<option value='" +
            row[(i, 1)] +
            "'>" +
            row[(i, 2)] +
            " - " +
            row[(i, 10)] +
            "</option>";
        }
        $("#empNameEmployeesReport").html(options);
        $("#empNameChargeSalariesReport").html(options);
        $("#empNameSalaryPaymentsReport").html(options);
        $("#empNameChargeSalaries").html(options);
      }
    },
    error: function (e) {
      bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
        type: "danger",
        position: "topright",
        appendType: "append",
      });
    },
  });
}

// ----------------------- Fill main menu in the select option -------------------------
function fillMainMenu() {
  $.ajax({
    method: "POST",
    url: "api/main.php",
    data: { action: "fillMainMenu" },
    dataType: "JSON",
    success: function (data) {
      var Message = data.Message;
      var status = data.Status;
      var items = "";
      if (status == true) {
        items += "<option value=''>-- Select main menu --</option>";

        $.each(Message, function (index, item) {
          items +=
            "<option value='" +
            item.mainMenuID +
            "'>" +
            item.mainMenuText +
            "</option>";
        });
        $("#selectMainMenuID, #selectMainMenuIDD").html(items);
      }
    },
    error: function (data) {},
  });
}

// ----------------------- Fill users names in user privileges page --------------------
function fillUserNamesForPriv() {
  $.ajax({
    method: "POST",
    url: "api/main.php",
    data: { action: "userNamesPrivileges" },
    dataType: "JSON",
    success: function (data) {
      var Message = data.Message;
      var status = data.Status;
      var html = "";
      if (status == true) {
        html += `<option value=""> --- Choose user --- </option>`;
        Message.forEach(function (user_name, i) {
          html += `<option value="${user_name["userID"]}">${user_name["userName"]} - ${user_name["empName"]}</option>`;
        });
        $("#userNameForPrivileges").html(html);
      }
    },
    error: function (data) {},
  });
}


// ---------------------- Fill Account Details Compobox ----------------------
function fillAccountDetails() {
  $.ajax({
    method: "POST",
    url: "api/main.php",
    data: { action: "fill_account_details" },
    dataType: "JSON",
    success: function (data) {
      var Message = data.Message;
      var status = data.Status;
      var html = "";
      if (status == true) {
        html += `<option value="">-- Select Account --</option>`;
        Message.forEach(function (accounts_data, i) {
          if (accounts_data["gatewayType"] === "1") {
            html += `<option value="${accounts_data["accountNoID"]}">${accounts_data["gatewayName"]} (${accounts_data["accountNumber"]})</option>`;
          } else if (accounts_data["gatewayType"] === "2") {
            html += `<option value="${accounts_data["accountNoID"]}">${accounts_data["gatewayName"]} ${accounts_data["accountNoName"]} (${accounts_data["accountNumber"]})</option>`;
          } else if (accounts_data["gatewayType"] === "3") {
            html += `<option value="${accounts_data["accountNoID"]}">${accounts_data["accountNoName"]} (${accounts_data["accountNumber"]})</option>`;
          }
        });
        $(
          "#cmbAccountTransactionsAccountName, #cmbCustomerPaymentsDepositAccount, #cmbEmployeeSalariesWithdrawalAccount, #cmbExpensesWithdrawalAccount, #cmbMemberPaymentsAccountName"
        ).html(html);
      }
    },
    error: function (data) {},
  });
}

// ---------------------- Fill Account Details Compobox in Reports ----------------------
function fillAccountDetailsReports() {
  $.ajax({
    method: "POST",
    url: "api/main.php",
    data: { action: "fill_account_details" },
    dataType: "JSON",
    success: function (data) {
      var Message = data.Message;
      var status = data.Status;
      var html = "";
      if (status == true) {
        html += `<option value="">General (All)</option>`;
        Message.forEach(function (accounts_data, i) {
          if (accounts_data["gatewayType"] === "1") {
            html += `<option value="${accounts_data["accountNoID"]}">${accounts_data["gatewayName"]} (${accounts_data["accountNumber"]})</option>`;
          } else if (accounts_data["gatewayType"] === "2") {
            html += `<option value="${accounts_data["accountNoID"]}">${accounts_data["gatewayName"]} ${accounts_data["accountNoName"]} (${accounts_data["accountNumber"]})</option>`;
          } else if (accounts_data["gatewayType"] === "3") {
            html += `<option value="${accounts_data["accountNoID"]}">${accounts_data["accountNoName"]} (${accounts_data["accountNumber"]})</option>`;
          }
        });
        $("#cmbAccountStatementAccountName").html(html);
      }
    },
    error: function (data) {},
  });
}

// ----------------------- Convert number figures to words functions -------------------
function moneyValueToWords(number) {
  var digit = [
    "Zero",
    "One",
    "Two",
    "Three",
    "Four",
    "Five",
    "Six",
    "Seven",
    "Eight",
    "Nine",
  ];
  var elevenSeries = [
    "Ten",
    "Eleven",
    "Twelve",
    "Thirteen",
    "Fourteen",
    "Fifteen",
    "Sixteen",
    "Seventeen",
    "Eighteen",
    "Nineteen",
  ];
  var countingByTens = [
    "Twenty",
    "Thirty",
    "Forty",
    "Fifty",
    "Sixty",
    "Seventy",
    "Eighty",
    "Ninety",
  ];
  var shortScale = ["", "Thousand", "Million", "Billion", "Trillion"];

  number = number.toString();
  number = number.replace(/[\, ]/g, "");
  if (number != parseFloat(number)) return "Is not valid number";
  var x = number.indexOf(".");
  if (x == -1) x = number.length;
  if (x > 15) return "Too big number";
  var n = number.split("");
  var str = "";
  var sk = 0;
  for (var i = 0; i < x; i++) {
    if ((x - i) % 3 == 2) {
      if (n[i] == "1") {
        str += elevenSeries[Number(n[i + 1])] + " ";
        i++;
        sk = 1;
      } else if (n[i] != 0) {
        str += countingByTens[n[i] - 2] + " ";
        sk = 1;
      }
    } else if (n[i] != 0) {
      str += digit[n[i]] + " ";
      if ((x - i) % 3 == 0) str += "Hundred ";
      sk = 1;
    }
    if ((x - i) % 3 == 1) {
      if (sk) str += shortScale[(x - i - 1) / 3] + " ";
      sk = 0;
    }
  }
  if (x != number.length) {
    var y = number.length;
    str += "Point ";
    for (var i = x + 1; i < y; i++) str += digit[n[i]] + " ";
  }
  str = str.replace(/\number+/g, " ");
  return str.trim() + " Dollar";
}

// ---------------------- Format Dollar ---------------------------------------
function formatDollar(num) {
  var p = num.toFixed(2).split(".");
  return (
    "$" +
    p[0]
      .split("")
      .reverse()
      .reduce(function (acc, num, i, orig) {
        return num + (num != "-" && i && !(i % 3) ? "," : "") + acc;
      }, "") +
    "." +
    p[1]
  );
}

// ============================= User Updated ===============================
//Fill the account no, evc plus and so when deposited to is changed
$(document).on("change", "#users", function () {
  var selectedAccountNo = $(this).val();

  if (selectedAccountNo === "1") {
	$("#userEmpID").html("");
	fillEmpNameU();
  } else if (selectedAccountNo === "2") {
	fillContactDoctor();
  } else if (selectedAccountNo === "3") {
    $("#userEmpID").html("");
  } else {
    alert("2");
  }
});


function fillContactDoctor() {
	$("#userEmpID").html("");
  $.ajax({
    method: "POST",
    url: "api/main.php",
    data: { action: "fill_contactDoctor" },
    dataType: "JSON",
    success: function (data) {
      var Message = data.Message;
      var status = data.Status;
      var html = "";
      if (status == true) {
        html += `<option value="">-- Select Doctor --</option>`;
        Message.forEach(function (contact_person_data, i) {
          html += `<option value="${contact_person_data["doctor_id"]}">${
            contact_person_data["doctor_name"] +
            " - " +
            contact_person_data["doctor_tell"]
          }</option>`;
        });
        $(
          "#userEmpID"
        ).html(html);
        // console.log(Message)
      }
    },
    error: function (data) {},
  });
}


function fill_patientAppointmentDoctor() {
  $.ajax({
    method: "POST",
    url: "api/main.php",
    data: { action: "PatientDoctorAppo" },
    dataType: "JSON",
    success: function (data) {
      var Message = data.Message;
      var status = data.Status;
      var html = "";
      if (status == true) {
        html += `<option value=""> --- Choose Patient --- </option>`;
        Message.forEach(function (user_name, i) {
          html += `<option value="${user_name["appointment_id"]}">${user_name["patient_name"]} - ${user_name["patient_tell"]}</option>`;
        });
        $("#cmbPatientNameAppointment").html(html);
      }
    },
    error: function (data) {},
  });
}

$("#cmbPatientNameAppointment").change(function () {
  var patient = $(this).val();
  var post = { action: "fetchExamTest", currentAppointment: patient, dn: dn };
  if (patient == "") {
  } else {
    $.ajax({
      url: "api/main.php",
      method: "POST",
      data: post,
      dataType: "text",
      success: function (result) {
        $(".patientExamTest").html(result);
      },
    });
  }
});