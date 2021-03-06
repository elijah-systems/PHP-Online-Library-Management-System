<?php
require_once "dbconnection.php";
if (isset($_POST['submit'])) {
    $course_name = mysqli_real_escape_string($conn, $_POST['course_name']);
    $course_depart= mysqli_real_escape_string($conn, $_POST['course_dep']);
    $course_dur= mysqli_real_escape_string($conn, $_POST['course_dura']);
    
    if (empty( $course_name)|| empty($course_depart) || empty($course_dur)){
       echo "fill all the spaces";
      }else{
    $query = "INSERT INTO `courses`(`course_name`, `course_depart`, `course_duration`) 
    VALUES('$course_name','$course_depart','$course_dur')";
    mysqli_query($conn, $query);
    $_SESSION['success'] = "Succesifully Added" .mysqli_error($conn);
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/custom.css">
  <!--custom fonts-->
  <style>
    @import url('https://fonts.googleapis.com/css?family=Kaushan+Script&display=swap');
  </style>
    <title>Manage Courses</title>
</head>
<body style="background-color:#f8f8fd">
     <!--Navbar -->
  <nav class="mb-1 navbar navbar-expand-lg navbar-dark ">
  <a class="navbar-brand black-text" href="#"> <img class="img-fluid" src="img/azahublogo.png" height="120rem" width="100rem" alt=""> <span class="text-uppercase pink-text" style="padding-left: 400px"> <strong> Online Library Management System</strong></span> 
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent-333">
         <ul class="navbar-nav ml-auto nav-flex-icons">
         <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle pink-text" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-user pink-text" display-5></i> Manage Account
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
            <a class="dropdown-item text-primary" href="#"> <i class="fa fa-user" aria-hidden="true"></i> My Profile</a></a>
            <a class="dropdown-item text-primary" href="change_password.php"> <i class="fa fa-cog" aria-hidden="true"></i> Change Password</a>
            <a class="dropdown-item text-primary" href="#"> <i class="fas fa-user-cog    "></i> Update Details</a>
            <a class="dropdown-item text-primary" href="#"> <i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>

          </div>
        </li>
       </ul>
    </div>
  </nav>
  <!--Navbar End-->
      <div class="container-fluid">
          <div class="row">
    <div class="col-md-2">
    <?php include_once('sidebar.php') ?>
    </div>

    <div class="col-md-9">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Manage Courses</a></li>
    </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary btn-sm rounded-pill" data-toggle="modal" data-target="#basicExampleModal">
            Add Course
          </button>
          <!-- Modal -->
          <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">

                       <form action="" method="post">
                    <div class="form-group">
                        <label for="">Course Name</label>
                        <input type="text" name="course_name" id="" class="form-control" placeholder="Course Name">
                    </div>
                    <div class="form-group">
                        <label for="">Course Department</label>
                        <input type="text" name="course_dep" id="" class="form-control" placeholder="Course Department">
                    </div>
                    <div class="form-group">
                        <label for="">Course Duration</label>
                        <input type="text" name="course_dura" id="" class="form-control" placeholder="Course Duration">
                    </div>
                     
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary btn-sm rounded-pill" data-dismiss="modal">Close</button>
                         <button type="submit" name="submit" class="btn btn-primary btn-sm rounded-pill">Save</button>
                     </div>
                     </form>
                 </div>
             </div>
          </div>
         <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" class="pink-text">Course ID</th>
                    <th scope="col" class="pink-text">Courses</th>
                    <th scope="col" class="pink-text">Edit Action</th>
                    <th scope="col" class="pink-text">Delete Action</th>
                </tr>
        </thead>
        <tbody>
        <?php 
        
        $query = "SELECT * from `courses`";
        $result1 = mysqli_query($conn, $query);
        while($row1 = mysqli_fetch_array($result1)):;?>
            <tr>
                <td class="text-info"><?php echo $row1[0];?></td>
                <td class="text-info"><?php echo $row1[1];?></td>
                <td> <span class="table-remove"><button type="button"
                  class="btn btn-info rounded-pill btn-sm my-0 ">Edit</button></span></td>
                  <td> <span class="table-remove"><button type="button"
                  class="btn btn-danger rounded-pill btn-sm my-0">Delete</button></span></td>
            </tr>
            <?php endwhile;?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>      
        

 <!-- JQuery -->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>
</body>`
