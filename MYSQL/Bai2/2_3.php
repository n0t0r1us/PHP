<?php
    $severname="localhost";
    $username="root";
    $password="";
    $dbname="ql_ban_sua";
    $conn = mysqli_connect($severname, $username, $password, $dbname);
    if(!$conn){
        die("connect failed: ". mysqli_connect_error());
    }
    $query = "SELECT * FROM khach_hang";
    $result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THÔNG TIN KHÁCH HÀNG</title>
</head>
<body>
    <form action="" method="post">
        <h1 align="center" style="color: #4682B4;">THÔNG TIN HÃNG SỮA</h1>
        <table align='center' width='50%' border='1'>
            <tr style="color: #bd2307; background-color: #fefefe; font-weight: bold; text-align: center;">
                <td>Mã KH</td>
                <td>Tên khách hàng</td>
                <td>Giới tính</td>
                <td>Địa chỉ</td>
                <td>Số điện thoại</td>
            </tr>
            
            <?php
                if(mysqli_num_rows($result)!=0){
                    $a=1;
                    while($row = mysqli_fetch_array($result)){
                        if($a==1){
                            $color="#fee0c1";
                            $a=2;
                        }else{
                            $color="#fefefe";
                            $a=1;
                        }
                        echo "<tr bgcolor='$color'>";
                        for($i=0;$i<mysqli_num_fields($result)-1;$i++){
                            if($i==2){
                                if($row[$i]==0){
                                    echo "<td align='center'><img src='Hinh_sua/nam.png' width='36px'></td>";
                                }else{
                                    echo "<td align='center'><img src='Hinh_sua/nu.png' width='36px'></td>";
                                }
                            }else{
                                echo "<td>$row[$i]</td>";
                            }
                        }
                        echo "</tr>"; 
                    }
                }
            ?>
        </table>
    </form>
</body>
</html>
