<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SẮP XẾP MẢNG</title>
</head>
<style>
    table{
        background-color: #d1ded4;
        width: 416px;
    }
    b{color: red;}
    .header{
        font-size: 26px; 
        color: white; 
        padding: 6px; 
        font-weight: bold;
    }
    .btn{background-color: white; width: 156px;}
    .btn1{background-color: white; width: 76px;}
    .a, .a1{background-color: #cce6e3;}
    .a, .a2{padding-left: 16px; width: 136px;}
    .b{background-color: #cbfbfd;}
    .b, .b1{width: 226px;}
</style>
<body>
<?php
if(isset($_POST["sapxep"])){
    if(isset($_POST['avv'])){
        $v = $_POST['avv'];
        tach_chuoi($v,$a);
        $c=count($a);
        if(check($a,$dem) == 0){
            sx_tang($a,$c);
            $mt=xuat_mang($a);
            sx_giam($a,$c);
            $mg=xuat_mang($a);
        }else{
            $e = "Mảng không hợp lệ, vui lòng nhập số!";
        }
    }
}
else if(isset($_POST["reset"])){
    $v="";
}
function tach_chuoi($v,&$a){
    $a=explode(",",$v);
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
        $mang.="$a[$i], ";
    }
    $mang.=$a[count($a)-1];
    return $mang;
}
function sx_tang(&$a,$c){
    for($i=0;$i<$c-1;$i++){
        for($j=$i+1;$j<$c;$j++){
            if($a[$i]>$a[$j]){
                $tg = $a[$i];
                $a[$i] = $a[$j];
                $a[$j] = $tg;        
            }
        }
    }
    return $a;
}
function sx_giam(&$a,$c){
    for($i=0;$i<$c-1;$i++){
        for($j=$i+1;$j<$c;$j++){
            if($a[$i]<$a[$j]){
                $tg = $a[$i];
                $a[$i] = $a[$j];
                $a[$j] = $tg;        
            }
        }
    }
    return $a;
}
?>
<form action="" method="post">
    <table align="center">
        <tr bgcolor="#2f9b97">
            <td class="header" colspan="2" align="center">SẮP XẾP MẢNG</td>
        </tr>
        <tr>
            <td class="a2">Nhập mảng:</td>
            <td><input type="text" class="b1" name="avv" value="<?php if(isset($v)) echo $v; ?>" required><b> (*)</b></td>
        </tr>
        <?php if(isset($e)) echo "<tr><td><td><b style='color: red;'>$e</b></td></td></tr>" ?>
        <tr>
            <td></td>
            <td>
                <input type="submit" class="btn" name="sapxep" value="Sắp xếp tăng/giảm">
                <?php if(isset($_POST['sapxep'])) echo "<input class='btn1' type='submit' name='reset' value='Nhập lại'>"?>
            </td>
        </tr>
        <tr>
            <td class="a"><b>Sau khi sắp xếp:</b></td>
            <td class="a1"></td>
        </tr>
        <tr>
            <td class="a">Tăng dần:</td>
            <td class="a1"><input type="text" class="b" name="tang" value="<?php if(isset($mt)) echo $mt; ?>"></td>
        </tr>
        <tr>
            <td class="a">Giảm dần:</td>
            <td class="a1"><input type="text" class="b" name="giam" value="<?php if(isset($mg)) echo $mg; ?>"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><b>(*)</b> Các số được nhập cách nhau bằng dấu *,*</td>
        </tr>
    </table>
</form>
</body>
</html>