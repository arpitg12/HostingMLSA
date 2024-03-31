<?php 
  $con=mysqli_connect('localhost','root','','car_pooling');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
  font-family: 'lato', sans-serif;
}
.container {
  max-width: 1000px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 10px;
  padding-right: 10px;
}

h2 {
  font-size: 26px;
  margin: 20px 0;
  text-align: center;
  small {
    font-size: 0.5em;
  }
}

.responsive-table {
  li {
    border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
  }
  .table-header {
    background-color: #95A5A6;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.03em;
  }
  .table-row {
    background-color: #ffffff;
    box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
  }
  .col-1 {
    flex-basis: 10%;
  }
  .col-2 {
    flex-basis: 40%;
  }
  .col-3 {
    flex-basis: 25%;
  }
  .col-4 {
    flex-basis: 25%;
  }
  
  @media all and (max-width: 767px) {
    .table-header {
      display: none;
    }
    .table-row{
      
    }
    li {
      display: block;
    }
    .col {
      
      flex-basis: 100%;
      
    }
    .col {
      display: flex;
      padding: 10px 0;
      &:before {
        color: #6C7A89;
        padding-right: 10px;
        content: attr(data-label);
        flex-basis: 50%;
        text-align: right;
      }
    }
  }
}

nav{
  background: #171c24;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  height: 70px;
  padding: 0 100px;
}
nav .logo{
  color: #fff;
  font-size: 30px;
  font-weight: 600;
  letter-spacing: -1px;
}
nav .nav-items{
  display: flex;
  flex: 1;
  padding: 0 0 0 40px;
}
nav .nav-items li{
  list-style: none;
  padding: 0 15px;
}
nav .nav-items li a{
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  text-decoration: none;
}
nav .nav-items li a:hover{
  color: #ff3d00;
}
nav form{
  display: flex;
  height: 40px;
  padding: 2px;
  background: #1e232b;
  min-width: 18%!important;
  border-radius: 2px;
  border: 1px solid rgba(155,155,155,0.2);
}
nav form .search-data{
  width: 100%;
  height: 100%;
  padding: 0 10px;
  color: #fff;
  font-size: 17px;
  border: none;
  font-weight: 500;
  background: none;
}
nav form button{
  padding: 0 15px;
  color: #fff;
  font-size: 17px;
  background: #ff3d00;
  border: none;
  border-radius: 2px;
  cursor: pointer;
}
nav form button:hover{
  background: #e63600;
}
nav .menu-icon,
nav .cancel-icon,
nav .search-icon{
  width: 40px;
  text-align: center;
  margin: 0 50px;
  font-size: 18px;
  color: #fff;
  cursor: pointer;
  display: none;
}
nav .menu-icon span,
nav .cancel-icon,
nav .search-icon{
  display: none;
}
@media (max-width: 1245px) {
  nav{
    padding: 0 50px;
  }
}
@media (max-width: 1140px){
  nav{
    padding: 0px;
  }
  nav .logo{
    flex: 2;
    text-align: center;
  }
  nav .nav-items{
    position: fixed;
    z-index: 99;
    top: 70px;
    width: 100%;
    left: -100%;
    height: 100%;
    padding: 10px 50px 0 50px;
    text-align: center;
    background: #14181f;
    display: inline-block;
    transition: left 0.3s ease;
  }
  nav .nav-items.active{
    left: 0px;
  }
  nav .nav-items li{
    line-height: 40px;
    margin: 30px 0;
  }
  nav .nav-items li a{
    font-size: 20px;
  }
  nav form{
    position: absolute;
    top: 80px;
    right: 50px;
    opacity: 0;
    pointer-events: none;
    transition: top 0.3s ease, opacity 0.1s ease;
  }
  nav form.active{
    top: 95px;
    opacity: 1;
    pointer-events: auto;
  }
  nav form:before{
    position: absolute;
    content: "";
    top: -13px;
    right: 0px;
    width: 0;
    height: 0;
    z-index: -1;
    border: 10px solid transparent;
    border-bottom-color: #1e232b;
    margin: -20px 0 0;
  }
  nav form:after{
    position: absolute;
    content: '';
    height: 60px;
    padding: 2px;
    background: #1e232b;
    border-radius: 2px;
    min-width: calc(100% + 20px);
    z-index: -2;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
  }
  nav .menu-icon{
    display: block;
  }
  nav .search-icon,
  nav .menu-icon span{
    display: block;
  }
  nav .menu-icon span.hide,
  nav .search-icon.hide{
    display: none;
  }
  nav .cancel-icon.show{
    display: block;
  }
}

.space{
  margin: 10px 0;
}
nav .logo.space{
  color: red;
  padding: 0 5px 0 0;
}
@media (max-width: 980px){
  nav .menu-icon,
  nav .cancel-icon,
  nav .search-icon{
    margin: 0 20px;
  }
  nav form{
    right: 30px;
  }
}
@media (max-width: 350px){
  nav .menu-icon,
  nav .cancel-icon,
  nav .search-icon{
    margin: 0 10px;
    font-size: 16px;
  }
}
    </style>
</head>
<body>
<nav>
         <div class="menu-icon">
            <span class="fas fa-bars"></span>
         </div>
         <div class="logo">
            We_Connect
         </div>
         <div class="search-icon">
            <span class="fas fa-search"></span>
         </div>
         <div class="cancel-icon">
            <span class="fas fa-times"></span>
         </div>
         <form action="#" method="post">
            <input type="search" class="search-data" name="search-data" placeholder="Search" required>
            <input type="submit" class="fas fa-search"name="search-data-code"></input>
         </form>
      </nav>

     <?php
      function searchdata(){
        global $con;
        if(isset($_POST['search-data-code'])){
          $user_username=$_POST['search-data'];
  
          $select_brands = "Select * from `poolingdata` where Hackthon_id=$user_username";// where code='$search_data'
          $result_brands= mysqli_query($con, $select_brands);
          
          while ($row_data = mysqli_fetch_assoc($result_brands)) {
              $Hackthon_id=$row_data['Hackthon_id'];
            $Username = $row_data['Username'];
            $location = $row_data['location'];
            $Email = $row_data['Email'];
            echo "<li class='table-row'>
            <div class='col col-1' data-label='Hackthon_id'>$Hackthon_id</div>
            <div class='col col-2' data-label='Username'>$Username</div>
            <div class='col col-3' data-label='location'>$location</div>
            <div class='col col-3' data-label='Email'>$Email</div>
            
          </li>";
          }
        }
      }

      function completedata(){
        global $con;
        $select_brands = "Select * from `poolingdata`";// where code='$search_data'
        $result_brands= mysqli_query($con, $select_brands);
        
        while ($row_data = mysqli_fetch_assoc($result_brands)) {
            $Hackthon_id=$row_data['Hackthon_id'];
          $Username = $row_data['Username'];
          $location = $row_data['location'];
          $Email = $row_data['Email'];
          echo "<li class='table-row'>
          <div class='col col-1' data-label='Hackthon_id'>$Hackthon_id</div>
          <div class='col col-2' data-label='Username'>$Username</div>
          <div class='col col-3' data-label='location'>$location</div>
          <div class='col col-3' data-label='Email'>$Email</div>
          
        </li>";
        }
      } 
     ?>
     
     
<div class="container">
  <h2>Car Pooling<small></small></h2>
  <ul class="responsive-table">
    <li class="table-header">
    <div class="col col-1">Id</div>
      <div class="col col-2">Name</div>
      <div class="col col-3">Your location</div>
      <div class="col col-3">Email</div>
      <!-- <div class="col col-3">Amount Due</div>
      <div class="col col-4">Payment Status</div> -->
    </li>

    <?php  
            searchdata();
            completedata();
            ?>
  </ul>
</div>
<script>
         const menuBtn = document.querySelector(".menu-icon span");
         const searchBtn = document.querySelector(".search-icon");
         const cancelBtn = document.querySelector(".cancel-icon");
         const items = document.querySelector(".nav-items");
         const form = document.querySelector("form");
         menuBtn.onclick = ()=>{
           items.classList.add("active");
           menuBtn.classList.add("hide");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
         cancelBtn.onclick = ()=>{
           items.classList.remove("active");
           menuBtn.classList.remove("hide");
           searchBtn.classList.remove("hide");
           cancelBtn.classList.remove("show");
           form.classList.remove("active");
           cancelBtn.style.color = "#ff3d00";
         }
         searchBtn.onclick = ()=>{
           form.classList.add("active");
           searchBtn.classList.add("hide");
           cancelBtn.classList.add("show");
         }
      </script>
</body>
</html>