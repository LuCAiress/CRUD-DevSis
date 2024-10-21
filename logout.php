<!-- Autor: Lucas Lima Aires
RA: 22202072 -->

<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
?>