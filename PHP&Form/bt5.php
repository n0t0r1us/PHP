<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TÍNH TIỀN KARAOKE</title>
</head>
<style>
    table{background-color: #04b2b0; width: 369px;}
    .header{
        font-size: 26px; 
        color: purple; 
        padding: 6px; 
        font-weight: bold;
    }
    td{padding-left: 16px;}
    .v, .u{width: 169px;}
    .u{background-color: #fffaaf;}
    .btn{background-color: #f9fadc;}
</style>
<body>
<?php
if (isset($_POST['submit'])){
    $bd=$_POST['batdau'];
    if(is_numeric($bd) and $bd>=10 and $bd<=24){
        $kt=$_POST['ketthuc'];
        if(is_numeric($kt) and $kt>=10 and $kt<=24){
            if($kt>=$bd){
                if($kt>17 and $bd<17){
                    $t=($kt-17)*45000 + (17-$bd)*20000;
                }
                else if($bd>=17){
                    $t=($kt-$bd)*45000;
                }else{
                    $t=($kt-$bd)*20000;
                }
            }else{
                $kt="Giờ kết thúc phải lớn hơn giờ bắt đầu";
            }
        }
        else $kt="Giờ kết thúc phải là số > 10 và < 24";
    }
    else $bd="Giờ bắt đầu phải là số > 10 và < 24";
}
if (isset($_POST['reset'])){
    $bd="";
    $kt="";
    $t="";
}
?>
<form action="" method="post">
    <table align="center">
        <tr align="center" bgcolor="#006b9e">
            <td colspan="2" class="header">TÍNH TIỀN KARAOKE</h2></td>
        </tr>

        <tr>
            <td>Giờ bắt đầu:</td>
            <td><input class="v" type="text" name="batdau" value="<?php if (isset($bd)) echo $bd;?>" required> (h)</td>
        </tr>

        <tr>
            <td>Giờ kết thúc:</td>
            <td><input class="v" type="text" name="ketthuc" value="<?php if (isset($kt)) echo $kt;?>" required> (h)</td>
        </tr>

        <tr>
            <td>Tiền thanh toán:</td>
            <td><input class="u" type="text" value="<?php if (isset($t)) echo $t; else echo "";?>" readonly> (VNĐ)</td>
        </tr>

        <tr>
            <td colspan="2" align="center">
                <input class="btn" type="submit" name="submit" value="Tính tiền">
                <?php if(isset($_POST['submit'])) echo "<input class='btn' type='submit' name='reset' value='Nhập lại'>"?>
            </td>

        </tr>
        
    </table>
</form>

</body>
</html>