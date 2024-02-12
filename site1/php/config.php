<?php

 $dbhost ="localhost";
 $dbuser ="root";
 $dbpass = "";
 $dbname = "site1";

 if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
    die("Δεν πραγματοποιήθηκε η σύνδεση!");
}
?>
