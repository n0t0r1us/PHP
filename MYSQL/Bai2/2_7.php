<?php
    $severname="localhost";
    $username="root";
    $password="";
    $dbname="ql_ban_sua";
    $conn = mysqli_connect($severname, $username, $password, $dbname);
    $query = "SELECT Ma_sua,Ten_sua,Trong_luong,Don_gia,Hinh FROM sua";
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
    table{border-collapse: collapse;width: 756px;}
    .header{
        font-size: 26px; 
        color: #f96409;
        padding: 6px; 
        font-weight: bold;
        text-align: center;
    }
    td{border: 1px solid black;}
    ul{list-style-type: none; margin-left: -36px;}
    .listsp{width: 156px; height: 206px;}
    a{color: purple;}
    .a, .b{font-size: 16px;}
</style>
<body>
    <form action="chi_tiet_sp.php" method="get">
        <table align='center'>
            <tr bgcolor='#ffeee6'>
                <td colspan="5" class="header">THÔNG TIN CÁC SẢN PHẨM</td>
            </tr>   

            <?php
            if(mysqli_num_rows($result)>0){       
                $sp_hang = 5;
                $s_hang = 0;
                $count = 0;
                while ($row=mysqli_fetch_row($result)){
                    if($count == $sp_hang){
                        echo "<tr>";
                    }
                    echo "<td class='listsp'>
                    <ul align='center'>
                        <li class='a'><a href='chi_tiet_sp.php?id=$row[0]'><b>$row[1]</b></a></li>
                        <li class='b'>$row[2] gr - $row[3] VNĐ</li>
                        <li><img src='Hinh_sua/$row[4]' height='100px''</li>'
                    </ul>
                    </td>";
                    if($count == $sp_hang -1){
                        echo '</tr>';
                        $count = 0;
                    }
                    else $count +=1;
                }
            }?>
        </table>
    </form>
</body>
</html>