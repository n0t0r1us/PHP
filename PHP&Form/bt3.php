<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>THANH TOAN TIEN DIEN</title>
</head>
<style>
    table{background-color: purple; width: 370px;}
    .header{
        font-size: 26px; 
        color: #a69e0b; 
        padding: 6px; 
        font-weight: bold;
    }
    td{padding-left: 10px;}
    .a{background-color: #fdd6d9;}
</style>
<body>
<?php
if (isset($_POST['submit'])){
    $v=$_POST['name'];
    if(isset($_POST['vold']) and is_numeric($_POST['vold']) and $_POST['vold']>=0){
        $vo=$_POST['vold'];
        if(isset($_POST['vnew']) and is_numeric($_POST['vnew']) and $_POST['vnew']>=$vo){
            $vn=$_POST['vnew'];
            if(isset($_POST['price']) and is_numeric($_POST['price']) and $_POST['price']>=0){
                $g=$_POST['price'];
                $i=$vn-$vo;
                $kq=$g*$i;
            }else{
                $g = "Đơn giá phải >= 0 !";
            }
        }else{
            $vn = "Bộ số mới phải >= bộ số cũ !";
        }
    }else{
        $vo = "Bộ số phải >= 0 !";
    }

}
if (isset($_POST['reset'])){
    $v="";
    $vo="";
    $vn="";
    $g="69000";
    $kq="";
}
?>
<form action="" method="post">
    <table align="center">
        <tr align="center" bgcolor="#fcdb69">
            <td colspan="2" class="header">THANH TOÁN TIỀN ĐIỆN</td>
        </tr>

        <tr>
            <td>Tên chủ hộ:</td>
            <td><input type="text" name="name" value="<?php if (isset($v)) echo $v;?>" required></td>
        </tr>

        <tr>
            <td>Bộ số cũ:</td>
            <td><input type="text" name="vold" value="<?php if (isset($vo)) echo $vo;?>" required> (Kw)</td>
        </tr>

        <tr>
            <td>Bộ số mới:</td>
            <td><input type="text" name="vnew" value="<?php if (isset($vn)) echo $vn;?>" required> (Kw)</td>
        </tr>

        <tr>
            <td>Đơn giá:</td>
            <td><input type="text" name="price" value="<?php if (isset($g)) echo $g;else echo"69000"?>"> (VNĐ)</td>
        </tr>

        <tr>
            <td>Số tiền thanh toán:</td>
            <td><input class="a" type="text" name="area" value="<?php if (isset($kq)) echo $kq; else echo "";?>" readonly> (VNĐ)</td>
        </tr>

        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="TÍNH">
                <?php if(isset($_POST['submit'])) echo "<input type='submit' name='reset' value='Nhập lại'>"?>
            </td>

        </tr>
        
    </table>
</form>

</body>
</html>