<?php
    session_start();

    $_SESSION["resepsionis_id"]='';

    unset($_SESSION["resepsionis_id"]);
    session_unset();
    session_destroy();

    header('Location:index.php');
?>