<?php
session_start();
include("php/config.php");
include("php/functions.php");

$flag = true;
$flag1 = true;
$flag2 = true;
$flag3 = true;
$flag4 = true;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordconfig = $_POST['passwordconfig'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $flag1 = false;
    } else {
        $verify_query = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");
        if (mysqli_num_rows($verify_query) != 0) {
            $flag = false;
        } else {
            if (empty($email) || empty($username) || empty($password) || empty($passwordconfig) || is_numeric($username)) {
                $flag3 = false;
            } else {
                if ($password !== $passwordconfig) {
                    $flag4 = false;
                } else {
                    $user_id = random_num(20);
                    $query = "INSERT INTO users(user_id, email, username, password) VALUES ('$user_id', '$email', '$username', '$password')";
                    mysqli_query($con, $query);

                    header("Location: account.php");
                    die;
                }
            }
        }
    }
}
?>

<!doctype html>
  <html>
   <head>
     <meta charset="utf-8">
     <title>Nancy's Items</title>
     <style>
         <?php include "NancyItems.css" ?>
     </style>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <style>
        .message {
            text-align:center;
            background-color: #ffcccc;
            padding: 5px;
            border: 1px solid #ff0000;
            border-radius: 5px;
            font-size: 14px;
            color: #ff0000;
            margin-top:8px;
        }
    </style>
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
      <section class="form-box-signup">
        <div class="form-value">
           <form action="sign_up.php" method="POST">
               <h2>Φόρμα Εγγραφής</h2>
               <div class="inputbox">
                  <ion-icon name="person-outline"></ion-icon>
                  <label for="">Ψευδώνυμο</label>
                  <input type="text" name="username" id="username" autocomplete="off" required>
               </div>
               <div class="inputbox">
                  <ion-icon name="mail-outline"></ion-icon>
                  <label for="email">Email</label>
                  <input type="text" name="email" id="email" autocomplete="off" required>
               </div>
               <div class="inputbox">
                  <ion-icon name="lock-closed-outline"></ion-icon>
                  <label for="password">Κωδικός</label>
                  <input type="password" name="password" id="password" autocomplete="off" required>
               </div> 
               <div class="inputbox">
                 <label for="passwordconfig">Επιβεβαίωση Κωδικού</label>
                 <input type="password" name="passwordconfig" id="passwordconfig" autocomplete="off" required>
               </div> 
              <button>Εγγραφή</button>
              <div class="register">
                   <p>Ήδη μέλος; <a href="account.php">Συνδέσου εδώ!</a></p>
              </div>
              <?php
                  if($flag == false){
                    echo "<div class='message'>
                       <p>Αυτο το email χρησιμοποιείται. Δοκίμασε άλλο!</p>
                    </div> <br>";
                  }
                  elseif($flag1 == false){
                    echo "<div class='message'>
                       <p>Tο email αυτό δεν είναι έγκυρο!</div></p>
                    </div> <br>";
                  }
                  elseif($flag3 == false){
                    echo "<div class='message'>
                       <p>Συμπλήρωσε σωστά τα στοιχεία!</div></p>
                    </div> <br>";
                  }
                  elseif($flag4 == false){
                    echo "<div class='message'>
                       <p>Πρέπει να βάλεις τον ίδιο κωδικό!</div></p>
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
