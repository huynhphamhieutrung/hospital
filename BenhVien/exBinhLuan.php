<?php
    // Thiết lập charset utf8
    header('Content-Type: text/html; charset=utf-8');
    
    // Vì tên button submit là do-register nên ta sẽ kiểm tra nếu
    // tồn tại key này trong biến toàn cục $_POST thì nghĩa là người 
    // dùng đã click register(submit)

    if(isset($_POST['DangBL']))
    {
        $BinhLuan = addslashes($_POST['BinhLuan']);


        if(!$BinhLuan)
        {
            echo ("Vui lòng nhập bình luận trước khi đăng. <a href='javascript: history.go(-1)'>Trở lại</a>");
            exit;
        }

        include('ketnoi.php');
        mysqli_close($conn);
    };


?>