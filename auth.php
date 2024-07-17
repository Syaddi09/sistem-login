<?php

//File auth.php berfungsi untuk mengecek session, apakah user sudah login atau belum.//
session_start();
// jika variabel $_SESSION["user"] tidak memiliki nilai, maka user belum login//
if(!isset($_SESSION["user"])) header("Location: login.php");