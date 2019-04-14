

<?php
//Khai báo sử dụng session
session_start();

 
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
 
$_SESSION['DangNhap'] = 0;
//Xử lý đăng nhập
if (isset($_POST['DangNhap'])) 
{
    //Lấy dữ liệu nhập vào
    $TenDangNhap = addslashes($_POST['TenDangNhap']);
    $MatKhau = addslashes($_POST['MatKhau']);
  
     //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
     if (!$TenDangNhap || !$MatKhau) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    // mã hóa pasword
    //$MatKhau = md5($MatKhau);

    //Kết nối tới database
    include('ketnoi.php');
     
    //Kiểm tra tên đăng nhập có tồn tại không
    $query = mysqli_query($conn ,"SELECT TenDangNhap, MatKhau FROM nguoidung WHERE TenDangNhap='$TenDangNhap'");
    if (mysqli_num_rows($query) == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    //Lấy mật khẩu trong database ra
    $row = mysqli_fetch_array($query);
     
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($MatKhau != $row['MatKhau']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
     
    $query = mysqli_query($conn, "SELECT NguoiDungID FROM nguoidung WHERE TenDangNhap = '$TenDangNhap'");
    $row = mysqli_fetch_array($query);
    $_SESSION['DangNhap'] = $row['NguoiDungID'];


    //Lưu tên đăng nhập
    $_SESSION['TenDangNhap'] = $TenDangNhap;
    echo "Xin chào " . $TenDangNhap . ". Bạn đã đăng nhập thành công. <a href='/'>Về trang chủ</a>";
    die();
   

    mysqli_close($conn);

    
};

?>



