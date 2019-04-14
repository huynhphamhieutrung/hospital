<?php session_start(); 
 
if (isset($_SESSION['TenDangNhap'])){
    $_SESSION['DangNhap'] = 0;
    unset($_SESSION['TenDangNhap']); // xóa session login
}
?>
<a href="DangNhap.php">HOME</a>