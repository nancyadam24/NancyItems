<?php
    session_start();
    include("php/config.php");
    include("php/functions.php");

    $flag = true;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST['email'];

        // Check if the email exists in the database
        $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($con, $query);

      

       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $flag = false;
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
                <a href="women.html"><i class="fa fa-female fa-fw"></i>Γυναικεία</a>
                <a href="men.html"><i class="fa fa-male fa-fw"></i>Αντρικά</a>
                <a href="backet.html"><i class="fa fa-shopping-basket fa-fw"></i>Το καλάθι μου</a>
                <a href="Info.html"><i class="fa fa-info-circle fa-fw"></i>Επικοινωνία</a>
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
        <section class="form-box-forget">
          <div class="form-value">
             <form action="pass-reset.php" method="POST">
                 <h2>Επαναφορά κωδικού πρόσβασης</h2>
                 <h6>Εισάγαγε τη διεύθυνση του email σου και θα σου στείλουμε έναν σύνδεσμο επαναφοράς κωδικού πρόσβασης.</h6>
                 <div class="inputbox">
                      <?php
                            if ($errors > 0) {
                                foreach ($errors as $displayErrors) {
                            ?>
                                    <div id="alert"><?php echo $displayErrors; ?></div>
                            <?php
                                }
                            }
                      ?>
                    <ion-icon name="mail-outline" required></ion-icon>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                 </div>
                <button type="submit" name="password-reset-link">Επαναφορά κωδικού πρόσβασης</button>
             </form>
          </div>
        </section>
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