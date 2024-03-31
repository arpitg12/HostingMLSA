<?php
$con = mysqli_connect('localhost', 'root', '', 'student_master');
include('functions/ip.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
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
body{
  margin: 0;
  padding: 0;
  font-family: Roboto;
  background-repeat: no-repeat;
  background-size: cover;
  background: #E3E3E3;
  height: 100vh;
  overflow: hidden;
}

.center{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 300px;
  height: auto;
  background: white;
  border-radius: 10px;
}


@media screen and (min-width: 540px) {
    .center{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 500px;
  height: auto;
  background: white;
  border-radius: 10px;
  }
}

@media screen and (min-width: 250px) and (max-width:539px) {
.center{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 250px;
  height: auto;
  background: white;
  border-radius: 10px;
  }
}


.center h1{
  text-align: center;
  padding: 0 0 20px 0;
  border-bottom: 1px solid silver;
}

.center form{
  padding: 0 40px;
  box-sizing: border-box;
}

form .txt_field{
  position: relative;
  border-bottom: 2px solid #adadad;
  margin: 30px 0;
}

.txt_field input{
  width: 100%;
  padding: 0 5px;
  height: 40px;
  font-size: 16px;
  border: none;
  background: none;
  outline: none;
}

.txt_field label{
  position: absolute;
  top: 50%;
  left: 5px;
  color: #adadad;
  transform: translateY(-50%);
  font-size: 16px;
  pointer-events: none;
}

.txt_field span::before{
  content: '';
  position: absolute;
  top: 40px;
  left: 0;
  width: 0px;
  height: 2px;
  background: #2691d9;
  transition: .5s;
}

.txt_field input:focus ~ label,
.txt_field input:valid ~ label{
  top: -5px;
  color: #2691d9;
}

.txt_field input:focus ~ span::before,
.txt_field input:Valid ~ span::before{
  width: 100%;
}

.pass{
  margin: -5px 0 20px 5px;
  color: #a6a6a6;
  cursor: pointer;
}

.pass:hover{
  text-decoration: underline;
}

input[type="Submit"]{
  width: 100%;
  height: 50px;
  border: 1px solid;
  border-radius: 25px;
  font-size: 18px;
  font-weight: 700;
  cursor: pointer;

}

input[type="Submit"]:hover{
  background: #2691d9;
  color: #e9f4fb;
  transition: .5s;
}

.signup_link{
  margin: 30px 0;
  text-align: center;
  font-size: 16px;
  color: #666666;
}

.signup_link a{
  color: #2691d9;
  text-decoration: none;
}

.signup_link a:hover{
  text-decoration: underline;
}

.HomeAbout{
  width: 100vw;
  height: 25vh;
}
    </style>

  </head>
  <body>
    <div class="container">
      <div class="center">
          <h1>Login</h1>
          <form action="" method="POST">
              <div class="txt_field">
                  <input type="name" name="user_username" required>
                  <span></span>
                  <label>Name</label>
              </div>
              <div class="txt_field">
                  <input type="password" name="user_password" required>
                  <span></span>
                  <label>Password</label>
              </div>
              <div class="pass">Forget Password?</div>
              <input name="submit" type="Submit" value="Login">
              <div class="signup_link">
                  Not a Member ? <a href="student.php">Register</a>
              </div>
          </form>
      </div>
    </div>
  </body>
</html>

<?php

if(isset($_POST['submit'])){

$user_username=$_POST['user_username'];

$user_password=$_POST['user_password'];

$select_query="Select * from `students` where

stu_name='$user_username'";

// $select_query="Select * from `students` where

// email='$user_username'";

$result=mysqli_query($con, $select_query);

$row_count=mysqli_num_rows($result);

$row_data=mysqli_fetch_assoc($result);
$user_ip=getIPAddress();

// cart item

// $select_query_cart="Select stu_name from `students` where ip_address='$user_ip' and email='$user_username'";

// $select_cart=mysqli_query($con,$select_query_cart);

// $row_count_cart=mysqli_num_rows($select_cart);


if($row_count>0){
    $_SESSION['name']=$user_username;
if(password_verify($user_password,$row_data['Password'])){

  if($row_count==1){
    $_SESSION['name']=$user_username;
echo "<script>alert('Login successful')</script>";

echo "<script>window.open('landing.php','_self')</script>";

// }else{
//     // $_SESSION['email']=$user_username;
// echo "<script>alert('Login successful')</script>";

// // echo "<script>window.open('payment.php','_self')</script>";

// }

}else{

echo "<script>alert('Invalid Credentials')</script>";
echo "<script>window.open('student_login.php','_self')</script>";
}

}else{
    echo "<script>alert('Invalid Credentials')</script>";
    echo "<script>window.open('student_login.php','_self')</script>";
}
}
else{
  echo "<script>alert('Invalid Credentials')</script>";
  echo "<script>window.open('student_login.php','_self')</script>";
}
}
?>