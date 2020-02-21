<?php
require_once "dbconnection.php";
if (isset($_POST['submit'])) {
$isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
$author= mysqli_real_escape_string($conn, $_POST['author']);

$booktitle = mysqli_real_escape_string($conn, $_POST['booktitle']);
$category = mysqli_real_escape_string($conn, $_POST['category']);

$country  = mysqli_real_escape_string($conn, $_POST['country']);
$publisher = mysqli_real_escape_string($conn, $_POST['publisher']);

$edition  = mysqli_real_escape_string($conn, $_POST['edition']);
$google_url = mysqli_real_escape_string($conn, $_POST['google_url']);

$price  = mysqli_real_escape_string($conn, $_POST['price']);
$book_Image = mysqli_real_escape_string($conn, $_POST['book_Image']);

if (empty($student_id)|| empty( $firstname) || empty( $lastname)|| empty($sirname)|| empty( $email)|| empty($course) ||
      empty($year)|| empty($phone)|| empty($address) || empty($department)|| empty($city) || empty($state)|| empty($gender)){
   echo "fill all the spaces";
  }else{
      
      $query = "INSERT INTO `students`(`student_id`, `firstname`, `lastname`, `sirname`, `email`, `course_name`, `course_year`, `phone_no`, `address`, `department`, `city`, `state_name`, `gender`) 
      VALUES('$student_id','$firstname','$lastname', '$sirname', '$email', '$course','$year','$phone','$address','$department','$city','$state','$gender')";
mysqli_query($conn, $query);
$_SESSION['firstname'] = $fname;
$_SESSION['success'] = "Succesifully Added" .mysqli_error($conn);
header('location: dashboard.php');
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
  <!--custom fonts-->
  <style>
    @import url('https://fonts.googleapis.com/css?family=Baskervville|Cormorant|Kaushan+Script|Merienda|Niconne|Tangerine&display=swap');
  </style>
  <link rel="stylesheet" href="css/custom.css">
  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>

  <title>AZAHUB - OLibrary System</title>
  </title>


</head>

<body style="background-color:slategray">
  <!--Navbar -->
  <nav class="mb-1 navbar navbar-expand-lg navbar-dark ">
  <a class="navbar-brand black-text" href="#"> <img class="img-fluid" src="img/azahublogo.png" height="120rem" width="100rem" alt=""> <span class="text-uppercase text-white" style="padding-left: 400px"> <strong> Online Library Management System</strong></span> 
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent-333">
         <ul class="navbar-nav ml-auto nav-flex-icons">
         <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle text-white" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-user text-white" display-5></i> Manage Account
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
  <!--/.Navbar -->

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <?php include_once('sidebar.php') ?>
      </div>

      <div class="col-lg-9">
      <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Manage Books</a></li>
        <li class="breadcrumb-item"><a href="#">Add Books</a></li>
    </ol>
 </nav>

             <div class="row">
                 <div class="col-sm-3">
                    
                     <div class="row">
                        <div class="col-sm-12">
                        <h5 class="white-text text-center">Uploaded Book Image.</h5>
                        <hr>
                          <img  src="img/literature.webp" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"   alt="" style="padding-top: 100px">
                        </div>
                     </div>
                  
                 </div>

                 <div class="col-md-9">
                 <h4 class="card-title white-text text-center "> <i class="fas fa-book fa-2x green-text "></i><a> <strong> Add </strong>Book </a></h4>
                 <hr>
                     <form action="" method="post" style="padding-left: 100px">
             
                     <div class="row">
                         <div class="col-sm-6">

                        <div class="form-group">
                          <label for="" class=" white-text">I.S.B.N</label>
                          <input type="text" name="isbn" id="" class="form-control" placeholder="Enter ISBN" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                          <label for="" class=" white-text">Author Name</label>
                          <input type="text" name="author" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                          

                        <div class="form-group">
                          <label for="" class=" white-text">Book Title</label>
                          <input type="text" name="booktitle" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                          <div class="form-group">
                          <label for="" class=" white-text">Category</label>
                          <input type="text" name="category" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          </div>

                          <div class="form-group">
                          <label for="" class=" white-text">Country of Publishment</label>
                          <input type="text" name="country" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
        
        
                         </div>

                         <div class="col-sm-6">

                        <div class="form-group">
                          <label for="" class=" white-text">Publisher</label>
                          <input type="text" name="publisher" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    
                        <div class="form-group">
                          <label for="" class=" white-text">Book Edition</label>
                          <input type="text" name="edition" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        
                        <div class="form-group">
                          <label for="" class=" white-text">Google Book URL</label>
                          <input type="text" name="google_url" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>

                        <div class="form-group">
                          <label for="" class=" white-text">Price</label>
                          <input type="text" name="price" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        
                        <label for="" class=" white-text">Upload Image</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload Book Image</span>
                        </div>
                        <div class="custom-file">
                        <input type="file" name="book_Image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                         </div>
                         </div>
                        </div>
                        </div>

                        <button type="submit" class="btn btn-outline-white waves-effect rounded-pill btn-block">Add Book</button>
                     </form>
                 </div>
             </div>
        
             </div>
        
          </div>

    </div>
  </div>

  <?php include_once('footer.php'); ?>
  <script>
       //wow amination

    new WOW().init();

    //slide
    $(document).foundation();
  </script>

</body>

