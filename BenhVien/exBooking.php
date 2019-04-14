<?php
    // Thiết lập charset utf8
    header('Content-Type: text/html; charset=utf-8');
    
    // Vì tên button submit là do-register nên ta sẽ kiểm tra nếu
    // tồn tại key này trong biến toàn cục $_POST thì nghĩa là người 
    // dùng đã click register(submit)

    //if(isset ($_POST['Booking']))
    {
        include('ketnoi.php');
        $label = 0;
        $stt = mysqli_query($conn,'SELECT MAX(DatLichID) FROM datlich');

        mysqli_close($conn);
    }

?>