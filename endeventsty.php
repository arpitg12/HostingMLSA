<?php
$con = mysqli_connect('localhost', 'root', '', 'student_master');
include('functions/ip.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Student Registration Form</title>
  <style>
    body {
      background-color: #ddd;
    }
    form {
      margin: auto;
      width: min(600px, 80%);
      padding: 20px;
      border: 1px solid #fff;
      border-radius: 10px;
      background-color: #fff;
      color: black;
    }
    h2 {
      text-align: center;
      font-size: 28px;
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    textarea,
    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-sizing: border-box;
    }
    .buttons {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }
    .buttons button {
      background-color: #11274e;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      width: 150px;
      font-size: 16px;
      cursor: pointer;
      margin-right: 10px;
    }
    .buttons button:hover {
      background-color: #5b31d0;
    }
    .create-join {
      display: none;
    }
  </style>
</head>
<body>

<?php


if (isset($_POST['submit'])) {

  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $gender = $_POST['gender'];
  $institute_name = $_POST['institute_name'];
  $institute_code = $_POST['institute_code'];
  $type = $_POST['type'];
  
  $courses = $_POST['courses'];
  $other_course = $_POST['other_course'];
  $course_specialization = $_POST['course_specialization'];
  $graduation_year = $_POST['graduation_year'];
  $graduation_duration = $_POST['graduation_duration'];
  $country = $_POST['country'];
  $user_ip=getIPAddress();
 
 
  $emailquery = "select * from `studenteventreg` where email='$email' ";
  $query = mysqli_query($con, $emailquery);

  $emailcount = mysqli_num_rows($query);

  $select_query="Select * from `studenteventreg` where first_name='$first_name' and

  email='$email'";

$result=mysqli_query($con, $select_query);

$rows_count=mysqli_num_rows($result);

if($rows_count>0){

echo "<script>alert('Already exist') </script>";

}
  else if($emailcount>0){
      ?>
      <script>
          alert("Email already exists");
      </script>
      <?php
  }
  else{
    
  $insert_query = "insert into `studenteventreg` (first_name,
  last_name, email ,mobile, gender, Institute_name, Institute_code , Type, courses , mention_course,  course_specilization,
   gy, gd, cr) values
   ('$first_name',
 '$last_name','$email',$mobile,'$gender','$institute_name'
 ,'$institute_code','$type', '$courses', '$other_course', '$course_specialization',
 '$graduation_year', $graduation_duration, '$country' 
  )";
  $sql_execute = mysqli_query($con, $insert_query);

  if ($sql_execute) {
    echo "<script>alert('Registered Successfully')</script>";
    echo "<script>window.open('table.php','_self')</script>";
  }
  else{
    echo "<script>alert('Not Registered')</script>";
  }
}
}
?>
  <div class="basic">
    <form id="student-registration-form" method="post">
      <h2>Student Registration Form</h2>
      <label for="first-name">First Name:</label>
      <input type="text" id="first-name" name="first_name" required>
      <label for="last-name">Last Name:</label>
      <input type="text" id="last-name" name="last_name" required>
      <label for="email">Email Address:</label>
      <input type="email" id="email" name="email" required>
      <label for="mobile">Mobile:</label>
      <input type="tel" id="mobile" name="mobile" required>
      <label for="gender">Gender:</label>
      <select id="gender" name="gender" required>
        <option value="">Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>
      <label for="institute-name">Institute Name:</label>
      <input type="text" id="institute-name" name="institute_name" required>
      <label for="institute-code">Institute Code:</label>
      <input type="text" id="institute-code" name="institute_code" required>
      <label for="type">Type:</label>
      <select id="type" name="type" required>
        <option value="">Select Type</option>
        <option value="college-student">College Student</option>
        <option value="professional">Professional</option>
        <option value="school-student">School Student</option>
        <option value="freshers">Freshers</option>
        <option value="others">Others</option>
      </select>
      <label for="courses">Courses:</label>
      <select id="courses" name="courses" required>
        <option value="">Select Course</option>
        <option value="btech">B.Tech</option>
        <option value="bca">BCA</option>
        <option value="bba">BBA</option>
        <option value="bcom">B.COM</option>
        <option value="mtech">M.Tech</option>
        <option value="mca">MCA</option>
        <option value="mba">MBA</option>
        <option value="mcom">M.COM</option>
        <option value="others">Others</option>
      </select>
      <label for="other-course">If others, Mention Course:</label>
      <input type="text" id="other-course" name="other_course">
      <label for="course-specialization">Course Specialisation:</label>
      <input type="text" id="course-specialization" name="course_specialization" required>
      <label for="graduation-year">Graduation Year:</label>
      <select id="graduation-year" name="graduation_year" required>
        <option value="">Select Year</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2025">2025</option>
        <option value="2026">2026</option>
        <option value="2027">2027</option>
        <option value="2028">2028</option>
      </select>
      <label for="graduation-duration">Graduation Duration:</label>
      <input type="number" id="graduation-duration" name="graduation_duration" min="0" required>
      <label for="country">Country of Residence:</label>
      <input type="text" id="country" name="country" required>

      <div class="row">
        <input type="submit" value="Submit" name="submit">
      </div>
    </form>
  </div>

  <!-- <div class="create-join" id="create-join-form">
    <form>
      <h2>Create or Join Team</h2>
      <div class="form-group">
        <label for="team-name">Team Name:</label>
        <input type="text" id="team-name" name="team-name" required>
      </div>
      <div class="form-group">
        <label for="team-id">Team Id:</label>
        <input type="text" id="team-id" name="team-id" required>
      </div>
      <div class="buttons">
        <button type="button" onclick="joinTeam()">Join Team</button>
        <button type="button" onclick="createTeam()">Create Team</button>
        <button type="button" onclick="showStudentRegistrationForm()">Back</button>
      </div>
    </form>
  </div>

  <script>
    function createTeam() {
      // Generate a unique team id
      const teamId = Math.random().toString(36).substring(2) + Date.now();
      
      // Set the team id as the value of the hidden input field
      document.getElementById('team-id').value = teamId;
      
      // Show a success message
      alert('Team created successfully. Your team id is: ' + teamId);
      
      // Submit the form
      document.getElementById('student-registration-form').submit();
    }
    
    function showCreateJoinForm(event) {
      event.preventDefault(); // Prevent default form submission
      document.getElementById('student-registration-form').style.display = 'none'; // Hide student registration form
      document.getElementById('create-join-form').style.display = 'block'; // Show create or join form
    }
  
    function showStudentRegistrationForm() {
      document.getElementById('create-join-form').style.display = 'none'; // Hide create or join form
      document.getElementById('student-registration-form').style.display = 'block'; // Show student registration form
    }
  </script> -->
</body>
</html>
