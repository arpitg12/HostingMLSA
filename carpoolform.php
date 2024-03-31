<?php
$con = mysqli_connect('localhost', 'root', '', 'car_pooling');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>

  <?php


  if (isset($_POST['submit'])) {

    $Hackthon_id = $_POST['Hackthon_id'];
    $Username = $_POST['Username'];
    $address = $_POST['address'];
    $email = $_POST['email'];

   
    $emailquery = "select * from `poolingdata` where Email='$email' and Hackthon_id='$Hackthon_id' ";
    $query = mysqli_query($con, $emailquery);

    $emailcount = mysqli_num_rows($query);

    $select_query="Select * from `poolingdata` where Username='$Username' and

    Hackthon_id='$Hackthon_id'";

$result=mysqli_query($con, $select_query);

$rows_count=mysqli_num_rows($result);

if($rows_count>0){

echo "<script>alert('Already exist') </script>";
echo "<script>window.open('viewtable.php','_self')</script>";
}
    else if($emailcount>0){
        ?>
        <script>
            alert("Already exists");
            echo "<script>window.open('viewtable.php','_self')</script>";
        </script>
        <?php
    }
    else{
   
    $insert_query = "insert into `poolingdata` (Hackthon_id,
    Username, location , Email) values ('$Hackthon_id',
   '$Username','$address','$email')";
    $sql_execute = mysqli_query($con, $insert_query);

    if ($sql_execute) {
      echo "<script>alert('Added Successfully')</script>";
      echo "<script>window.open('viewtable.php','_self')</script>";
    }
    else{
      echo "<script>alert('Error occured')</script>";
      echo "<script>window.open('car.php','_self')</script>";
    }
  }
}
  ?>

  <div class="container">
    <div class="h1">
      <h1>Car Pooling</h1>
    </div>
    <form action="" method="post" enctype="">


      <div class="row">
        <div class="col-25">
          <label for="Hackthon id">Hackthon id:</label>
        </div>
        <div class="col-75">
          <input type="text" id="Hackthon id" name="Hackthon_id" placeholder="Hackthon id" required>
        </div>
      </div>

   
      <div class="row">
            <div class="col-25">
              <label for="Username">Username:</label>
            </div>
            <div class="col-75">
              <input type="text" id="Username" name="Username" placeholder="Your name">
            </div>
          </div>
      <div class="row">
        <div class="col-25">
          <label for="address">Your location:</label>
        </div>
        <div class="col-75">
          <input type="text" id="address" name="address" placeholder="From where you want to pool.." required>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Email:</label>
        </div>
        <div class="col-75">
          <input type="email" id="lname" name="email" placeholder="Your email id.." required>
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