//Global variables of the system
var dn = "OEZPc1BsRDF6OWtGUThxaFIrdVpnQT09Ojo+gTnhuvAEZYuiobR8YGB6";

var contribution_months = 0;
var contribution_yearss = 0;
var contribution_total_amount = 0;
var btnAction = "Insert";
$(document).ready(function () {
  fillDepartment();
  fillDoctorName();
  fillAppointmentFee();
  // fillDoctorPatientsList()
  fillDiseases();
  fillPatientName();
  fillContributionType();
  fillActiveMembersOnly();
  fillActiveMembersOnlyReport();

  $(
    "#txtMembersTelephoneNo, #txtMembersTelephoneNoUp, #txtCustomersCustomerTellUp"
  ).keyup(function () {
    this.value = this.value.replace(/[^0-9\.]/g, "");
  });

  //Allow only numbers and dot, float numbers
  $(
    "#txtContributionTypeAmount, #txtContributionTypeAmountUp, #txtMemberPaymentsPaidAmount, #txtOwnerPaymentPaidAmount, #txtOwnerPaymentPaidAmountUp, #txtPurchasePropertyCostPrice,#txtPatientAge,#txtPatientAgeU ,#txtPurchasePropertySupplementPrice, #txtSellingPropertySellingPrice"
  ).keypress(function (event) {
    if (
      (event.which != 46 || $(this).val().indexOf(".") != -1) &&
      (event.which < 48 || event.which > 57)
    ) {
      event.preventDefault();
    }
  });

  // ----------------------- Add New Department Modal -----------------------------------
  $("#registerDepartmentForm").on("submit", function (e) {
    e.preventDefault();
    if (btnAction == "Insert") {
      var vl =
        $("#txtDepartmentName").val() +
        "###" +
        $("#txtDepFee").val() +
        "###" +
        $("#txtRegisterUser").val() +
        "###" +
        $("#txtRegisterDate").val() +
        "###" +
        "-" +
        "###" +
        "-";
      // alert(vl);
      var hasFile = "No";
      var tn = "ZFh4ZjcveEwyL0dEN0dJSlM1dnIvQT09OjrUGzmUh1/uGt/GvJEMMFPB";
      var commandType = "insert_command";
      var objName = "Department ";
      var objPre = "DP";

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
          $("#btnRegisterDepartment").prop("disabled", true);
          $("#btnRegisterDepartment").html(
            "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
          );
        },
        success: function (data) {
          $("#btnRegisterDepartment").prop("disabled", false);
          $("#btnRegisterDepartment").html(
            "<i class='fa fa-lg fa-save'></i> Register Department"
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
    } else {
      //   alert("fdsfdsf");
      var vl =
        $("#txtDepartmentId").val() +
        "###" +
        $("#txtDepartmentName").val() +
        "###" +
        $("#txtDepFee").val() +
        "###" +
        $("#txtDepartmentUpdatedUser").val() +
        "###" +
        $("#txtDepartmentUpdateDate").val();
      // alert(vl);
      var cm =
        "N21XMVdNVnJhdXVRYlkxN3UyQjZLZFl2dzlyeVEyWTZ6ZHZ3UG83R3RMRmVjdEI5SEhBWmRGeTFWamdEZXUrNDQ1YzJuSlc0Qlg1MTNLaW9vS2ZXVFdDUW9GZXJHaXRGZmQxaXFkL2FSTzg9Ojrqua5Zz86DuNCCtqZcxjx7";
      var tn = "SGlybnFhL1B4Rm5jZ2JDVGljd0xZQT09Ojq7Li+TO+rws6exwHSwEs2O";
      var commandType = "update_command";
      var hasFile = "No";
      var objName = "Department";
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
          $("#btnRegisterDepartment").prop("disabled", true);
          $("#btnRegisterDepartment").html(
            "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
          );
        },
        success: function (data) {
          $("#btnRegisterDepartment").prop("disabled", false);
          $("#btnRegisterDepartment").html(
            "<i class='fa fa-lg fa-pencil'></i> Save"
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
    }
  });
  // ----------------------- Add New Exam Catagory Modal -----------------------------------
  $("#registerExam_CatagoryForm").on("submit", function (e) {
    e.preventDefault();
    if (btnAction == "Insert") {
      var vl =
        $("#txtExam_CatagoryName").val() +
        "###" +
        $("#txtEx_CatagoryDescription").val() +
        "###" +
        $("#txtRegisterUser").val() +
        "###" +
        $("#txtRegisterDate").val() +
        "###" +
        "-" +
        "###" +
        "-";
      // alert(vl);
      var hasFile = "No";
      var tn = "cW1ZWWhlRE5lNnRqekh5dTduN3JHQT09OjqDcFDmwlQXBUhkXtBjMik5";
      var commandType = "insert_command";
      var objName = "Exam Catagory ";
      var objPre = "EXC";

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
          $("#btnRegisterExam_Catagory").prop("disabled", true);
          $("#btnRegisterExam_Catagory").html(
            "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
          );
        },
        success: function (data) {
          $("#btnRegisterExam_Catagory").prop("disabled", false);
          $("#btnRegisterExam_Catagory").html(
            "<i class='fa fa-lg fa-save'></i> Register Exam Catagory"
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
    } else {
        // alert("fdsfdsf");
      var vl =
        $("#txtExam_CatagoryId").val() +
        "###" +
        $("#txtExam_CatagoryName").val() +
        "###" +
        $("#txtEx_CatagoryDescription").val() +
        "###" +
        $("#txtExam_CatagoryUpdatedUser").val() +
        "###" +
        $("#txtExam_CatagoryUpdateDate").val();
    //   alert(vl);
      var cm =
        "cnF5UVgrTlEzWXNTajNaSldpZVRYV0dISkJxZDdabWdiVEZ5S3g3N2RMWTJEMm5YNUpmODE5dDI5T2tPN2xxOTVKSklMdzlvSHFFcm1aYzBacThKRHJYRFVFS08wQWFzNC9rWXZUSHdlQVU9Ojq8LCs288sJ1tKuyoBjPrki";
      var tn = "d2pqeElIYjc1SGNaYzV6ajBqWG1OZz09Ojr+6dahAN2Kzqcn8IFXzsEA";
      var commandType = "update_command";
      var hasFile = "No";
      var objName = "Exam Catagory";
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
          $("#btnRegisterExam_Catagory").prop("disabled", true);
          $("#btnRegisterExam_Catagory").html(
            "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
          );
        },
        success: function (data) {
          $("#btnRegisterExam_Catagory").prop("disabled", false);
          $("#btnRegisterExam_Catagory").html(
            "<i class='fa fa-lg fa-pencil'></i> Save"
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
    }
  });

  // ----------------------- Filling Data into Department Modal -------------------------
  // $(document).on("click", ".btnUpdateDepartment", function (e) {

  // 	e.preventDefault();

  // 	var objectID = $(this).attr("data-id");
  // 	var tn = "SGlybnFhL1B4Rm5jZ2JDVGljd0xZQT09Ojq7Li+TO+rws6exwHSwEs2O";
  // 	var cm = "S24wbmN4bzlhMDhYWFY2YUpjUTFYdz09OjrwBwAkfVvxeyg+OxGwWcQg";

  // 	var post = {
  // 		"action": "fetch_parameterized_everything", "dn": dn, "tn" : tn, "cm" : cm, "objectID": objectID
  // 	}

  // 	$(".modal-body").load(objectID);

  // 	$.ajax({
  // 		method: "POST", url: "api/main.php", data:  post, dataType: "JSON",
  // 		success: function(data) {
  // 			var Message = data.Message;
  // 			var status = data.Status;
  // 			if (status === true) {

  // 				var returned_info = Message.split("###");
  // 				$("#txtDepartmentId").val(returned_info[1]);
  // 				$("#txtDepartmentNameU").val(returned_info[2]);
  // 				$("#txtDepFeeU").val(returned_info[3]);
  // 				// $("#txtUpdatedUser").val(returned_info[5]);
  // 				// $("#txtUpdateDate").val(returned_info[6]);

  // 				txtDepartmentName
  // 			}
  // 	 	}, error: function(e) {
  // 			bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
  // 		}
  //    });

  // });
  $(document).on("click", ".btnUpdateDepartment", function (e) {
    e.preventDefault();

    var objectID = $(this).attr("data-id");
    var tn = "SGlybnFhL1B4Rm5jZ2JDVGljd0xZQT09Ojq7Li+TO+rws6exwHSwEs2O";
    var cm = "S24wbmN4bzlhMDhYWFY2YUpjUTFYdz09OjrwBwAkfVvxeyg+OxGwWcQg";

    var post = {
      action: "fetch_parameterized_everything",
      dn: dn,
      tn: tn,
      cm: cm,
      objectID: objectID,
    };

    // $(".modal-body").load(objectID);

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
          $("#txtDepartmentId").val(returned_info[1]);
          $("#txtDepartmentName").val(returned_info[2]);
          $("#txtDepFee").val(returned_info[3]);
          // $("#txtUpdatedUser").val(returned_info[5]);
          // $("#txtUpdateDate").val(returned_info[6]);
          btnAction = "Update";
          $("#btnRegisterDepartment").prop("disabled", false);
          $("#btnRegisterDepartment").html(
            "<i class='fa fa-lg fa-save'></i> Save Changes"
          );
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

  // ----------------------- Deleting Department Data -----------------------------------
  $(document).on("click", ".btnDeleteDepartment", function (e) {
    e.preventDefault();

    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var tn = "ZFh4ZjcveEwyL0dEN0dJSlM1dnIvQT09OjrUGzmUh1/uGt/GvJEMMFPB";
    var cm = "S24wbmN4bzlhMDhYWFY2YUpjUTFYdz09OjrwBwAkfVvxeyg+OxGwWcQg";
    var commandType = "delete_command";
    var objName = "Department ";

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
        text: "You want to delete this Department permenantly?",
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
          swal("Cancelled", "Department deletion has been cancelled", "error");
        }
      }
    );
  });

  // ====================== End of Department Management Section ========================

  // ========================== Start Disease Management Section 	============================

  // ----------------------- Add New Diseases Modal -----------------------------------
  $("#registerDiseaseForm").on("submit", function (e) {
    e.preventDefault();
    var vl =
      $("#cmDiseaseDepartmentName").val() +
      "###" +
      $("#txtDiseaseName").val() +
      "###" +
      $("#txtDiseaseDrug").val() +
      "###" +
      $("#txtRegisterUser").val() +
      "###" +
      $("#txtRegisterDate").val() +
      "###" +
      "-" +
      "###" +
      "-";
    // alert(vl);
    var hasFile = "No";
    var tn = "dzlwSHBWUTYxWFpvRHZRYkpMYjJlUT09OjodQtsDXAX6u4XW9X4Y0tjn";
    var commandType = "insert_command";
    var objName = "Disease ";
    var objPre = "DIS";

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
        $("#btnRegisterDisease").prop("disabled", true);
        $("#btnRegisterDisease").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnRegisterDisease").prop("disabled", false);
        $("#btnRegisterDisease").html(
          "<i class='fa fa-lg fa-save'></i> Register Department"
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

  // ----------------------- Filling Data into Disease Modal -------------------------
  $(document).on("click", ".btnUpdateDisease", function (e) {
    e.preventDefault();

    var objectID = $(this).attr("data-id");
    var tn = "dzlwSHBWUTYxWFpvRHZRYkpMYjJlUT09OjodQtsDXAX6u4XW9X4Y0tjn";
    var cm = "em1mVjJDOWVJWTZWa1E2dkxwKzBrZz09OjrGOE67ncz74lD2YlBr5Xug";

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
          $("#txtDiseaseIdd").val(returned_info[1]);
          $("#cmDiseaseDepartmentNameU")
            .select2()
            .val(returned_info[2])
            .trigger("change");
          $("#txtDiseaseNameU").val(returned_info[3]);
          $("#txtDiseaseDrugU").val(returned_info[4]);
          // $("#txtUpdatedUser").val(returned_info[5]);
          // $("#txtUpdateDate").val(returned_info[6]);
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

  //------------------------ Update Disease modal ----------------------------------------------
  $("#updateDiseaseForm").on("submit", function (e) {
    e.preventDefault();
    var vl =
      $("#txtDiseaseIdd").val() +
      "###" +
      $("#cmDiseaseDepartmentNameU").val() +
      "###" +
      $("#txtDiseaseNameU").val() +
      "###" +
      $("#txtDiseaseDrugU").val() +
      "###" +
      $("#txtUpdatedBy").val() +
      "###" +
      $("#txtUpdateDate").val();
    // alert(vl);
    var cm =
      "T0ladWN0bDFxcFk3WnVQK0xScXdMdnBWelV4VWRvWXdWN1lXSG5VcXhQdDBNSVl4QnhDYnZuRk9UQkc1Z0tBRXdZT2htSDZIRk1ySHRSaGJ6VWs0ZGZhdFdYdVJDdllRQkplaXo1OEprbUdMV0hSRVRKZEticXJhdjBlR3dLam06OsC/kMXYYaId4AUOvGaFLeQ=";
    var tn = "dzlwSHBWUTYxWFpvRHZRYkpMYjJlUT09OjodQtsDXAX6u4XW9X4Y0tjn";
    var commandType = "update_command";
    var hasFile = "No";
    var objName = "Disease";
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
        $("#btnUpdateDisease").prop("disabled", true);
        $("#btnUpdateDisease").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnUpdateDisease").prop("disabled", false);
        $("#btnUpdateDisease").html(
          "<i class='fa fa-lg fa-pencil'></i> Update Department"
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

  // ----------------------- Deleting Disease Data -----------------------------------
  $(document).on("click", ".btnDeleteDisease", function (e) {
    e.preventDefault();

    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var tn = "dzlwSHBWUTYxWFpvRHZRYkpMYjJlUT09OjodQtsDXAX6u4XW9X4Y0tjn";
    var cm = "em1mVjJDOWVJWTZWa1E2dkxwKzBrZz09OjrGOE67ncz74lD2YlBr5Xug";
    var commandType = "delete_command";
    var objName = "Disease ";

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
        text: "You want to delete this Disease permenantly?",
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
          swal("Cancelled", "Disease deletion has been cancelled", "error");
        }
      }
    );
  });

  // ====================== End of Disease Management Section ========================

  // ====================== Start of Doctor Management Section ======================

  // ------------------------------- Register Doctor Modal ------------------------------------
  $("#registerDoctorForm").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    var vl =
      $("#txtDoctorName").val() +
      "###" +
      $("#txtDoctorBirthPlace").val() +
      "###" +
      $("#txtDoctorBirthDate").val() +
      "###" +
      $("#cmbDoctorSex").val() +
      "###" +
      $("#txtDoctorAdress").val() +
      "###" +
      $("#txtDoctorTell").val() +
      "###" +
      $("#txtDoctorEmail").val() +
      "###" +
      $("#cmbDoctorDepartment").val() +
      "###" +
      $("#txtDoctorRegisteredBy").val() +
      "###" +
      $("#txtDoctorRegisterDate").val() +
      "###" +
      "-" +
      "###" +
      "-";
    // alert(vl);
    var hasFile = "Yes";
    var files = "photoDoctor";
    var tn = "SlpOQUpsUmpNbnhKNUdRTzR3L0MzZz09Ojoil/DPtHGnZLyjlWrApvmO";
    var commandType = "insert_command";
    var objName = "Doctor";
    var objPre = "DOC";
    formData.append("action", "ins_upd_del_everything");
    formData.append("vl", vl);
    formData.append("hasFile", hasFile);
    formData.append("files", files);
    formData.append("photoDoctor", $("#doctorPhoto")[0].files[0]);
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
        $("#btnRegisterDoctor").prop("disabled", true);
        $("#btnRegisterDoctor").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnRegisterDoctor").prop("disabled", false);
        $("#btnRegisterDoctor").html(
          "<i class='fa fa-lg fa-save'></i> Register Doctor"
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

  // ------------------------------- Filling Data into Doctor Modal -------------------------

  $(document).on("click", ".btnUpdateDoctor", function (e) {
    e.preventDefault();

    var objectID = $(this).attr("data-id");
    var tn = "SlpOQUpsUmpNbnhKNUdRTzR3L0MzZz09Ojoil/DPtHGnZLyjlWrApvmO";
    var cm = "MnhxZ3FLQ2lVQ3M1ZkxhT0Y1ekZFUT09OjqC8ynqPHQBYuOwRP4dmx/w";

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
          $("#txtDoctorId").val(returned_info[1]);
          $("#txtDoctorNameU").val(returned_info[2]);
          $("#txtDoctorBirthPlaceU").val(returned_info[3]);
          $("#txtDoctorBirthDateU").val(returned_info[4]);
          $("#cmbDoctorSexU").select2().val(returned_info[5]).trigger("change");
          $("#txtDoctorAdressU").val(returned_info[6]);
          $("#txtDoctorTellU").val(returned_info[7]);
          $("#txtDoctorEmailU").val(returned_info[8]);
          $("#cmbDoctorDepartmentU")
            .select2()
            .val(returned_info[9])
            .trigger("change");
          $("#txtDoctorUpdatedBy").val(returned_info[12]);
          $("#txtDoctorUpdateDate").val(returned_info[13]);
          $("#doctorPhotoU").attr("src", returned_info[14]);
          $("#doctorTargetUpdate").val(returned_info[14]);
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

  // ------------------------------- Update Doctor Modal ------------------------------------
  $("#updateDoctorForm").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    var vl =
      $("#txtDoctorId").val() +
      "###" +
      $("#txtDoctorNameU").val() +
      "###" +
      $("#txtDoctorBirthPlaceU").val() +
      "###" +
      $("#txtDoctorBirthDateU").val() +
      "###" +
      $("#cmbDoctorSexU").val() +
      "###" +
      $("#txtDoctorAdressU").val() +
      "###" +
      $("#txtDoctorTellU").val() +
      "###" +
      $("#txtDoctorEmailU").val() +
      "###" +
      $("#cmbDoctorDepartmentU").val() +
      "###" +
      $("#txtDoctorUpdatedBy").val() +
      "###" +
      $("#txtDoctorUpdateDate").val();
    var cm =
      "ei9lUzhDbWlnSGlhdTBIVGZzcGlwVWtCcEdMMGxEVS9hK3RBdUtrK1hFblM1TTZmcU9yK3hPb3RrSHJKZm11bExLd1BVQjRkQlB2VHM4VHhURzVreVJVUEhzMHU2OVVHMDZOQk00QWhRTEIzcXJFRG5BN1YzYTQ2ZGZGVVBEc1VDRDVrVTRlb3lObG5lOTVZQzBMajZsWHBvOFBSZG5FYUxFVE51N0RNTi9neW5lSE5CU0paMFNnTW1uZ05iZmtmMGZ0K08vQUhLb0FwOHI5a0RqRlRIOTVSTndZYjNhdUxDTVV4SDJGQXJLWWk5RHNtS0hBUzZZR0Y4ZEJNcnpKNDo6cVNuO4r8vfU+Ha5nWxWGMg==";
    var photoNames = $("#photoDoctorUpdate").val();
    var docNames = ""; // Means no documents in this update
    var hasFile = "Yes";
    var files = "photoDoctorUpdate";
    var tn = "SlpOQUpsUmpNbnhKNUdRTzR3L0MzZz09Ojoil/DPtHGnZLyjlWrApvmO";
    var commandType = "update_command";
    var objName = "Doctor";
    formData.append("action", "ins_upd_del_everything");
    formData.append("vl", vl);
    formData.append("cm", cm);
    formData.append("hasFile", hasFile);
    formData.append("files", files);
    formData.append("photoDoctorUpdate", $("#doctorPhotoUpdate")[0].files[0]);
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
        $("#btnUpdateDoctor").prop("disabled", true);
        $("#btnUpdateDoctor").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait"
        );
      },
      success: function (data) {
        $("#btnUpdateDoctor").prop("disabled", false);
        $("#btnUpdateDoctor").html(
          "<i class='fa fa-lg fa-pencil'></i> Update Doctor"
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

  // ------------------------------- Deleting Doctor Data -----------------------------------
  $(document).on("click", ".btnDeleteDoctor", function (e) {
    e.preventDefault();

    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var tn = "SlpOQUpsUmpNbnhKNUdRTzR3L0MzZz09Ojoil/DPtHGnZLyjlWrApvmO";
    var cm = "MnhxZ3FLQ2lVQ3M1ZkxhT0Y1ekZFUT09OjqC8ynqPHQBYuOwRP4dmx/w";
    var commandType = "delete_command";
    var objName = "Doctor";

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
        title: "Are you sure",
        text: "You want to delete this Doctor?",
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
          swal("Cancelled", "Doctor deletion has been cancelled", "");
        }
      }
    );
  });

  // --------------------------- End of Doctor Management -------------------------------------

  // ====================== Start of Patient Management Section ======================

  // ----------------------- Add New Patient Modal -----------------------------------
  $("#registerPatientsForm").on("submit", function (e) {
    e.preventDefault();
    var vl =
      $("#txtPatientName").val() +
      "###" +
      $("#txtPatientAge").val() +
      "###" +
      $("#cmPatientSex").val() +
      "###" +
      $("#txtPatientAddress").val() +
      "###" +
      $("#txtPatientTell").val() +
      "###" +
      $("#txtRegisterUser").val() +
      "###" +
      $("#txtRegisterDate").val() +
      "###" +
      "-" +
      "###" +
      "-";
    // alert(vl);
    var hasFile = "No";
    var tn = "eTNjK2NOS2xYU0xGTWtHaHpTb1hmQT09OjpU92NgLEqzKM5IeK8d7/jz";
    var commandType = "insert_command";
    var objName = "Patient ";
    var objPre = "PT";

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
        $("#btnRegisterPatient").prop("disabled", true);
        $("#btnRegisterPatient").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnRegisterPatient").prop("disabled", false);
        $("#btnRegisterPatient").html(
          "<i class='fa fa-lg fa-save'></i> Register Patient"
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

  // ----------------------- Filling Data into Patient Modal -------------------------
  $(document).on("click", ".btnUpdatePatient", function (e) {
    e.preventDefault();

    var objectID = $(this).attr("data-id");
    var tn = "eTNjK2NOS2xYU0xGTWtHaHpTb1hmQT09OjpU92NgLEqzKM5IeK8d7/jz";
    var cm = "V1pvNDQrYU9pUHJDSUI4WjAydWNUUT09OjowAVD0iLbLiftump8F0s21";

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
          $("#txtPatientId").val(returned_info[1]);
          $("#txtPatientNameU").val(returned_info[2]);
          $("#txtPatientAgeU").val(returned_info[3]);
          $("#cmPatientSexU").select2().val(returned_info[4]).trigger("change");
          $("#txtPatientAddressU").val(returned_info[5]);
          $("#txtPatientTellU").val(returned_info[6]);
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

  //------------------------ Update Patient modal ------------------------------------
  $("#updatePatientsForm").on("submit", function (e) {
    e.preventDefault();
    var vl =
      $("#txtPatientId").val() +
      "###" +
      $("#txtPatientNameU").val() +
      "###" +
      $("#txtPatientAgeU").val() +
      "###" +
      $("#cmPatientSexU").val() +
      "###" +
      $("#txtPatientAddressU").val() +
      "###" +
      $("#txtPatientTellU").val() +
      "###" +
      $("#txtUpdatedUser").val() +
      "###" +
      $("#txtUpdateDate").val();
    // alert(vl);
    var cm =
      "bE40eW1ucUZrbWVmVHUwUUdVYmdOSlBxSytQS3JYeEIwTnY0TndHdDloR084QkpzWmFoWm1aeU9IcXozdVZ6VGM4QWdydVVqdmIrMU1vSjI4akxSNkRaS0F4dmZzeDI1aGYwM2hCWE9iYkY5R0hhWm9yaDEvQTJnQTVRVHd2NkNoUENEOW1mL0FoSU5IUjZ1cHBXUWdkY1d1aGpNc2xVbEtmd0ttTXpoUGlVPTo6M3ev/NM9Y+CA0AkFztlrlg==";
    var tn = "eTNjK2NOS2xYU0xGTWtHaHpTb1hmQT09OjpU92NgLEqzKM5IeK8d7/jz";
    var commandType = "update_command";
    var hasFile = "No";
    var objName = "Patient";

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
        $("#btnUpdatePatient").prop("disabled", true);
        $("#btnUpdatePatient").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnUpdatePatient").prop("disabled", false);
        $("#btnUpdatePatient").html(
          "<i class='fa fa-lg fa-pencil'></i> Update Patient"
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

  // ----------------------- Deleting Patient Data -----------------------------------
  $(document).on("click", ".btnDeletePatient", function (e) {
    e.preventDefault();

    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var tn = "eTNjK2NOS2xYU0xGTWtHaHpTb1hmQT09OjpU92NgLEqzKM5IeK8d7/jz";
    var cm = "V1pvNDQrYU9pUHJDSUI4WjAydWNUUT09OjowAVD0iLbLiftump8F0s21";
    var commandType = "delete_command";
    var objName = "Patient ";

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
        text: "You want to delete this Patient permenantly?",
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
          swal("Cancelled", "patient deletion has been cancelled", "error");
        }
      }
    );
  });

  // ====================== End of Patient Management Section ========================

  // ====================== Start of Appoitment Management Section ===================

  $(document).on("change", "#cmbDoctorNameApp", function () {
    var selectedDoctorID = $(this).val();
    if (selectedDoctorID == "") {
      $("#txtAppointmentNumber, #txtAppointmentNumberU").val("");
    } else {
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: {
          action: "generate_appointment_number",
          objectID: selectedDoctorID,
        },
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            $("#txtAppointmentNumber, #txtAppointmentNumberU").val(Message);
          }
        },
        error: function (data) {},
      });
    }
  });

  // ----------------------- Add New Appointment Modal -----------------------------------
  $("#registerAppointmentForm").on("submit", function (e) {
    e.preventDefault();
    var vl =
      $("#cmbPatientName").val() +
      "###" +
      $("#cmDepartmentName").val() +
      "###" +
      $("#cmbDoctorNameApp").val() +
      "###" +
      $("#txtAppointmentNumber").val() +
      "###" +
      $("#txtChargeAppointmentFee").val() +
      "###" +
      $("#txtDiscountFee").val() +
      "###" +
      $("#txtPaidFee").val() +
      "###" +
      "33759227" +
      "###" +
      $("#txtDescription").val() +
      "###" +
      $("#cmbAppointmentStatus").val() +
      "###" +
      $("#txtRegisterUser").val() +
      "###" +
      $("#txtRegisterDate").val() +
      "###" +
      "-" +
      "###" +
      "-";
    // alert(vl);
    var hasFile = "No";
    var tn = "dFE1aUNvNUcxL0RkenFTYi9GSFN0UT09Ojona/XX0QB2JF1zgwnqn7hs";
    var commandType = "insert_command";
    var objName = "Appointment ";
    var objPre = "APP";

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
        $("#btnRegisterAppointment").prop("disabled", true);
        $("#btnRegisterAppointment").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnRegisterAppointment").prop("disabled", false);
        $("#btnRegisterAppointment").html(
          "<i class='fa fa-lg fa-save'></i> Register Appointment"
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
  $(document).on(
    "change",
    "#cmDepartmentName, #cmDepartmentNameU",
    function () {
      var selectedContribution = $(this).val();
      // alert(selectedContribution);
      var objectID = selectedContribution;
      var post = { action: "fill_doctor_name", objectID: objectID };
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
            html += `<option value="">-- Select doctor --</option>`;
            Message.forEach(function (parameterized_doctor_data, i) {
              html += `<option value="${parameterized_doctor_data["doctor_id"]}">${parameterized_doctor_data["doctor_name"]}</option>`;
            });
            $("#cmbDoctorNameApp, #cmbDoctorNameAppU").html(html);
          }
        },
        error: function (data) {},
      });
    }
  );

  $(document).on(
    "change",
    "#cmDepartmentName, #cmDepartmentNameU",
    function () {
      var selectedContribution = $(this).val();
      // alert(selectedContribution);
      if (selectedContribution == "") {
        $("#txtChargeAppointmentFee, #txtChargeAppointmentFeeU").val("");
      } else {
        var objectID = selectedContribution;
        var post = { action: "fill_appointment_fee", objectID: objectID };
        $.ajax({
          method: "POST",
          url: "api/main.php",
          data: post,
          dataType: "JSON",
          success: function (data) {
            var Message = data.Message;
            var status = data.Status;
            if (status == true) {
              $("#txtChargeAppointmentFee, #txtChargeAppointmentFeeU").val(
                Message
              );
            }
          },
          error: function (data) {},
        });
      }
    }
  );

  // ----------------------- Filling Data into Appointment Modal -------------------------
  $(document).on("click", ".btnUpdateAppointment", function (e) {
    e.preventDefault();

    var objectID = $(this).attr("data-id");
    var tn = "dFE1aUNvNUcxL0RkenFTYi9GSFN0UT09Ojona/XX0QB2JF1zgwnqn7hs";
    var cm = "bXo0cGRQRDQwSTRQM1krWTVaTWV1QT09Ojq5owGZOVjRQpKT9TaUEt2d";

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
          $("#txtAppointmentId").val(returned_info[1]);
          $("#cmbPatientNameU")
            .select2()
            .val(returned_info[2])
            .trigger("change");
          $("#cmDepartmentNameU")
            .select2()
            .val(returned_info[3])
            .trigger("change");
          $("#cmbDoctorNameAppU")
            .select2()
            .val(returned_info[4])
            .trigger("change");
          $("#txtAppointmentNumberU").val(returned_info[5]);
          $("#txtChargeAppointmentFeeU").val(returned_info[6]);
          $("#txtDiscountFeeU").val(returned_info[7]);
          $("#txtPaidFeeU").val(returned_info[8]);
          $("#txtDescriptionU").val(returned_info[10]);
          $("#txtUpdatedUser").val(returned_info[14]);
          $("#txtUpdateDate").val(returned_info[15]);
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

  //------------------------ Update Appointment modal ----------------------------------------------
  $("#updateAppointmentForm").on("submit", function (e) {
    e.preventDefault();
    var vl =
      $("#txtAppointmentId").val() +
      "###" +
      $("#cmbPatientNameU").val() +
      "###" +
      $("#cmDepartmentNameU").val() +
      "###" +
      $("#cmbDoctorNameAppU").val() +
      "###" +
      $("#txtAppointmentNumberU").val() +
      "###" +
      $("#txtChargeAppointmentFeeU").val() +
      "###" +
      $("#txtDiscountFeeU").val() +
      "###" +
      $("#txtPaidFeeU").val() +
      "###" +
      $("#txtDescriptionU").val() +
      "###" +
      $("#txtUpdatedBy").val() +
      "###" +
      $("#txtUpdatedDate").val();
    // alert(vl);
    var cm =
      "TjQwSjhObUdJYnpCVU5WL3JzTDRRZmJHalFWbzNoOWpMN0lUSTJQL2NlSWNhelZ6NnlPdVBUNERsb3RUTGRrUEtYVldaVkliTjZQVUFUQkhaL0N4NEl5dTlKQjJ4SDBVMlNhUmhUMlNtcXlVMk93NFQvdXFYZEpUa3I2N0tpTjQ2WWVwN1h3SUU3djc3b2dRL3o0Mk9hWG82Vi81ZjZZOGhZY0RscktoVGJadDRBU2huSnRHMUlqbDhMVWREZjdkK05TTjAyYUFKbTM5TlRBSTFPQzIvRmQ4QWN1N05mWVdhcE15ZmhKcmVLdz06OrXL9lrmGx55Jrsv87hBviI=";
    var tn = "dFE1aUNvNUcxL0RkenFTYi9GSFN0UT09Ojona/XX0QB2JF1zgwnqn7hs";
    var commandType = "update_command";
    var hasFile = "No";
    var objName = "Appointment";
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
        $("#btnUpdateAppointment").prop("disabled", true);
        $("#btnUpdateAppointment").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnUpdateAppointment").prop("disabled", false);
        $("#btnUpdateAppointment").html(
          "<i class='fa fa-lg fa-pencil'></i> Update Appointment"
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

  // ----------------------- Deleting Appointment Data -----------------------------------
  $(document).on("click", ".btnDeleteAppointment", function (e) {
    e.preventDefault();

    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var tn = "dFE1aUNvNUcxL0RkenFTYi9GSFN0UT09Ojona/XX0QB2JF1zgwnqn7hs";
    var cm = "bXo0cGRQRDQwSTRQM1krWTVaTWV1QT09Ojq5owGZOVjRQpKT9TaUEt2d";
    var commandType = "delete_command";
    var objName = "Appointment ";

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
        text: "You want to delete this Appointment permenantly?",
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
          swal("Cancelled", "Appointment deletion has been cancelled", "error");
        }
      }
    );
  });

  // ====================== End of Appointment Management Section ========================

  // ----------------------- Filling Data into Patient Appointment Modal -------------------------
  $(document).on("click", ".btnAddAppointment", function (e) {
    e.preventDefault();

    var objectID = $(this).attr("data-id");
    var tn =
      "NFM3NzBVanc3Zk8yUmoxa3RaaFJKc1ljWTFRN1pEdlFaQnIyUnAwS0Urdz06Ou3urmuwF37Es0e+nHVMtPY=";
    var cm = "aXp3QjhCYnoxVXFkQ0piVmJQV3BSUT09Ojol0o/enhfm1OsC4S9dNMdA";

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
          $("#txtPatientIdd").val(returned_info[2]);
          $("#txtPatientNameApp").val(returned_info[3]);
          $("#txtPatientAgeApp").val(returned_info[4]);
          $("#txtPatientSexApp").val(returned_info[5]);
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

  // ================== Filling Date into Disease Drug
  $(document).on("change", "#cmbDiseasesName, #cmbDiseasesNameU", function () {
    var selectedContribution = $(this).val();
    // alert(selectedContribution);
    var objectID = selectedContribution;
    var post = { action: "fill_disease_drugs", objectID: objectID };
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
          html += `<option value="">-- Select drug --</option>`;
          Message.forEach(function (parameterized_disease_drugs_data, i) {
            html += `<option value="${parameterized_disease_drugs_data["disease_id"]}">${parameterized_disease_drugs_data["disease_drug"]}</option>`;
            // html += `<input type="checkbox" id="cmbDiseaseDrug" name="cmbDiseaseDrug" value="${parameterized_disease_drugs_data['disease_id']}">
            // <label for="cmbDiseaseDrug"> ${parameterized_disease_drugs_data['disease_drug']}</label><br>`;
            $(document).ready(function () {
              $("#select").click(function () {
                var values = $('input[type="checkbox"]:checked')
                  .map(function () {
                    return $(this).val();
                  })
                  .get()
                  .join(",");

                document.body.append(values);
              });
            });
          });
          $("#cmbDiseaseDrug, #cmbDiseaseDrugU").html(html);
        }
      },
      error: function (data) {},
    });
  });

  // ====================== Start of Patiens Report ========================

  // ====================== Start of System's Special Report ================================

  // ---------------------- Members Report Section -----------------------------------
  $("#patientReportDate").prop("checked", true);
  $("#patientReportStartFrom").prop("readonly", true);
  $("#patientReportEndToo").prop("readonly", true);

  $("#patientReportDate").on("change", function () {
    if ($(this).is(":checked")) {
      $("#patientReportStartFrom").prop("readonly", true);
      $("#patientReportStartFrom").val("");
      $("#patientReportEndToo").prop("readonly", true);
      $("#patientReportEndToo").val("");
    } else {
      $("#patientReportStartFrom").prop("readonly", false);
      $("#patientReportEndToo").prop("readonly", false);
    }
  });

  $("#patientsReportForm").on("submit", function (e) {
    e.preventDefault();
    var patientsNamePatientsReport = $("#cmbPatientReportName").val();
    var strDatePatientsReport = $("#patientReportStartFrom").val();
    var endTooPatientsReport = $("#patientReportEndToo").val();

    $.ajax({
      type: "POST",
      url: "api/main.php",
      data: {
        action: "patients_report",
        patientsNamePatientsReport: patientsNamePatientsReport,
        strDatePatientsReport: strDatePatientsReport,
        endTooPatientsReport: endTooPatientsReport,
      },
      dataType: "text",
      beforeSend: function () {
        $("#btnPatientReport").prop("disabled", true);
        $("#btnPatientReport").html(
          "<i class='fa fa-spinner fa-pulse' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
      },
      success: function (response) {
        $("#btnPatientReport").prop("disabled", false);
        $("#btnPatientReport").html(
          "<i class='fa fa-search' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
        $("#patientsReportSectionArea").html(response);
      },
    });
  });

  $(document).on("click", "#printMemberChargesReport", function () {
    //Display and open the print dialog box to print the report
    var memberChargesReportRestorePage = document.body.innerHTML;
    var memberChargesReportPrintArea = document.getElementById(
      "memberChargesPrintArea"
    ).innerHTML;
    document.body.innerHTML = memberChargesReportPrintArea;
    window.print();
    document.body.innerHTML = memberChargesReportRestorePage;
  });

  // ---------------------- Member Charges Report Section -----------------------------------
  $("#customDateMemberChargesReport").prop("checked", true);
  $("#startFromMemberChargesReport").prop("readonly", true);
  $("#endToMemberChargesReport").prop("readonly", true);

  $("#customDateMemberChargesReport").on("change", function () {
    if ($(this).is(":checked")) {
      $("#startFromMemberChargesReport").prop("readonly", true);
      $("#startFromMemberChargesReport").val("");
      $("#endToMemberChargesReport").prop("readonly", true);
      $("#endToMemberChargesReport").val("");
    } else {
      $("#startFromMemberChargesReport").prop("readonly", false);
      $("#endToMemberChargesReport").prop("readonly", false);
    }
  });

  $("#searchMemberhargesReportForm").on("submit", function (e) {
    e.preventDefault();
    var memberNameMemberChargesReport = $(
      "#cmbMemberNameMemberChargesReport"
    ).val();
    var contributionYearMemberChargesReport = $(
      "#cmbContributionYearMemberChargesReport"
    ).val();
    var strDateMemberChargesReport = $("#startFromMemberChargesReport").val();
    var endTooMemberChargesReport = $("#endToMemberChargesReport").val();

    $.ajax({
      type: "POST",
      url: "api/main.php",
      data: {
        action: "member_charges_report",
        memberNameMemberChargesReport: memberNameMemberChargesReport,
        contributionYearMemberChargesReport:
          contributionYearMemberChargesReport,
        strDateMemberChargesReport: strDateMemberChargesReport,
        endTooMemberChargesReport: endTooMemberChargesReport,
      },
      dataType: "text",
      beforeSend: function () {
        $("#btnSearchMemberChargesReport").prop("disabled", true);
        $("#btnSearchMemberChargesReport").html(
          "<i class='fa fa-spinner fa-pulse' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
      },
      success: function (response) {
        $("#btnSearchMemberChargesReport").prop("disabled", false);
        $("#btnSearchMemberChargesReport").html(
          "<i class='fa fa-search' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
        $("#memberChargesReportSection").html(response);
      },
    });
  });

  $(document).on("click", "#printMemberChargesReport", function () {
    //Display and open the print dialog box to print the report
    var memberChargesReportRestorePage = document.body.innerHTML;
    var memberChargesReportPrintArea = document.getElementById(
      "memberChargesPrintArea"
    ).innerHTML;
    document.body.innerHTML = memberChargesReportPrintArea;
    window.print();
    document.body.innerHTML = memberChargesReportRestorePage;
  });

  // ====================== End of Patiens Report ========================

  // ====================== Start of Contribution Type Management Section ======================

  // ----------------------- Add New Contribution Type Modal -----------------------------------
  $("#addContributionTypeForm").on("submit", function (e) {
    e.preventDefault();

    var vl =
      $("#txtContributionTypeName").val() +
      "###" +
      $("#txtContributionTypeAmount").val() +
      "###" +
      $("#txtContributionTypeDescription").val() +
      "###" +
      $("#txtContributionTypeRegisteredBy").val() +
      "###" +
      $("#txtContributionTypeRegDate").val() +
      "###" +
      "-" +
      "###" +
      "-";
    var hasFile = "No";
    var tn =
      "cDdVc0xyeFYvc0RNaXZwRlY0LzRQU0o2M1VIaVlmR3NDRndjYmtPU0I5ST06OrTyOUECBqEJY3zGpaOdH58=";
    var commandType = "insert_command";
    var objName = "Contribution type ";
    var objPre = "CT";

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
        $("#btnAddContributionType").prop("disabled", true);
        $("#btnAddContributionType").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnAddContributionType").prop("disabled", false);
        $("#btnAddContributionType").html(
          "<i class='fa fa-lg fa-save'></i> Add Contribution Type"
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

  // ----------------------- Filling Data into Contribution Type Modal -------------------------
  $(document).on("click", ".btnUpdateContributionType", function (e) {
    e.preventDefault();

    var objectID = $(this).attr("data-id");
    var tn =
      "cDdVc0xyeFYvc0RNaXZwRlY0LzRQU0o2M1VIaVlmR3NDRndjYmtPU0I5ST06OrTyOUECBqEJY3zGpaOdH58=";
    var cm =
      "RDNLc3c1a01WWU1ENS9vQ09FTTlNV24zSUhnRVY1NnJCcUJLSStwTmYxVT06Oh4ml0/mjaWGYKCETJOQft4=";

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

          $("#txtContributionTypeID").val(returned_info[1]);
          $("#txtContributionTypeNameUp").val(returned_info[2]);
          $("#txtContributionTypeAmountUp").val(returned_info[3]);
          $("#txtContributionTypeDescriptionUp").val(returned_info[4]);
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

  //------------------------ Update Contribution type modal ------------------------------------
  $("#updateContributionTypeForm").on("submit", function (e) {
    e.preventDefault();

    var vl =
      $("#txtContributionTypeID").val() +
      "###" +
      $("#txtContributionTypeNameUp").val() +
      "###" +
      $("#txtContributionTypeAmountUp").val() +
      "###" +
      $("#txtContributionTypeDescriptionUp").val() +
      "###" +
      $("#txtContributionTypeUpdateDate").val() +
      "###" +
      $("#txtContributionTypeUpdateDate").val();
    var cm =
      "YUZYMnMxSitlbzNqN3dIQ2JZa1NyMHZURUg3ZEFwQmYzeXgvVXNBd3oxQUtsR2p5VGNpZjRtUi8wZGc5WVVVdkp6NlhsZFVXL2MyL3Z5RHVjcEFUNlM2cWhDN0xGdTZRTDY5WURGYzRzb3ZmSEF3ZVI2MGcvd0d5emJjZFRSMTNNZDVpR3llOWlaUnRKZEZPNVlETHZGUWRZSS9XalZGWWVKYmJZVmZoN0xzPTo6vj89qpX4bw1VhYl3gzZbiA==";
    var tn =
      "cDdVc0xyeFYvc0RNaXZwRlY0LzRQU0o2M1VIaVlmR3NDRndjYmtPU0I5ST06OrTyOUECBqEJY3zGpaOdH58=";
    var commandType = "update_command";
    var hasFile = "No";
    var objName = "Contribution type";

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
        $("#btnUpdateInvestmentType").prop("disabled", true);
        $("#btnUpdateInvestmentType").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnUpdateInvestmentType").prop("disabled", false);
        $("#btnUpdateInvestmentType").html(
          "<i class='fa fa-lg fa-pencil'></i> Update Investment Type"
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

  // ----------------------- Deleting Contribution Type Data -----------------------------------
  $(document).on("click", ".btnDeleteContributionType", function (e) {
    e.preventDefault();

    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var tn =
      "cDdVc0xyeFYvc0RNaXZwRlY0LzRQU0o2M1VIaVlmR3NDRndjYmtPU0I5ST06OrTyOUECBqEJY3zGpaOdH58=";
    var cm =
      "RDNLc3c1a01WWU1ENS9vQ09FTTlNV24zSUhnRVY1NnJCcUJLSStwTmYxVT06Oh4ml0/mjaWGYKCETJOQft4=";
    var commandType = "delete_command";
    var objName = "Contribution type";

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
        text: "You want to delete this contribution type permenantly?",
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
            "Contribution type deletion has been cancelled",
            "error"
          );
        }
      }
    );
  });

  // ====================== End of Contribution Type Management Section ========================

  // ====================== Start of Member Management Section =================================

  // ---------- Fetch contribution amount when a contribution is selected ---------------------
  $(document).on(
    "change",
    "#cmbMembersMemberContributionType, #cmbMembersMemberContributionTypeUp",
    function () {
      var selectedContribution = $(this).val();
      if (selectedContribution == "") {
        $("#txtMembersContributionAmount, #txtMembersContributionAmountUp").val(
          ""
        );
      } else {
        var objectID = selectedContribution;
        var post = { action: "fetch_contribution_amount", objectID: objectID };
        $.ajax({
          method: "POST",
          url: "api/main.php",
          data: post,
          dataType: "JSON",
          success: function (data) {
            var Message = data.Message;
            var status = data.Status;
            if (status == true) {
              $(
                "#txtMembersContributionAmount, #txtMembersContributionAmountUp"
              ).val(Message);
            }
          },
          error: function (data) {},
        });
      }
    }
  );

  // ------------------------------- Register Member Modal ------------------------------------
  $("#registerMemberForm").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    var vl =
      $("#txtMembersMemberName").val() +
      "###" +
      $("#txtMembersBirthPlace").val() +
      "###" +
      $("#txtMembersBirthDate").val() +
      "###" +
      $("#cmbMembersSex").val() +
      "###" +
      $("#cmbMembersMaritalStatus").val() +
      "###" +
      $("#cmbMembersJobStatus").val() +
      "###" +
      $("#cmbMembersProfessionalExperience").val() +
      "###" +
      $("#txtMembersTeachingSubjects").val() +
      "###" +
      $("#txtMembersReasonForJoining").val() +
      "###" +
      $("#cmbMembersMemberContributionType").val() +
      "###" +
      $("#txtMembersMemberAddress").val() +
      "###" +
      $("#txtMembersTelephoneNo").val() +
      "###" +
      $("#txtMembersEmailAddress").val() +
      "###" +
      $("#txtMembersTelephoneNo").val() +
      "###" +
      1 +
      "###" +
      0 +
      "###" +
      $("#txtMembersRegisteredBy").val() +
      "###" +
      $("#txtMembersRegisterDate").val() +
      "###" +
      "-" +
      "###" +
      "-";
    var hasFile = "Yes";
    var files = "photoMember";
    var tn = "Mk54M0FaM0lnaFpOekNOcjBZZWtGZz09OjptBYRby/yaU1+fl45WZucY";
    var commandType = "insert_command";
    var objName = "Member";
    var objPre = "MB";

    formData.append("action", "ins_upd_del_everything");
    formData.append("vl", vl);
    formData.append("hasFile", hasFile);
    formData.append("files", files);
    formData.append("photoMember", $("#memberPhoto")[0].files[0]);
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
        $("#btnRegisterMember").prop("disabled", true);
        $("#btnRegisterMember").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait..."
        );
      },
      success: function (data) {
        $("#btnRegisterMember").prop("disabled", false);
        $("#btnRegisterMember").html(
          "<i class='fa fa-lg fa-save'></i> Register Member"
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

  // ------------------------------- Filling Data into Member Modal -------------------------
  $(document).on("click", ".btnUpdateMember", function (e) {
    e.preventDefault();

    var objectID = $(this).attr("data-id");
    var tn = "Mk54M0FaM0lnaFpOekNOcjBZZWtGZz09OjptBYRby/yaU1+fl45WZucY";
    var cm = "WlF6cWQ1NHFTcGJReWwra0lsR1o2Zz09Ojp9KICEkXEJJNmTidZQyNYe";

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

          $("#txtMembersMemberIddd").val(returned_info[1]);
          $("#txtMembersMemberNameUp").val(returned_info[2]);
          $("#txtMembersBirthPlaceUp").val(returned_info[3]);
          $("#txtMembersBirthDateUp").val(returned_info[4]);
          $("#cmbMembersSexUp")
            .select2()
            .val(returned_info[5])
            .trigger("change");
          $("#cmbMembersMaritalStatusUp")
            .select2()
            .val(returned_info[6])
            .trigger("change");
          $("#cmbMembersJobStatusUp")
            .select2()
            .val(returned_info[7])
            .trigger("change");
          $("#cmbMembersProfessionalExperienceUp")
            .select2()
            .val(returned_info[8])
            .trigger("change");
          $("#txtMembersTeachingSubjectsUp").val(returned_info[9]);
          $("#txtMembersReasonForJoiningUp").val(returned_info[10]);
          $("#cmbMembersMemberContributionTypeUp")
            .select2()
            .val(returned_info[11])
            .trigger("change");
          $("#txtMembersMemberAddressUp").val(returned_info[12]);
          $("#txtMembersTelephoneNoUp").val(returned_info[13]);
          $("#txtMembersEmailAddressUp").val(returned_info[14]);
          $("#photoMemberUpdate").val(returned_info[22]);
          $("#memberTargetUp").attr("src", returned_info[22]);
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

  // ------------------------------- Update Member Modal ------------------------------------
  $("#updateMemberForm").on("submit", function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    var vl =
      $("#txtMembersMemberIddd").val() +
      "###" +
      $("#txtMembersMemberNameUp").val() +
      "###" +
      $("#txtMembersBirthPlaceUp").val() +
      "###" +
      $("#txtMembersBirthDateUp").val() +
      "###" +
      $("#cmbMembersSexUp").val() +
      "###" +
      $("#cmbMembersMaritalStatusUp").val() +
      "###" +
      $("#cmbMembersJobStatusUp").val() +
      "###" +
      $("#cmbMembersProfessionalExperienceUp").val() +
      "###" +
      $("#txtMembersTeachingSubjectsUp").val() +
      "###" +
      $("#txtMembersReasonForJoiningUp").val() +
      "###" +
      $("#cmbMembersMemberContributionTypeUp").val() +
      "###" +
      $("#txtMembersMemberAddressUp").val() +
      "###" +
      $("#txtMembersTelephoneNoUp").val() +
      "###" +
      $("#txtMembersEmailAddressUp").val() +
      "###" +
      $("#txtMembersUpdatedBy").val() +
      "###" +
      $("#txtMembersUpdateDate").val();
    var cm =
      "Qk5XNmU4a0hQMFU0eU5RUlgvNTVLaklaODAyNnhrdlA5N3ZTM2hKV0s4NU0zS2xNc0lrMU9kYnJzMFRxcm9OYjllZzRnSUhtL2tKQVJIT2tsdzNhODBIZFh0SlJWbE1PTVlhM0x2U2h5bjdrYUpkb3REdEwwbzFWbGlvdGRIVE4rT3Y4UHBZd2t0TTBuck95YndBL0pwcjAwWkF3NTMycjFYNDhpTTdObDIraGhiUHQxbVMrb0pramRMLzdJK05hbVlvS2ViR1FGdS9VZjRxZ3RHY2drcXhrYkxNaDZjb05GMkpvY0ptY25ZaEpVUkF0dU9IMWFFYWF4c0VxRC9tSkc1cWlVSC8zS0VTTXZwRUkxdmFJQy82ODNNOUlxZGZRWGtjNktBQUp4ZTZ2dWRFdlNiVkYrUXRRWkRSQ0pCb1o4azYrZ3p6SzNPbGtkK1ppaTVlVi9RPT06OnZruwonbJXbl1ve8scfKuY=";
    var photoNames = $("#photoMemberUpdate").val();
    var docNames = ""; // Means no documents in this update
    var hasFile = "Yes";
    var files = "photoMemberUpdate";
    var tn = "Mk54M0FaM0lnaFpOekNOcjBZZWtGZz09OjptBYRby/yaU1+fl45WZucY";
    var commandType = "update_command";
    var objName = "Member";

    formData.append("action", "ins_upd_del_everything");
    formData.append("vl", vl);
    formData.append("cm", cm);
    formData.append("hasFile", hasFile);
    formData.append("files", files);
    formData.append("photoMemberUpdate", $("#memberPhotoUp")[0].files[0]);
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
        $("#btnUpdateMember").prop("disabled", true);
        $("#btnUpdateMember").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait"
        );
      },
      success: function (data) {
        $("#btnUpdateMember").prop("disabled", false);
        $("#btnUpdateMember").html(
          "<i class='fa fa-lg fa-pencil'></i> Update Member"
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

  // ------------------------------- Deleting Member Data -----------------------------------
  $(document).on("click", ".btnDeleteMember", function (e) {
    e.preventDefault();

    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var tn = "Mk54M0FaM0lnaFpOekNOcjBZZWtGZz09OjptBYRby/yaU1+fl45WZucY";
    var cm = "WlF6cWQ1NHFTcGJReWwra0lsR1o2Zz09Ojp9KICEkXEJJNmTidZQyNYe";
    var commandType = "delete_command";
    var objName = "Member";

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
        title: "Are you sure",
        text: "You want to delete this member?",
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
          swal("Cancelled", "Member deletion has been cancelled", "");
        }
      }
    );
  });

  // ------------------------------- Update Member Profile Modal ------------------------------------
  $("#updateMemberPortalForm").on("submit", function (e) {
    console.log("hhhhhh");

    e.preventDefault();

    var formData = new FormData(this);
    var vl =
      $("#MemberProfileMemberid").val() +
      "###" +
      $("#txtMemberPortalBirthPlace").val() +
      "###" +
      $("#txtMemberPortalBirthDate").val() +
      "###" +
      $("#cmbMemberPortalMemberSex").val() +
      "###" +
      $("#cmbMemberPortalMemberMaritalStatus").val() +
      "###" +
      $("#cmbMemberPortalMemberJobStatus").val() +
      "###" +
      $("#cmbMemberPortalMemberProfessionalExperience").val() +
      "###" +
      $("#txtMemberPortalMemberTeachingSubjects").val() +
      "###" +
      $("#txtMemberPortalReasonForJoining").val() +
      "###" +
      $("#txtMemberPortalMemberAddress").val() +
      "###" +
      $("#txtMemberPortalTelephoneNo").val() +
      "###" +
      $("#txtMemberPortalEmailAddress").val() +
      "###" +
      $("#MemberProfileMemberid").val() +
      "###" +
      $("#txtMemberProfilePemberUpdateDate").val();
    var cm =
      "dCs3ZHdFbmp1TFJZM3cyQnpTWGlGRjdmVlhHUE5rendrbjFsRjlSbzdTODhqWFZsWXFjYTEzdlQ5QTljVkx5emxCWDVWYXJKTjh2eEhpMnIyWjdXRWRHS3ZxaFdsclhDVlh6eHgrdTBEaHFUZjUrOEFRQ2Z6TGk5Z1I0WmY0NTJub0wzTkc3TkxSbm5ma0FKRnhiTHM3d2NnYVJTQ3ZUa0JUaDFVbFdGeUlIcmgvWlVPYjROalVmbU5hWWRmSnNaWEs4Y1NkSS9MK0I0SUF0d1lSRGIxTTczVFk1MDE1RnFxRWZjRmdsOVExV0hkTkFwaEE5UURsWkhUWFpZZ2l5eGZDTVV6bHVlNDBMNlJKMjdGWHl1QnpGWUcxakdOT1NzTjIxS1R3RkplMVk9OjqRO4uSRRZmHLHJkaQiCvrd";
    var photoNames = $("#photoMembersPortalMemberPhotoUpdate").val();
    var docNames = ""; // Means no documents in this update
    var hasFile = "Yes";
    var files = "photoMembersPortalMemberPhotoUpdate";
    var tn = "Mk54M0FaM0lnaFpOekNOcjBZZWtGZz09OjptBYRby/yaU1+fl45WZucY";
    var commandType = "update_command";
    var objName = "Member Information";

    formData.append("action", "ins_upd_del_everything");
    formData.append("vl", vl);
    formData.append("cm", cm);
    formData.append("hasFile", hasFile);
    formData.append("files", files);
    formData.append(
      "photoMembersPortalMemberPhotoUpdate",
      $("#membersPortalMemberPhoto")[0].files[0]
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
        $("#btnUpdateMyInformation").prop("disabled", true);
        $("#btnUpdateMyInformation").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait"
        );
      },
      success: function (data) {
        $("#btnUpdateMyInformation").prop("disabled", false);
        $("#btnUpdateMyInformation").html(
          "<i class='fa fa-lg fa-refresh'></i> Update Information"
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

  // ====================== End of Customer Management Section ===============================

  // ------------------------------- Filling Data into New Member Passcode  Modal -------------------------
  $(document).on("click", ".btnUpdateMemberPasscode", function (e) {
    e.preventDefault();

    var objectID = $(this).attr("data-id");
    var tn = "eERjemV6ekN1Mm1oTjZnYndYTFB0Zz09Ojq6eReLMrWg2kjR/NauebcD";
    var cm = "VTNwbkJHbWFTMEM4SXBKWjRLVFZ0Zz09Ojr6HvXBwAaIdt1His3JCO2S";

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

          $("#txtNewMemberPasscodeID").val(returned_info[1]);
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

  //------------------------ Update New Member Passcode  modal------------------------------------
  $("#updateMemberPasscodeForm").on("submit", function (e) {
    e.preventDefault();

    var vl =
      $("#txtNewMemberPasscodeID").val() +
      "###" +
      $("#txtNewMemberPasscodeUp").val() +
      "###" +
      $("#txtNewMembersPasscodeUpdatedBy").val() +
      "###" +
      $("#txtNewMembersPasscodeUpdateDate").val();
    var cm =
      "a2Q1VHZMdEpvdkNyZEJOMXNoZlVjTVFaUTFFaW43NFRFMjFnYWd4ckR0d3lneHlpa2ZiQzhkSzh2d0tjM1Y5VlRyZXBlNDZoU25vUTBtUm02R2JWcnc9PTo68klecLUnVYwFZo439GYrzA==";
    var tn = "eERjemV6ekN1Mm1oTjZnYndYTFB0Zz09Ojq6eReLMrWg2kjR/NauebcD";
    var commandType = "update_command";
    var hasFile = "No";
    var objName = "Member Passcode";

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
        $("#btnChangeNewMemberPasscode").prop("disabled", true);
        $("#btnChangeNewMemberPasscode").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnChangeNewMemberPasscode").prop("disabled", false);
        $("#btnChangeNewMemberPasscode").html(
          "<i class='fa fa-lg fa-pencil'></i> Change Passcode"
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

  // ====================== Start of Contribution Charges Section ============================

  // ----------------- Fetch contribution amount when a contribution is selected -------------
  $(document).on("change", "#cmbGetContributionTypeToCharge", function () {
    var selectedContribution = $(this).val();
    if (selectedContribution == "") {
      $("#txtContributionAmountToCharge").val("");
      $("#cmbContributionChargeYear").select2().val("").trigger("change");
      $("#cmbContributionChargeMonths").select2().val("").trigger("change");
      $("#txtContributionTotalAmountToCharge").val("");
    } else {
      var objectID = selectedContribution;
      var post = { action: "fetch_contribution_amount", objectID: objectID };
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: post,
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            $("#txtContributionAmountToCharge").val(Message);
            $("#cmbContributionChargeYear").select2().val("").trigger("change");
            $("#cmbContributionChargeMonths")
              .select2()
              .val("")
              .trigger("change");
            $("#txtContributionTotalAmountToCharge").val("");
          }
        },
        error: function (data) {},
      });
    }
  });

  // ----------------- Select month and calculate the total amount to charge -----------------
  $(document).on("change", "#cmbContributionChargeMonths", function () {
    var selectedMonths = $(this).val();
    var amountToCharge = $("#txtContributionAmountToCharge").val();

    if (selectedMonths == "" || amountToCharge == "") {
      $("#txtContributionTotalAmountToCharge").val("");
    } else {
      var totalToCharge = selectedMonths * amountToCharge;
      $("#txtContributionTotalAmountToCharge").val(totalToCharge);
    }
  });

  // ----------------- Search Members To Charge Contributions For ----------------------------
  $("#contributionChargeSearchForm").submit(function (e) {
    e.preventDefault();

    var contributionType = $("#cmbGetContributionTypeToCharge").val();
    var contributionAmount = $("#txtContributionAmountToCharge").val();
    var contributionYear = $("#cmbContributionChargeYear").val();
    var contributionMonths = $("#cmbContributionChargeMonths").val();
    var contributionTotalAmount = $(
      "#txtContributionTotalAmountToCharge"
    ).val();

    //This is a global variables to hold the data to be charged for contribution
    contribution_yearss = contributionYear;
    contribution_months = contributionMonths;
    contribution_total_amount = contributionTotalAmount;

    var post = {
      action: "fetch_members_to_charge_contribution_for",
      contributionType: contributionType,
      contributionAmount: contributionAmount,
      contributionYear: contributionYear,
      contributionMonths: contributionMonths,
      contributionTotalAmount: contributionTotalAmount,
    };

    $.ajax({
      type: "POST",
      url: "api/main.php",
      data: post,
      dataType: "text",
      beforeSend: function () {
        $("#btnSearchMembersToCharge").prop("disabled", true);
        $("#btnSearchMembersToCharge").html(
          "<i class='fa fa-spinner fa-pulse' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
      },
      success: function (response) {
        $("#btnSearchMembersToCharge").prop("disabled", false);
        $("#btnSearchMembersToCharge").html(
          "<i class='fa fa-search' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
        $("#members_contribution_charge_area").html(response);
      },
    });
  });

  // ------------------- Check All Members To Charge Contributions For -----------------------
  $(document).on("change", "#memberChargeCheckAll", function () {
    if ($(this).is(":checked")) {
      var checkNoCheckBox = $("input:checkbox[id=memberChargeCheck]").length;
      if (checkNoCheckBox <= 0) {
        //Dont show the Charge All Button if there are no checkboxes
      } else {
        $(".showHideMemberChargeBtn").show();
        $(".allMembersCharge :checkbox").prop("checked", true);
        $("#chargeAllMemberContributions").html(
          '<i class="fa fa-send"></i> Charge All'
        );
      }
    } else {
      $(".showHideMemberChargeBtn").hide();
      $(".allMembersCharge :checkbox").prop("checked", false);
      $("#chargeAllMemberContributions").html(
        '<i class="fa fa-send"></i> Charge All'
      );
    }
  });

  // ------------------- Check/UnCheck Some Members To Charge Contributions For --------------
  $(document).on("change", "#memberChargeCheck", function () {
    var allEmpCheckBox = $("input:checkbox[id=memberChargeCheck]").length;
    var checkAllEmpCheck = $("#memberChargeCheck:checked").length;

    if (checkAllEmpCheck <= 0) {
      $("#memberChargeCheckAll").prop("checked", false);
      $("#chargeAllMemberContributions").html(
        '<i class="fa fa-send"></i> Charge All'
      );
      $(".showHideMemberChargeBtn").hide();
    } else if (checkAllEmpCheck == allEmpCheckBox) {
      $(".showHideMemberChargeBtn").show();
      $("#memberChargeCheckAll").prop("checked", true);
      $("#chargeAllMemberContributions").html(
        '<i class="fa fa-send"></i> Charge All'
      );
    } else {
      $(".showHideMemberChargeBtn").show();
      $("#memberChargeCheckAll").prop("checked", false);
      $("#chargeAllMemberContributions").html(
        '<i class="fa fa-send"></i> Charge Selected'
      );
    }
  });

  // ------------------- Charge Member Contributions -----------------------------------------
  $("#chargeAllMemberContributions").on("click", function () {
    var selectedMembersToCharge = "";

    $("input[name='memberChargeCheck']:checked").each(function () {
      selectedMembersToCharge += this.value + "###";
    });

    var membersToBeCharged = selectedMembersToCharge.slice(0, -3);

    var post = {
      action: "charge_members_contribution",
      membersToBeCharged: membersToBeCharged,
      contribution_yearss: contribution_yearss,
      contribution_months: contribution_months,
      contribution_total_amount: contribution_total_amount,
    };

    swal(
      {
        title: "Are you sure ?",
        text: "You want to charge these contributions?",
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
          swal(
            "Charge Cancelled",
            "Contribution charges has been cancelled",
            "error"
          );
        }
      }
    );
  });

  // ----------------------- Cancelling Charged Contributions Data ---------------------------
  $(document).on("click", ".btnCancelChargedContribution", function (e) {
    e.preventDefault();

    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var tn =
      "emk2SnBTOGx1TzUyK2Y2Q3lUQm04UXd1Mk5lczZPbTJOVVR6SFA0VFZtYz06Ou3Vxk+39Gwl7mQcDsMfYGc=";
    var cm =
      "K3Naa2xJVjdEOURwVXJaV1lLdTAvT0pBSkVOakYwTVhZUTFOcTB3QXBiSGM4cjFKQzVkTFhqa1pLQ1R6UlllMlNKOXhmcFZnK2sxTTRQUDE0OFJVdEltaFk4UlYwM0s3WUpVbUtoNDExdUU9OjoZjT6gCARoauCsNEiUiX5f";
    var commandType = "update_command";
    var hasFile = "No";
    var objName = "Contribution";

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
        text: "You want to cancel this charged contribution?",
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
                  "Charged contribution has been cancelled successfully",
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
            "Contribution cancelletion has been cancelled",
            "error"
          );
        }
      }
    );
  });

  // ----------------------- Deleting Charged Contribution Data ------------------------------
  $(document).on("click", ".btnDeleteChargedContribution", function (e) {
    e.preventDefault();
    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var cm =
      "eFgyZkNBa0lyQ1krNjMxUnRMcFp0bWNxdFNSTTY2Wm9rb0s5UExicXM4UT06OpmBkoMipROYsRXo28ZdgGE=";
    var tn =
      "emk2SnBTOGx1TzUyK2Y2Q3lUQm04UXd1Mk5lczZPbTJOVVR6SFA0VFZtYz06Ou3Vxk+39Gwl7mQcDsMfYGc=";
    var commandType = "delete_command";
    var objName = "Contribution";
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
        text: "You want to delete this contribution permenently?",
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
            "Contribution deletion has been cancelled",
            "error"
          );
        }
      }
    );
  });

  // ====================== End of Contribution Charges Section ==============================

  // ====================== Start of Member Payments Section =================================

  // -------------------- Fetch member depts amount when a member is selected ----------------
  $(document).on("change", "#cmbMemberPaymentsMemberName", function () {
    var selectedMember = $(this).val();
    if (selectedMember == "") {
      $("#txtMemberPaymentsDeptAmount").val(0);
      $("#txtMemberPaymentsPaidAmount").val("");
      $("#txtMemberPaymentsAmountWords").val("");
      $("#txtMemberPaymentsRemainAmount").val(0);
      $("#cmbMemberPaymentsAccountName").select2().val("").trigger("change");
      $("#txtMemberPaymentsAccountNumber").val("");
    } else {
      var objectID = selectedMember;
      var post = { action: "calculate_member_depts", objectID: objectID };
      $.ajax({
        method: "POST",
        url: "api/main.php",
        data: post,
        dataType: "JSON",
        success: function (data) {
          var Message = data.Message;
          var status = data.Status;
          if (status == true) {
            $("#txtMemberPaymentsDeptAmount").val(Message);
            $("#txtMemberPaymentsPaidAmount").val("");
            $("#txtMemberPaymentsAmountWords").val("");
            $("#txtMemberPaymentsRemainAmount").val(Message);
            $("#cmbMemberPaymentsAccountName")
              .select2()
              .val("")
              .trigger("change");
            $("#txtMemberPaymentsAccountNumber").val("");
          }
        },
        error: function (data) {},
      });
    }
  });

  // -------------------- Calculate remaining balance ----------------------------------------
  $(document).on("focusout", "#txtMemberPaymentsPaidAmount", function () {
    var paidAmount = parseFloat($(this).val());
    var totalDeptAmount = parseFloat($("#txtMemberPaymentsDeptAmount").val());
    var totalRemaining;

    if (paidAmount === null) {
      $("#txtMemberPaymentsRemainAmount").val(totalDeptAmount);
      $("#txtMemberPaymentsAmountWords").val("");
    } else if (totalDeptAmount === "") {
      $("#txtMemberPaymentsRemainAmount").val(0);
    } else {
      totalRemaining = Math.round((totalDeptAmount - paidAmount) * 100) / 100;
      $("#txtMemberPaymentsRemainAmount").val(totalRemaining);
      $("#txtMemberPaymentsAmountWords").val(moneyValueToWords($(this).val()));
    }
  });

  // --------------------- Fill the account no when account to is changed --------------------
  $(document).on("change", "#cmbMemberPaymentsAccountName", function () {
    var selectedAccountNo = $(this).val();

    if (selectedAccountNo === "") {
      $("#txtMemberPaymentsAccountNumber").val("");
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
            $("#txtMemberPaymentsAccountNumber").val(Message);
          }
        },
        error: function (data) {},
      });
    }
  });

  // --------------------- Register member payment -------------------------------------------
  $("#registerMemberPaymentForm").on("submit", function (e) {
    e.preventDefault();

    var vl =
      $("#cmbMemberPaymentsMemberName").val() +
      "###" +
      $("#cmbMemberPaymentsAccountName").val() +
      "###" +
      "N/A" +
      "###" +
      "N/A" +
      "###" +
      "0" +
      "###" +
      $("#txtMemberPaymentsPaidAmount").val() +
      "###" +
      $("#txtMemberPaymentsPaymentRemarks").val() +
      "###" +
      "1" +
      "###" +
      "1" +
      "###" +
      $("#txtMemberPaymentsRegisteredBy").val() +
      "###" +
      $("#txtMemberPaymentsRegisterDate").val() +
      "###" +
      "-" +
      "###" +
      "-";
    var hasFile = "No";
    var tn =
      "emk2SnBTOGx1TzUyK2Y2Q3lUQm04UXd1Mk5lczZPbTJOVVR6SFA0VFZtYz06Ou3Vxk+39Gwl7mQcDsMfYGc=";
    var commandType = "insert_command";
    var objName = "Member payment";
    var objPre = "PYMB";

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
        $("#btnRegisterMemberPayment").prop("disabled", true);
        $("#btnRegisterMemberPayment").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait..."
        );
      },
      success: function (data) {
        $("#btnRegisterMemberPayment").prop("disabled", false);
        $("#btnRegisterMemberPayment").html(
          "<i class='fa fa-lg fa-save'></i> Register Payment"
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

  // ----------------------- Cancelling Member Payment Data ----------------------------------
  $(document).on("click", ".btnCancelMemberPayment", function (e) {
    e.preventDefault();

    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var tn =
      "emk2SnBTOGx1TzUyK2Y2Q3lUQm04UXd1Mk5lczZPbTJOVVR6SFA0VFZtYz06Ou3Vxk+39Gwl7mQcDsMfYGc=";
    var cm =
      "K3Naa2xJVjdEOURwVXJaV1lLdTAvT0pBSkVOakYwTVhZUTFOcTB3QXBiSGM4cjFKQzVkTFhqa1pLQ1R6UlllMlNKOXhmcFZnK2sxTTRQUDE0OFJVdEltaFk4UlYwM0s3WUpVbUtoNDExdUU9OjoZjT6gCARoauCsNEiUiX5f";
    var commandType = "update_command";
    var hasFile = "No";
    var objName = "Member payment";

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
        text: "You want to cancel this member payment?",
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
                  "Member payment has been cancelled successfully",
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
            "Member payment cancelletion has been cancelled",
            "error"
          );
        }
      }
    );
  });

  // ------------------- Deleting Member Payments --------------------------------------------
  $(document).on("click", ".btnDeleteMemberPayment", function (e) {
    e.preventDefault();
    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var cm =
      "eFgyZkNBa0lyQ1krNjMxUnRMcFp0bWNxdFNSTTY2Wm9rb0s5UExicXM4UT06OpmBkoMipROYsRXo28ZdgGE=";
    var tn =
      "emk2SnBTOGx1TzUyK2Y2Q3lUQm04UXd1Mk5lczZPbTJOVVR6SFA0VFZtYz06Ou3Vxk+39Gwl7mQcDsMfYGc=";
    var commandType = "delete_command";
    var objName = "Member payment";
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
        text: "You want to delete this member payment permenently?",
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
            "Member payment deletion has been cancelled",
            "error"
          );
        }
      }
    );
  });

  // ====================== End of Member Payments Section ===================================

  // ====================== Start of Member Profile Section ==================================

  // ----------------------- Adding Member qualifications ---------------------------

  $(".graduationDate").hide();

  $(document).on("change", "#qualificationStatus", function () {
    var selectedGradStat = $(this).val();

    if (selectedGradStat == "Graduated") {
      $(".graduationDate").fadeIn();
    } else {
      $(".graduationDate").fadeOut();
      $("#graduationDate").val("---");
    }
  });

  $("#obtainedPercentage")
    .keypress(function (event) {
      if (
        (event.which != 46 ||
          (event.which == 46 && $(this).val() == "") ||
          $(this).val().indexOf(".") != -1) &&
        (event.which < 48 || event.which > 57)
      ) {
        event.preventDefault();
      }
    })
    .on("paste", function (event) {
      event.preventDefault();
    });

  // ----------------------- Register Member qualifications -------------------

  $("#addQualificationForm").on("submit", function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    var vl =
      $("#memberrrIddQualification").val() +
      "###" +
      $("#qualificationLevel").val() +
      "###" +
      $("#institutionGraduated").val() +
      "###" +
      $("#graduatedFaculty").val() +
      "###" +
      $("#qualificationStatus").val() +
      "###" +
      $("#graduationDate").val() +
      "###" +
      $("#obtainedPercentage").val() +
      "###" +
      $("#qualificationRegDate").val();
    var hasFile = "Yes";
    var files = "docQualification1";
    var tn =
      "aTAvRWQwSXNFSzNqRFltSmh2MVpsaDVOcEtvNXJSN01jaHh1OHc5WXJ0MD06OoIMAZ1b8VSJWyqLOxRDZdM=";
    var commandType = "insert_command";
    var objName = "Member qualification";
    var objPre = "QUA";
    formData.append("action", "ins_upd_del_everything");
    formData.append("vl", vl);
    formData.append("hasFile", hasFile);
    formData.append("files", files);
    formData.append(
      "docQualification1",
      $("#uploadCertificateTestimoni")[0].files[0]
    );
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
        $("#btnAddQualification").prop("disabled", true);
        $("#btnAddQualification").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnAddQualification").prop("disabled", false);
        $("#btnAddQualification").html(
          "<i class='fa fa-fw fa-lg fa-plus'> </i> Add Qualification"
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

  // ----------------------- Deleting Qualification Information ---------------------
  $(document).on("click", ".btnDeleteQualification", function (e) {
    e.preventDefault();

    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var cm = "cFF0MTFmeXladk9raGxxdDJZTWFFdz09OjqHKIJIxIljIXRJoN0ioDVR";
    var tn =
      "aTAvRWQwSXNFSzNqRFltSmh2MVpsaDVOcEtvNXJSN01jaHh1OHc5WXJ0MD06OoIMAZ1b8VSJWyqLOxRDZdM=";
    var commandType = "delete_command";
    var objName = "Member qualification";

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
        title: "Are you sure ?",
        text: "You want to delete this " + objName + "?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete!",
        cancelButtonText: "No, don't delete!",
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
          swal("Cancelled", objName + " deletion cancelled.", "error");
        }
      }
    );
  });

  // ----------------------- End of Member qualifications -------------------------

  // ----------------------- Start of work experiences ----------------------------

  $(".workLeftDate").hide();

  $(document).on("change", "#workStatus", function () {
    var selectedWorkStat = $(this).val();

    if (selectedWorkStat == "Working") {
      $(".workLeftDate").fadeOut();
      $("#workLeftDate").attr("type", "text");
      $("#workLeftDate").val("---");
    } else {
      $(".workLeftDate").fadeIn();
      $("#workLeftDate").attr("type", "date");
    }
  });

  // ----------------------- Add work experiences ----------------------------

  $("#addWorkExperienceForm").on("submit", function (e) {
    e.preventDefault();
    var vl =
      $("#memberrrIddWorkExperience").val() +
      "###" +
      $("#workExperienceType").val() +
      "###" +
      $("#employerName").val() +
      "###" +
      $("#titlePosition").val() +
      "###" +
      $("#workStartDate").val() +
      "###" +
      $("#workStatus").val() +
      "###" +
      $("#workLeftDate").val() +
      "###" +
      $("#workExperienceRegDate").val();
    var hasFile = "No";
    var tn =
      "aUloK3VoUEZ5bEhmNWx1b3J5ZUI2R21GRUthRk9LRU53S2VYTXJNL2hOOD06OoxTv9aBdgX77TUKKigQJAQ=";
    var commandType = "insert_command";
    var objName = "Work experience";
    var objPre = "WEX";
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
        $("#btnAddWorkExperience").prop("disabled", true);
        $("#btnAddWorkExperience").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnAddWorkExperience").prop("disabled", false);
        $("#btnAddWorkExperience").html(
          "<i class='fa fa-fw fa-lg fa-plus'></i> Add Work Experience"
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

  // ----------------------- Deleting Work experience Information ---------------------
  $(document).on("click", ".btnDeleteWorkExperience", function (e) {
    e.preventDefault();

    const deleteBtnID = $(this).attr("id");
    var vl = $(this).attr("data-id");
    var cm =
      "L3NPazVFNnVLRmNrMVBkSVdwZk9rdXNFdFZhZGRxd0hwYW42V2M2V0NWcz06OsPprSpINhZU0sYBM1tIMzs=";
    var tn =
      "aUloK3VoUEZ5bEhmNWx1b3J5ZUI2R21GRUthRk9LRU53S2VYTXJNL2hOOD06OoxTv9aBdgX77TUKKigQJAQ=";
    var commandType = "delete_command";
    var objName = "Work experience";

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
        title: "Are you sure ?",
        text: "You want to delete this " + objName + "?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete!",
        cancelButtonText: "No, don't delete!",
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
          swal("Cancelled", objName + " deletion cancelled.", "error");
        }
      }
    );
  });

  // ====================== End of Member Profile Section ====================================

  // ========================== Start of Member Change Password ==============================

  // ----------------------- Compare password mactch in confirm password ---------------------
  $(document).on("focusout", "#memberConfirmPassChange", function () {
    var pass = $("#memberPass1Change").val();
    if ($(this).val() != pass) {
      bs4pop.notice(
        "<i class='fa fa-exclamation-triangle text-danger'></i> &nbsp; Password and confirm password must match each other, please check!",
        { type: "warning", position: "topright", appendType: "append" }
      );
      $("#btnmemberChangePassword").prop("disabled", true);
    } else {
      $("#btnmemberChangePassword").prop("disabled", false);
    }
  });
  $(document).on("keyup", "#memberConfirmPassChange", function () {
    var pass = $("#memberPass1Change").val();
    if ($(this).val() == pass) {
      $("#btnMemberChangePassword").prop("disabled", false);
    } else {
      $("#btnMemberChangePassword").prop("disabled", true);
    }
  });

  $("#memberChangePasswordForm").submit(function (e) {
    e.preventDefault();
    var oldPassChange = $("#memberOldPasswordChange").val();
    var newPassChange = $("#memberPass1Change").val();
    var confPassChange = $("#memberConfirmPassChange").val();
    var post = {
      action: "member_change_password",
      oldPassChange: oldPassChange,
      newPassChange: newPassChange,
      confPassChange: confPassChange,
    };

    $.ajax({
      method: "POST",
      url: "api/main.php",
      data: post,
      dataType: "JSON",
      beforeSend: function () {
        $("#btnMemberChangePassword").prop("disabled", true);
        $("#btnMemberChangePassword").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait"
        );
      },
      success: function (data) {
        $("#btnMemberChangePassword").prop("disabled", false);
        $("#btnMemberChangePassword").html(
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

  // ========================== End of member Change Password ===============================

  // ====================== Start of System's Special Report ================================

  // ---------------------- Members Report Section -----------------------------------
  $("#customMemberReportDate").prop("checked", true);
  $("#memberReportStartFrom").prop("readonly", true);
  $("#memberReportEndToo").prop("readonly", true);

  $("#customMemberReportDate").on("change", function () {
    if ($(this).is(":checked")) {
      $("#memberReportStartFrom").prop("readonly", true);
      $("#memberReportStartFrom").val("");
      $("#memberReportEndToo").prop("readonly", true);
      $("#memberReportEndToo").val("");
    } else {
      $("#memberReportStartFrom").prop("readonly", false);
      $("#memberReportEndToo").prop("readonly", false);
    }
  });

  $("#membersReportForm").on("submit", function (e) {
    e.preventDefault();
    var memberNameMembersReport = $("#cmbPatientReportName").val();
    var strDateMembersReport = $("#memberReportStartFrom").val();
    var endTooMembersReport = $("#memberReportEndToo").val();

    $.ajax({
      type: "POST",
      url: "api/main.php",
      data: {
        action: "members_report",
        memberNameMembersReport: memberNameMembersReport,
        strDateMembersReport: strDateMembersReport,
        endTooMembersReport: endTooMembersReport,
      },
      dataType: "text",
      beforeSend: function () {
        $("#btnMemberReport").prop("disabled", true);
        $("#btnMemberReport").html(
          "<i class='fa fa-spinner fa-pulse' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
      },
      success: function (response) {
        $("#btnMemberReport").prop("disabled", false);
        $("#btnMemberReport").html(
          "<i class='fa fa-search' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
        $("#membersReportSectionArea").html(response);
      },
    });
  });

  $(document).on("click", "#printMemberChargesReport", function () {
    //Display and open the print dialog box to print the report
    var memberChargesReportRestorePage = document.body.innerHTML;
    var memberChargesReportPrintArea = document.getElementById(
      "memberChargesPrintArea"
    ).innerHTML;
    document.body.innerHTML = memberChargesReportPrintArea;
    window.print();
    document.body.innerHTML = memberChargesReportRestorePage;
  });

  // ---------------------- Member Charges Report Section -----------------------------------
  $("#customDateMemberChargesReport").prop("checked", true);
  $("#startFromMemberChargesReport").prop("readonly", true);
  $("#endToMemberChargesReport").prop("readonly", true);

  $("#customDateMemberChargesReport").on("change", function () {
    if ($(this).is(":checked")) {
      $("#startFromMemberChargesReport").prop("readonly", true);
      $("#startFromMemberChargesReport").val("");
      $("#endToMemberChargesReport").prop("readonly", true);
      $("#endToMemberChargesReport").val("");
    } else {
      $("#startFromMemberChargesReport").prop("readonly", false);
      $("#endToMemberChargesReport").prop("readonly", false);
    }
  });

  $("#searchMemberhargesReportForm").on("submit", function (e) {
    e.preventDefault();
    var memberNameMemberChargesReport = $(
      "#cmbMemberNameMemberChargesReport"
    ).val();
    var contributionYearMemberChargesReport = $(
      "#cmbContributionYearMemberChargesReport"
    ).val();
    var strDateMemberChargesReport = $("#startFromMemberChargesReport").val();
    var endTooMemberChargesReport = $("#endToMemberChargesReport").val();

    $.ajax({
      type: "POST",
      url: "api/main.php",
      data: {
        action: "member_charges_report",
        memberNameMemberChargesReport: memberNameMemberChargesReport,
        contributionYearMemberChargesReport:
          contributionYearMemberChargesReport,
        strDateMemberChargesReport: strDateMemberChargesReport,
        endTooMemberChargesReport: endTooMemberChargesReport,
      },
      dataType: "text",
      beforeSend: function () {
        $("#btnSearchMemberChargesReport").prop("disabled", true);
        $("#btnSearchMemberChargesReport").html(
          "<i class='fa fa-spinner fa-pulse' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
      },
      success: function (response) {
        $("#btnSearchMemberChargesReport").prop("disabled", false);
        $("#btnSearchMemberChargesReport").html(
          "<i class='fa fa-search' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
        $("#memberChargesReportSection").html(response);
      },
    });
  });

  $(document).on("click", "#printMemberChargesReport", function () {
    //Display and open the print dialog box to print the report
    var memberChargesReportRestorePage = document.body.innerHTML;
    var memberChargesReportPrintArea = document.getElementById(
      "memberChargesPrintArea"
    ).innerHTML;
    document.body.innerHTML = memberChargesReportPrintArea;
    window.print();
    document.body.innerHTML = memberChargesReportRestorePage;
  });

  // ---------------------- Member Payments Report Section ---------------------------------
  $("#customDateMemberPaymentReport").prop("checked", true);
  $("#startFromMemberPaymentsReport").prop("readonly", true);
  $("#endToMemberPaymentsReport").prop("readonly", true);

  $("#customDateMemberPaymentReport").on("change", function () {
    if ($(this).is(":checked")) {
      $("#startFromMemberPaymentsReport").prop("readonly", true);
      $("#startFromMemberPaymentsReport").val("");
      $("#endToMemberPaymentsReport").prop("readonly", true);
      $("#endToMemberPaymentsReport").val("");
    } else {
      $("#startFromMemberPaymentsReport").prop("readonly", false);
      $("#endToMemberPaymentsReport").prop("readonly", false);
    }
  });

  $("#searchMemberPaymentsReportForm").on("submit", function (e) {
    e.preventDefault();
    var memberInfoMemberPaymentsReport = $(
      "#cmbMemberNameMemberPaymentsReport"
    ).val();
    var strDateMemberPaymentsReport = $("#startFromMemberPaymentsReport").val();
    var endTooMemberPaymentsReport = $("#endToMemberPaymentsReport").val();

    $.ajax({
      type: "POST",
      url: "api/main.php",
      data: {
        action: "member_payments_report",
        memberInfoMemberPaymentsReport: memberInfoMemberPaymentsReport,
        strDateMemberPaymentsReport: strDateMemberPaymentsReport,
        endTooMemberPaymentsReport: endTooMemberPaymentsReport,
      },
      dataType: "text",
      beforeSend: function () {
        $("#btnSearchMemberPaymentsReport").prop("disabled", true);
        $("#btnSearchMemberPaymentsReport").html(
          "<i class='fa fa-spinner fa-pulse' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
      },
      success: function (response) {
        $("#btnSearchMemberPaymentsReport").prop("disabled", false);
        $("#btnSearchMemberPaymentsReport").html(
          "<i class='fa fa-search' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
        $("#memberPaymentsReportSection").html(response);
      },
    });
  });

  $(document).on("click", "#printMembersPaymentReport", function () {
    //Display and open the print dialog box to print the report
    var memberPaymentsReportRestorePage = document.body.innerHTML;
    var memberPaymentsReportPrintArea = document.getElementById(
      "memberPaymentsPrintArea"
    ).innerHTML;
    document.body.innerHTML = memberPaymentsReportPrintArea;
    window.print();
    document.body.innerHTML = memberPaymentsReportRestorePage;
  });

  // ------------------ Member Charge History Section ------------------------------------
  $("#customDateMemberChargeHistory").prop("checked", true);
  $("#startFromMemberChargeHistory").prop("readonly", true);
  $("#endToMemberChargeHistory").prop("readonly", true);

  $("#customDateMemberChargeHistory").on("change", function () {
    if ($(this).is(":checked")) {
      $("#startFromMemberChargeHistory").prop("readonly", true);
      $("#startFromMemberChargeHistory").val("");
      $("#endToMemberChargeHistory").prop("readonly", true);
      $("#endToMemberChargeHistory").val("");
    } else {
      $("#startFromMemberChargeHistory").prop("readonly", false);
      $("#endToMemberChargeHistory").prop("readonly", false);
    }
  });

  $("#searchMemberChargeHistoryForm").on("submit", function (e) {
    e.preventDefault();
    var strDateContributionChargeHistory = $(
      "#startFromMemberChargeHistory"
    ).val();
    var endTooContributionChargeHistory = $("#endToMemberChargeHistory").val();

    $.ajax({
      type: "POST",
      url: "api/main.php",
      data: {
        action: "member_charge_history",
        strDateContributionChargeHistory: strDateContributionChargeHistory,
        endTooContributionChargeHistory: endTooContributionChargeHistory,
      },
      dataType: "text",
      beforeSend: function () {
        $("#btnSearchMemberChargeHistory").prop("disabled", true);
        $("#btnSearchMemberChargeHistory").html(
          "<i class='fa fa-spinner fa-pulse' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
      },
      success: function (response) {
        $("#btnSearchMemberChargeHistory").prop("disabled", false);
        $("#btnSearchMemberChargeHistory").html(
          "<i class='fa fa-search' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
        $("#memberChargeHistorySection").html(response);
      },
    });
  });

  $(document).on("click", "#printMemberChargeHistory", function () {
    //Display and open the print dialog box to print the report
    var memberChargeHistoryRestorePage = document.body.innerHTML;
    var memberChargeHistoryPrintArea = document.getElementById(
      "memberChargeHistoryPrintArea"
    ).innerHTML;
    document.body.innerHTML = memberChargeHistoryPrintArea;
    window.print();
    document.body.innerHTML = memberChargeHistoryRestorePage;
  });

  // ------------------ Member Payment History Section ---------------------------------
  $("#customDatePaymentPaymentHistory").prop("checked", true);
  $("#startFromMemberPaymentHistory").prop("readonly", true);
  $("#endToMemberPaymentHistory").prop("readonly", true);

  $("#customDatePaymentPaymentHistory").on("change", function () {
    if ($(this).is(":checked")) {
      $("#startFromMemberPaymentHistory").prop("readonly", true);
      $("#startFromMemberPaymentHistory").val("");
      $("#endToMemberPaymentHistory").prop("readonly", true);
      $("#endToMemberPaymentHistory").val("");
    } else {
      $("#startFromMemberPaymentHistory").prop("readonly", false);
      $("#endToMemberPaymentHistory").prop("readonly", false);
    }
  });

  $("#searchMemberPaymentHistoryForm").on("submit", function (e) {
    e.preventDefault();
    var strDateMemberPaymentHistory = $("#startFromMemberPaymentHistory").val();
    var endTooMemberPaymentHistory = $("#endToMemberPaymentHistory").val();

    $.ajax({
      type: "POST",
      url: "api/main.php",
      data: {
        action: "member_payment_history",
        strDateMemberPaymentHistory: strDateMemberPaymentHistory,
        endTooMemberPaymentHistory: endTooMemberPaymentHistory,
      },
      dataType: "text",
      beforeSend: function () {
        $("#btnSearchMemberPaymentHistory").prop("disabled", true);
        $("#btnSearchMemberPaymentHistory").html(
          "<i class='fa fa-spinner fa-pulse' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
      },
      success: function (response) {
        $("#btnSearchMemberPaymentHistory").prop("disabled", false);
        $("#btnSearchMemberPaymentHistory").html(
          "<i class='fa fa-search' style='font-size: 18px; margin-left: 5px; margin-bottom: 3px;'></i>"
        );
        $("#memberPaymentHistorySection").html(response);
      },
    });
  });

  $(document).on("click", "#printInvestorPaymentHistory", function () {
    //Display and open the print dialog box to print the report
    var investorPaymentHistoryRestorePage = document.body.innerHTML;
    var investorPaymentHistoryPrintArea = document.getElementById(
      "investorPaymentHistoryPrintArea"
    ).innerHTML;
    document.body.innerHTML = investorPaymentHistoryPrintArea;
    window.print();
    document.body.innerHTML = investorPaymentHistoryRestorePage;
  });
});

// -------------------------------- Fill Contribution Types Compobox ----------------------
function fillContributionType() {
  $.ajax({
    method: "POST",
    url: "api/main.php",
    data: { action: "fill_contribution_types" },
    dataType: "JSON",
    success: function (data) {
      var Message = data.Message;
      var status = data.Status;
      var html = "";
      if (status == true) {
        html += `<option value="">-- Choose type --</option>`;
        Message.forEach(function (contribution_types_data, i) {
          html += `<option value="${contribution_types_data["contributionTypeID"]}">${contribution_types_data["contributionTypeName"]}</option>`;
        });
        $(
          "#cmbMembersMemberContributionType, #cmbMembersMemberContributionTypeUp, #cmbGetContributionTypeToCharge"
        ).html(html);
      }
    },
    error: function (data) {},
  });
}
function fillDepartment() {
  $.ajax({
    method: "POST",
    url: "api/main.php",
    data: { action: "fill_doctor_department" },
    dataType: "JSON",
    success: function (data) {
      var Message = data.Message;
      var status = data.Status;
      var html = "";
      if (status == true) {
        html += `<option value="">-- Choose department --</option>`;
        Message.forEach(function (department_data, i) {
          html += `<option value="${department_data["department_id"]}">${department_data["department_name"]}</option>`;
        });
        $(
          "#cmDepartmentName, #cmDepartmentNameU,#cmDiseaseDepartmentName,#cmDiseaseDepartmentNameU"
        ).html(html);
      }
    },
    error: function (data) {},
  });
}

function fillDiseases() {
  $.ajax({
    method: "POST",
    url: "api/main.php",
    data: { action: "fill_diseases" },
    dataType: "JSON",
    success: function (data) {
      var Message = data.Message;
      var status = data.Status;
      var html = "";
      if (status == true) {
        html += `<option value="">-- Choose diseases --</option>`;
        Message.forEach(function (disease_data, i) {
          html += `<option value="${disease_data["disease_id"]}">${disease_data["disease_name"]}</option>`;
        });
        $("#cmbDiseasesName, #cmbDiseasesNameU").html(html);
      }
    },
    error: function (data) {},
  });
}

function fillPatientName() {
  $.ajax({
    method: "POST",
    url: "api/main.php",
    data: { action: "fill_patients" },
    dataType: "JSON",
    success: function (data) {
      var Message = data.Message;
      var status = data.Status;
      var html = "";
      if (status == true) {
        html += `<option value="">-- Choose Patient --</option>`;
        Message.forEach(function (patient_data, i) {
          html += `<option value="${patient_data["patient_id"]}">${patient_data["patient_name"]}</option>`;
        });
        $("#cmbPatientName,#cmbPatientReportName,#cmbPatientNameU").html(html);
      }
    },
    error: function (data) {},
  });
}

function fillReportPatientsName() {
  $.ajax({
    method: "POST",
    url: "api/main.php",
    data: { action: "fill_patients" },
    dataType: "JSON",
    success: function (data) {
      var Message = data.Message;
      var status = data.Status;
      var html = "";
      if (status == true) {
        html += `<option value="">-- Choose Patient --</option>`;
        Message.forEach(function (patient_data, i) {
          html += `<option value="${patient_data["patient_id"]}">${patient_data["patient_name"]}</option>`;
        });
        $("#cmbPatientName,#cmbPatientReportName,#cmbPatientNameU").html(html);
      }
    },
    error: function (data) {},
  });
}

function fillPatientsNameOnlyReport() {
  $.ajax({
    method: "POST",
    url: "api/main.php",
    data: { action: "fill_patients_only" },
    dataType: "JSON",
    success: function (data) {
      var Message = data.Message;
      var status = data.Status;
      var html = "";
      if (status == true) {
        html += `<option value="">General (All)</option>`;
        Message.forEach(function (active_members_data, i) {
          html += `<option value="${active_members_data["memberID"]}">${active_members_data["memberID"]} - ${active_members_data["memberName"]} - (${active_members_data["memberTelephone"]})</option>`;
        });
        $("#cmbPatientReportName").html(html);
      }
    },
    error: function (data) {},
  });
}

function fillDoctorName() {
  $.ajax({
    method: "POST",
    url: "api/main.php",
    data: { action: "fill_doctor_name" },
    dataType: "JSON",
    success: function (data) {
      var Message = data.Message;
      var status = data.Status;
      var html = "";
      if (status == true) {
        html += `<option value="">-- Choose  Doctor --</option>`;
        Message.forEach(function (doctor_data, i) {
          html += `<option value="${doctor_data["doctor_id"]}">${doctor_data["doctor_name"]}</option>`;
        });
        $("#cmbDoctorNameApp, #cmbDoctorNameAppU").html(html);
      }
    },
    error: function (data) {},
  });
}

function fillDoctorPatientsList() {
  $.ajax({
    method: "POST",
    url: "api/main.php",
    data: { action: "fill_doctor_patients_list" },
    dataType: "JSON",
    success: function (data) {
      var Message = data.Message;
      var status = data.Status;
      var html = "";
      if (status == true) {
        html += `<option value="">-- Choose  Appointment Patients --</option>`;
        Message.forEach(function (doctor_patients_list_data, i) {
          html += `<option value="${doctor_patients_list_data["patient_id"]}">${doctor_patients_list_data["patient_name"]}</option>`;
        });
        $("#cmPatientNameApp, #cmPatientNameApp").html(html);
      }
    },
    error: function (data) {},
  });
}

function fillAppointmentFee() {
  $.ajax({
    method: "POST",
    url: "api/main.php",
    data: { action: "fill_appointment_fee" },
    dataType: "JSON",
    success: function (data) {
      var Message = data.Message;
      var status = data.Status;
      var html = "";
      if (status == true) {
        html += `<option value="">-- Choose  Appointment Patients --</option>`;
        Message.forEach(function (appointment_fee_data, i) {
          html += `<option value="${appointment_fee_data["department_id"]}">${appointment_fee_data["appointment_fee"]}</option>`;
        });
        $("#txtChargeAppointmentFee, #txtChargeAppointmentFeeU").html(html);
      }
    },
    error: function (data) {},
  });
}

// -------------------------------- Fill Active Members Compobox ----------------------
function fillActiveMembersOnly() {
  $.ajax({
    method: "POST",
    url: "api/main.php",
    data: { action: "fill_active_members_only" },
    dataType: "JSON",
    success: function (data) {
      var Message = data.Message;
      var status = data.Status;
      var html = "";
      if (status == true) {
        html += `<option value="">-- Select member name --</option>`;
        Message.forEach(function (active_members_data, i) {
          html += `<option value="${active_members_data["memberID"]}">${active_members_data["memberID"]} - ${active_members_data["memberName"]} - (${active_members_data["memberTelephone"]})</option>`;
        });
        $("#cmbMemberPaymentsMemberName, #cmbMembersReportMemberName").html(
          html
        );
      }
    },
    error: function (data) {},
  });
}

// -------------------------------- Fill Active Members Compobox ----------------------
function fillActiveMembersOnlyReport() {
  $.ajax({
    method: "POST",
    url: "api/main.php",
    data: { action: "fill_active_members_only" },
    dataType: "JSON",
    success: function (data) {
      var Message = data.Message;
      var status = data.Status;
      var html = "";
      if (status == true) {
        html += `<option value="">General (All)</option>`;
        Message.forEach(function (active_members_data, i) {
          html += `<option value="${active_members_data["memberID"]}">${active_members_data["memberID"]} - ${active_members_data["memberName"]} - (${active_members_data["memberTelephone"]})</option>`;
        });
        $(
          "#cmbMemberNameMemberChargesReport, #cmbMemberNameMemberPaymentsReport"
        ).html(html);
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
  return str.trim() + " Dollar(s)";
}

tbl_catagory = 0;

$("#AddNewCatagory").click(function (e) {
  e.preventDefault();
  tbl_catagory += 1;
  $("#CatagoryArea").after(
    "<div class='row CatagoryClass' style='margin: 0px;' id='CatagoryArea" +
      tbl_catagory +
      "'><div class='form-group col-md-5'><input class='form-control' type='text' name='txtCatagoryName[]' id='txtCatagoryName" +
      tbl_catagory +
      "' placeholder='Enter Catagory Name " +
      tbl_catagory +
      "' maxlength='40' required></div><div class='form-group col-md-5'><input class='form-control' type='text' name='txtCatagoryDescription[]' id='txtCatagoryDescription" +
      tbl_catagory +
      "' placeholder='Enter Catagory Description " +
      tbl_catagory +
      "' maxlength='40' required></div><div class='form-group col-md-2' align='left'><a class='btn btn-danger btn-md' href='#'  id='removeCatagoryOnce' data-id='" +
      tbl_catagory +
      "' style='padding-bottom: 8px; padding-top: 7px;'> &nbsp;<i class='fa fa-close fa-lg'></i></a></div></div>"
  );
  $("#AddCatagory").attr("disabled", false);
  $("#txtCatagoryName" + tbl_catagory + "").focus();
});

$(document).on("click", "#removeCatagoryOnce", function (e) {
  e.preventDefault();
  var thisID = $(this).attr("data-id");
  $("#CatagoryArea" + thisID + "").remove();
});

// --------------------------------------------------------------
$("#RegsiterExamCatForm").submit(function (e) {
  e.preventDefault();
  var formData = $(this).serialize() + "&action=" + "Register_Exam_Catgories";
  $.ajax({
    url: "api/main.php",
    method: "POST",
    data: formData,
    beforeSend: function () {
      $("#AddCatagory").prop("disabled", true);
      $("#AddCatagory").html(
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
        console.log(Message);
      }
    },
    error: function (data) {
      console.log(data);
    },
  });
});

// ----------------------- Deleting Department Data -----------------------------------
$(document).on("click", ".btnDeleteExam_Catagory", function (e) {
  e.preventDefault();

  const deleteBtnID = $(this).attr("id");
  var vl = $(this).attr("data-id");
  alert(vl);
  var tn = "R1VvclY2YmVhMm81Z2d3WlpuSmxLZz09Ojr/RWWv6Ex72AB7bu06rRuD";
  var cm = "WllBbnZFZk1YeWdKeEpobkZNa0RTQT09Ojq4Csdknp7XV0aaDAPA/YoY";
  var commandType = "delete_command";
  var objName = "This Catagory Name ";

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
      text: "You want to delete this Department permenantly?",
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
        swal("Cancelled", "Catagory deletion has been cancelled", "error");
      }
    }
  );
});
 $(document).on("click", ".btnUpdateExam_Catagory", function (e) {
    e.preventDefault();

    var objectID = $(this).attr("data-id");
    var tn = "R1VvclY2YmVhMm81Z2d3WlpuSmxLZz09Ojr/RWWv6Ex72AB7bu06rRuD";
    var cm = "S0pNL0VqRjVVUVhDeCthQUV0L3ZEZz09OjozMSE75I8gPXO0DMVAtI6q";

    var post = {
      action: "fetch_parameterized_everything",
      dn: dn,
      tn: tn,
      cm: cm,
      objectID: objectID,
    };

    // $(".modal-body").load(objectID);

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
          $("#txtExam_CatagoryId").val(returned_info[1]);
          $("#txtExam_CatagoryName").val(returned_info[2]);
          $("#txtEx_CatagoryDescription").val(returned_info[3]);
          // $("#txtUpdatedUser").val(returned_info[5]);
          // $("#txtUpdateDate").val(returned_info[6]);
          btnAction = "Update";
          $("#btnRegisterExam_Catagory").prop("disabled", false);
          $("#btnRegisterExam_Catagory").html(
            "<i class='fa fa-lg fa-save'></i> Save Changes"
          );
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