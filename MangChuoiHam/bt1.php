<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XỬ LÝ MẢNG</title>
</head>
<style>
    table{background-color: violet; width: 420px;}
    td{padding-left: 16px;}
    .header{
        font-size: 26px; 
        color: yellow; 
        padding: 6px; 
        font-weight: bold;
    }
    .n, .a{width: 96px;}
    .btn{width: 100px; background-color: yellow;}
    .mang, .b{width: 255px;}
</style>
<body>
<?php
if(isset($_POST['submit'])){
    $x=$_POST['n'];
    if(isset($x) and is_numeric($x) and $x>0){
        tao_mang($x,$a);
        $in=in_mang($a);
        $dc=dem_chan($a);
        $dn=dem_nho($a);
        $ta=tong_am($a);
        $vt=vi_tri_0($a);
        sap_xep($a);
        $sx=in_mang($a);
    }
    else{
        $e="n phải là số > 0!";
    }
}
else if(isset($_POST['reset'])){
    $x="";
}
function tao_mang($x,&$a){
    for($i=0;$i<$x;$i++){
        $a[$i]=rand(-500,500);
    }
    return $a;
}
function in_mang($a){
    $mang="";
    for($i=0;$i<count($a);$i++){
        $mang .= $a[$i]." ";
    }
    return $mang;
}
function dem_chan($a){
    $dem=0;
    for($i=0;$i<count($a);$i++){
        if($a[$i]%2==0){
            $dem++;
        }
    }
    return $dem;
}
function dem_nho($a){
    $dem=0;
    for($i=0;$i<count($a);$i++){
        if($a[$i]<100){
            $dem++;
        }
    }
    return $dem;
}
function tong_am($a){
    $ta=0;
    for($i=0;$i<count($a);$i++){
        if($a[$i]<0){
            $ta+=$a[$i];
        }
    }
    return $ta;
}
function vi_tri_0($a){
    $vt="";
    for($i=0;$i<count($a);$i++){
        if($a[$i]==0){
            $s=$i+1;
            $vt.=$s." ";
        }
    }
    return $vt;
}
function sap_xep(&$a){
    for($i=0;$i<count($a)-1;$i++){
        for($j=$i+1;$j<count($a);$j++){
            if($a[$i]>$a[$j]){
                $tg = $a[$i];
                $a[$i] = $a[$j];
                $a[$j] = $tg;        
            }
        }
    }
    return $a;
}
?>
<form action="" method="POST">
    <table align="center">
        <tr align="center" bgcolor="red">
            <td colspan="2" class="header">XỦ LÝ MẢNG</td>
        </tr>

        <tr>
            <td>Nhập n: </td>
            <td>
                <input class="n" type="text" name="n" value="<?php if(isset($x)) echo $x;?>" required>
                <b style="color:red;"><?php if(isset($e)) echo $e;?></b>
            </td>

        </tr>

        <tr>
            <td></td>
            <td>
                <input class="btn" type="submit" name="submit" value="Thực hiện">
                <?php if(isset($_POST['submit'])) echo "<input class='btn' type='submit' name='reset' value='Nhập lại'>"?>
            </td>

        </tr>

        <tr>
            <td>Mảng phát sinh:</td>
            <td><input class="mang" type="text" value="<?php if(isset($in)) echo $in; ?>" readonly></td>
        </tr>

        <tr>
            <td>Số phần tử chẵn:</td>
            <td><input class="a" type="text" value="<?php if(isset($dc)) echo $dc; ?>" readonly></td>
        </tr>

        <tr>
            <td>Số phần tử < 100:</td>
            <td><input class="a" type="text" value="<?php if(isset($dn)) echo $dn; ?>" readonly></td>
        </tr>

        <tr>
            <td>Tổng phần tử âm:</td>
            <td><input class="a" type="text" value="<?php if(isset($ta)) echo $ta; ?>" readonly></td>
        </tr>

        <tr>
            <td>Vị trí phần tử = 0:</td>
            <td><input class="b" type="text" value="<?php if(isset($vt)) echo $vt; ?>" readonly></td>
        </tr>

        <tr>
            <td>Mảng tăng dần:</td>
            <td><input class="mang" type="text" value="<?php if(isset($sx)) echo $sx; ?>" readonly></td>
        </tr>
        
    </table>
</form>
</body>
</html>