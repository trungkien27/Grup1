<!DOCTYPE html>
<html lang="en">
<head>
  <title>Web nailart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    margin-left: 150px;
    width: 80%;
    height: 500px;
  }
  </style>
</head>
<body>
<div>
    <img src="https://st4.depositphotos.com/7821970/21065/v/950/depositphotos_210652810-stock-illustration-nail-art-concept-for-professional.jpg" style="width: 300px; height: 150px;float: left !important;margin-left: 50px; margin-top: 0px !important">
  <nav class="navbar navbar-expand-sm bg-muted navbar-dark" style="display: flex; float: right; margin-right: 200px;margin-top: 20px;">
    
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: black">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: black">Product</a>
      </li>

      <!-- Dropdown -->
      <li class="nav-item dropdown" style="color: black">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="color: black">
          Category
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#" style="color: black">Kid</a>
          <a class="dropdown-item" href="#" style="color: black">Elder</a>
        </div>
      </li>
    </ul>
    <form class="table-bordered bg-muted" style="border-radius: 10px;display: flex; border: none;">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" style="border: none;">
      <button class="bg-muted" style="border-radius: 10px; border: none; ">
        <i class="bi bi-search"></i>
      </button>
    </form>
    <ul class="navbar-nav" style="margin-left: 20px; background-color: white" >
      <li class="nav-item dropdown" style="color: black">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="color: black">
         <i class="bi bi-card-list"></i>
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#" style="color: black">Login</a>
          <button style="border: none;background-color: white;margin-left: 20px;">Logout</button>
        </div>
      </li>
    </ul>
  </nav>
</div>
