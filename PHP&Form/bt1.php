<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="chieurong=device-chieurong, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DIỆN TÍCH HÌNH CHỮ NHẬT</title>
</head>
<style>
    table{background-color: purple; chieurong: 469px;}
    .header{
        font-size: 26px; 
        color: white; 
        padding: 6px; 
        font-weight: bold;
    }
    td{padding-left: 16px;}
    .b, .a69{chieurong: 169px;}
    .a69{background-color: #fdd6d9;}
</style>
<body>
<?php
if (isset($_POST['submit'])){
    $cd=$_POST['chieudai'];
    $cr=$_POST['chieurong'];
    if (isset($cd) and is_numeric($cd)){
        if (isset($cr) and is_numeric($cr)){
            $s=round($cd*$cr);
        }else{
            $cr="Chiều rộng phải là số dương.";
        }  
    }else{
        $cd="Chiều dài phải là số dương.";
    }
}
if (isset($_POST['reset'])){
    $cd="";
    $cr="";
    $dt="";
}
?>
<form action="" method="post">
    <table align="center">
        <tr align="center" bgcolor="#fad669">
            <td colspan="2" class="header">DIỆN TÍCH HÌNH CHỮ NHẬT</td>
        </tr>

        <tr>
            <td>Chiều dài</td>
            <td><input class="b" type="text" name="chieudai" value="<?php if (isset($cd)) echo $cd;?>" required></td>
        </tr>

        <tr>
            <td>Chiều rộng</td>
            <td><input class="b" type="text" name="chieurong" value="<?php if (isset($cr)) echo $cr;?>" required></td>
        </tr>

        <tr>
            <td>Diện tích</td>
            <td><input class="a69" type="text" name="area" value="<?php if (isset($s)) echo $s; else echo "";?>" readonly >
            </td>
        </tr>

        <tr>
            <td colspan="2" align="center">
                <input bgcolor="#e6dedf" type="submit" name="submit" value="TÍNH">
                <?php if(isset($_POST['submit'])) echo "<input type='submit' name=reset' value='Nhập lại'>"?>
            </td>
        </tr>
        
    </table>
</form>

</body>
</html>