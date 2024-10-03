
<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="/public">
     @include('home.css')  
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
   </head>
   <body class="main-layout">

      <header>

      @include('home.header')   

      </header>

      <!-- about -->
      <div class="about">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-5">
                  <div class="titlepage">
                     <h2>About Us</h2>
                     <p>The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it's seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum. </p>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="about_img">
                     <figure><img src="images/i1mage.jpg" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>      <!-- end about -->

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
   </body>

</html>