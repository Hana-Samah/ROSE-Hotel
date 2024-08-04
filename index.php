<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rose Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand;" href="index.php">Rose Hotel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Rooms</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Facilities</a>
        </li>        <li class="nav-item">
          <a class="nav-link" href="#">Contact us</a>
        </li>        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
      </ul>
      <div class="d-flex">
        <button type="button" class="btn btn-outline-dark  shadow-none me-lg-3 me-2 " data-bs-toggle="modal" data-bs-target="#loginModal">
        Login
    </button>
    <button type="button" class="btn btn-outline-dark  shadow-none  " data-bs-toggle="modal" data-bs-target="#registerModal">
        Register
    </button>
</div>
    </div>
  </div>
</nav>

<div class="modal fade" id="loginModal" data-bs-backdrop="ststic" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form>
      <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center">
        <i class="fa-regular fa-user fs-3 me-2"></i> User Login
        </h5>
        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="email" class="form-control shadow-non" >
  </div>
  <div class="mb-4">
    <label class="form-label">Password</label>
    <input type="password" class="form-control shadow-non" >
  </div>
  <div class=" d-flex align-items-center justify-content-between mb-2">
    <button type="submit" class="btn btn-dark shadow-none ">Login</button>
    <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot Password?</a>
  </div>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="registerModal" data-bs-backdrop="ststic" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form>
      <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center">
        <i class="fa-regular fa-user fs-3 me-2"></i> User Registration
        </h5>
        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
        Note: Your details must match with your ID (ID card, passport, driving license, etc..)
        that will be required during check-in.
    </span>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 ps-0">
            <label class="form-label">Name</label>
            <input type="text" class="form-control shadow-non" >
            </div>
            <div class="col-md-6 p-0 mb-3">
            <label class="form-label">Email </label>
            <input type="email" class="form-control shadow-non" >
            </div>
            <div class="col-md-6 ps-0 mb-3">
            <label class="form-label">Phone Number</label>
            <input type="nmber" class="form-control shadow-non" >
            </div>
            <div class="col-md-6 p-0 ">
            <label class="form-label">Picture </label>
            <input type="file" class="form-control shadow-non" >
            </div>
            <div class="col-md-12 p-0 ">
            <label class="form-label">Address </label>
            <textarea class="form-control shadow-non" rows="1"></textarea>
            </div>

        </div>
    </div>

        <!--
      <div class="mb-3">
  </div>
  <div class="mb-4">
    <label class="form-label">Password</label>
    <input type="password" class="form-control shadow-non" >
  </div>
  <div class=" d-flex align-items-center justify-content-between mb-2">
    <button type="submit" class="btn btn-dark shadow-none ">Login</button>
    <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot Password?</a>
  </div>-->
      </div>
      </form>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>