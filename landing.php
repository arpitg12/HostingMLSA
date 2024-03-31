<?php
$con = mysqli_connect('localhost', 'root', '', 'student_master');
include('functions/ip.php');
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>We_Connect</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- stylesheet  -->
  <link rel="stylesheet" href="../dist/output.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet">
  <!-- scripts -->
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Fonts Import -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
  <!-- fivIcons  -->
  <link rel="shortcut icon" href="./img/favicon-16x16.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <link rel="stylesheet" href="chat.css">
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
    .role {
      color: #229e86;
    }
  </style>
</head>

<body>
<button class="chatbot-toggler">
<span class="material-symbols-outlined">
mode_comment
</span>
        <span class="material-symbols-outlined">close</span>
    </button>
    <div class="chatbot">
        <header>
            <h2>Chatbot</h2>
            <span class="close-btn material-symbols-outlined">close</span>
        </header>
        <ul class="chatbox">
        </ul>
        <div class="chat-input">
            <textarea name="" id="" cols="30" rows="10" placeholder="Enter a message...." required></textarea>
            <span id="send-btn" class="material-symbols-outlined">send</span>
        </div>
    </div>
  <!-- Navbar and Heros Section -->
  <div>
    <!-- Navbar  -->
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse"><img src=".\img\logoWeConnectremovebg.png"
            class="h-8" alt="We_ConnectLogo"> <span
            class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">We_Connect</span></a>
        <?php
          if(!isset($_SESSION['name'])){
            echo "<div class='flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse'>

            <!-- button  -->
             <button type='button'
            class='text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'><a href='student_login.php'>Log in</a></button>
             <button type='button'
            class='text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800'><a href='student.php'>Sign up</a></button>
            <!-- button  -->
             <button data-collapse-toggle='navbar-user' type='button'
            class='inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600'
            aria-controls='navbar-user' aria-expanded='false'><span class='sr-only'>Open main menu</span> <svg
              class='w-5 h-5' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewbox='0 0 17 14'>
              <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'
                d='M1 1h15M1 7h15M1 13h15'></path>
            </svg></button>
        </div>";
          }
          
          else{
            $username=$_SESSION['name'];

            $user_data="Select * from `students` where stu_name='$username'";
            $user_data=mysqli_query($con, $user_data);
            $row_data=mysqli_fetch_array($user_data);
            $image=$row_data[9];
            $name=$row_data[2];
            $emaill=$row_data[5];
            echo "<div class='flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse'>
            <button type='button'
              class='flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600'
              id='user-menu-button' aria-expanded='false' data-dropdown-toggle='user-dropdown'
              data-dropdown-placement='bottom'><span class='sr-only'>Open user menu</span> <img
                class='w-8 h-8 rounded-full' src='./img/090.png' alt='user photo'></button>
            <!-- Dropdown menu -->
            <div
              class='z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600'
              id='user-dropdown'>
              <div class='px-4 py-3'>
                <span class='block text-sm text-gray-900 dark:text-white'>$name</span> <span
                  class='block text-sm text-gray-500 truncate dark:text-gray-400'>$emaill</span>
              </div>
              <ul class='py-2' aria-labelledby='user-menu-button'>
                <li>
                  <a href='profile.php'
                    class='block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white'>Dashboard</a>
                </li>
                
                <li>
                  <a href='logout.php'
                    class='block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white'>Sign
                    out</a>
                </li>
              </ul>
            </div>
            <button data-collapse-toggle='navbar-user' type='button'
              class='inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600'
              aria-controls='navbar-user' aria-expanded='false'>
              <span class='sr-only'>Open main menu</span>
              <svg class='w-5 h-5' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewbox='0 0 17 14'>
                <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'
                  d='M1 1h15M1 7h15M1 13h15'></path>
              </svg>
            </button>
          </div>
  ";
          }
        ?>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
          <ul
            class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
              <a href="#"
                class="block py-2 px-3 text-white bg-[#229e86] rounded md:bg-transparent md:text-[#229e86] md:p-0 md:dark:text-[229e86]"
                aria-current="page">Home</a>
            </li>
            <li>
              <a href="#"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#229e86] md:p-0 dark:text-white md:dark:hover:text-[#229e86] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
            </li>
            <li>
              <a href="eventform.php" 
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#229e86] md:p-0 dark:text-white md:dark:hover:text-[#229e86] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                Host Events
              </a>
            </li>
            <li>
              <a href="cardsection.php"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#229e86] md:p-0 dark:text-white md:dark:hover:text-[#229e86] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                Explore Events
              </a>
            </li>
            <li>
              <a href="car.php"
                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#229e86] md:p-0 dark:text-white md:dark:hover:text-[#229e86] dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Pooling</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- HeroSection  -->
    <section class="bg-white dark:bg-gray-900 pt-4 md:pt-12 pb-4 md:pb-20 lg:pb-28">
      <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
          <h1
            class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
            Connecting Minds with <span class="role"></span>
          </h1>
          <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">It assists
            college students in finding partners for hackathons, simplifying the process of working together effectively
            on hackathon projects.
          </p>
          <a href="cardsection.php"
            class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-600 hover:bg-[#229e86] focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
            Participate
            Now!
            <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
            </svg>
          </a>
          <a href="eventform.php"
            class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Host
            Events!</a>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex"><img src="./img/hackathon.jpg" alt="hackathon"></div>
      </div>
    </section>
  </div>

  <!-- Carousel -->
  <div class="bg-gradient-to-r from-cyan-500 to-blue-500">
    <div class="pt-5 pb-7 md:pb-0">
      <h1
        class=" text-4xl font-extrabold leading-none tracking-tight text-gray-700 md:text-5xl lg:text-6xl dark:text-gray-900 text-center">
        Join the hackathon<span
          class="b-1 underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-900 font-bold text-transparent bg-clip-text bg-gradient-to-r from-white to-[#229e86] animate-movingGradient infinite">
          journey now.</span>
      </h1>
    </div>
    <section class="bg-gradient-to-r from-cyan-500 to-blue-500">
      <div class="gap-8 items-center px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 lg:px-6">
        <div class="px-10 ">
          <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-[650px]">
              <!-- Item 1 -->
              <div class="hidden duration-700 ease-in-out" data-carousel-item="">
                <img src="./img/carsoule1.jpg"
                  class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
              </div>
              <!-- Item 2 -->
              <div class="hidden duration-700 ease-in-out" data-carousel-item=""><img src="./img/carsoule2.jpg"
                  class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."></div>
              <!-- Item 3 -->
              <div class="hidden duration-700 ease-in-out" data-carousel-item=""><img src="./img/carsoule3.jpg"
                  class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."></div>
              <!-- Item 4 -->
              <div class="hidden duration-700 ease-in-out" data-carousel-item=""><img src="./img/carsoule4.jpg"
                  class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."></div>
              <!-- Item 5 -->
              <div class="hidden duration-700 ease-in-out" data-carousel-item=""><img src="./img/carsoule5.jpg"
                  class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."></div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse"></div>
            <!-- Slider controls -->
            <button type="button"
              class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
              data-carousel-prev="">
              <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 1 1 5l4 4"></path>
                </svg>
                <span class="sr-only">Previous</span>
              </span>
            </button>
            <button type="button"
              class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
              data-carousel-next="">
              <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4"></path>
                </svg>
                <span class="sr-only">Next</span>
              </span>
            </button>
          </div>
        </div>
        <div class="mt-4 md:mt-0">
          <h2 class="m-4 md:mb-4 text-4xl tracking-tight font-extrabold text-gray-900 ">Hackathons foster
            innovation, collaboration, and creativity among diverse participants
          </h2>
          <p class="m-4 md:mb-6 text-gray-800 md:text-lg font-semibold pb-5"> These intensive coding marathons empower
            teams to brainstorm ideas, develop prototypes, and present solutions.They provide valuable opportunities to
            showcase talent, gain recognition, and drive meaningful impact in various industries.
          </p>
        </div>
      </div>
    </section>
  </div>

  <!-- Stepper -->
  <div>
    <h1 class="mt-4 pb-8 text-center text-3xl font-extrabold text-gray-900 dark:text-black md:text-5xl lg:text-6xl">
      <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Step-by-Step
      </span>
      Journey Map
    </h1>
    <div class=" px-8">
      <ol
        class="flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
        <li
          class="flex md:w-full items-center text-blue-600 dark:text-[#229e86] sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
          <span
            class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="currentColor" viewbox="0 0 20 20">
              <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z">
              </path>
            </svg>
            Log
            <span class="hidden sm:inline-flex sm:ms-2"> In</span>
          </span>
        </li>
        <li
          class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
          <span
            class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500"><span
              class="me-2">2</span> Select <span class="hidden sm:inline-flex sm:ms-2">Hackathon</span></span>
        </li>
        <li
          class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
          <span
            class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500"><span
              class="me-2">3</span> Event <span class="hidden sm:inline-flex sm:ms-2">Registration</span></span>
        </li>
        <li>
          <span class="flex items-center "><span class="me-2">4</span> View <span
              class="hidden sm:inline-flex sm:ms-2">Participants</span></span>
        </li>

      </ol>
    </div>
    <!-- image  -->
    <div class="flex justify-center mt-8">
      <figure class="max-w-lg">
        <img class="h-auto max-w-full rounded-lg" src="./img/global.png" alt="Global Image">
        <figcaption class="mt-2 text-large text-center text-gray-500 dark:text-gray-400">We are Global!</figcaption>
      </figure>
    </div>
  </div>
  <!-- DownWord Gradient  -->
  <div class="mt-5">
    <div class="bg-gradient-to-r from-cyan-500 to-blue-500 ">
      <!-- Testimonials -->
      <div class="container mt-6 mb-24 mx-auto md:px-6">
        <!-- Section: Design Block -->
        <section class="mb-32 text-center">
          <h2 class="pt-4 mb-12 text-7xl font-bold ">Our Reviews</h2>
          <div class="pb-8">
            <div class="grid gap-x-6 md:grid-cols-3 xl:gap-x-12">
              <div class="mb-6 lg:mb-0">
                <div
                  class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] ">
                  <div class="relative overflow-hidden bg-cover bg-no-repeat">
                    <img src="./img/6.jpg" class="w-full rounded-t-lg" alt="6">
                    <a href="#!">
                      <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-fixed"></div>
                    </a>
                    <svg class="absolute left-0 bottom-0 text-white" xmlns="http://www.w3.org/2000/svg"
                      viewbox="0 0 1440 320">
                      <path fill="currentColor"
                        d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                      </path>
                    </svg>
                  </div>
                  <div class="p-6">
                    <h5 class="mb-2 text-lg font-bold">Halley Frank</h5>
                    <h6 class="mb-4 font-medium text-primary dark:text-primary-400">Marketing Specialist</h6>
                    <ul class="mb-6 flex justify-center">
                      <li>
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 96 960 960" class="w-5 text-warning">
                          <path fill="currentColor"
                            d="m233 976 65-281L80 506l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z">
                          </path>
                        </svg>
                      </li>
                      <li>
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 96 960 960" class="w-5 text-warning">
                          <path fill="currentColor"
                            d="m233 976 65-281L80 506l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z">
                          </path>
                        </svg>
                      </li>
                      <li>
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 96 960 960" class="w-5 text-warning">
                          <path fill="currentColor"
                            d="m233 976 65-281L80 506l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z">
                          </path>
                        </svg>
                      </li>
                      <li>
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 96 960 960" class="w-5 text-warning">
                          <path fill="currentColor"
                            d="m233 976 65-281L80 506l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z">
                          </path>
                        </svg>
                      </li>
                      <li>
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 96 960 960" class="w-5 text-warning">
                          <path fill="currentColor"
                            d="m480 757 157 95-42-178 138-120-182-16-71-168v387ZM233 976l65-281L80 506l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z">
                          </path>
                        </svg>
                      </li>
                    </ul>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium accusamus
                      voluptatum deleniti atque corrupti.
                    </p>
                  </div>
                </div>
              </div>
              <div class="mb-6 lg:mb-0">
                <div
                  class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]">
                  <div class="relative overflow-hidden bg-cover bg-no-repeat">
                    <img src="./img/8.jpg" class="w-full rounded-t-lg" alt="8">
                    <a href="#!">
                      <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-fixed"></div>
                    </a>
                    <svg class="absolute left-0 bottom-0 text-white " xmlns="http://www.w3.org/2000/svg"
                      viewbox="0 0 1440 320">
                      <path fill="currentColor"
                        d="M0,96L48,128C96,160,192,224,288,240C384,256,480,224,576,213.3C672,203,768,213,864,202.7C960,192,1056,160,1152,128C1248,96,1344,64,1392,48L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                      </path>
                    </svg>
                  </div>
                  <div class="p-6">
                    <h5 class="mb-2 text-lg font-bold">John Doe</h5>
                    <h6 class="mb-4 font-medium text-primary dark:text-primary-400">Web Developer</h6>
                    <ul class="mb-6 flex justify-center">
                      <li>
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 96 960 960" class="w-5 text-warning">
                          <path fill="currentColor"
                            d="m233 976 65-281L80 506l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z">
                          </path>
                        </svg>
                      </li>
                      <li>
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 96 960 960" class="w-5 text-warning">
                          <path fill="currentColor"
                            d="m233 976 65-281L80 506l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z">
                          </path>
                        </svg>
                      </li>
                      <li>
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 96 960 960" class="w-5 text-warning">
                          <path fill="currentColor"
                            d="m233 976 65-281L80 506l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z">
                          </path>
                        </svg>
                      </li>
                      <li>
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 96 960 960" class="w-5 text-warning">
                          <path fill="currentColor"
                            d="m233 976 65-281L80 506l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z">
                          </path>
                        </svg>
                      </li>
                      <li>
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 96 960 960" class="w-5 text-warning">
                          <path fill="currentColor"
                            d="m233 976 65-281L80 506l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z">
                          </path>
                        </svg>
                      </li>
                    </ul>
                    <p>Ut pretium ultricies dignissim. Sed sit amet mi eget urna placerat vulputate. Ut vulputate est
                      non
                      quam
                      dignissim elementum. Donec a ullamcorper diam.
                    </p>
                  </div>
                </div>
              </div>
              <div class="mb-6 lg:mb-0">
                <div
                  class="block rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] ">
                  <div class="relative overflow-hidden bg-cover bg-no-repeat">
                    <img src="./img/15.jpg" class="w-full rounded-t-lg" alt="15">
                    <a href="#!">
                      <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-fixed"></div>
                    </a>
                    <svg class="absolute left-0 bottom-0 text-white" xmlns="http://www.w3.org/2000/svg"
                      viewbox="0 0 1440 320">
                      <path fill="currentColor"
                        d="M0,288L48,256C96,224,192,160,288,160C384,160,480,224,576,213.3C672,203,768,117,864,85.3C960,53,1056,75,1152,69.3C1248,64,1344,32,1392,16L1440,0L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                      </path>
                    </svg>
                  </div>
                  <div class="p-6">
                    <h5 class="mb-2 text-lg font-bold">Lisa Trey</h5>
                    <h6 class="mb-4 font-medium text-primary dark:text-primary-400">Public Relations</h6>
                    <ul class="mb-6 flex justify-center">
                      <li>
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 96 960 960" class="w-5 text-warning">
                          <path fill="currentColor"
                            d="m233 976 65-281L80 506l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z">
                          </path>
                        </svg>
                      </li>
                      <li>
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 96 960 960" class="w-5 text-warning">
                          <path fill="currentColor"
                            d="m233 976 65-281L80 506l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z">
                          </path>
                        </svg>
                      </li>
                      <li>
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 96 960 960" class="w-5 text-warning">
                          <path fill="currentColor"
                            d="m233 976 65-281L80 506l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z">
                          </path>
                        </svg>
                      </li>
                      <li>
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 96 960 960" class="w-5 text-warning">
                          <path fill="currentColor"
                            d="m233 976 65-281L80 506l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z">
                          </path>
                        </svg>
                      </li>
                      <li>
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 96 960 960" class="w-5 text-warning">
                          <path fill="currentColor"
                            d="m323 851 157-94 157 95-42-178 138-120-182-16-71-168-71 167-182 16 138 120-42 178Zm-90 125 65-281L80 506l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Zm247-355Z">
                          </path>
                        </svg>
                      </li>
                    </ul>
                    <p>Enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
                      aliquid
                      commodi quis nostrum minima.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Section: Design Block -->
      </div>
    </div>
  </div>
  <!-- Footer container -->
  <footer class="bg-white text-center text-black  lg:text-left">
    <div class="flex items-center justify-center border-b-2 border-neutral-200 p-6 lg:justify-between">
      <div class="me-12 hidden lg:block">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Social network icons container -->
      <div class="flex justify-center">
        <a href="#!" class="hover:text-[#229e86] me-6 [&amp;&gt;svg]:h-4 [&amp;&gt;svg]:w-4">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewbox="0 0 320 512">
            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
            <path
              d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z">
            </path>
          </svg>
        </a>
        <a href="#!" class="hover:text-[#229e86] me-6 [&amp;&gt;svg]:h-4 [&amp;&gt;svg]:w-4">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewbox="0 0 512 512">
            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
            <path
              d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z">
            </path>
          </svg>
        </a>
        <a href="#!" class="hover:text-[#229e86] me-6 [&amp;&gt;svg]:h-4 [&amp;&gt;svg]:w-4">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewbox="0 0 488 512">
            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
            <path
              d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z">
            </path>
          </svg>
        </a>
        <a href="#!" class="hover:text-[#229e86] me-6 [&amp;&gt;svg]:h-4 [&amp;&gt;svg]:w-4">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewbox="0 0 448 512">
            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
            <path
              d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
            </path>
          </svg>
        </a>
        <a href="#!" class="hover:text-[#229e86] me-6 [&amp;&gt;svg]:h-4 [&amp;&gt;svg]:w-4">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewbox="0 0 448 512">
            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
            <path
              d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z">
            </path>
          </svg>
        </a>
        <a href="#!" class="hover:text-[#229e86] [&amp;&gt;svg]:h-4 [&amp;&gt;svg]:w-4">
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewbox="0 0 496 512">
            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
            <path
              d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3 .7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3 .3 2.9 2.3 3.9 1.6 1 3.6 .7 4.3-.7 .7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3 .7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3 .7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z">
            </path>
          </svg>
        </a>
      </div>
    </div>
    <div class="mx-6 py-10 text-center md:text-left">
      <div class="grid-1 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
        <!-- TW Elements section -->
        <div class="">
          <h6 class="mb-4 flex items-center justify-center font-semibold uppercase md:justify-start">
            <span class="me-3 [&amp;&gt;svg]:h-4 [&amp;&gt;svg]:w-4">
              <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor">
                <path
                  d="M12.378 1.602a.75.75 0 00-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03zM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 00.372-.648V7.93zM11.25 22.18v-9l-9-5.25v8.57a.75.75 0 00.372.648l8.628 5.033z">
                </path>
              </svg>
            </span>
            We Connect
          </h6>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem omnis eius aut rem debitis ducimus
            reiciendis velit nobis accusantium reprehenderit.
          </p>
        </div>
        <!-- Products section -->
        <div>
          <h6 class="mb-4 flex justify-center font-semibold uppercase md:justify-start">Products</h6>
          <p class="mb-4 hover:text-white hover:bg-slate-600"><a href="#!">Host Events</a></p>
          <p class="mb-4 hover:text-white hover:bg-slate-600"><a href="#!">View Events</a></p>
          <p class="mb-4 hover:text-white hover:bg-slate-600"><a href="#!">Organis Event</a></p>
        </div>
        <!-- Useful links section -->
        <div>
          <h6 class="mb-4 flex justify-center font-semibold uppercase md:justify-start">Useful links</h6>
          <p class="mb-4 hover:text-white hover:bg-slate-600"><a href="#!">Explore Events</a></p>
          <p class="mb-4 hover:text-white hover:bg-slate-600"><a href="#!">Settings</a></p>
          <p class="mb-4 hover:text-white hover:bg-slate-600"><a href="#!">Orders</a></p>
        </div>
        <!-- Contact section -->
        <div>
          <h6 class="mb-4 flex justify-center font-semibold uppercase md:justify-start">Contact</h6>
          <p class="mb-4 flex items-center justify-center md:justify-start">
            <span class="me-3 [&amp;&gt;svg]:h-5 [&amp;&gt;svg]:w-5">
              <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor">
                <path
                  d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z">
                </path>
                <path
                  d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z">
                </path>
              </svg>
            </span>
            Mathura City, US in Russia
          </p>
          <p class="mb-4 flex items-center justify-center md:justify-start">
            <span class="me-3 [&amp;&gt;svg]:h-5 [&amp;&gt;svg]:w-5">
              <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor">
                <path d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z">
                </path>
                <path
                  d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z">
                </path>
              </svg>
            </span>
            We Connect.com
          </p>
          <p class="mb-4 flex items-center justify-center md:justify-start">
            <span class="me-3 [&amp;&gt;svg]:h-5 [&amp;&gt;svg]:w-5">
              <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor">
                <path fill-rule="evenodd"
                  d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z"
                  clip-rule="evenodd"></path>
              </svg>
            </span>
            00000000
          </p>
          <p class="flex items-center justify-center md:justify-start">
            <span class="me-3 [&amp;&gt;svg]:h-5 [&amp;&gt;svg]:w-5">
              <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor">
                <path fill-rule="evenodd"
                  d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 003 3h.27l-.155 1.705A1.875 1.875 0 007.232 22.5h9.536a1.875 1.875 0 001.867-2.045l-.155-1.705h.27a3 3 0 003-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0018 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM16.5 6.205v-2.83A.375.375 0 0016.125 3h-8.25a.375.375 0 00-.375.375v2.83a49.353 49.353 0 019 0zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 01-.374.409H7.232a.375.375 0 01-.374-.409l.526-5.784a.373.373 0 01.333-.337 41.741 41.741 0 018.566 0zm.967-3.97a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H18a.75.75 0 01-.75-.75V10.5zM15 9.75a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V10.5a.75.75 0 00-.75-.75H15z"
                  clip-rule="evenodd"></path>
              </svg>
            </span>
            00000000000
          </p>
        </div>
      </div>
    </div>
    <!--Copyright section-->
    <div class="bg-black/5 p-6 text-center">
      <span>© 2024 Copyright:</span> <a class="font-semibold" href="#">We Connect</a>
    </div>
  </footer>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const toggleButton = document.querySelector('[data-te-collapse-init]');
      const targetMenu = document.querySelector('#navbarSupportedContentY');
      const icon = toggleButton.querySelector('svg');

      toggleButton.addEventListener('click', function () {
        const expanded = this.getAttribute('aria-expanded') === 'true' || false;
        this.setAttribute('aria-expanded', !expanded);
        targetMenu.classList.toggle('hidden');

        // Toggle the icon
        if (!expanded) {
          icon.innerHTML = `
                         <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd"/>
                     `;
        } else {
          icon.innerHTML = `
                         <path fill-rule="evenodd" d="M.75 7.5a.75.75 0 011.5 0v8.25a.75.75 0 01-1.5 0V7.5zm3 0a.75.75 0 111.5 0v8.25a.75.75 0 01-1.5 0V7.5zm18.75 0a.75.75 0 011.5 0v8.25a.75.75 0 01-1.5 0V7.5z" clip-rule="evenodd"/>
                     `;
        }
      });
    });
  </script>
  <script>
    var typeData = new Typed(".role", {
      strings: [
        "Endless Possibilities.",
        "Limitless Potential.",
        "Innovation Thrives.",
        "Inspiring Futures.",
      ],
      loop: true,
      typeSpeed: 100,
      backSpeed: 80,
      backDelay: 1000,
    });
  </script>
  <script type="text/javascript" src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <script src="script.js"></script>
</body>

</html>



<!-- <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
          <button type="button"
            class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
            id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
            data-dropdown-placement="bottom"><span class="sr-only">Open user menu</span> <img
              class="w-8 h-8 rounded-full" src="/img/Arpit.png" alt="user photo"></button>
           Dropdown menu -->
          <div
            class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
            id="user-dropdown">
            <div class="px-4 py-3">
              <span class="block text-sm text-gray-900 dark:text-white">Arpit Agrawal</span> <span
                class="block text-sm text-gray-500 truncate dark:text-gray-400">name@Arpit.com</span>
            </div>
            <ul class="py-2" aria-labelledby="user-menu-button">
              <li>
                <a href="#"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
              </li>
              <li>
                <a href="#"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
              </li>
              <li>
                <a href="#"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                  out</a>
              </li>
            </ul>
          </div>
          <button data-collapse-toggle="navbar-user" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-user" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M1 1h15M1 7h15M1 13h15"></path>
            </svg>
          </button>
        </div>
