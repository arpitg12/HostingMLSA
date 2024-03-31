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
  <link rel="stylesheet" href="style.css">
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
</head>

<body>

  <?php


  if (isset($_POST['submit'])) {

    $College = $_POST['College'];
    $name = $_POST['name'];
    $code = $_POST['code'];
    $course = $_POST['course'];
    $email = $_POST['email'];
    $Password = $_POST['Password'];
    $number = $_POST['number'];
    $gender = $_POST['gender'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();
    $pass= password_hash($Password, PASSWORD_BCRYPT);
   
    $emailquery = "select * from `students` where email='$email' ";
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);

    $select_query="Select * from `students` where stu_name='$name' or

    email='$email'";

$result=mysqli_query($con, $select_query);

$rows_count=mysqli_num_rows($result);

if($rows_count>0){

echo "<script>alert('Username and Email already exist already exist') </script>";

}
    else if($emailcount>0){
        ?>
        <script>
            alert("Email already exists");
        </script>
        <?php
    }
    else{
      move_uploaded_file($user_image_tmp,"user_images/$user_image");
    $insert_query = "insert into `students` (college,
   stu_name,clg_code,programme,email,Password,phone_no,gender,user_image,user_ip) values ('$College',
   '$name','$code','$course','$email','$pass',$number,'$gender','$user_image','$user_ip')";
    $sql_execute = mysqli_query($con, $insert_query);

    if ($sql_execute) {
      echo "<script>alert('Registered Successfully')</script>";
    }
    else{
      echo "<script>alert('Not Registered')</script>";
    }
  }
}
  ?>

  <div class="container">
    <div class="h1">
      <h1>Student Registration</h1>
    </div>
    <form id="registerForm" action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">

    <div class="row">
        <div class="col-25">
          <label for="College">College:</label>
        </div>
        <div class="col-75">
          <select id="College:" name="College" required>
            <option value="">--Select Your College--</option>
            <?php
            $select_brands = "Select * from `colleges`";
            $result_brands= mysqli_query($con, $select_brands);

            while ($row_data = mysqli_fetch_assoc($result_brands)) {
              $clg_title = $row_data['college'];
              $clg_value = $row_data['code'];
              echo "<option value='$clg_value'>$clg_title</option>";
            }

            ?>
            <!-- <option value="Massachusetts Institute of Technology (MIT) ">Massachusetts Institute of Technology (MIT) </option>
                <option value="University of Cambridge">University of Cambridge </option>
                <option value=" Dr. B R Ambedkar University"> Dr. B R Ambedkar University</option>
                <option value="Chaudhary Charan Singh University">Chaudhary Charan Singh University</option>
                <option value="Amity University Noida">Amity University Noida</option>
                <option value="GLA University Mathura">GLA University Mathura</option>
                <option value="GL Bajaj Mathura">GL Bajaj Mathura</option> -->

          </select>
        </div>
      </div>

      <!-- <div class="row" >
            <div class="col-25">
              <label for="lname">College:</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="lastname" placeholder="Enter your College.." required>
            </div>
        </div> -->

      <div class="row">
        <div class="col-25">
          <label for="fname">Student Name:</label>
        </div>
        <div class="col-75">
          <input type="text" id="fname" name="name" placeholder="Enter Your name.." required>
        </div>
      </div>

   
      <div class="row">
            <div class="col-25">
              <label for="code">Code:</label>
            </div>
            <div class="col-75">
              <input type="text" id="code" name="code" placeholder="Enter your college code..">
            </div>
          </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Programme:</label>
        </div>
        <div class="col-75">
          <input type="text" id="lname" name="course" placeholder="Enter your Course.." required>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Email:</label>
        </div>
        <div class="col-75">
          <input type="email" id="lname" name="email" placeholder="Your gmail id.." required>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="Password">Password:</label>
        </div>
        <div class="col-75">
          <input type="text" id="Password" name="Password" placeholder="Enter Your Password.." required>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Phone no:</label>
        </div>
        <div class="col-75">
          <input type="number" id="lname" name="number" placeholder="ENTER YOUR NUMBER" required>
        </div>
      </div>


      <div class="row">
        <div class="col-25">
          <label for="lname">Gender:</label>
        </div>
        <div class="col-75">
          <input type="radio" id="Male" name="gender" value="male" required>
          <label for="Male">Male</label>
          <input type="radio" id="female" name="gender" value="female" required>
          <label for="female">Female</label><br>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
        <label for="user_image" class="form-label">Your Image: </label><br>
        </div>
        <div class="col-75">
          <input type="file" id="user_image" class="form-control" name="user_image" required>
        
        </div>
      </div>



      <!-- <div class="row">
            <div class="col-25">
              <label for="lname">Team name:</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="lastname" placeholder="Your Team Name..">
            </div>
          </div> -->
      <!-- <div class="row">
            <div class="col-25">
              <label for="country">Country</label>
            </div>
            <div class="col-75">
              <select id="country" name="country">
                <option value="australia">Australia</option>
                <option value="canada">Canada</option>
                <option value="usa">USA</option>
              </select>
            </div>
          </div> -->
      <!-- <div class="row">
            <div class="col-25">
              <label for="subject">Subject</label>
            </div>
            <div class="col-75">
              <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
            </div>
          </div> -->
      <!-- <div class="row">
            <div class="col-25">
              <label for="lname">Team Size:</label>
            </div>
            <div class="col-75">
              <input type="text" id="lname" name="lastname" placeholder="Your Team Size..">
            </div>
          </div> -->
      <br>
      <div class="row">
        <input type="submit" value="Submit" name="submit">
      </div>
    </form>
  </div>
  <script>
  function validateForm() {
    const email = document.forms["registerForm"]["email"].value;
    const password = document.forms["registerForm"]["Password"].value;
    const college = document.forms["registerForm"]["College"].value;
    const name = document.forms["registerForm"]["name"].value;
    const code = document.forms["registerForm"]["code"].value;
    const course = document.forms["registerForm"]["course"].value;
    const number = document.forms["registerForm"]["number"].value;

    if (email == "" || password == "" || college == "" || name == "" || code == "" || course == "" || number == "") {
      alert("All fields must be filled out");
      return false;
    }

    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailRegex.test(email)) {
      alert("Invalid email format");
      return false;
    }

    if(number.length != 10){
      alert("Phone must be at least 10 characters long");
      return false;
    }

    if (password.length < 8) {
      alert("Password must be at least 8 characters long");
      return false;
    }
  }
</script>
</body>

</html>