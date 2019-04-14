<?php
// Thiết lập charset utf8
header('Content-Type: text/html; charset=utf-8');
  
// Vì tên button submit là do-register nên ta sẽ kiểm tra nếu
// tồn tại key này trong biến toàn cục $_POST thì nghĩa là người 
// dùng đã click register(submit)
if (isset($_POST['do-register']))
{
     //Lấy dữ liệu từ file dangky.php
     $TenDangNhap   = addslashes($_POST['TenDangNhap']);
     $MatKhau   = addslashes($_POST['MatKhau']);
     $Email      = addslashes($_POST['Email']);
     $HoTen   = addslashes($_POST['HoTen']);
     $GioiTinh  = addslashes($_POST['GioiTinh']);
    


    
    //Kiểm tra xem có nhập đầy đủ thông tin hay không
    if (!$TenDangNhap || !$MatKhau || !$Email || !$HoTen || !$GioiTinh){
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    
    include('ketnoi.php');

    
    //Kiểm tra tên đăng nhập và email đã có người dùng chưa

    $TraLoi = mysqli_query($conn,"SELECT TenDangNhap FROM nguoidung WHERE TenDangNhap ='$TenDangNhap'");
     if (mysqli_num_rows($TraLoi) > 0){
        echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }


    if (mysqli_num_rows(mysqli_query($conn,"SELECT Email FROM nguoidung WHERE Email='$Email'")) > 0){
        echo "Email này đã có người dùng. Vui lòng chọn Email khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    
    //Insert dữ liệu vào bảng
    $addmember = mysqli_query($conn,"
        INSERT INTO nguoidung (
            TenDangNhap,
            MatKhau,
            Email,
            HoTen,
            GioiTinh,
            Level
            )

        VALUES (
            '$TenDangNhap',
            '$MatKhau',
            '$Email',
            '$HoTen',
            '$GioiTinh',
            '0'
            )
        ");


        //Thông báo quá trình lưu
    if ($addmember)
        echo "Quá trình đăng ký thành công. <a href='/'>Về trang chủ</a>";
    else
        echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='dangky.php'>Thử lại</a>";

    mysqli_close($conn);
}
?>