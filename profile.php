<?php
$con = mysqli_connect('localhost', 'root', '', 'student_master');
include('functions/ip.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="shortcut icon" href="./img/favicon-16x16.png" type="image/x-icon">
  <style>
        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 225, 255, 0.5);
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(34, 158, 134, 0.8);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(30, 136, 229, 0.8);
        }
    </style>
  <style>
     .grey-bg {
      background-color: #ECE9E6;
      padding: 40px 0;
    }
    .card{
      background-color: #ECE9E6;
    }
    .card-content{
      background-color: #ECE9E6;
    }
    .card-body{
      background-color: #ECE9E6;
    }
    .media{
      background-color: #ECE9E6;
    }
    .box {
      background-color: #ECE9E6;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 300px; 
      height: 200px;
    }
    .image {
      width: 100%;
      max-width: 100%;
      height: 300px;
      border-radius: 8px;
      display: block;
      
    }
    @media screen and (min-width: 480px) {
    .image {
      width: 100%;
      max-width: 100%;
      height: 400px;
      border-radius: 8px;
      display: block;
      
    }
}
    .box-container {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      flex-wrap: wrap;
      gap: 20px;
      background-color: #ECE9E6;
    }
  </style>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
  <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
  <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
  <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>
<body>
  <div class="grey-bg container-fluid">
    <h1 style="font-size: 50px; font-family: cursive; margin: auto; text-align: center; border: dashed; 
    border-radius: 25px; border-width: 6px; border-color: blue;">Your Profile</h1>
    <div class="row justify-content-center align-items-center mt-3">
      <div class="col-md-6 text-center mb-4">
      <?php
      if(isset($_SESSION['name'])){
        
$username=$_SESSION['name'];

$user_image="Select * from `students` where stu_name='$username'";

$user_image=mysqli_query($con, $user_image);

$row_image=mysqli_fetch_array($user_image);

$user_image=$row_image['user_image'];

echo "<li class='nav-item'>

<img src='user_images/$user_image' class='image' alt='Your Image'> </li>";
      } else{
        echo"<h2>Your Image</h2>";
       }
      


?>
        
      </div>

      <div class="col-md-6">
        <div class="box-container">
        <div  class="card box ">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex ">
                  <div class="align-self-center">
                    <i class="icon-user primary font-large-2 float-left"></i>
                  </div>
                  <div class="media-body text-right">

                    <?php
                    if(!isset($_SESSION['name'])){
                      echo "<h2>Guest</h2>";            
                    }
                  
                    else{
                     echo"<h2>".$_SESSION['name']."</h2>";
                    }?>
                    <span><h4>Name</h4></span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card box">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex ">
                  <div class="align-self-center">
                    <i class="icon-pointer primary font-large-2 float-left"></i>
                  </div>
                  <div class="media-body text-right">
                  <?php
                    if(!isset($_SESSION['name'])){
                      echo "<h2>Your ID</h2>";            
                    }
                    else{
                      $username=$_SESSION['name'];

                      $user_data="Select * from `students` where stu_name='$username'";
                      $user_data=mysqli_query($con, $user_data);
                      $row_data=mysqli_fetch_array($user_data);
                      $data=$row_data[0];
                      echo "<h2>$data</h2>";
                    }?>
                    <span><h4>Your ID</h4></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
          
          <div class="card box">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex ">
                  <div class="align-self-center">
                    <i class="icon-speech primary font-large-2 float-left"></i>
                  </div>
                  <div class="media-body text-right">
                  <?php
                    if(!isset($_SESSION['name'])){
                      echo "<h2>Clg Code</h2>";            
                    }
                    else{
                      $username=$_SESSION['name'];

                      $user_data="Select * from `students` where stu_name='$username'";
                      $user_data=mysqli_query($con, $user_data);
                      $row_data=mysqli_fetch_array($user_data);
                      $data=$row_data[1];
                      echo "<h2>$data</h2>";
                    }?>
                    <span><h4>College code</h4></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
          <div class="card box">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex ">
                  <div class="align-self-center">
                    <i class="icon-pencil primary font-large-2 float-left"></i>
                  </div>
                  <div class="media-body text-right">
                    <h2>278</h2>
                    <span><h4>Events Participated</h4></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Add more boxes here as needed -->
        </div>
      </div>
    </div>
  </div>
</body>
</html>
