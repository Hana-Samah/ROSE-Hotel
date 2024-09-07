<!DOCTYPE html>
<html lang="en">
   <head>
     @include('home.css')  
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
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
   
      <!-- end about -->

      <!-- our_room -->
      @include('home.room')  
      <!-- end our_room -->

      <!--  footer -->
      <footer>
    @include('home.footer')
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->

   </body>
</html>