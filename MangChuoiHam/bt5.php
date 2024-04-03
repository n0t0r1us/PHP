<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THAY THẾ</title>
</head>
<style>
    .header{
        font-size: 26px; 
        color: white; 
        padding: 6px; 
        font-weight: bold;
    }
    table{width: 506px; background-color: #fff5ff;}
    .a1, .a2{padding-left: 16px;}
    .a, .a2{background-color: #fedaf4;}
    .a3{width: 256px;}
    .btn{background-color: #fffea9;width: 86px;}
    .a1{width: 256px;}
    .b{background-color: #fba9a9;width: 256px;}
    b{color: red;}
    .a, .b{margin-right: 26px;}
</style>
<body>
<?php
if(isset($_POST["submit"])){
    if(isset( $_POST['avv'])){
        $t = $_POST['avv'];
        $x=$_POST['x'];
        $y=$_POST['y'];
        tach_chuoi($t,$a);
        if(check($a,$dem) == 0){
            if(is_numeric($x)){
                if(is_numeric($y)){
                    $cu=xuat_mang($a);
                    thay_the($a,$x,$y);
                    $moi=xuat_mang($a);
                }else{
                    $e3 = "Không hợp lệ, vui lòng nhập số!";   
                }                 
            }else{
                $e2 = "Không hợp lệ, vui lòng nhập số!";
            }
        }else{
            $e1 = "Mảng không hợp lệ, vui lòng nhập số!";
        }
    }
}
else if(isset($_POST["submit"])){
    $t="";
}
function tach_chuoi($t,&$a){
    $a=explode(",",$t);
}
function check($a,&$dem){
    $dem=0;
    for($i=0;$i<count($a);$i++){
        if(!is_numeric($a[$i])){
            $dem++;
        }
    }
    return $dem;
}
function xuat_mang($a){
    $mang="";
    for($i=0;$i<count($a)-1;$i++){
        $mang.="$a[$i] ";
    }
    $mang.=$a[count($a)-1];
    return $mang;
}
function thay_the(&$a,$x,$y){
    for($i=0;$i<count($a);$i++){
        if($a[$i] == $x){
            $a[$i] = $y;
        }
    }
    return $a;
}
?> 
<form action="" method="post">
    <table align="center"  style="width: 500px;" bgcolor="#fff5ff">
        <tr bgcolor="#a10971">
            <td class="header" colspan="2" align="center">THAY THẾ</td>
        </tr>

        <tr>
            <td class="a2">Nhập các phần tử:</td>
            <td class="a"><input type="text" class="a3" name="avv" value="<?php if(isset($t)) echo $t; ?>" required></td>
        </tr>

        <?php if(isset($e1)) echo "<tr><td class='a'><td class='a'><b style='color: red;'>$e1</b></td></td></tr>" ?>
        <tr>
            <td class="a2">Giá trị cần thay thế:</td>
            <td class="a"><input type="text" name="x" value="<?php if(isset($x)) echo $x;?>" required></td>
        </tr>

        <?php if(isset($e2)) echo "<tr><td class='a'><td class='a'><b style='color: red;'>$e2</b></td></td></tr>" ?>
        <tr>
            <td class="a2">Giá trị thay thế:</td>
            <td class="a"><input type="text" name="y" value="<?php if(isset($y)) echo $y;?>" required></td>
        </tr>

        <?php if(isset($e3)) echo "<tr><td class='a'><td class='a'><b style='color: red;'>$e3</b></td></td></tr>" ?>
        <tr>
            <td class="a"></td>
            <td class="a">
                <input class="btn" type="submit" name="submit" value="Thay thế">
                <?php if(isset($_POST['submit'])) echo "<input class='btn' type='submit' name='reset' value='Nhập lại'>"?>
            </td>

        </tr>

        <tr>
            <td class="a1">Mảng cũ:</td>
            <td><input type="text" class="b" name="old" value="<?php if(isset($cu)) echo $cu; ?>"></td>
        </tr>

        <tr>
            <td class="a1">Mãng sau khi thay thế:</td>
            <td><input type="text" class="b" name="new" value="<?php if(isset($moi)) echo $moi; ?>"></td>
        </tr>

        <tr>
            <td colspan="2" align="center">(<b>Ghi chú: </b>Các phần tử trong mảng sẽ cách nhau bằng dấu *,*)</td>
        </tr>

    </table>
</form>
</body>
</html>