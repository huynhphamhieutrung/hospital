<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    
    
    <body>
        <?php
        {
            include('ketnoi.php');
            $label = 0;
            $stt = mysqli_query($conn,'SELECT MAX(DatLichID) FROM datlich');
            if (!$stt)
                $stt = 1;   
            echo "<script type = 'text/javascript'>";
            echo "function Bam()";
            echo "{";
            echo "confirm('Số thứ tự của bạn là ' + $stt + ' bạn có muốn tiếp tục?')";
            echo "}";
            echo "</script";
            mysqli_close($conn); 
            
        ?>
        <input type = 'button' value ='Booking' onclick = 'Bam'/>  
    </body>
</html>