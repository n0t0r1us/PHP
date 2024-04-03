<?php
    $severname="localhost";
    $username="root";
    $password="";
    $dbname="ql_ban_sua";
    $conn = mysqli_connect($severname, $username, $password, $dbname);
    $query = "SELECT a.Ten_sua,b.Ten_hang_sua,a.TP_Dinh_Duong,a.Loi_ich,a.Trong_luong,a.Don_gia,a.Hinh FROM sua a JOIN hang_sua b ON a.Ma_hang_sua = b.Ma_hang_sua";
    $result = mysqli_query($conn,$query);
    if(isset($_POST['find'])){
        $keyword = $_POST['keyword'];
        $ls = $_POST['loai_sua'];
        $hs = $_POST['hang_sua'];
        $query = "SELECT a.Ten_sua,b.Ten_hang_sua,a.TP_Dinh_Duong,a.Loi_ich,a.Trong_luong,a.Don_gia,a.Hinh,a.Ma_hang_sua,a.Ma_loai_sua FROM sua a JOIN hang_sua b ON a.Ma_hang_sua = b.Ma_hang_sua WHERE a.Ten_sua like '%$keyword%' and a.Ma_hang_sua = '$hs' and a.Ma_loai_sua = '$ls'";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)!=0){
            $num = mysqli_num_rows($result);
            $kq="Có $num sản phẩm được tìm thấy!";
        }
        else
            $kq="Không tìm thấy sản phẩm này!";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TÌM KIẾM THÔNG TIN SỮA</title>
</head>
<style>
    .table{width: 609px; background-color: #feece2;}
    .table-sp{border-collapse: collapse;width: 609px; background-color: white;}
    .header{
        font-size: 26px; 
        color: #f7791d;
        padding: 6px; 
        font-weight: bold;
        text-align: center;
    }
    .header1{
        font-size: 36px; 
        color: #f3325d;
        padding: 6px; 
        font-weight: bold;
        text-align: center;
    }
    .btn{background-color: #fdccc9;}
    .a, .b{padding-top: 6px;}
    ul{list-style-type: none;margin: 16px 0 16px -36px;padding-right: 6px;}
    img{height: 156px;}
    .sp{
        height: 246px;
    }
    .b{color: #bd2307;}
    i{color: black;}
</style>
<body>
    <form action="" method="POST">
        <table align="center" class="table">
            <tr align="center">
                <td class="header1">TÌM KIẾM THÔNG TIN SỮA</td>
            </tr>

            <tr align="center" bgcolor='white'>
                <td>
                    <b class="b">Loại sữa:</b>
                    <?php
                    $query1 = "SELECT * FROM loai_sua";
                    $result1 = mysqli_query($conn,$query1);
                    if(mysqli_num_rows($result1)!=0){
                        echo " <select name='loai_sua' id='loai_sua'>";
                        while($row=mysqli_fetch_array($result1)){
                            echo "<option value='".$row["Ma_loai_sua"]."'>".$row["Ten_loai"]."</option>";
                        }
                        echo "</select>";
                    }?>
                    <b style="padding-left: 10px;" class="b">Hãng sữa:</b>
                    <?php
                    $query2 = "SELECT * FROM hang_sua";
                    $result2 = mysqli_query($conn,$query2);
                    if(mysqli_num_rows($result2)!=0){
                        echo " <select name='hang_sua' id='hang_sua'>";
                        while($row=mysqli_fetch_array($result2)){
                            echo "<option value='".$row["Ma_hang_sua"]."'>".$row["Ten_hang_sua"]."</option>";
                        }
                        echo "</select>";
                    }?>
                </td>

            </tr>

            <tr align="center" bgcolor='white'>
                <td>
                    <b class="b">Tên sữa:</b>        
                    <input style="width: 236px;" type="text" name="keyword" value="<?php if(isset($keyword)) echo $keyword; ?>">
                    <input type="submit" name="find" class="btn" value="Tìm kiếm">
                </td>

            </tr>

            <tr align="center">
                <td><b><?php if(isset($kq)) echo $kq;?></b></td>
            </tr>

            <tr>
                <td>
                    <table align="center" border="1" class="table-sp">
                    <?php 
                        if(mysqli_num_rows($result)!=0){
                            while ($row=mysqli_fetch_row($result)){
                                echo "
                                    <tr bgcolor='#ffeee6' class='header'>
                                        <td colspan='2'>$row[0] - $row[1]</td>
                                    </tr> 
                                    <tr class='sp'>
                                        <td align='center'><img src='Hinh_sua/$row[6]' alt=''></td>
                                        <td>
                                            <ul>
                                                <li><b><i>Thành phần dinh dưỡng:</i></b></li>
                                                <li>$row[2]</li>
                                                <li class='a'><b><i>Thành phần dinh dưỡng:</i></b></li>
                                                <li>$row[3]</li>
                                                <li class='b'><b><i>Trọng lượng: </i></b>$row[4] gr - <b><i>Đơn giá: </i></b>$row[5] VNĐ</li>
                                            </ul>
                                        </td>
                                    </tr>
                                ";
                            }
                        }
                    ?> 
                    </table>
                </td>

            </tr>
            
        </table>
    </form>
</body>
</html>