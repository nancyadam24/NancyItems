<?php
    session_start();
    include("php/config.php");
    include("php/functions.php"); 
    if (isset($_SESSION['user_id'])) {
      $user_data = check_login($con);
      $username = $user_data['username'];
    } else {
      $username = null;
    }

    if (isset($_GET['logout'])) {
      session_start();
      unset($_SESSION['user_id']);
      session_destroy();
      header("Location: NancyItems.php");
      exit;
    }
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Nancy's Items</title>
  <style>
     <?php include "Info_css.css"?>
     <?php include "NancyItems.css" ?>
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora:wght@700&display=swap" rel="stylesheet">
  
</head>
<body>
  <body class="info-page">
    <header class="base-header">
      <div class="header-context">
        <button class="btn" onclick="toggleDropdown()"><i class="fa fa-bars"></i></button>
        <a href="favourite.php" id="heart-icon"><i class="fa fa-heart fa-fw"></i></a>
        <div class="my-element"> <a href="NancyItems.php">
           <img src="Group1.png" alt="my-element">
          </a>
      </div>
      </div>
      <div class="header-right">
        <div class="searcher-3d">
          <span class="search-icon">&#128269;</span>
          <input type="text" placeholder="Search">
        </div>
      </div>
      <div class="dropdown-content" id="dropdownContent">
        <button class="close-btn" onclick="toggleDropdown()"><i class="fa fa-times"></i></button>
        <?php if ($username !== null) : ?>
                    <a href="profile.php"><i class="fa fa-user fa-fw"></i>Hey, <?php echo $username; ?></a>
                    <a href="women.php"><i class="fa fa-female fa-fw"></i>Γυναικεία</a>
                    <a href="men.php"><i class="fa fa-male fa-fw"></i>Αντρικά</a>
                    <a href="backet.php"><i class="fa fa-shopping-basket fa-fw"></i>Το καλάθι μου</a>
                    <a href="Info.php"><i class="fa fa-info-circle fa-fw"></i>Επικοινωνία</a>
                    <a href="NancyItems.php?logout=true"><i class="fa fa-sign-out fa-fw"></i>Έξοδος</a>
                <?php else : ?>
                    <a href="account.php"><i class="fa fa-user fa-fw"></i>Εγγραφή/Σύνδεση</a>
                    <a href="women.php"><i class="fa fa-female fa-fw"></i>Γυναικεία</a>
                    <a href="men.php"><i class="fa fa-male fa-fw"></i>Αντρικά</a>
                    <a href="backet.php"><i class="fa fa-shopping-basket fa-fw"></i>Το καλάθι μου</a>
                    <a href="Info.php"><i class="fa fa-info-circle fa-fw"></i>Επικοινωνία</a>
                <?php endif; ?>
    </div>
    </header>
    <div class="body-center">
     <div class="animated-background"></div>
      <div class="info">
        <h3 class="mobile-heading">Για τις παραγγελίες επικοινωνήστε εδώ </h3>
        <div class="box-container">
          <div class="mobile">
            <p>
              Αδαμίδου Αθανασία <br>
              +30 6943653393 <br>
              10:00 - 19:00 <br>
              Δευτέρα-Σάββατο <br>
              <i class="fa fa-mobile-phone fa-5x"></i>
            </p>
          </div>
          <div class="social-icons">
            <h5 class="social-heading">SOCIAL MEDIA</h5>
            <a href="https://www.instagram.com/_.nancyadam._/"><i class="fa fa-instagram fa-3x"></i></a>
            <a href="https://www.facebook.com/profile.php?id=100012264044224"><i class="fa fa-facebook fa-3x"></i></a>
            <a href="https://twitter.com/Nancyad61468297"><i class="fa fa-twitter fa-3x"></i></a>
            <a href="https://www.youtube.com/channel/UCvugVL1jSX5eVWKEZjaZKLA"><i class="fa fa-youtube fa-3x"></i></a>
          </div>
        </div>
      </div>
    </div>
    <script src="NancyItems.js"></script>
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
