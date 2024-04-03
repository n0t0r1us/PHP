<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TÌM KIẾM</title>
</head>
<style>
    td{padding-left: 16px;}
    .avv, .kq{width: 256px;}
    .kq{width: 256px; background-color: #cdfbfc; color: red; font-weight: bold;}
    .n{width: 76px;}
    .header{
        font-size: 26px; 
        color: white; 
        padding: 6px; 
        font-weight: bold;
    }
    table{background-color: #d1ded4; width: 456px;}
    .btn{background-color: #95ccfa; width: 86px;}
</style>
<body>
<?php
if(isset($_POST["timk"])){
    if(isset( $_POST['avv'])){
        $x = $_POST['avv'];
        $v=$_POST['n'];
        tach_chuoi($x,$a);
        if(check($a,$dem) == 0){
            if(is_numeric($v)){
                $xm=xuat_mang($a);
                $tk=tim_kiem($a,$v);
                if($tk>0){
                    $in_kq="Tìm thấy $v tại vị trí thứ $tk của mảng!";
                }
                else{$in_kq="Không tìm thấy $v trong mảng!";}
            }else{  
                $e2="Không hợp lệ, vui lòng nhập số!";
            }   
        }else{
            $e1="Mảng không hợp lệ, vui lòng nhập số!";
        }
    }
}
else if(isset($_POST["reset"])){
    $x="";
    $v="";
}
function tach_chuoi($x,&$a){
    $a=explode(",",$x);
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
    $xm="";
    for($i=0;$i<count($a)-1;$i++){
        $xm.="$a[$i], ";
    }
    $xm.=$a[count($a)-1];
    return $xm;
}
function tim_kiem($a,$v){
    $x=0;
    for($i=0;$i<count($a);$i++){
        if($a[$i] == $v){
            $x+=$i+1;
        }
    }
    return $x;
}
?>
<form action="" method="post">
    <table align="center">
        <tr bgcolor="#39959e">
            <td class="header" colspan="2" align="center">TÌM KIẾM</td>
        </tr>

        <tr>
            <td>Nhập mảng:</td>
            <td><input type="text" class="avv" name="avv" value="<?php if(isset($x)) echo $x; ?>" required></td>
        </tr> 

        <?php if(isset($e1)) echo "<tr><td class='a'><td class='a'><b style='color: red;'>$e1</b></td></td></tr>" ?>
        <tr>
            <td>Nhập số cần tìm:</td>
            <td><input type="text" class="n" name="n" value="<?php if(isset($v)) echo $v;?>" required></td>
        </tr>

        <?php if(isset($e2)) echo "<tr><td class='a'><td class='a'><b style='color: red;'>$e2</b></td></td></tr>" ?>
        <tr>
            <td></td>
            <td>
                <input type="submit" class="btn" name="timk" value="Tìm kiếm">
                <?php if(isset($_POST['timk'])) echo "<input class='btn' type='submit' name='reset' value='Nhập lại'>"?>
            </td>

        </tr>

        <tr>
            <td>Mảng:</td>
            <td><input type="text" class="avv" name="avv_kq" value="<?php if(isset($xm)) echo $xm; ?>"></td>
        </tr>

        <tr>
            <td>Kết quả tìm kiếm:</td>
            <td><input type="text" class="kq" name="kq" value="<?php if(isset($in_kq)) echo $in_kq; ?>"></td>
        </tr>

        <tr bgcolor="#75d0d2">
            <td colspan="2" align="center">(Các phần tử trong mảng sẽ cách nhau bằng dấu *,*)</td>
        </tr>
        
    </table>
</form>
</body>
</html>