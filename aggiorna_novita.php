<?php
    include 'config.php';
    $query = "UPDATE db_novita_operative.novita_operative SET letto = 1 WHERE host = '".$_GASTONE['host']."' AND iduser = '".$_SESSION['utente']['iduser']."'";
    mysql_query($query) or die(mysql_error());
?>
