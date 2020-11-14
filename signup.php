<?php
session_start();
$pdo = new PDO('mysql:host=sql102.epizy.com;port=3306;dbname=epiz_26764786_bmv', 'epiz_26764786', 'URNgtR7eNZobf');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST['signup'])){
  $stmt=$pdo->prepare("insert into users(firstname,lastname,username,password,mobile,address) values (:firstname
  ,:lastname,:username,:password,:mobile,:address)");
  $stmt->execute(
    array(
      ':firstname' => $_POST['firstname'],
      ':lastname' => $_POST['lastname'],
      ':username' => $_POST['username'],
      ':password' => $_POST['password'],
      ':mobile' => $_POST['mobile'],
      ':address'=> $_POST['address'])
  );
header("Location:login.php");
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <title>BMV's Restaurant</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="loginstyle.css">
  </head>
<body>
  

  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="nvbr">
    <a class="navbar-brand" href="index.php" style="color: rgb(247, 89, 31);">
      <img src="logo.jpg" width="60" height="45" class="d-inline-block align-top" alt="">
      BMV's Restaurant   
    </a>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="menu.php">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="combo.php">Combo Offers</a>
        </li>
      </ul>
      <div class="navbar-text">
      <?php
      if(isset($_SESSION['user_id'])==false){
        echo"<a class='nav-link' href='login.php'>";
        echo"<img src='user.jpg' width='30' height='30' class='d-inline-block align-center' alt=''> Login/Signup </a>";
      }
      if(isset($_SESSION['user_id'])){
        echo"<div class='btn-group dropdown'>";
        echo'<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="user.jpg" width="30" height="30" class="d-inline-block align-center" alt="">  
        '.$_SESSION['name'].'            
        </a>
        <span class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="cart.php">Cart</a>
          <a class="dropdown-item" href="orders.php">Orders</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Sign Out</a>
        </span></div>';
      
      }
      ?>
      </div>
    </div>
  </nav>

  <div class="container-fluid" id=contents>
    <div class="container-fluid" id="form" style="border-radius: 15px;">
    <form method="POST">
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationServer01">First name</label>
      <input type="text" class="form-control " name="firstname" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationServer02">Last name</label>
      <input type="text" class="form-control" name="lastname" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationServer03">User Name</label>
      <input type="text" class="form-control"  name="username" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationServer03">Set Password</label>
      <input type="password" class="form-control " name="password" required>
    </div>
    <div class="col-md-12 mb-6">
      <label for="validationServer03">Address</label>
      <textarea name="address" class="form-control" cols="10" rows="5"></textarea>
    </div>  
    <div class="col-md-12 mb-3">
      <label for="validationServer03">Mobile Number</label>
      <input type="text" class="form-control " name="mobile" required>
    </div>  
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input " type="checkbox" value="" id="invalidCheck3" required>
      <label class="form-check-label" for="invalidCheck3">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit" name="signup">Sign Up</button>
 
</form>

    </div>
    
  </div> 

  <footer class="panel-footer" id="foot">
    <div class="container">
      <div class="row">
        <section id="hours" class=" col-sm-4">
          <span>Hours:</span><br>
          Sun-Thurs: 11:15am - 10:00pm <br>
          Fri: 11:15am - 2:30pm <br>
          Saturday Closed <br>
          <hr class="visible-xs" style="color: white;">
        </section> 
        
        
        <section id="address" class=" col-sm-4">
          
          <span>Address:</span><br>
          Kapila Teertham Road, <br>
          Anna Rao Circle, <br>
          Tirupati. <br>
          <p id="limit">* Delivery area within 8-10 kilometers, with minimum order of Rs.200 plus Rs.15 charge for all deliveries.</p>
          <hr class="visible-xs" style="color: white;">
        </section>
        <section id="quotes" class=" col-sm-4">
          <span><q>People who love to eat are always the best people</q></span><br>
          <span><q>You dont need inspirational quotes when you have good food</q></span>
          <hr class="visible-xs" style="color: white;">
        </section>
        <hr class="visible-xs" style="color: white;">
      </div><div class=" col-sm-12" style="text-align: center;" >&copy; Copyright Bindhu Madhava Varma 2020</div>

    </div>
  </footer>
  
  <script src="jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
</body>
</html>