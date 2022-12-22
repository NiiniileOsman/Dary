<?php
session_start();
include("library/conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>User Privilleges => <?php echo $sys_comp_name; ?></title>
  <?php include("library/head.php"); ?>
</head>

<body class="app sidebar-mini">

  <!-- Navbar-->
  <?php include("library/header.php"); ?>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <?php include("library/sidebar.php"); ?>

  <main class="app-content">
    <div class="app-title">
      <div>
        <h3><i class="fa fa-cog"></i> <b>PATIENT'S APPOINTMENT</b></h3>
        <p>Patient's Appointment Page</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="doctor_appointments">Patient's Appointment</a></li>
      </ul>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <div class="container-fluid">
              <br>
              <div class="row">
                <div class="col-md-2">
                  <label class="control-label">Select Patient</label>
                </div>
                <div class="col-md-10">
                  <select class="form-control" name="cmbPatientNameAppointment" id="cmbPatientNameAppointment" style="font-size: 17px; width: 100%;">

                  </select>
                </div>
              </div>
              <br>
            </div>
          </div>
        </div>

        <div class="patientExamTest" style="font-size: 17px;">

        </div>

      </div>
    </div>


  </main>
  <!-- Essential javascripts for application to work-->
  <?php include("library/footer.php"); ?>
  <?php include("library/scripts.php"); ?>
  <script type="text/javascript">
    $("#cmbPatientNameAppointment").select2();
  </script>

</body>

</html>