<?php 

// cek session
if (isset($_SESSION["user"])) {
    header("Location: ../user");
    exit;
}
if (isset($_SESSION["dokter"])) {
    header("Location: ../dokter");
    exit;
}
if (isset($_SESSION["cs"])) {
    header("Location: ../cs");
    exit;
}
