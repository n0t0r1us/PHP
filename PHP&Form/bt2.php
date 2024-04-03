<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CHI VI VÀ DIỆN TÍCH</title>
</head>
<style>
    table{background-color: purple; width: 469px;}
    .header{
        font-size: 26px; 
        color: #a69e0b; 
        padding: 6px; 
        font-weight: bold;
    }
    td{padding-left: 16px;}
    .a{background-color: #fdd6d9;}
</style>
<body>
<?php
define('PI',3.14);
if (isset($_POST['submit'])){
    $bc=$_POST['bankinh'];;
    if (isset($bc) and is_numeric($bc) and $bc>0){
        $dt=round(PI*$bc*$bc,1);
        $cv=round(2*PI*$bc,1);
    }else{
        $bc="Bán kính phải là số dương.";
    }
}
if (isset($_POST['reset'])){
    $dt="";
    $cv="";
    $bc="";
}
?>
<form action="" method="post">
    <table align="center">
        <tr align="center" bgcolor="#fad669">
            <td colspan="2" class="header">DIỆN TÍCH VÀ CHU VI HÌNH TRÒN</td>
        </tr>

        <tr>
            <td>Bán Kính</td>
            <td><input type="text" name="bankinh" value="<?php if (isset($bc)) echo $bc;?>" required></td>
        </tr>

        <tr>
            <td>Diện tích</td>
            <td><input class="a" type="text" name="area" readonly
                        value="<?php if (isset($dt)) echo $dt; else echo "";?>">
            </td>

        </tr>

        <tr>
            <td>Chu vi</td>
            <td><input class="a" type="text" name="chuvi" readonly
                        value="<?php if (isset($cv)) echo $cv;echo "";?>" >
            </td>

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