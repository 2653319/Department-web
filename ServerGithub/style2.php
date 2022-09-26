<?php
function head(){
    echo'
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://kit.fontawesome.com/9ead3a7457.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </head>';
}

function navLogin($i){
    ?>
    <style>



body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
/* button {
  background-color: #04AA6D;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
} 
 */
/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer2 {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container2 {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content2 {   /*登入介面的調整 */
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 300px; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-image: linear-gradient(#a6c0fe 0%, #f68084 100%);">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">首頁</a>
        </li>
<!--         <li class="nav-item">
          <a class="nav-link" href="repair.php">報修單</a>
      </li> -->
        <li class="nav-item">
          
<a class="nav-link active" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</a>

<div id="id01" class="modal">
  
  <form class="modal-content2 animate" action="loginCheck.php" method="post">
    <div class="imgcontainer2">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="henntai.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container2">
      <label for="uname"><b>E-mail</b></label>
      <input type="text" placeholder="Enter E-mail" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
      
        
      <button type="submit">Login</button>

    </div>

    <div class="container2" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <button type="button" onclick="document.getElementById('id02').style.display='block'" class="cancelbtn">sign up</button>
    </div>
  </form>
</div>

<a class="nav-link active" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"></a>

<div id="id02" class="modal">
  
  <form class="modal-content2 animate" action="registerCheck.php" method="post">
    <div class="imgcontainer2">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="henntai.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container2">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label for="uname"><b>Password</b></label>
      <input type="password" placeholder="Enter passwd" name="passwd" required>

      <label for="psw"><b>email</b></label>
      <input type="text" placeholder="Enter E-mail" name="email" required>
        
      <label for="psw"><b>Phone</b></label>
      <input type="text" placeholder="Enter phone" name="phone" required>
      
      <button type="submit">Sign up</button>

    </div>

    <div class="container2" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>
        </li>
    </ul>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
</div>
</nav>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<?php
}

function navLogOut($i){
  ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-image: linear-gradient(#a6c0fe 0%, #f68084 100%);">
  <div class="container-fluid">
      <a class="navbar-brand" href="#"><?php echo $_SESSION['email']; ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="indexLoginStatus.php" <?php if($i == 1){echo ">";} ?>>首頁</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="repair.php" <?php if($i == 2){echo ">";} ?>>申請報修</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="account.php" <?php if($i == 3){echo ">";} ?>>帳號區</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="Reinquire.php" <?php if($i == 4){echo ">";} ?>>報修列表</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="loginOut.php">登出</a>
      </li>
  </ul>
      <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
  </div>
</div>
</nav>
<?php
}

function navLogStudent($i){
  ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-image: linear-gradient(#a6c0fe 0%, #f68084 100%);">
  <div class="container-fluid">
      <a class="navbar-brand" href="#"><?php echo $_SESSION['email']; ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="indexLoginStatus.php" <?php if($i == 1){echo ">";} ?>>首頁</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="repair.php" <?php if($i == 2){echo ">";} ?>>申請報修</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="Reinquire.php" <?php if($i == 4){echo ">";} ?>>報修列表</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="loginOut.php">登出</a>
      </li>
  </ul>
      <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
  </div>
</div>
</nav>
<?php
}


function icon(){
    echo
    '<div class="contaner">
    <div class="mx-auto" style="width: 50% ; ">
      <img src="img/ryoiki.jpg" class="rounded" alt="..." style="width: 100%;">
    </div>
    </div>';
}

function icon2(){
  echo
  '<div class="contaner">
  <div class="mx-auto" style="width: 50% ;">
    <img src="hujisann.jpg" class="rounded" alt="..." style="width: 100%;">
  </div>
  </div>';
}

function icon3(){
  echo
  '<div class="contaner">
  <div class="mx-auto" style="width: 50% ;">
    <img src="shika.jpg" class="rounded" alt="..." style="width: 100%;">
  </div>
  </div>';
}


function footer(){
    echo'<footer class="text-center text-white" style="background-image: linear-gradient(#a6c0fe 0%, #f68084 100%); height: 100%; " >
    <!-- Grid container -->
    <div class="container pt-4">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a
          class="btn btn-link btn-floating btn-lg text-dark m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-facebook-f"></i
        ></a>
  
        <!-- Twitter -->
        <a
          class="btn btn-link btn-floating btn-lg text-dark m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-twitter"></i
        ></a>
  
        <!-- Google -->
        <a
          class="btn btn-link btn-floating btn-lg text-dark m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-google"></i
        ></a>
  
        <!-- Instagram -->
        <a
          class="btn btn-link btn-floating btn-lg text-dark m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-instagram"></i
        ></a>
  
        <!-- Linkedin -->
        <a
          class="btn btn-link btn-floating btn-lg text-dark m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-linkedin"></i
        ></a>
        <!-- Github -->
        <a
          class="btn btn-link btn-floating btn-lg text-dark m-1"
          href="#!"
          role="button"
          data-mdb-ripple-color="dark"
          ><i class="fab fa-github"></i
        ></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->
  
    <!-- Copyright -->
    <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2); ">
      © 2020 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
  </footer>';
}

function login(){
    ?>
  <div class="border d-flex align-items-center justify-content-center form-outline"style="height: 350px;">
    <br\>
    <form action="loginCheck.php" methon="POST">
        E-mail<input type="text" id="form1" name="username" class="form-control">
        Passwd<input type="text" id="form1" name="password" class="form-control">
        <input type="submit">
        <a href="register.php">註冊</a>
    </form>
  </div>
<?php
}






function register(){
    ?>
    
  <div class="border d-flex align-items-center justify-content-center form-outline"style="height: 350px;">
    <br\>
    <form action="registerCheck.php" method="POST">
        ID<input type="text"  name="ID" class="form-control">
        Passwd<input type="text" name="Password" class="form-control">
        E-mail<input type="text" name="email" class="form-control">
        Phone<input type="text" name="phone" class="form-control">
        <input type="submit">
    </form>
  </div>
<?php 
}

