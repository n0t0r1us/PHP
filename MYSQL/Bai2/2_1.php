<?php
    $severname="localhost";
    $username="root";
    $password="";
    $dbname="ql_ban_sua";
    $conn = mysqli_connect($severname, $username, $password, $dbname);
    if(!$conn){
        die("connect failed: ". mysqli_connect_error());
    }
    $query = "SELECT * FROM hang_sua";
    $result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THÔNG TIN HÃNG SỮA</title>
</head>
<body>
    <form action="" method="post">
        <h1 align="center" style="color: #4682B4;">THÔNG TIN HÃNG SỮA</h1>
        <table align='center' width='56%' border='1'>
            <tr>
                <td>Mã HS</td>
                <td>Tên hãng sữa</td>
                <td>Địa chỉ</td>
                <td>Điện thoại</td>
                <td>Email</td>
            </tr>

            <?php
                if(mysqli_num_rows($result)!=0){
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        for($i=0;$i<mysqli_num_fields($result);$i++){
                            echo "<td>$row[$i]</td>";
                        }
                        echo "</tr>"; 
                    }
                }
            ?>
        </table>
    </form>
</body>
</html>
