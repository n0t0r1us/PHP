<?php
    $severname="localhost";
    $username="root";
    $password="";
    $dbname="ql_ban_sua";
    $conn = mysqli_connect($severname, $username, $password, $dbname);
    $query = "SELECT a.Ten_sua,b.Ten_hang_sua,c.Ten_loai,a.Trong_luong,a.Don_gia,a.Hinh FROM sua a JOIN hang_sua b ON a.Ma_hang_sua = b.Ma_hang_sua JOIN loai_sua c ON a.Ma_loai_sua = c.Ma_loai_sua";
    $result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THÔNG TIN CÁC SẢN PHẨM</title>
</head>
<style>
    table{border-collapse: collapse;width: 506px;}
    .header{
        font-size: 26px; 
        color: #f96409;
        padding: 6px; 
        font-weight: bold;
        text-align: center;
    }
    ul{list-style-type: none; margin-left: -36px;}
</style>
<body>
    <form action="">
        <table align='center' border="1">
            <tr bgcolor='#ffeee6'>
                <td colspan="2" class="header">THÔNG TIN CÁC SẢN PHẨM</td>
            </tr>  

            <?php
            if(mysqli_num_rows($result)!=0){
                while ($row=mysqli_fetch_row($result)){
                    echo "<tr>";
                    echo "<td align='center'><img src='Hinh_sua/$row[5]' height='89px''</td>";
                    echo "<td>
                            <ul>
                                <li style='padding-bottom: 16px;'><b>$row[0]</b></li>
                                <li>Nhà sản xuất: $row[1]</li>
                                <li>$row[2] - $row[3] gr - $row[4] VNĐ</li>
                            </ul>
                        </td>";
                }
            }
            ?>
        </table>
    </form>
</body>
</html>