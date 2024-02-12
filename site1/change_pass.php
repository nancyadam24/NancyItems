<?php
    session_start();
    include("php/config.php");
    include("php/functions.php");
    
    if(isset($_POST['passwordreset'])){
        $psw = $_POST["password"];

        $token = $_SESSION['token'];
        $email = $_SESSION['email'];

        $hash = password_hash( $psw , PASSWORD_DEFAULT );

        $sql = mysqli_query($connect, "SELECT * FROM login WHERE email='$email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if($Email){
            $new_pass = $hash;
            mysqli_query($connect, "UPDATE login SET password='$new_pass' WHERE email='$email'");
            ?>
            <script>
                window.location.replace("index.php");
                alert("<?php echo "your password has been succesful reset"?>");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("<?php echo "Please try again"?>");
            </script>
            <?php
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
      <section class="form-box-change-pass">
        <div class="form-value">
           <form action="change_pass.php" method="POST">
               <h2>Αλλαγή Κωδικού</h2>
               <div class="inputbox">
                  <ion-icon name="lock-closed-outline"></ion-icon>
                  <label for="password">Κωδικός</label>
                  <input type="password" name="password" id="password" autocomplete="off" required>
               </div> 
               <div class="inputbox">
                 <label for="passwordconfig2">Επιβεβαίωση Κωδικού</label>
                 <input type="password" name="passwordconfig2" id="passwordconfig2" autocomplete="off" required>
               </div> 
              <button type="submit" name="passwordreset">Επαναφορά Κωδικού</button>
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
