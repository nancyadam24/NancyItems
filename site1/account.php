<?php
  session_start();
  include("php/config.php");
  include("php/functions.php");

  $flag = true;

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password) && !is_numeric($username)){
      $query = "select * from users where username = '$username' limit 1";
          
      $result = mysqli_query($con,$query);

      if ($result) {
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            if ($user_data['password'] === $password) {
                $_SESSION['user_id'] = $user_data['user_id'];

                if (isset($_POST['remember'])) {
                    setcookie('remember_username', $username, time() + (30 * 24 * 60 * 60));
                    setcookie('remember_password', $password, time() + (30 * 24 * 60 * 60));
                }

                header("Location: NancyItems.php");
                die;
            }
        }
    }
      $flag = false;
    } else {
      $flag = false;
    }
  }
?>

<!doctype html>
  <html>
   <head>
   <style>
        .message {
            text-align:center;
            background-color: #ffcccc;
            padding: 3px;
            border: 1px solid #ff0000;
            border-radius: 5px;
            font-size: 14px;
            color: #ff0000;
            margin-top:30px;
        }
    </style>
     <meta charset="utf-8">
     <title>Nancy's Items</title>
     <style>
         <?php include "NancyItems.css" ?>
     </style>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   </head>
   <body>
    <div class="animated-background"></div>
      <header class="base-header">
        <div class="header-context">
                <button class="btn" onclick="toggleDropdown()"><i class="fa fa-bars"></i></button>
                <a href="favourite.php" id="heart-icon"><i class="fa fa-heart fa-fw"></i></a>
                <div class="my-element"> <a href="NancyItems.php">
                      <img src="Group1.png" alt="my-element">
                    </a>
                </div>
            <div class="dropdown-content" id="dropdownContent">
                <button class="close-btn" onclick="toggleDropdown()"><i class="fa fa-times"></i></button>
                <a href="account.php"><i class="fa fa-user fa-fw"></i>Εγγραφή/Σύνδεση</a>
                <a href="women.php"><i class="fa fa-female fa-fw"></i>Γυναικεία</a>
                <a href="men.php"><i class="fa fa-male fa-fw"></i>Αντρικά</a>
                <a href="backet.php"><i class="fa fa-shopping-basket fa-fw"></i>Το καλάθι μου</a>
                <a href="Info.php"><i class="fa fa-info-circle fa-fw"></i>Επικοινωνία</a>
            </div>
        </div>
        <div class="header-right">
            <div class="searcher-3d">
              <span class="search-icon">&#128269;</span>
              <input type="text" placeholder="Search">
            </div>
        </div>
        </header>
      <hr>
     <div class="container"> 
      <section class="form-box">
        <div class="form-value">
           <form method="post" action="account.php">
               <h2>Σύνδεση</h2>
               <div class="inputbox">
                  <ion-icon name="person-outline"></ion-icon>
                  <input type="text" name="username" id="username" autocomplete="yes" required>
                  <label for="username">Ψευδώνυμο</label>
                 
               </div>
               <div class="inputbox">
                  <ion-icon name="lock-closed-outline"></ion-icon>
                  <input type="password" name="password" id="password" autocomplete="yes" required>
                  <label for="password">Κωδικός</label>
                  
               </div> 
               <div class="forget">
               <label for="remember"><input type="checkbox" name="remember" id="remember">Remember Me.</label>
                  <p><a href="forgetpas.php"> Ξέχασες τον κωδικό;</a></p>
              </div> 
              <button>Σύνδεση</button>
              <div class="register">
                   <p>Δεν έχεις λογαριασμό; <a href="sign_up.php">Εγγραφή</a></p>
              </div>
             <?php
                if($flag==false)
                {
                  echo "<div class='message'>
                  <p>Λάθος ψευδώνυμο ή κωδικός!</p>
                  </div> <br>";
                }
             ?>
           </form>
        </div>
      </section>
     </div>
      <script src="NancyItems.js"></script>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
   </body>
   <footer>
    <div class="footer">
        <div class="bubbles">
            <div class="bubble"></div>
        </div>
        <div class="content">
            <div>
                <div class="image"></div>
                <div class="name">
                    <p>©This context made by Αδαμίδου Αθανασία 2023</p>
                </div>
            </div>
        </div>
    </div>
</footer>
</html>