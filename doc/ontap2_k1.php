<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    // Ket Noi SQL
    $severname="localhost";
    $username="root";
    $password="";
    $dbname="chuyenbay";
    $conn = mysqli_connect($severname, $username, $password, $dbname);
    // Lay trong SQL 
    $strSql = "SELECT * FROM cbay cb, thanhpho tp WHERE (cb.matp_kh = tp.id OR cb.matp_den = tp.id) AND tp.tentp = 'Nha Trang'"; 

    $kq = mysqli_query($conn, $strSql);
?>
<style>
    tr, td, table{
        border: solid 1px black;
    }
</style>
<body>
    <table>
        <tr>
            <td>id</td>
            <td>so hieu</td>
            <td>ma tp kh</td>
            <td>ngay kh</td>
            <td>ma tp den</td>
            <td>ngay den</td>
            <td>gia</td>
        </tr>
            <?php if($kq){
                while($row = mysqli_fetch_array($kq)){ ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['sohieu'] ?></td>
                    <td><?php echo $row['matp_kh'] ?></td>
                    <td><?php echo $row['ngay_kh'] ?></td>
                    <td><?php echo $row['matp_den'] ?></td>
                    <td><?php echo $row['ngay_den'] ?></td>
                    <td><?php echo $row['gia'] ?></td> 
                </tr>      
            <?php
                }
            } ?>
    </table>
</body>
</html>