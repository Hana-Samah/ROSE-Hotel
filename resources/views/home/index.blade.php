<!DOCTYPE html>
<html lang="en">
<head>
    @include('home.css')  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        /* تحسين مظهر الصور */
        .gallery-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .gallery-image:hover {
            transform: scale(1.05);
        }

        /* تفعيل تأثير عند التمرير على الأقسام */
        .titlepage {
            text-align: center;
            margin-bottom: 30px;
        }

        .btn-primary {
            background-color: #A52A2A;
            border-color: #A52A2A;
        }

        .btn-primary:hover {
            background-color: #8B0000;
            border-color: #8B0000;
        }
    </style>
</head>
   <!-- body -->
    
   <body class="main-layout">
      <!-- loader  -->

      <!-- end loader -->
      <!-- header -->
      <header>

      @include('home.header')   

      </header>

      <!-- banner -->
      @include('home.slider')  
      <!--end banner -->

      <!-- about -->
      @include('home.about0')  
      <!-- end about -->

      <!-- our_room -->
      @include('home.room')  
      <!-- end our_room -->

      <!-- gallery -->
    @include('home.gallery0')
      <!-- end gallery -->
<br>
<section class="py-5 bg-light text-center">
    <div class="container">
        <div class="titlepage">
            <h2>Visitor Counter</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p>Today</p>
                <span id="dailyCounter">0</span>
            </div>
            <div class="col-md-6">
                <p>Total</p>
                <span id="counter">0</span>
            </div>
        </div>
    </div>
</section>

      <!--  contact -->
        @include('home.contact0')
      <!-- end contact -->
      <!--  footer -->
      <footer>
    @include('home.footer')
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script type="text/javascript">
        $(window).scroll(funtion(){
          sessionStorage.scrollTop = $(this).scrollTop();
        });

        $(document).ready(function(){
          if(sessionStorage.scrollTop != "undefined"){
            $(window).scrollTop(sessionStorage.scrollTop);
          }
        });
</script>
<script type="text/javascript">
        // Check if the user's browser supports local storage
    if (typeof(Storage) !== "undefined") {
      // Get the current date
      let today = new Date();
      // Get the stored counter for today's date, or set it to 0 if it doesn't exist
      let dailyCounter = localStorage.getItem(today.toISOString().split("T")[0]) || 0;
      // Increment the counter
      dailyCounter++;
      // Store the updated counter for today's date
      localStorage.setItem(today.toISOString().split("T")[0], dailyCounter);
      // Display the counter on the web page

      document.getElementById("dailyCounter").innerHTML = dailyCounter;
    } else {
      document.getElementById("dailyCounter").innerHTML = "Local storage is not supported by your browser.";
    }
    //////////////////////////////////////////////////////////////////
    const counterElement = document.getElementById('counter');
    // Check if a visit count is stored in localStorage
    let count = localStorage.getItem('visitorCount');
    // If not, initialize it to 0
    if (!count) {
      count = 0;
    } else {
      // Otherwise, parse the string to a number
      count = parseInt(count);
    }
    // Increment the count
    count++;
    // Update the localStorage
    localStorage.setItem('visitorCount', count);
    // Display the count
    counterElement.innerText =  count;
    
      </script>
   </body>
</html>


