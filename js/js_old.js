//Global variables of the system
var dn = "d01VUGl0SnNDaDRYVEo1Y2tlYTRndz09OjrOVWA8OKOWhSYv42V0i4xG";

$(document).ready(function () {
	
	//Global events of the system
	$("#telNo").bind("keypress", function (e) {
        var keyCode = e.which ? e.which : e.keyCode;            
        if (!(keyCode >= 48 && keyCode <= 57)) {
            return false;
        }
    });

	//Global functions of the system
	fillEmpNameUsers();
	FillEmpNameEmployeesReport();

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
		$("#mainMenuArea").after("<div class='row mainMenusClass' style='margin: 0px;' id='mainMenuArea" + mainMenuCount + "'><div class='form-group col-md-3'><input class='form-control' type='text' name='mainMenuText[]' id='mainMenuText"+ mainMenuCount + "' placeholder='Enter Main Menu Text " + mainMenuCount + "' maxlength='25' required></div><div class='form-group col-md-3'><input class='form-control' type='text' name='mainMenuIcon[]' id='mainMenuIcon"+ mainMenuCount + "' placeholder='Enter Main Menu Icon' maxlength='40' required></div><div class='form-group col-md-5'><input class='form-control' type='text' name='mainMenuLink[]' id='mainMenuLink"+ mainMenuCount + "' placeholder='Enter Main Menu Link (URL)' maxlength='100' required></div><div class='form-group col-md-1' align='left'><a class='btn btn-danger btn-md' href='#'  id='removeMenuOnce' data-id='"+ mainMenuCount + "' style='padding-bottom: 8px; padding-top: 7px;'> &nbsp;<i class='fa fa-close fa-lg'></i></a></div></div>");
		$("#addNewMainMenuBtn").attr("disabled", false);
		$("#mainMenuText"+ mainMenuCount + "").focus();
	});
	
	// ----------------------- Add new main menu ----------------------------------------------------------------
	$("#addNewMainMenuForm").submit(function (e) {

		e.preventDefault();
		
		var formData = $(this).serialize() + "&action=" + "addNewMainMenu";

		$.ajax({
			url : "api/main.php",
			method: "POST",
			data: formData,
			success : function(data) {
				var Message = data.Message;
				var status = data.Status;

				if (status == true) {
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					swal("", Message, "error");
				}				
			},
			error : function(data){ }
		})

	});
	
	// ----------------------- Clicking on the edit main menu icon and fetch to update ---------------------------
	$(document).on("click", ".updateMainMenu", function(e) {
		
		e.preventDefault();

		var thisMainMenu = $(this).attr("data-id");
		$( ".modal-body" ).load(thisMainMenu);		//This is to refresh the modal after paganitaion tab change
		
		$.ajax({
			url: 'api/main.php',
			type: 'POST',
			data: {"action" : "fetchMainMenu", "thisMainMenu" : thisMainMenu},
			dataType:"JSON",
			success: function(rs){
				
				var Message = rs.Message;
				var status = rs.Status;
				
				if (status == true) {
					var getMainMenu = Message.split('***');
					$("#main_menu_id").val(getMainMenu[0]);
					$("#updateMainMenuText").val(getMainMenu[1]);
					$("#updateMainMenuIcon").val(getMainMenu[2]);
					$("#updateMainMenuLink").val(getMainMenu[3]);
				}
			}
		});

	});
	
	// ----------------------- Update main menu ------------------------------------------------------------------
	$("#updateMainMenuForm").submit(function (e) {
		
		e.preventDefault();	
		
		var update_m_m_id = $("#main_menu_id").val();
		var update_m_m_text = $("#updateMainMenuText").val();
		var update_m_m_icon = $("#updateMainMenuIcon").val();
		var update_m_m_link = $("#updateMainMenuLink").val();

		var post = {
			"action" : "updateMainMenu", 
			"update_m_m_id" : update_m_m_id, 
			"update_m_m_text": update_m_m_text, 
			"update_m_m_icon" : update_m_m_icon, 
			"update_m_m_link": update_m_m_link
		};
		
		$.ajax({
			method: "POST",
			url : "api/main.php",
			data: post,
			dataType: "JSON",
			success : function(data) {
				
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					swal("", Message, "error");
				} 
				
				
			},
			error : function(data){ }
		})

	});
	
	// ----------------------- Update main menu mode change to ALLOWED or NOT ALLOWED -----------------------------------
	$(document).on("change", "#allowMainMenu", function() {
		
		var thisAllowMain = $(this).attr('data-id');
		
		if (this.checked) {
			
			$.ajax({
				method: "POST",
				url : "api/main.php",
				data: {"action" : "mainMenuAllowed", "thisAllowMain" : thisAllowMain},
				dataType: "JSON",
				success : function(data){
					var Message = data.Message;
					var status = data.Status;
					if (status == true) {
						bs4pop.notice("<i class='fa fa-check-circle'></i> &nbsp;" + Message, {type: "success", position: "bottomright", appendType: "append"});
						setTimeout(function () {
							location.reload();
						}, 1000);
					} else {
						swal("", Message, "error");
					} 
				},
				error : function(data){ }
			})
			
		} else {
			
			$.ajax({
				method: "POST",
				url : "api/main.php",
				data: {"action" : "mainMenuNotAllowed", "thisAllowMain" : thisAllowMain},
				dataType: "JSON",
				success : function(data){
					var Message = data.Message;
					var status = data.Status;
					if (status == true) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + Message, {type: "danger", position: "bottomright", appendType: "append"});
						setTimeout(function () {
							location.reload();
						}, 1000);
					} else {
						swal("", Message, "error");
					} 
				},
				error : function(data){ }
			})
			
		}
	});
	
	// ----------------------- Change main menu rank -------------------------------------------------------------
	$(document).on("change", ".mainMRank", function() {
				
		var mainMenuID = $(this).attr('data-id');
		var mainMenuRank = $(this).val();

		$.ajax({
			method: "POST",
			url : "api/main.php",
			data: {"action" : "changeMainMenuRank", "mainMenuID" : mainMenuID, "mainMenuRank": mainMenuRank},
			dataType: "JSON",
			success : function(data){
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {
					//swal("Success", Message, "success");
					bs4pop.notice("<i class='fa fa-check-circle'></i> <b>Main-menu</b> rank changed to <b>" + mainMenuRank + "</b>", {type: "success", position: "bottomright", appendType: "append"});
					setTimeout(function () {
						location.reload();
					}, 1000);
				} else {
					swal("", Message, "error");
				} 
			},
			error : function(data){ }
		})
	
	});
	
	// ----------------------- Remove dynamically added main menu textboxes in the popup modal ---------------
	$(document).on("click", "#removeMenuOnce", function (e) {
		var thisID = $(this).attr("data-id");
		e.preventDefault();
		$("#mainMenuArea"+ thisID + "").remove();
	});
	
	// ----------------------- Delete main menu --------------------------------------------------------------
	$('.mainMenuDeletion').on('click', function(e){
		e.preventDefault();
		const getMainMenu = $(this).attr('data-src');
		const getMainMenuID = $(this).attr('data-id');
		swal ({

			title: "Are you sure ?",
			text: "You want to delete " + getMainMenu +" Menu?",
			type: "success",
			showCancelButton: true,
			confirmButtonText: "Yes, delete it!",
			cancelButtonText: "No, don't delete!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			
			if (isConfirm) {
			
				$.ajax({    
					method: "POST", url : "api/main.php", data: {"action" : "deleteMainMenu", "getMainMenuID" : getMainMenuID}, dataType: "JSON",
					success : function(data){
						var Message = data.Message;
						var status = data.Status;
						if (status == true) {
							swal ({
							title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
						}, function(isConfirm) {
							if (isConfirm) { location.reload(); }
						});
						} else {
							swal("", Message, "error");
						}
					},
					error : function(data){ }
				})
			} else {
				swal("Cancelled", getMainMenu + " menu deletion cancelled.", "error");
			}
		});
	});
			
	// >>>>>>>>>>>>>>>>>>>>>>> Sub Menu Activities >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	
	// ----------------------- Add dynamic sub menu textboxes to the popup modal -----------------------------
	$("#addNewSubMenu").click(function (e) {
		e.preventDefault();
		subMenuCount += 1;
		$("#subMenuArea").after("<div class='row subMenusClass' style='margin: 0px;' id='subMenuArea" + subMenuCount + "'><div class='form-group col-md-3'><input class='form-control' type='text' name='subMenuText[]' id='subMenuText"+ subMenuCount + "' placeholder='Enter Sub Menu Text " + subMenuCount + "' maxlength='25' required></div><div class='form-group col-md-2'><input class='form-control' type='text' name='subMenuIcon[]' id='subMenuIcon"+ subMenuCount + "' placeholder='Enter Sub Menu Icon' maxlength='40' required></div><div class='form-group col-md-4'><input class='form-control' type='text' name='subMenuLink[]' id='mainMenuLink"+ subMenuCount + "' placeholder='Enter Sub Menu Link (URL)' maxlength='100' required></div><div class='form-group col-md-2'><select class='form-control' name='selectMainMenuID[]' id='selectMainMenuID' data-id='" + subMenuCount + "' style='font-size: 16px;' required></select></div><div class='form-group col-md-1' align='left'><a class='btn btn-danger btn-md' href='#'  id='removeSubMenuOnce' data-id='"+ subMenuCount + "' style='padding-bottom: 8px; padding-top: 7px;'> &nbsp;<i class='fa fa-close fa-lg'></i></a></div></div>");				
		fillMainMenu();
		$("#addNewSubMenuBtn").attr("disabled", false);
		$("#subMenuText"+ subMenuCount + "").focus();
	});
	
	// ----------------------- Add new sub menu --------------------------------------------------------------
	$("#addNewSubMenuForm").submit(function (e) {
		
		e.preventDefault();
		
		var formData = $(this).serialize() + "&action=" + "addNewSubMenu";

		$.ajax({
			url : "api/main.php",
			method: "POST",
			data: formData,
			success : function(data) {
				var Message = data.Message;
				var status = data.Status;

				if (status == true) {
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					swal("", Message, "error");
				}
										
			},
			error : function(data){ }
		})

	});
	
	// ----------------------- Clicking on the edit sub menu icon and fetch to update ----------------------------
	$(document).on("click", ".updateSubMenu", function(e) {
		
		e.preventDefault();

		var thisSubMenu = $(this).attr("data-id");
		$(".modal-body").load(thisSubMenu);		//This is to refresh the modal after paganitaion tab change
		
		$.ajax({
			url: 'api/main.php',
			type: 'POST',
			data: {"action" : "fetchSubMenu", "thisSubMenu" : thisSubMenu},
			dataType:"JSON",
			success: function(rs){
				var Message = rs.Message;
				var status = rs.Status;
				
				if (status == true) {
					var getSubMenu = Message.split('***');
					$("#sub_menu_id").val(getSubMenu[0]);
					$("#updateSubMenuText").val(getSubMenu[1]);
					$("#updateSubMenuIcon").val(getSubMenu[2]);
					$("#updateSubMenuLink").val(getSubMenu[3]);
					$("#selectMainMenuIDD").val(getSubMenu[4]);
					$("#MainMenu"+getSubMenu[0]).val(getSubMenu[4]);
				}	
			}
		});

	});
	
	// ----------------------- Update sub menu -------------------------------------------------------------------	
	$("#updateSubMenuForm").submit(function (e) {
		
		e.preventDefault();		
		
		var update_s_m_id = $("#sub_menu_id").val();
		var update_s_m_text = $("#updateSubMenuText").val();
		var update_s_m_icon = $("#updateSubMenuIcon").val();
		var update_s_m_link = $("#updateSubMenuLink").val();
		var select_m_m_id = $("#selectMainMenuIDD").val();
		var originalMainMenu = $("#MainMenu"+update_s_m_id).attr("data-id");
		
		var post = {
			"action" : "updateSubMenus", 
			"update_s_m_id" : update_s_m_id, 
			"update_s_m_text": update_s_m_text, 
			"update_s_m_icon" : update_s_m_icon, 
			"update_s_m_link": update_s_m_link, 
			"select_m_m_id": select_m_m_id,
			"originalMainMenu" : originalMainMenu
		};

		$.ajax({
			method: "POST",
			url : "api/main.php",
			data: post,
			dataType: "JSON",
			success : function(data) {
				
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					swal("", Message, "error");
				} 
				
				
			},
			error : function(data){ }
		})
	});
	
	// ----------------------- Update sub menu mode change to ALLOWED or NOT ALLOWED -------------------------
	$(document).on("change", "#allowSubMenu", function() {
		
		var thisAllowSub = $(this).attr('data-id');
		
		if (this.checked) {
			
			$.ajax({
				method: "POST",
				url : "api/main.php",
				data: {"action" : "subMenuAllowed", "thisAllowSub" : thisAllowSub},
				dataType: "JSON",
				success : function(data){
					var Message = data.Message;
					var status = data.Status;
					if (status == true) {
						bs4pop.notice("<i class='fa fa-check-circle'></i> &nbsp;" + Message, {type: "success", position: "bottomright", appendType: "append"});
						setTimeout(function () {
							location.reload();
						}, 1000);
					} else {
						swal("", Message, "error");
					} 
				},
				error : function(data){ }
			})
			
		} else {
			
			$.ajax({
				method: "POST",
				url : "api/main.php",
				data: {"action" : "subMenuNotAllowed", "thisAllowSub" : thisAllowSub},
				dataType: "JSON",
				success : function(data){
					var Message = data.Message;
					var status = data.Status;
					if (status == true) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + Message, {type: "danger", position: "bottomright", appendType: "append"});
						setTimeout(function () {
							location.reload();
						}, 1000);
					} else {
						swal("", Message, "error");
					} 
				},
				error : function(data){ }
			})
			
		}
	});
	
	// ----------------------- Change sub menu rank --------------------------------------------------------------
	$(document).on("change", ".subMRank", function() {
				
		var subMenuID = $(this).attr('data-id');
		var subMenuRank = $(this).val();
		var mainMenuID = $(this).attr('data-src');		

		$.ajax({
			method: "POST",
			url : "api/main.php",
			data: {"action" : "changeSubMenuRank", "subMenuID" : subMenuID, "subMenuRank": subMenuRank, "mainMenuID": mainMenuID},
			dataType: "JSON",
			success : function(data){
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {
					//swal("Success", Message, "success");
					bs4pop.notice("<i class='fa fa-check-circle'></i> <b>Sub-menu</b> rank changed to <b>" + subMenuRank + "</b>", {type: "success", position: "bottomright", appendType: "append"});
					setTimeout(function () {
						location.reload();
					}, 1000);
				} else {
					swal("", Message, "error");
				} 
			},
			error : function(data){ }
		})
	
	});
	
	// ----------------------- Remove dynamically added sub menu textboxes in the popup modal ----------------
	$(document).on("click", "#removeSubMenuOnce", function (e) {
		e.preventDefault();
		var thisID = $(this).attr("data-id");
		$("#subMenuArea"+ thisID + "").remove();
	});
	
	// ----------------------- Delete sub menu ---------------------------------------------------------------
	$('.subMenuDeletion').on('click', function(e){
		e.preventDefault();
		const href = $(this).attr('href');
		const getSubMenu = $(this).attr('data-src');
		const getSubMenuID = $(this).attr('data-id');
		swal ({

			title: "Are you sure ?",
			text: "You want to delete " + getSubMenu +" Menu?",
			type: "success",
			showCancelButton: true,
			confirmButtonText: "Yes, delete it!",
			cancelButtonText: "No, don't delete!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
			
				$.ajax({    
					method: "POST", url : "api/main.php", data: {"action" : "deleteSubMenu", "getSubMenuID" : getSubMenuID}, dataType: "JSON",
					success : function(data){
						var Message = data.Message;
						var status = data.Status;
						if (status == true) {
							swal ({
							title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
						}, function(isConfirm) {
							if (isConfirm) { location.reload(); }
						});
						} else {
							swal("", Message, "error");
						}
					},
					error : function(data){ }
				})
			} else {
				swal("Cancelled", getSubMenu + " menu deletion cancelled.", "error");
			}
		});
	});

	//================================ End of Manage Menus =========================================================

	//================================ Start of User Privileges =========================================================
	
	fillUserNamesForPriv();
	
	// ----------------------- Fill usernames in the user privileges page ------------------------------------
	$("#userNameForPrivileges").change(function () {

		var thisUser = $(this).val();
		
		if (thisUser == "") {
		
		} else {

			$.ajax({
				url: "api/main.php",
				method: "POST",
				data: {"action" : "fetchUserPrivileges", currentUser : thisUser},
				dataType:"text",
				success:function (result) {
					$(".table-responsive").html(result);
				}
			});					
		}

	});
	
	// ----------------------- Update user main menu mode, set ALLOWED, NOT ALLOWED --------------------------
	$(document).on("change", "#allowUserMainMenu", function() {
		
		var roleUserID = $(this).attr('data-src');
		var thisAllowMain = $(this).attr('data-id');
		
		//alert(roleUserID);
		
		if (this.checked) {
			
			$.ajax({
				method: "POST",
				url : "api/main.php",
				data: {"action" : "userMainMenuAllowed", "thisAllowMain" : thisAllowMain, "roleUserID": roleUserID},
				dataType: "JSON",
				success : function(data){
					var Message = data.Message;
					var status = data.Status;
					if (status == true) {
						//swal("Success", Message, "success");
						bs4pop.notice("<i class='fa fa-check-circle'></i> &nbsp;" + Message, {type: "success", position: "bottomright", appendType: "append"});
					} else {
						swal("", Message, "error");
					} 
				},
				error : function(data){ }
			})
			
		} else {
			
			$.ajax({
				method: "POST",
				url : "api/main.php",
				data: {"action" : "userMainMenuNotAllowed", "thisAllowMain" : thisAllowMain, "roleUserID": roleUserID},
				dataType: "JSON",
				success : function(data){
					var Message = data.Message;
					var status = data.Status;
					if (status == true) {
						//swal("Success", Message, "success");
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + Message, {type: "danger", position: "bottomright", appendType: "append"});
					} else {
						swal("", Message, "error");
					} 
				},
				error : function(data){ }
			})
			
		}
	});
	
	// ----------------------- Update user sub menu mode, set ALLOWED, NOT ALLOWED ---------------------------
	$(document).on("change", "#allowUserSubMenu", function() {
		
		var roleUserID = $(this).attr('data-src');
		var thisAllowSub = $(this).attr('data-id');
		//alert(roleUserID);
		
		if (this.checked) {
			
			$.ajax({
				method: "POST",
				url : "api/main.php",
				data: {"action" : "userSubMenuAllowed", "thisAllowSub" : thisAllowSub, "roleUserID": roleUserID},
				dataType: "JSON",
				success : function(data){
					var Message = data.Message;
					var status = data.Status;
					if (status == true) {
						//swal("Success", Message, "success");
						bs4pop.notice("<i class='fa fa-check-circle'></i> &nbsp;" + Message, {type: "success", position: "bottomright", appendType: "append"});
					} else {
						swal("", Message, "error");
					} 
				},
				error : function(data){ }
			})
			
		} else {
			
			$.ajax({
				method: "POST",
				url : "api/main.php",
				data: {"action" : "userSubMenuNotAllowed", "thisAllowSub" : thisAllowSub, "roleUserID": roleUserID},
				dataType: "JSON",
				success : function(data){
					var Message = data.Message;
					var status = data.Status;
					if (status == true) {
						//swal("Success", Message, "success");
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + Message, {type: "danger", position: "bottomright", appendType: "append"});
					} else {
						swal("", Message, "error");
					} 
				},
				error : function(data){ }
			})
			
		}
	});
	
	// =============================== End of User Privileges ======================================================

	// =============================== Start of Login Process ======================================================

	$("#loginForm").submit(function (e) {
		e.preventDefault();
		
		var user_name = $("#user_Name").val();
		var pass_word = $("#pass_Word").val();
		var post = {"action" : "login_process" , "user_name" : user_name, "pass_word" : pass_word};
		
		$.ajax({
			method: "POST",
			url : "api/main.php",
			data: post,
			dataType: "JSON",
			beforeSend:function(){
				$("#loginNow").prop('disabled', true);
				$("#loginNow").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait");
			},
			success : function(data) {
				$("#loginNow").prop('disabled', false);
				$("#loginNow").html("<i class='fa fa-sign-in fa-lg fa-fw'></i>SIGN IN");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {		
					location = "dashboard";
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}      
		})
	});

	// ============================ End of Login Process ============================================================

	// ============================ Start of Employees Information Section ==========================================

	// ----------------------- Register Employee Modal ---------------------

	$("#registerEmployeeForm").on('submit', function (e) {
		e.preventDefault();
		
		var formData = new FormData(this);

		var vl = $("#employeeName").val() + "###" + $("#birthPlace").val() + "###" + $("#birthDate").val() + "###" + $("#employeeTitle").val() + "###" + $("#employeeSalary").val() + "###" + $("#hireDate").val() + "###" + $("#identiDocType").val() + "###" + $("#empAddress").val() + "###" + $("#telNo").val() + "###" + $("#empEmailAddress").val() + "###" + $("#empStatus").val() + "###" + $("#registerDate").val();

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
		formData.append("docEmp1", $("#identificationDoc")[0].files[0]);
		formData.append("photoNames", photoNames);
		formData.append("docNames", docNames);
		formData.append("commandType", commandType);
		formData.append("tn", tn);
		formData.append("objName", objName);
		formData.append("objPre", objPre);

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			beforeSend:function(){
				$("#regEmployee").prop('disabled', true);
				$("#regEmployee").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait");
			},
			success: function(data) {
				$("#regEmployee").prop('disabled', false);
				$("#regEmployee").html("<i class='fa fa-lg fa-save'></i> Register Employee");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});

	// ----------------------- Filling Data into Employee Modal ---------------------
	$(document).on("click", ".btnUpdateEmployee", function (e) {
		e.preventDefault();

		var objectID = $(this).attr("data-id");
		var tn = "S2tLajZpRzNneVFwMVg2M0ladkxWUT09OjqvGV6loHhOl7kpdvi9HGFc";
		var cm = "dzlNVkQwTW1HTDRvakRkWUxNK0c2Zz09OjrE8fnc/RFCOfa/raoRPw2d";

		var post = {
			"action": "fetch_parameterized_everything",
			"dn": dn,
			"tn" : tn,
			"cm" : cm,
			"objectID": objectID
		}

		$(".modal-body").load(objectID);

		$.ajax({
			method: "POST",
			url: "api/main.php",
			data:  post,
			dataType: "JSON",
			success: function(data) {
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {
				
					var returned_info = Message.split("###");
					
					$("#emplIDUp").val(returned_info[1]);
					$("#employeeNameUp").val(returned_info[2]);
					$("#birthPlaceUp").val(returned_info[3]);
					$("#birthDateUp").val(returned_info[4]);
					$("#employeeTitleUp").val(returned_info[5]);
					$("#employeeSalaryUp").val(returned_info[6]);
					$("#hireDateUp").val(returned_info[7]);
					$("#identiDocTypeUp").val(returned_info[8]);
					$("#empAddressUp").val(returned_info[9]);
					$("#telNoUp").val(returned_info[10]);
					$("#empEmailAddressUp").val(returned_info[11]);
					$("#employeeTargetUp").attr("src", returned_info[14]);
					$("#photoEmpUp1").val(returned_info[14]);
					$("#docEmpUp1").val(returned_info[15]);
					$("#empStatusUp").val(returned_info[12]);
					
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ----------------------- Update Employee Modal ---------------------

	$("#employeeUpdateForm").on('submit', function (e) {
		e.preventDefault();
		
		var formData = new FormData(this);

		var vl = $("#emplIDUp").val() + "###" + $("#employeeNameUp").val() + "###" + $("#birthPlaceUp").val() + "###" + $("#birthDateUp").val() + "###" + $("#employeeTitleUp").val() + "###" + $("#employeeSalaryUp").val() + "###" + $("#hireDateUp").val() + "###" + $("#identiDocTypeUp").val() + "###" + $("#empAddressUp").val() + "###" + $("#telNoUp").val() + "###" + $("#empEmailAddressUp").val() + "###" + $("#empStatusUp").val();
		var cm = "Q2IxVC9hNUREV3lWbXB6QTZDdXh1V0JXdUFKc2gycUFGWXBxd1FlUnlFTm51U0hmRE1rQ3FZZk1VKytVSTVmWm9jZ2Jmd3V5T0RERUk3NitwQWt2QjhKTkdLY3dDZWVCTHpBNFBXQk0zWllvVFBUYzkvNXd5SjlpUzZxN3ZJanJYUDNQSU45dTI1cTg5NVBkUEE5ODBTVEYzQ0JCTTdxZ0RLOWZ5d3ZZMElEZHBIdlBOZ3pJb3NHNTJ3a0t5WUlOMHIrTVRma1JOREpUSzJ2eURqSlBGMVNSdFkvV3l2ZmUyeDhhdURMeG03aW9Qdnp5UElnMkQyRDN3VVA0aitHZTo6+SZIVSUirfpkj8JAKHsePQ==";

		var photoNames = $("#photoEmpUp1").val();
		var docNames = $("#docEmpUp1").val();

		var hasFile = "Yes";

		var files = "photoEmpUp1###docEmpUp1";

		var tn = "S2tLajZpRzNneVFwMVg2M0ladkxWUT09OjqvGV6loHhOl7kpdvi9HGFc";
		var commandType = "update_command";

		var objName = "Employee";
		var objPre = "EM";

		formData.append("action", "ins_upd_del_everything");
		formData.append("vl", vl);
		formData.append("cm", cm);
		formData.append("hasFile", hasFile);
		formData.append("files", files);
		formData.append("photoEmpUp1", $("#employeePhotoUp")[0].files[0]);
		formData.append("docEmpUp1", $("#identificationDocUp")[0].files[0]);
		formData.append("photoNames", photoNames);
		formData.append("docNames", docNames);
		formData.append("commandType", commandType);
		formData.append("tn", tn);
		formData.append("objName", objName);
		formData.append("objPre", objPre);

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			beforeSend:function(){
				$("#updateEmployee").prop('disabled', true);
				$("#updateEmployee").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait");
			},
			success: function(data) {
				$("#updateEmployee").prop('disabled', false);
				$("#updateEmployee").html("<i class='fa fa-lg fa-save'></i> Update Employee");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});

	// ----------------------- Deleting Employee Information ---------------------
	$(document).on('click', '.btnDeleteEmployee', function(e){
		e.preventDefault();

		const deleteBtnID = $(this).attr("id");
		var vl = $(this).attr("data-id");
		var cm = "dzlNVkQwTW1HTDRvakRkWUxNK0c2Zz09OjrE8fnc/RFCOfa/raoRPw2d";
		var tn = "S2tLajZpRzNneVFwMVg2M0ladkxWUT09OjqvGV6loHhOl7kpdvi9HGFc";
		var commandType = "delete_command";
		var objName = "Employee";

		var post = {
			"action" : "ins_upd_del_everything",
			"vl" : vl,
			"cm" : cm,
			"tn" : tn,
			"commandType" : commandType,
			"objName" : objName,
		};

		swal ({
			title: "Are you sure ?", text: "You want to delete this "+ objName +"?", type: "warning", showCancelButton: true, confirmButtonText: "Yes, delete!", cancelButtonText: "No, don't delete!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
			    
			    $.ajax({    
					method: "POST", url : "api/main.php", data: post, dataType: "JSON",
					success : function(data){
						var Message = data.Message;
						var status = data.Status;
						if (status == true) {
							swal("", Message, "success");
							$("#" + deleteBtnID).parents("tr").remove();
                        } else {
                            swal("", Message, "error");
                        }
					},
					error : function(data){ }
				})
			} else {
				swal("Cancelled", objName + " deletion cancelled.", "error");
			}
		});

	});

	// ============================ End of Employees Information Section ========================================

	// ============================ Start of Users Information Section ==========================================

	// ----------------------- Register User Modal ---------------------

	$("#registerUserForm").on('submit', function (e) {
		
		e.preventDefault();

		var vl = $("#userEmpID").val() + "###" + $("#userName").val() + "###" + $("#passWord").val() + "###" + $("#registerDate").val() + "###" + $("#userStatus").val();
		
		var hasFile = "No";

		var tn = "WkpyWFh0eVdDUXIrc0Q5VGo5dEpCdz09OjoFI4/87JExUB7/yGHukP2H";
		var commandType = "insert_command";

		var objName = "User";
		var objPre = "US";

		var post = {
			"action" : "ins_upd_del_everything",
			"vl" : vl,
			"hasFile" : hasFile,
			"commandType" : commandType,
			"tn" : tn,
			"objName" : objName,
			"objPre" : objPre
		};

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  post,
			dataType: "JSON",
			beforeSend:function(){
				$("#regUser").prop('disabled', true);
				$("#regUser").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait");
			},
			success: function(data) {
				$("#regUser").prop('disabled', false);
				$("#regUser").html("<i class='fa fa-lg fa-save'></i> Register User");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
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
			"action": "fetch_parameterized_everything",
			"dn": dn,
			"tn" : tn,
			"cm" : cm,
			"objectID": objectID
		}

		$(".modal-body").load(objectID);

		$.ajax({
			method: "POST",
			url: "api/main.php",
			data:  post,
			dataType: "JSON",
			success: function(data) {
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {
				
					var returned_info = Message.split("###");
					
					$("#empUserIDUp").val(returned_info[1]);
					$("#userEmpIDUp").select2().val(returned_info[2]).trigger('change');
					$("#userNameUp").val(returned_info[3]);
					$("#passWordUp").val(returned_info[4]);

				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ----------------------- Update User Modal ---------------------

	$("#updateUserForm").on('submit', function (e) {
		
		e.preventDefault();

		var vl = $("#empUserIDUp").val() + "###" + $("#userEmpIDUp").val() + "###" + $("#passWordUp").val();
		var cm = "KzkxeWdxd0JlREtiWDVyMllVWEJ0Z2lyYU9KZG1hWmt5QTE2bjA2QndDUT06Om++ZxuIBXRoZrmcsbxyIiY=";
		
		var hasFile = "No";

		var tn = "WkpyWFh0eVdDUXIrc0Q5VGo5dEpCdz09OjoFI4/87JExUB7/yGHukP2H";
		var commandType = "update_command";

		var objName = "User";
		var objPre = "US";

		var post = {
			"action" : "ins_upd_del_everything",
			"vl" : vl,
			"cm" : cm,
			"hasFile" : hasFile,
			"commandType" : commandType,
			"tn" : tn,
			"objName" : objName,
			"objPre" : objPre
		};

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  post,
			dataType: "JSON",
			beforeSend:function(){
				$("#regUser").prop('disabled', true);
				$("#regUser").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait");
			},
			success: function(data) {
				$("#regUser").prop('disabled', false);
				$("#regUser").html("<i class='fa fa-lg fa-save'></i> Register User");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});

	// ------------------- Deleting User Information ---------------------
	$(document).on('click', '.btnDeleteUser', function(e){
		
		e.preventDefault();

		const deleteBtnID = $(this).attr("id");
		var vl = $(this).attr("data-id");
		var cm = "MU1jblB5aWpHbVZ1K21tdlQ2UitDZz09OjogoLpCwOglDjCVExm55koz";
		var tn = "eHFyTzI2ckhvVFNOY0R1Z2E1WG5MZz09Ojq9pDH3ZhZhatKqmkea0O6t";
		var commandType = "delete_command";
		var objName = "User";

		var post = {
			"action" : "ins_upd_del_everything",
			"vl" : vl,
			"cm" : cm,
			"tn" : tn,
			"commandType" : commandType,
			"objName" : objName,
		};

		swal ({
			title: "Are you sure ?", text: "You want to delete this " + objName.toLowerCase() + "?", type: "warning", showCancelButton: true, confirmButtonText: "Yes, delete!", cancelButtonText: "No, don't delete!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
			    
			    $.ajax({    
					method: "POST", url : "api/main.php", data: post, dataType: "JSON",
					success : function(data){
						var Message = data.Message;
						var status = data.Status;
						if (status == true) {
							swal("", Message, "success");
							$("#" + deleteBtnID).parents("tr").remove();
                        } else {
                            swal("", Message, "error");
                        }
					},
					error : function(data){ }
				})
			} else {
				swal("Cancelled", objName + " deletion cancelled.", "error");
			}
		});

	});
	
	// ============================ End of Users Information Section ============================================
	
	// ============================ Start of Salaries Section ===================================================
	
	// ------------------- Charging employee salaries -----------------
	
	$("#salaryChargeForm").submit(function (e) {
		e.preventDefault();
		var empNameSalaryCharge = $("#empNameChargeSalaries").val();
		var salMonthSalaryCharge = $("#salaryMonthChargeSalaries").val();
		var post = {"action" : "fetchEmployeeChargeSalary", "salMonthSalChar" : salMonthSalaryCharge};
		
		$.ajax({
			type: "POST",
			url: "api/main.php",
			data: post,
			dataType: "text",
			beforeSend:function(){
				$("#btnChargeSalaries").prop('disabled', true);
				$("#btnChargeSalaries").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait");
			},
			success: function (response) {
				$("#btnChargeSalaries").prop('disabled', false);
				$("#btnChargeSalaries").html("<i class='fa fa-lg fa-search'></i>Search");
				$("#employeeChargeSalaries").html(response);
			}
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
		
		if (checkAllEmpCheck  <= 0) {
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

		$("input[name='empChargeCheck']:checked").each(function() {
			selectedEmpToCharge += this.value + "###";
		});
			
		var embToBeCharged = selectedEmpToCharge.slice(0, -3);
		var salChargeMonth = $("#salaryMonthChargeSalaries").val();

		var post = { "action" : "chargeEmployeeSalaries", "embToBeCharged" : embToBeCharged, "salChargeMonth" : salChargeMonth};
		
		swal ({
			title: "Are you sure ?", text: "You want to charge these salaries?", type: "warning", showCancelButton: true, confirmButtonText: "Yes, charge!", cancelButtonText: "No, don't charge!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
				$.ajax({    
					method: "POST", url : "api/main.php", data: post, dataType: "JSON",
					success : function(data){
						var Message = data.Message;
						var status = data.Status;
						if (status == true) { swal("", Message, "success"); swal ({ title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false }, function(isConfirm) { if (isConfirm) { location.reload(); } }); } else { swal("", Message, "error"); }
					},
					error : function(data){ }
				})
			} else { swal("Cancelled", "Salary charge cancelled.", "error"); }
		});
			
	});

	
	// ------------------- Deleting salary charge ---------------------
	$(document).on('click', '.chargeSalaryDeletion', function(e){
		
		e.preventDefault();
		
		const deleteBtnID = $(this).attr("id");
		var vl = $(this).attr("data-id");
		var cm = "ZTQyTVN3aWh0N0VVU24xclZZZWxudz09OjoIbVBNkAC4Mejemg7HW8ZF";
		var tn = "dFExaFhZZzU1VGNqd1VDT3RnV0dBakdOWDVFenFOVjBmRENyL0RBZlY2ST06OsZd7og4xKUjJF57ODTdTOM=";
		var commandType = "delete_command";
		var objName = "Charge salary";

		var post = {
			"action" : "ins_upd_del_everything",
			"vl" : vl,
			"cm" : cm,
			"tn" : tn,
			"commandType" : commandType,
			"objName" : objName,
		};

		swal ({
			title: "Are you sure ?", text: "You want to delete this " + objName.toLowerCase() + "?", type: "warning", showCancelButton: true, confirmButtonText: "Yes, delete!", cancelButtonText: "No, don't delete!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
			    
			    $.ajax({    
					method: "POST", url : "api/main.php", data: post, dataType: "JSON",
					success : function(data){
						var Message = data.Message;
						var status = data.Status;
						if (status == true) {
							swal("", Message, "success");
							$("#" + deleteBtnID).parents("tr").remove();
                        } else {
                            swal("", Message, "error");
                        }
					},
					error : function(data){ }
				})
			} else {
				swal("Cancelled", objName + " deletion cancelled.", "error");
			}
		});

	});
	
	// Employee name changed, if another employee is selected
    $("#empNameSalary").change(function () {
		
        var thisEmp = $(this).val();
        var salMonthY = $("#salaryOfMonth").val();
		
		if (thisEmp == "") {
			$("#empTitle").val("");
			$("#salaryAmount").val("");
			$("#amountInWords").val("");
			$("#salaryDescription").val("");
			$("#paidAmount").val("");
			$("#paymentDescription").val("");
		} else {
			$("#empTitle").val("");
			$("#salaryAmount").val("");
			$("#amountInWords").val("");
			$("#salaryDescription").val("");
			$("#paidAmount").val("");
			$("#paymentDescription").val("");

			//Fetch the data of the selected employee using the above thisEmp variable
			$.ajax({
				method: "POST",
				url : "api/main.php",
				data: {"action" : "fetchEmployeeData" , "thisEmp" : thisEmp},
				dataType: "JSON",
				success : function(data){
					var Message = data.Message;
					var status = data.Status;
					if(status == true){
						Message.forEach(function(item) {
							$("#empTitle").val(item['titlePosition']);
							$("#salaryAmount").val(item['salary']);
							$("#amountInWords").val(moneyValueToWords(item['salary']));
							//$("#paidAmount").val(item['salary']);
							//$("#salaryDescription").val("Full salary payment of " + salMonthY);
						});  
					}
				},
				error : function(data){

				}
			})
		}
		
    });
	
	const regex = /[^\d.]|\.(?=.*\.)/g;
    const subst=``;

    $('#paidAmount').keyup(function(){
        const str=this.value;
        const result = str.replace(regex, subst);
        this.value=result;
    });
   
    $("#salaryOfMonth").change(function () {
        var sallaryMonth = $("#salaryOfMonth").val();
        var sallaryAmount = $("#salaryAmount").val();
        $("#salaryDescription").val("Full salary payment of " + sallaryMonth);
        $("#paidAmount").val(sallaryAmount);

    });
	
	//If the advanced salary amount is greater than the full salary amount of the employee
    $("#paidAmount").focusout(function () {
        var amountNow = parseFloat($(this).val());
        var salAmount = parseFloat($("#salaryAmount").val());
        if (amountNow > salAmount) {
            swal("", "Advanced salary must not be greater than the normal salary", "warning")
            $(this).val(salAmount);
        } else {

		}
    });
	
	//Fetch and fill the SalaryDescription and PaidAmount by getting the remaining balance from database 
    $("#salaryType").change(function () {

        var emploID = $("#empNameSalary").val();
        var salMonth = $("#salaryOfMonth").val();
        var normalSalaray = $("#salaryAmount").val();
        var salTypeChoice = $("#salaryType").val();

        $.ajax({
            method: "POST",
            url : "api/main.php",
            data: {"action" : "fillPaidAmount" , "emploID" : emploID , "salMonth" : salMonth, "normalSalaray" : normalSalaray},
            dataType: "JSON",
            success : function(data){
                var Message = data.Message;
                var status = data.Status;
                if(status == true) { 
                    if (salTypeChoice == "Advanced Salary") {
						$("#paidAmount").attr("readonly", false);
						$("#salaryDescription").attr("readonly", true);
                        $("#salaryDescription").val("Advanced salary payment of " + salMonth);
                        $("#paidAmount").val(Message);
                    } else if (salTypeChoice == "Full Salary") {
                        $("#salaryDescription, #paidAmount").attr("readonly", true);
                        $("#salaryDescription").val("Full salary payment of " + salMonth);
                        $("#paidAmount").val(Message);
                    } else if (salTypeChoice == "Late Salary") {
                        $("#salaryDescription, #paidAmount").attr("readonly", true);
                        $("#salaryDescription").val("Late salary payment of " + salMonth);
                        $("#paidAmount").val(Message);
                    } else if (salTypeChoice == "Salary Completion") {
                        $("#salaryDescription, #paidAmount").attr("readonly", true);
                        $("#salaryDescription").val("Salary completion payment of " + salMonth);
                        $("#paidAmount").val(Message);
                    }
                } else { swal("Error", Message, "error"); }
            },
            error : function(data){ }
        })

    });
	
	//Pay Salary button click on employee-salary page
    $("#employeeSalariesForm").submit(function (e) {

        e.preventDefault();

        var emploID = $("#empNameSalary").val();
        var emplTitle = $("#empTitle").val();
        var salAmount = $("#salaryAmount").val();
        var salDescrip = $("#salaryDescription").val();
        var paidAmmount = $("#paidAmount").val();
        var dateMonth = $("#salaryOfMonth").val();
        var paymMethod = $("#paymentMethod").val();
        var paymDescrip = $("#paymentDescription").val();
        var salryType = $("#salaryType").val();
        var salryDecrip = $("#salaryDescription").val();
        var regisDate = $("#registerDate").val();
        var rowwStatus = $("#rowStatus").val();

        swal ({

            title: "Are you sure ?",
            text: "You want to pay " + dateMonth + " salary to " + emploID + " ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, pay salary!",
            cancelButtonText: "No, don't pay!",
            closeOnConfirm: false,
            closeOnCancel: false

        }, function(isConfirm) {

            if (isConfirm) {

                $.ajax({
                    method: "POST",
                    url : "api/main.php",
                    data: {
                            "action" : "payEmployeeSalary", 
                            "emploID" : emploID,  
                            "emplTitle" : emplTitle , 
                            "salAmount" : salAmount , 
                            "salDescrip" : salDescrip , 
                            "paidAmmount" : paidAmmount , 
                            "dateMonth" : dateMonth , 
                            "paymMethod" : paymMethod , 
                            "paymDescrip" : paymDescrip , 
                            "salryType" : salryType ,
                            "salryDecrip" : salryDecrip,
                            "regisDate" : regisDate,
                            "rowwStatus" : rowwStatus
                        }, 
                    dataType: "JSON",
                    success : function(data){
                        var Message = data.Message;
                        var status = data.Status;
                        if (status == true) {
							swal ({
								title: "Success", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
							}, function(isConfirm) {
								if (isConfirm) { location.reload(); }
							});
                        } else {
                            swal("", Message, "error");
                        }  
                    },
                    error : function(data){

                    }
                })
            } else {
                swal("Cancelled", "Salary payment is cancelled.", "error");
            }
        });

    });
	
	// ------------------- Deleting employee salary ---------------------
	$(document).on('click', '.salaryPaymentDeletion', function(e){
		
		e.preventDefault();

		const deleteBtnID = $(this).attr("id");
		var vl = $(this).attr("data-id");
		var cm = "WHYyaUk2TG5XK3ZzUG5BNktueW56dz09OjqV8D0DDH87u9003f7nZy6A";
		var tn = "b0lqOGk0akZud1ZORzhvdGhkcktSWlBlK0N4OUVmdktxNHVITHlqSFF0UT06OiGIx+6zq6oQD6mpLibND2w=";
		var commandType = "delete";
		var objName = "Salary payment";

		var post = {
			"action" : "ins_upd_del_everything",
			"vl" : vl,
			"cm" : cm,
			"tn" : tn,
			"commandType" : commandType,
			"objName" : objName,
		};

		swal ({
			title: "Are you sure ?", text: "You want to delete this " + objName.toLowerCase() + "?", type: "warning", showCancelButton: true, confirmButtonText: "Yes, delete!", cancelButtonText: "No, don't delete!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
			    
			    $.ajax({    
					method: "POST", url : "api/main.php", data: post, dataType: "JSON",
					success : function(data){
						var Message = data.Message;
						var status = data.Status;
						if (status == true) {
							swal("", Message, "success");
							$("#" + deleteBtnID).parents("tr").remove();
                        } else {
                            swal("", Message, "error");
                        }
					},
					error : function(data){ }
				})
			} else {
				swal("Cancelled", objName + " deletion cancelled.", "error");
			}
		});

	});
	
	// ========================== End of Salaries Section ====================================
	
	// ========================== Start of Expenses Section ==================================
	
	$("#expenseAmount").keyup(function(){
		if ($(this).val() == "")
			$("#expenseAmountWords").val("");
		else {
			$("#expenseAmountWords").val(moneyValueToWords($(this).val()));
		}
	});
	
	// ------------------- Registering expense -------------------------

	$("#registerExpenseForm").submit(function (e) {
		
		e.preventDefault();

		var vl = $("#expenseDesc").val() + "###" + $("#expenseAmount").val() + "###" + $("#expensePaymentType").val() + "###" + $("#expensePaymentDesc").val() + "###" + $("#registerDate").val();
		
		var hasFile = "No";

		var tn = "bGZNVFlEZGlmYURwVFhyeTMwVWcvZz09OjpLMiEsbO05D8slVm7o+xnR";
		var commandType = "insert_command";

		var objName = "Expense";
		var objPre = "EX";

		var post = {
			"action" : "ins_upd_del_everything",
			"vl" : vl,
			"hasFile" : hasFile,
			"commandType" : commandType,
			"tn" : tn,
			"objName" : objName,
			"objPre" : objPre
		};

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  post,
			dataType: "JSON",
			beforeSend:function(){
				$("#regExpense").prop('disabled', true);
				$("#regExpense").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait");
			},
			success: function(data) {
				$("#regExpense").prop('disabled', false);
				$("#regExpense").html("<i class='fa fa-lg fa-save'></i> Register Expense");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ------------------- Filling Data into expenses Modal -------------------------
	$(document).on("click", ".btnUpdateExpense", function (e) {
		
		e.preventDefault();

		var objectID = $(this).attr("data-id");
		var tn = "cGRVZzhXbjlKMCsrbnRMWHJwaDJyUT09OjqnVAfRTer/TWiak6mWwqP5";
		var cm = "ajhVS3dUUzZlSzFEWWZrcEl0S2lCUT09OjpliKzikV004mRikOAv1eO8";

		var post = {
			"action": "fetch_parameterized_everything",
			"dn": dn,
			"tn" : tn,
			"cm" : cm,
			"objectID": objectID
		}

		$(".modal-body").load(objectID);

		$.ajax({
			method: "POST",
			url: "api/main.php",
			data:  post,
			dataType: "JSON",
			success: function(data) {
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {
				
					var returned_info = Message.split("###");
					
					$("#expenseIDUp").val(returned_info[1]);
					$("#expenseDescUp").val(returned_info[2]);
					$("#expenseAmountUp").val(returned_info[3]);
					$("#expenseAmountWordsUp").val(moneyValueToWords(returned_info[3]));
					$("#expensePaymentTypeUp").val(returned_info[4]);
					$("#expensePaymentDescUp").val(returned_info[5]);

				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	$("#expenseAmountUp").keyup(function(){
		if ($(this).val() == "")
			$("#expenseAmountWordsUp").val("");
		else {
			$("#expenseAmountWordsUp").val(moneyValueToWords($(this).val()));
		}
	});
	
	// ------------------- Update expense -------------------------
		
	$("#updateExpenseForm").submit(function (e) {
		
		e.preventDefault();
		
		var vl = $("#expenseIDUp").val() + "###" + $("#expenseDescUp").val() + "###" + $("#expenseAmountUp").val() + "###" + $("#expensePaymentTypeUp").val() + "###" + $("#expensePaymentDescUp").val();
		
		var hasFile = "No";
		
		var tn = "bGZNVFlEZGlmYURwVFhyeTMwVWcvZz09OjpLMiEsbO05D8slVm7o+xnR";
		var cm = "c25IRm1CMGFPVTA5YmlDRHh1RHNVaWlHQmlGbndWQ2kzWTRvUitUYmlxeU1hZTlmQm0xaDZVdlB0bVFDc3NQeGpKSDdsbnZXRnFnRzJCcENrRWhaQUVvMVhxWkM4Rndzb3pIWGVBNXZ0ejZNY09RdEFST2V1MUFscFp6YWhNaFM6OsGVYMLZtTOC6IG7KBIiaPA=";
		
		var commandType = "update_command";

		var objName = "Expense";
		var objPre = "EX";

		var post = {
			"action" : "ins_upd_del_everything",
			"vl" : vl,
			"hasFile" : hasFile,
			"commandType" : commandType,
			"tn" : tn,
			"cm" : cm,
			"objName" : objName,
			"objPre" : objPre
		};

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  post,
			dataType: "JSON",
			beforeSend:function(){
				$("#updateExpense").prop('disabled', true);
				$("#updateExpense").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait");
			},
			success: function(data) {
				$("#updateExpense").prop('disabled', false);
				$("#updateExpense").html("<i class='fa fa-lg fa-save'></i> Update Expense");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ------------------- Deleting expenses ------------------------------
	$(document).on('click', '.btnDeleteExpense', function(e){
		
		e.preventDefault();

		const deleteBtnID = $(this).attr("id");
		var vl = $(this).attr("data-id");
		var cm = "MXo0VE9zQ053VEttWWU0QnZBQ08yUT09Ojp2/6XWpnzKUQYVfd40FI0b";
		var tn = "b3dZaGVJbGs0Q3YyTWw5QlVYOFZyUT09OjoNdkMiRuKtwi3kHprhHEnR";
		var commandType = "delete_command";
		var objName = "Expense";

		var post = {
			"action" : "ins_upd_del_everything",
			"vl" : vl,
			"cm" : cm,
			"tn" : tn,
			"commandType" : commandType,
			"objName" : objName,
		};

		swal ({
			title: "Are you sure ?", text: "You want to delete this " + objName.toLowerCase() + "?", type: "warning", showCancelButton: true, confirmButtonText: "Yes, delete!", cancelButtonText: "No, don't delete!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
			    
			    $.ajax({    
					method: "POST", url : "api/main.php", data: post, dataType: "JSON",
					success : function(data){
						var Message = data.Message;
						var status = data.Status;
						if (status == true) {
							swal("", Message, "success");
							$("#" + deleteBtnID).parents("tr").remove();
                        } else {
                            swal("", Message, "error");
                        }
					},
					error : function(data){ }
				})
			} else {
				swal("Cancelled", objName + " deletion cancelled.", "error");
			}
		});

	});
	
	// ========================== End of Expenses Section ======================================
	
	// ========================== Start of Change Password =====================================
	
	// ----------------------- Compare password mactch in confirm password ----------------
	$(document).on("focusout", "#confirmPassChange", function () {
		var pass = $("#pass1Change").val();
		if ($(this).val() != pass) {
			bs4pop.notice("<i class='fa fa-exclamation-triangle text-danger'></i> &nbsp; Password mismatch, re-enter password", {type: "warning", position: "topright", appendType: "append"});
			$("#btnChangePassword").prop("disabled", true);
		} else {
			$("#btnChangePassword").prop("disabled", false);
		}
	})
	$(document).on("keyup", "#confirmPassChange", function () {
		var pass = $("#pass1Change").val();
		if ($(this).val() == pass) { $("#btnChangePassword").prop("disabled", false); } else { $("#btnChangePassword").prop("disabled", true); }
	})
	
	$("#changePasswordForm").submit(function (e) {
				
		e.preventDefault();
		var oldPassChange = $("#oldPasswordChange").val();
		var newPassChange = $("#pass1Change").val();
		var confPassChange = $("#confirmPassChange").val();
		
		$.ajax({    
			method: "POST",
			url : "api/main.php",
			beforeSend:function(){
				$("#btnChangePassword").prop('disabled', true);
				$("#btnChangePassword").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait");
			},
			data: {
				"action" : "changePassword", 
				"oldPassChange" : oldPassChange, 
				"newPassChange" : newPassChange, 
				"confPassChange" : confPassChange
			},
			dataType: "JSON",
			success : function(data){
				$("#btnChangePassword").prop('disabled', false);
				$("#btnChangePassword").html("<i class='fa fa-fw fa-lg fa-key'></i>Change Password");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {
					swal ({
						title: "Success", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					swal("", Message, "error");
				}
			},
			error : function(data){

			}
		})
	});
	
	// ========================== End of Change Password =======================================

	// ========================== Start of Update Profile ======================================
	
	//Clicking of update user button in the update user model
	$("#updateUserProfileForm").on('submit', function (evt) {
		
		evt.preventDefault();
		
		var formData = new FormData(this);
		formData.append("action", "updateUserProfile")

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			beforeSend : function() {
				$("#updateProfileBtn").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait");
				$("#updateProfileBtn").attr("readonly", true);
	  		}, success: function(data) {
				$("#updateProfileBtn").html("<i class='fa fa-fw fa-lg fa-pencil'></i> Update Profile");
				$("#updateProfileBtn").attr("readonly", false);
				var sts = data.Status;
				var msg = data.Message;
				
				if (sts == true) {
					swal ({
						title: "", text: msg, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					bs4pop.notice("<i class='fa fa-times-circle text-danger'></i> &nbsp; " + msg, {type: "warning", position: "topright", appendType: "append"});
				}		
		 	}, error: function(e) {
	   			alert(e);
			}          
	   });
	});

	// ========================== End of Update Profile ========================================

	// ========================== Start of System Reports ======================================
	
	// ------------------ Employees Report Section ---------------------------------
	
	$("#customEmployeesReportDate").prop("checked", true);
	$("#employeesReportStartFrom").prop("readonly", true);
	$("#employeesReportEndTo").prop("readonly", true);
	
	$("#customEmployeesReportDate").on('change', function () {
		if ($(this).is(':checked')) {
			$("#employeesReportStartFrom").prop("readonly", true);
			$("#employeesReportStartFrom").val("");
			$("#employeesReportEndTo").prop("readonly", true);
			$("#employeesReportEndTo").val("");
		
		} else {
			$("#employeesReportStartFrom").prop("readonly", false);
			$("#employeesReportEndTo").prop("readonly", false);
		}
	});
	
	$("#employeesReportForm").on('submit', function (e) {
		e.preventDefault();
		var emplInfoEmpReport = $("#empNameEmployeesReport").val();
		var strDateEmpReport = $("#employeesReportStartFrom").val();
		var endTooEmpReport = $("#employeesReportEndTo").val();
		
		$.ajax({
			type: "POST",
			url: "api/main.php",
			data: {
				"action": "employeesReport", 
				emplInfoEmpReport:emplInfoEmpReport, 
				strDateEmpReport:strDateEmpReport, 
				endTooEmpReport:endTooEmpReport
			},
			dataType: "text",
			beforeSend:function(){
				$("#btnEmployeesReport").prop('disabled', true);
				$("#btnEmployeesReport").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait");
			},
			success: function (response) {
				$("#btnEmployeesReport").prop('disabled', false);
				$("#btnEmployeesReport").html("<i class='fa fa-lg fa-search'></i>Search");
				$("#empReportSection").html(response);
			}
		});
	});
	
	$(document).on('click', '#printEmployeesReport', function(){
		//Display and open the print dialog box to print the report
		var empReportRestorePage = document.body.innerHTML;
		var empReportPrintArea = document.getElementById("employeesReportPrintArea").innerHTML;
		document.body.innerHTML = empReportPrintArea;
		window.print();
		document.body.innerHTML = empReportRestorePage;	
	});
	
	// ------------------ Charge Salaries Report Section ---------------------------------
	
	$("#customDateChargeSalariesReport").prop("checked", true);
	$("#startFromChargeSalariesReport").prop("readonly", true);
	$("#endToChargeSalariesReport").prop("readonly", true);
	
	$("#customDateChargeSalariesReport").on('change', function () {
		if ($(this).is(':checked')) {
			$("#startFromChargeSalariesReport").prop("readonly", true);
			$("#startFromChargeSalariesReport").val("");
			$("#endToChargeSalariesReport").prop("readonly", true);
			$("#endToChargeSalariesReport").val("");
		
		} else {
			$("#startFromChargeSalariesReport").prop("readonly", false);
			$("#endToChargeSalariesReport").prop("readonly", false);
		}
	});
	
	$("#chargeSalariesReportForm").on('submit', function (e) {
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
				"action": "chargeSalariesReport", 
				emplInfoChargeSalRep:emplInfoChargeSalRep, 
				monthInfoChargeSalRep:monthInfoChargeSalRep, 
				strDateChargeSalRep:strDateChargeSalRep, 
				endTooChargeSalRep:endTooChargeSalRep
			},
			dataType: "text",
			beforeSend:function(){
				$("#btnChargeSalariesReport").prop('disabled', true);
				$("#btnChargeSalariesReport").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait");
			},
			success: function (response) {
				$("#btnChargeSalariesReport").prop('disabled', false);
				$("#btnChargeSalariesReport").html("<i class='fa fa-lg fa-search'></i>Search");
				$("#chargeSalariesReportSection").html(response);
			}
		});
	});
	
	$(document).on('click', '#printChargeSalariesReport', function(){
		//Display and open the print dialog box to print the report
		var chargeSalReportRestorePage = document.body.innerHTML;
		var chargeSalReportPrintArea = document.getElementById("chargeSalariesPrintArea").innerHTML;
		document.body.innerHTML = chargeSalReportPrintArea;
		window.print();
		document.body.innerHTML = chargeSalReportRestorePage;	
	});
	
	// ------------------ Salary Payments Report Section ---------------------------------
	
	$("#customDateSalaryPaymentsReport").prop("checked", true);
	$("#startFromSalaryPaymentsReport").prop("readonly", true);
	$("#endToSalaryPaymentsReport").prop("readonly", true);
	
	$("#customDateSalaryPaymentsReport").on('change', function () {
		if ($(this).is(':checked')) {
			$("#startFromSalaryPaymentsReport").prop("readonly", true);
			$("#startFromSalaryPaymentsReport").val("");
			$("#endToSalaryPaymentsReport").prop("readonly", true);
			$("#endToChargeSalariesReport").val("");
		
		} else {
			$("#startFromSalaryPaymentsReport").prop("readonly", false);
			$("#endToSalaryPaymentsReport").prop("readonly", false);
		}
	});
	
	$("#salaryPaymentsReportForm").on('submit', function (e) {
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
				"action": "chargeSalaryPaymentReport", 
				emplInfoSalaPaymRep:emplInfoSalaPaymRep, 
				monthInfoSalaPaymRep:monthInfoSalaPaymRep, 
				strDateSalaPaymRep:strDateSalaPaymRep, 
				endTooSalaPaymRep:endTooSalaPaymRep
			},
			dataType: "text",
			beforeSend:function(){
				$("#btnSalaryPaymentsReport").prop('disabled', true);
				$("#btnSalaryPaymentsReport").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait");
			},
			success: function (response) {
				$("#btnSalaryPaymentsReport").prop('disabled', false);
				$("#btnSalaryPaymentsReport").html("<i class='fa fa-lg fa-search'></i>Search");
				$("#salaryPaymentsReportSection").html(response);
			}
		});
	});
	
	$(document).on('click', '#printSalaryPaymentsReport', function(){
		//Display and open the print dialog box to print the report
		var salPaymReportRestorePage = document.body.innerHTML;
		var salPaymReReportPrintArea = document.getElementById("salaryPaymentsPrintArea").innerHTML;
		document.body.innerHTML = salPaymReReportPrintArea;
		window.print();
		document.body.innerHTML = salPaymReportRestorePage;
		location.reload(true);		
	});
	
	// ------------------ Expenses Report Section ---------------------------------
	
	$("#customDateExpensesReport").prop("checked", true);
	$("#startFromExpensesReport").prop("readonly", true);
	$("#endToExpensesReport").prop("readonly", true);

	$("#customDate").on('change', function () {
		if ($(this).is(':checked')) {
			$("#startFromExpensesReport").prop("readonly", true);
			$("#startFromExpensesReport").val("");
			$("#endToExpensesReport").prop("readonly", true);
			$("#endToExpensesReport").val("");
		
		} else {
			$("#startFromExpensesReport").prop("readonly", false);
			$("#endToExpensesReport").prop("readonly", false);
		}
	});
	
	$("#expensesReportForm").on('submit', function (e) {
		e.preventDefault();
		var strDateExpensesReport = $("#startFromExpensesReport").val();
		var endTooExpensesReport = $("#endToExpensesReport").val();
		
		//alert("Customer: " + emplInfo + " -- " + "Room: " + monthInfo + " -- " + "Start Date: " + strDate + " -- " + "End Date: " + endToo + " -- ");

		$.ajax({
			type: "POST",
			url: "api/main.php",
			data: {
				"action": "expensesReport", 
				strDateExpensesReport:strDateExpensesReport, 
				endTooExpensesReport:endTooExpensesReport
			},
			dataType: "text",
			beforeSend:function(){
				$("#btnExpensesReport").prop('disabled', true);
				$("#btnExpensesReport").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please Wait");
			},
			success: function (response) {
				$("#btnExpensesReport").prop('disabled', false);
				$("#btnExpensesReport").html("<i class='fa fa-lg fa-search'></i>Search");
				$("#expesesReportSection").html(response);
			}
		});
	});
	
	$(document).on('click', '#printExpensesReport', function(){
		//Display and open the print dialog box to print the report
		var expensesReportRestorePage = document.body.innerHTML;
		var ExpensesReportPrintArea = document.getElementById("expensesReportPrintArea").innerHTML;
		document.body.innerHTML = ExpensesReportPrintArea;
		window.print();
		document.body.innerHTML = expensesReportRestorePage;
		
	});
	
	//========================== End of System Reports ================================================
	
	//========================== Start of Restore and Delete Trash Data ===============================
			
	// ------------------- Restoring deleted users ------------------------------
	
	$(document).on("change", "#userInformationCheck", function () {
		var checkAllUsersCheck = $("#userInformationCheck:checked").length;
		if (checkAllUsersCheck  > 0) {
			$("#restoreAllUsers").html('<i class="fa fa-reply-all"></i> Restore Selected');
			$("#deleteAllUsers").html('<i class="fa fa-trash"></i> Delete Selected');
		} else {
			$("#restoreAllUsers").html('<i class="fa fa-reply-all"></i> Restore All');
			$("#deleteAllUsers").html('<i class="fa fa-trash"></i> Delete All');
		}
	});
	
	$(document).on("click", "#restoreAllUsers", function () {
		
		var selectedUsersToRestore = "";

		var restoreUsersHTML = $(this).html();
		if (restoreUsersHTML == '<i class="fa fa-reply-all"></i> Restore Selected') {
			
			$("input[name='userInformationCheck']:checked").each(function() {
				selectedUsersToRestore += this.value + "###";
			});
			
			var rowsToBeRestored = selectedUsersToRestore.slice(0, -3);
			var tn = "eHFyTzI2ckhvVFNOY0R1Z2E1WG5MZz09Ojq9pDH3ZhZhatKqmkea0O6t";
			var cm = "MU1jblB5aWpHbVZ1K21tdlQ2UitDZz09OjogoLpCwOglDjCVExm55koz";
			var objName = "User(s)";
			var post = { "action" : "restoreRows", "rowsToBeRestored" : rowsToBeRestored, "tn" : tn, "cm" : cm, "objName" : objName};
			swal ({
				title: "Are you sure ?", text: "You want to restore these " + objName.toLowerCase() + "?", type: "warning", showCancelButton: true, confirmButtonText: "Yes, restore!", cancelButtonText: "No, don't restore!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {
					$.ajax({    
						method: "POST", url : "api/main.php", data: post, dataType: "JSON",
						success : function(data){
							var Message = data.Message;
							var status = data.Status;
							if (status == true) { swal("", Message, "success"); swal ({ title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false }, function(isConfirm) { if (isConfirm) { location.reload(); } }); } else { swal("", Message, "error"); }
						},
						error : function(data){ }
					})
				} else { swal("Cancelled", objName + " restore cancelled.", "error"); }
			});
			
		} else {
			
			var rowsToBeRestored = "RestoreAll";
			var tn = "eHFyTzI2ckhvVFNOY0R1Z2E1WG5MZz09Ojq9pDH3ZhZhatKqmkea0O6t";
			var cm = "MU1jblB5aWpHbVZ1K21tdlQ2UitDZz09OjogoLpCwOglDjCVExm55koz";
			var objName = "All users";
			var post = { "action" : "restoreRows", "rowsToBeRestored" : rowsToBeRestored, "tn" : tn, "cm" : cm, "objName" : objName};
			swal ({
				title: "Are you sure ?", text: "You want to restore all " + objName.toLowerCase() + "?", type: "warning", showCancelButton: true, confirmButtonText: "Yes, restore!", cancelButtonText: "No, don't restore!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {
					$.ajax({    
						method: "POST", url : "api/main.php", data: post, dataType: "JSON",
						success : function(data){
							var Message = data.Message;
							var status = data.Status;
							if (status == true) { swal("", Message, "success"); swal ({ title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false }, function(isConfirm) { if (isConfirm) { location.reload(); } }); } else { swal("", Message, "error"); }
						},
						error : function(data){ }
					})
				} else { swal("Cancelled", objName + " restore cancelled.", "error"); }
			});
			
		}
	});

	$(document).on('click', '.restoreIndividualUser', function(e){
		
		e.preventDefault();

		const deleteBtnID = $(this).attr("id");
		var rowsToBeRestored = $(this).attr("data-id");
		var tn = "eHFyTzI2ckhvVFNOY0R1Z2E1WG5MZz09Ojq9pDH3ZhZhatKqmkea0O6t";
		var cm = "MU1jblB5aWpHbVZ1K21tdlQ2UitDZz09OjogoLpCwOglDjCVExm55koz";
		var objName = "User";
		var post = { "action" : "restoreRows", "rowsToBeRestored" : rowsToBeRestored, "tn" : tn, "cm" : cm, "objName" : objName};
		swal ({
			title: "Are you sure ?", text: "You want to restore this " + objName.toLowerCase() + "?", type: "warning", showCancelButton: true, confirmButtonText: "Yes, restore!", cancelButtonText: "No, don't restore!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
				$.ajax({    
					method: "POST", url : "api/main.php", data: post, dataType: "JSON",
					success : function(data){
						var Message = data.Message;
						var status = data.Status;
						if (status == true) { swal("", Message, "success"); swal ({ title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false }, function(isConfirm) { if (isConfirm) { location.reload(); } }); } else { swal("", Message, "error"); }
					},
					error : function(data){ }
				})
			} else { swal("Cancelled", objName + " restore cancelled.", "error"); }
		});

	});
	
	// ------------------- Delete permenantly the users in the trash ------------
	$(document).on("click", "#deleteAllUsers", function () {
		
		var selectedUsersToDelete = "";
		
		var deleteUsersHTML = $(this).html();
		if (deleteUsersHTML == '<i class="fa fa-trash"></i> Delete Selected') {
				
			$("input[name='userInformationCheck']:checked").each(function() {
				selectedUsersToDelete += this.value + "###";
			});
			
			var rowsToBeDelete = selectedUsersToDelete.slice(0, -3);
			var tn = "eHFyTzI2ckhvVFNOY0R1Z2E1WG5MZz09Ojq9pDH3ZhZhatKqmkea0O6t";
			var cm = "MU1jblB5aWpHbVZ1K21tdlQ2UitDZz09OjogoLpCwOglDjCVExm55koz";
			var objName = "User(s)";
			var post = { "action" : "deleteRowsPermenantly", "rowsToBeDelete" : rowsToBeDelete, "tn" : tn, "cm" : cm, "objName" : objName};
			swal ({
				title: "Are you sure ?", text: "You want to delete these " + objName.toLowerCase() + " permenantly?", type: "warning", showCancelButton: true, confirmButtonText: "Yes, delete!", cancelButtonText: "No, don't delete!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {
					$.ajax({    
						method: "POST", url : "api/main.php", data: post, dataType: "JSON",
						success : function(data){
							var Message = data.Message;
							var status = data.Status;
							if (status == true) { swal("", Message, "success"); swal ({ title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false }, function(isConfirm) { if (isConfirm) { location.reload(); } }); } else { swal("", Message, "error"); }
						},
						error : function(data){ }
					})
				} else { swal("Cancelled", objName + " delete cancelled.", "error"); }
			});
				
		} else {
			
			var rowsToBeDelete = "DeleteAll";
			var tn = "eHFyTzI2ckhvVFNOY0R1Z2E1WG5MZz09Ojq9pDH3ZhZhatKqmkea0O6t";
			var cm = "MU1jblB5aWpHbVZ1K21tdlQ2UitDZz09OjogoLpCwOglDjCVExm55koz";
			var objName = "Users";
			var post = { "action" : "deleteRowsPermenantly", "rowsToBeDelete" : rowsToBeDelete, "tn" : tn, "cm" : cm, "objName" : objName};
			swal ({
				title: "Are you sure ?", text: "You want to delete all " + objName.toLowerCase() + " permenantly?", type: "warning", showCancelButton: true, confirmButtonText: "Yes, delete!", cancelButtonText: "No, don't delete!",
				closeOnConfirm: false,
				closeOnCancel: false
			}, function(isConfirm) {
				if (isConfirm) {
					$.ajax({    
						method: "POST", url : "api/main.php", data: post, dataType: "JSON",
						success : function(data){
							var Message = data.Message;
							var status = data.Status;
							if (status == true) { swal("", Message, "success"); swal ({ title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false }, function(isConfirm) { if (isConfirm) { location.reload(); } }); } else { swal("", Message, "error"); }
						},
						error : function(data){ }
					})
				} else { swal("Cancelled", objName + " delete cancelled.", "error"); }
			});
			
		}
	});

	$(document).on('click', '.deleteIndividualUser', function(e){
		
		e.preventDefault();

		const deleteBtnID = $(this).attr("id");
		var rowsToBeDelete = $(this).attr("data-id");
		var tn = "eHFyTzI2ckhvVFNOY0R1Z2E1WG5MZz09Ojq9pDH3ZhZhatKqmkea0O6t";
		var cm = "MU1jblB5aWpHbVZ1K21tdlQ2UitDZz09OjogoLpCwOglDjCVExm55koz";
		var objName = "User";
		var post = { "action" : "deleteRowsPermenantly", "rowsToBeDelete" : rowsToBeDelete, "tn" : tn, "cm" : cm, "objName" : objName};
		swal ({
			title: "Are you sure ?", text: "You want to delete this " + objName.toLowerCase() + " permenantly?", type: "warning", showCancelButton: true, confirmButtonText: "Yes, delete!", cancelButtonText: "No, don't delete!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
				$.ajax({    
					method: "POST", url : "api/main.php", data: post, dataType: "JSON",
					success : function(data){
						var Message = data.Message;
						var status = data.Status;
						if (status == true) { swal("", Message, "success"); swal ({ title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false }, function(isConfirm) { if (isConfirm) { location.reload(); } }); } else { swal("", Message, "error"); }
					},
					error : function(data){ }
				})
			} else { swal("Cancelled", objName + " delete cancelled.", "error"); }
		});

	});


});

// ----------------------- Filling Employee Name Select Option ---------------------------
function fillEmpNameUsers() {
	var tn = "S2tLajZpRzNneVFwMVg2M0ladkxWUT09OjqvGV6loHhOl7kpdvi9HGFc";
	var post = {
		"action": "fetch_emp_name_users",
		"dn": dn,
		"tn" : tn
	}

	$.ajax({
		method: "POST",
		url: "api/main.php",
		data:  post,
		dataType: "JSON",
		success: function(data) {
			var Message = data.Message;
			var status = data.Status;
			if (status == true) {
				var returned_info = Message.split("###");
				var options = "";
				options += "<option value=''>--- Select employee name ---</option>";
				for (var i=0; i<=returned_info.length - 1; i++) {
					var row = returned_info[i].split("***");
					options += "<option value='" + row[i,1] +"'>" + row[i,1] + " - " + row[i,2] + " - " + row[i,10] + "</option>";
				}
				$("#userEmpID").html(options);
				$("#userEmpIDUp").html(options);
				$("#emplyID").html(options);
				$("#empNameSalary").html(options);
			}	
		}, error: function(e) {
			bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
		}          
	});
}

// ----------------------- Filling Employee Name Select Option ---------------------------
function FillEmpNameEmployeesReport() {
	var tn = "S2tLajZpRzNneVFwMVg2M0ladkxWUT09OjqvGV6loHhOl7kpdvi9HGFc";
	var post = {
		"action": "fetch_emp_name_users",
		"dn": dn,
		"tn" : tn
	}

	$.ajax({
		method: "POST",
		url: "api/main.php",
		data:  post,
		dataType: "JSON",
		success: function(data) {
			var Message = data.Message;
			var status = data.Status;
			if (status == true) {
				var returned_info = Message.split("###");
				var options = "";
				options += "<option value='All'> ========== All Employees ========== </option>";
				for (var i=0; i<=returned_info.length - 1; i++) {
					var row = returned_info[i].split("***");
					options += "<option value='" + row[i,1] +"'>" + row[i,1] + "-" + row[i,2] + "-" + row[i,10] + "</option>";
				}
				$("#empNameEmployeesReport").html(options);
				$("#empNameChargeSalariesReport").html(options);
				$("#empNameSalaryPaymentsReport").html(options);
				$("#empNameChargeSalaries").html(options);

			}	
		}, error: function(e) {
			bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
		}          
	});

}

// ----------------------- Fill main menu in the select option -------------------------
function fillMainMenu(){
	$.ajax({    
		method: "POST",
		url : "api/main.php",
		data: {"action" : "fillMainMenu"},
		dataType: "JSON",
		success : function(data){
			var Message = data.Message;
			var status = data.Status;
			var items = "";
			if(status == true){
				
				items += "<option value=''>---- Select main menu ----</option>";
				
				$.each(Message,function(index,item) {
					items+="<option value='"+item.mainMenuID+"'>"+item.mainMenuText+"</option>";
				});
				$("#selectMainMenuID, #selectMainMenuIDD").html(items);  
			}
		},
		error : function(data){

		}
	})
}

// ----------------------- Fill users names in user privileges page --------------------
function fillUserNamesForPriv(){
	
	$.ajax({
			
		method: "POST",
		url : "api/main.php",
		data: {"action" : "userNamesPrivileges"},
		dataType: "JSON",
		success : function(data){
			var Message = data.Message;
			var status = data.Status;
			var html = '';
			if(status == true){
				html += `<option value="">---- Select user to give privilege ----</option>`;
				Message.forEach(function(user_name,i){
					html += `<option value="${user_name['userID']}">${user_name['userName']} - ${user_name['empName']}</option>`;
				});
				$("#userNameForPrivileges").html(html);  
			}
		},
		error : function(data){

		}
	})
}

// ----------------------- Convert number figures to words functions -------------------
function moneyValueToWords(number) {  
    var digit = ['Zero', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];  
    var elevenSeries = ['Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];  
    var countingByTens = ['Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];  
    var shortScale = ['', 'Thousand', 'Million', 'Billion', 'Trillion'];  

    number = number.toString(); number = number.replace(/[\, ]/g, ''); if (number != parseFloat(number)) return 'Not a Number'; var x = number.indexOf('.'); if (x == -1) x = number.length; if (x > 15) return 'too big'; var n = number.split(''); var str = ''; var sk = 0; for (var i = 0; i < x; i++) { if ((x - i) % 3 == 2) { if (n[i] == '1') { str += elevenSeries[Number(n[i + 1])] + ' '; i++; sk = 1; } else if (n[i] != 0) { str += countingByTens[n[i] - 2] + ' '; sk = 1; } } else if (n[i] != 0) { str += digit[n[i]] + ' '; if ((x - i) % 3 == 0) str += 'Hundred '; sk = 1; } if ((x - i) % 3 == 1) { if (sk) str += shortScale[(x - i - 1) / 3] + ' '; sk = 0; } } if (x != number.length) { var y = number.length; str += 'Point '; for (var i = x + 1; i < y; i++) str += digit[n[i]] + ' '; } str = str.replace(/\number+/g, ' '); return str.trim() + " Dollars";  

}