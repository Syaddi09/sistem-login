<?php
//logout.php adalah menghancurkan atau menghapus session yang sudah dibuat//
//Pertama kita harus memanggil fungsi session_start(), karena kita akan menggunakan session di sini./
session_start();
//Setelah itu, hapus variabel $_SESSION['user'] dengan fungsi session_unset("user").
session_unset("user");
//Selanjutnya kita alihkan ke halaman index.php//
header("Location: index.php");