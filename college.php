<?php 
  $con=mysqli_connect('localhost','root','','student_master');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
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
</head>
<body>
<?php


if(isset($_POST['submit'])){

$Affiliation=$_POST['Affiliation'];
$College=$_POST['College'];
$code=$_POST['code'];
$city=$_POST['city'];

$insert_query="insert into `colleges` (Affiliation,
college, code, city) values ('$Affiliation','$College',
$code,'$city')";
$sql_execute=mysqli_query($con,$insert_query);

if($sql_execute){
 echo "<script>alert('Registered Successfully')</script>";
}
}
?>
    <div class="container">
        <div class="h1"><h1>College Registration</h1></div>
        <form action="" method="post">


        <div class="row">
            <div class="col-25">
              <label for="Affiliation">Affiliation:</label>
            </div>
            <div class="col-50">
              <select id="Affiliation:" name="Affiliation" required>
              <option value="">--Select Your College Affiliation--</option>
                <option class="col-75"  value="aktu">aktu</option>
                <option value="aktu">aktu</option>
                <option value="aktu">aktu</option>
                <option value="aktu"> aktu</option>
                <option value="aktu">aktu </option>
                <option value="aktu">aktu</option>
                <option value="aktu">aktu</option>
               
              </select>
            </div>
          </div>
          
        <div class="row">
            <div class="col-25">
              <label for="College">College:</label>
            </div>
            <div class="col-50">
              <select id="College:" name="College" required>
              <option value="">--Select Your College--</option>
                <option value="Massachusetts Institute of Technology (MIT) ">Massachusetts Institute of Technology (MIT) </option>
                <option value="University of Cambridge">University of Cambridge </option>
                <option value=" Dr. B R Ambedkar University"> Dr. B R Ambedkar University</option>
                <option value="Chaudhary Charan Singh University">Chaudhary Charan Singh University</option>
                <option value="Amity University Noida">Amity University Noida</option>
                <option value="GLA University Mathura">GLA University Mathura</option>
                <option value="GL Bajaj Mathura">GL Bajaj Mathura</option>
               
              </select>
            </div>
          </div>


       


          <div class="row">
            <div class="col-25">
              <label for="code">College Code:</label>
            </div>
            <div class="col-50">
              <input type="text" id="code" name="code" placeholder="Your College Code..">
            </div>
          </div>
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
          <div class="row">
            <div class="col-25">
              <label for="city">City:</label>
            </div>
            <div class="col-50">
              <input type="text" id="city" name="city" placeholder="Your College City">
            </div>
          </div>
          <br>
          <div class="row">
            <input type="submit" value="Submit" name="submit">
          </div>
        </form>
      </div>
</body>
</html>