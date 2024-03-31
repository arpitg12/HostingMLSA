<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Pooling</title>
  <style>
    * {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: Arial, sans-serif;
  line-height: 1.6;
}
/* Style the scrollbar for Webkit-based browsers */
::-webkit-scrollbar {
  width: 10px; /* Width of the scrollbar rail */
  height: 10px; /* Height of the scrollbar rail */
}

/* Style the scroll thumb (track area) */
::-webkit-scrollbar-thumb {
  background-color: #b10269; /* Color of the scroll thumb */
  border-radius: 5px; /* Roundness of the scroll thumb */
}

/* Handle hovering over the scroll thumb */
::-webkit-scrollbar-thumb:hover {
  background-color: #c80376;
}

/* Style the scroll track */
::-webkit-scrollbar-track {
  background-color: #f5f5f5; /* Color of the scroll track */
  border-radius: 5px; /* Roundness of the scroll track */
}

/* Handle hovering over the scroll track */
::-webkit-scrollbar-track:hover {
  background-color: #fafafa;
}
.container {
  max-width: 1100px;
  margin: auto;
  overflow: hidden;
  padding: 0 20px;
}

.container1 {
  max-width: 1100px;
  margin: auto;
  overflow: hidden;
  padding: 0 20px;
  border: dashed; 
    border-radius: 25px;
     border-width: 6px; 
     border-color: blue;
}

/* Navbar */
.navbar {
  background-color: #e5dede;
  color: #e70bc3;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem 0;
  position: relative;
}

.navbar .brand {
  color: #eb0fdd;
  font-size: 2rem;
  font: bolder;
}

/* Hero Section */
.hero {
  position: ;
  background-image: url('car-coins-flickr-QuoteInspector.com-CC-2.0-600x400.jpg');
  background-size: cover;
  background-position: center;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  color: #78fc04;
  object-fit: cover;
}

.hero h1 {
  font-size: 7rem;
  margin-bottom: 1rem;
}

.hero p {
  font-size: 2.5rem;
  max-width: 45rem;
  margin: auto;
  color: #f9faf8;
}

/* About Section */
.about {
  padding: 6rem 0;
}

.about h2 {
  font-size: 2.5rem;
  margin-bottom: 3rem;
  text-align: center;
}

.about img {
  max-width: 100%;
  height: auto;
}

/* How Car Pooling Works */
.how-it-works {
  padding: 6rem 0;
  background-color: #f5f5f5;
}

.how-it-works h2 {
  font-size: 2.5rem;
  margin-bottom: 3rem;
  text-align: center;
}

.how-it-works .steps {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
}

.how-it-works .step {
  flex-basis: 30%;
  margin-bottom: 3rem;
  text-align: center;
}

.how-it-works .step img {
  width: 5rem;
  height: 5rem;
  margin-bottom: 1rem;
}

/* Footer */
.footer {
  background-color: #333;
  color: #fff;
  padding: 2rem 0;
  text-align: center;
}

.footer p {
  margin-bottom: 0;
}


  </style>
  <style>
 * { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: Arial, sans-serif; line-height: 1.6; background-color: #f5f5f5; } 
  .container { max-width: 1100px; margin: auto; overflow: hidden; padding: 0 20px; } 
  .container1 { max-width: 1100px; margin: auto; overflow: hidden; padding: 0 20px; border: dashed; border-radius:
     25px; border-width: 6px; border-color: blue; background-color: rgba(255, 255, 255, 0.9);
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1); padding: 20px; } /* Navbar */ 
      .navbar { background-color: #e5dede; color: #e70bc3; display: flex; justify-content: space-between; 
        align-items: center; padding: 1rem 0; } .navbar .brand { color: #eb0fdd; font-size: 2rem; font: bolder; } 
        /* Hero Section */ .hero { background-image: url('car-coins-flickr-QuoteInspector.com-CC-2.0-600x400.jpg'); 
        background-size: cover; background-position: center; height: 100vh; display: flex; justify-content: center; 
        align-items: center; text-align: center; color: #78fc04; object-fit: cover; } .hero h1 { font-size: 4.5rem; 
            margin-bottom: 1rem; } .hero p { font-size: 1.8rem; max-width: 45rem; margin: auto; color: #f9faf8; } 
            /* About Section */ .about { padding: 4rem 0; } .about h2 { font-size: 2.5rem; margin-bottom: 3rem; text-align: center; } 
            .about img { max-width: 100%; height: auto; border-radius: 10px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);
                 margin-bottom: 3rem; } /* How Car Pooling Works */ .how-it-works { padding: 4rem 0; background-color: #f5f5f5; } 
                 .how-it-works h2 { font-size: 2.5rem; margin-bottom: 3rem; text-align: center; } 
                 .how-it-works .steps { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; }
                  .how-it-works .step { flex-basis: 45%; margin-bottom: 3rem; text-align: center; }
                   .how-it-works .step img { width: 100px; height: 100px; margin-bottom: 1rem; }
  </style>
  <style>
    /* How Car Pooling Works */ 
    .how-it-works { padding: 4rem 0; background-color: #f5f5f5; }
     .how-it-works h2 { font-size: 2.5rem; margin-bottom: 3rem; text-align: center; } 
     .how-it-works .steps { display: flex; justify-content: center; align-items: center; flex-wrap: wrap; } 
     .how-it-works .step { flex-basis: 100%; max-width: 300px; margin: 0 auto 3rem; text-align: center; 
    } .how-it-works .step img { width: 100px; height: 100px; margin-bottom: 1rem; } 
    /* Media query for screens smaller than 768px (tablet view) */
     @media screen and (max-width: 767px) { .how-it-works .step { margin-bottom: 2rem; } }
    .navbar-buttons {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: auto;
  /* margin: 0 16px; */
}

.navbar-buttons button {
  margin: 0 8px;
  padding: 8px 16px;
  border-radius: 4px;
  font-size: 1rem;
  line-height: 1.5;
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
  cursor: pointer;
  transition: background-color 0.2s ease;
}

.cta-button {
  background-color: #b10269;
  color: #fff;
}

.cta-button:hover {
  background-color: #c80376;
}

.support-button {
  background-color: transparent;
  border: 2px solid #b10269;
  color: #b10269;
}

.support-button:hover {
  background-color: #b10269;
  color: #fff;
}

@media screen and (max-width: 767px) {
  .navbar-buttons {
    margin: 0 8px;
  }

  .navbar-buttons button {
    padding: 6px 12px;
    font-size: 0.9rem;
  }
}
  </style>
  
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar">
    <div class="container1">
      <span class="brand"><marquee> Save Money and Reduce Your Carbon Footprint 💯</marquee></span>
      <div class="navbar-buttons">
        <button  class="cta-button"><a style="text-decoration:none; color:white;" href="carpoolform.php">Fill form</a></button>
        <button class="support-button"><a style="text-decoration:none; color:black;" href="viewtable.php">View table</a></button>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <h1>Sharing is caring</h1>
      <p>Car pooling helps you save money and contribute to a greener environment by sharing rides with others.</p>
      <!-- <img src="th (1).jpeg" alt="Car Pooling Image"> -->
    </div>
  </section>

  <!-- About Car Pooling -->
  <section class="about car-pooling">
    <div class="container1">
      <h2 class="brand">What is Car Pooling?</h2>
      <div class="content">
        <div class="points">
          <p><strong>Shared Transportation:</strong> Car pooling, also known as carpooling or ridesharing, is a transportation arrangement where multiple individuals share a single vehicle to travel together to a common destination.</p>
          <p><strong>Cost Sharing:</strong> Participants in a car pool typically share the cost of fuel, tolls, and parking fees, which can result in significant savings for each individual compared to driving alone.</p>
          <p><strong>Reduced Traffic Congestion:</strong> Car pooling helps reduce the number of vehicles on the road, thereby easing traffic congestion, especially during peak hours.</p>
          <p><strong>Environmental Benefits:</strong> By reducing the number of vehicles on the road, car pooling contributes to lowering greenhouse gas emissions and air pollution, thus promoting a cleaner and healthier environment.</p>
          <p><strong>Social Interaction:</strong> Car pooling provides an opportunity for social interaction and networking among passengers, fostering a sense of community and camaraderie.</p>
          <p><strong>Increased Productivity:</strong> Passengers in a car pool can utilize travel time more efficiently by engaging in activities such as reading, working on laptops, or preparing for meetings, thereby enhancing productivity.</p>
          <p><strong>Access to Carpool Lanes:</strong> In many regions, car pools are eligible for special lanes or incentives, such as HOV (High Occupancy Vehicle) lanes, which can further reduce travel time and improve overall commuting experience.</p>
          <p><strong>Flexible Arrangements:</strong> Car pooling arrangements can vary in terms of frequency, routes, and pick-up/drop-off locations, providing flexibility to participants based on their needs and schedules.</p>
          <p><strong>Safety in Numbers:</strong> Traveling in a group can enhance safety and security, especially during late hours or in areas with limited public transportation options.</p>
          <p><strong>Promotion of Sustainable Transportation:</strong> Car pooling aligns with the principles of sustainable transportation by maximizing the efficient use of existing resources and reducing the negative impacts associated with single-occupancy vehicle travel.</p>
          <p><strong>Overall:</strong> Car pooling offers a multitude of benefits ranging from cost savings and environmental conservation to social interaction and enhanced mobility, making it a viable and attractive transportation option for many individuals and communities.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- How Car Pooling Works -->
  <section class="how-it-works">
    <div class="container">
      <h2>How Car Pooling Works</h2>
      <div class="steps">
        <div class="step">
          <img src="search-icon-png-7.jpg" alt="Step 1 Icon">
          <h3>Choose a Hackthon</h3>
          <p>Search for available Hackthons to participate in.</p>
        </div>
        <div class="step">
          <img src="form-icon-17.jpg" alt="Step 2 Icon">
          <h3>Fill the form</h3>
          <p>Provide necessary information by filling the car pooling form..</p>
        </div>
        <div class="step">
          <img src="OIP.jpeg" alt="Step 3 Icon">
          <h3>Pool the car</h3>
          <p>Check the list of others who are interested in car pooling and collaborate with them.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <p>&copy; 2024 Car Pooling Created by Arpit Agrawal</p>
    </div>
  </footer>

</body>
</html>
