<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TÍNH NĂM ÂM LỊCH</title>
</head>
<style>
    table{background-color: #b9eeff; width: 406px;}
    .header{
        font-size: 26px; 
        color: white; 
        padding: 6px; 
        font-weight: bold;
    }
    .a, .a2{width: 106px;}
    .a2{font-weight: bold;}
    .a1, .a2, .a3{background-color: #faffd7;}
    .a1, .a2{color: red;}
</style>
<body>
<?php
if(isset($_POST['submit'])){
    $nam=$_POST['nam'];
    if(isset($nam) and is_numeric($nam) and $nam > 0){
        $can=tinh_can($nam);
        $chi=tinh_chi($nam);
        $nam_al=$can." ".$chi;
        $hinh=img($nam);
    }
    else{
        $e="Năm dương lịch phải > 0!";
    }
}
function img($nam){
    $a=array("https://nhattientuu.com/wp-content/uploads/2020/07/tuoi-than.jpg",
            "https://nhattientuu.com/wp-content/uploads/2020/07/tuoi-dau.jpg",
            "https://nhattientuu.com/wp-content/uploads/2020/07/tuoi-tuat.jpg",
            "https://nhattientuu.com/wp-content/uploads/2020/07/tuoi-hoi.jpg",
            "https://nhattientuu.com/wp-content/uploads/2020/07/tuoi-ty-1.jpg",
            "https://nhattientuu.com/wp-content/uploads/2020/07/tuoi-suu.jpg",
            "https://nhattientuu.com/wp-content/uploads/2020/07/tuoi-dan.jpg",
            "https://nhattientuu.com/wp-content/uploads/2020/07/tuoi-mao.jpg",
            "https://nhattientuu.com/wp-content/uploads/2020/07/tuoi-thin.jpg",
            "https://nhattientuu.com/wp-content/uploads/2020/07/tuoi-ty-1-1.jpg",
            "https://nhattientuu.com/wp-content/uploads/2020/07/tuoi-ngo.jpg",
            "https://nhattientuu.com/wp-content/uploads/2020/07/tuoi-mui.jpg");
    for($i=0;$i<count($a);$i++){
        if($nam%12==$i){
            return $a[$i];
        }
    }
}
function tinh_can($nam){
    $a=array("Canh","Tân","Nhâm","Quý","Giáp","Ất","Bính","Đinh","Mậu","Kỷ");
    foreach($a as $y=> $can){
        if($nam%10==$y){
            return $can;
        }
    }
}
function tinh_chi($nam){
    $a=array("Thân","Dậu","Tuất","Hợi","Tý","Sửu","Dần","Mẹo","Thìn","Tỵ","Ngọ","Mùi");
    for($i=0;$i<count($a);$i++){
        if($nam%12==$i){
            return $a[$i];
        }
    }
}
?>
<form action="" method="post">
    <table align="center">
        <tr bgcolor="#0f62c6" align="center">
            <td colspan="3" class="header">TÍNH NĂM ÂM LỊCH</td>
        </tr>

        <tr align="center">
            <td>Năm dương lịch</td>
            <td></td>
            <td>Năm âm lịch</td>
        </tr>

        <tr align="center">
            <td><input class="a" type="text" name="nam" value="<?php if(isset($nam)) echo $nam;?>" required></td>
            <td><input class="a1" type="submit" name="submit" value="=>"></td>
            <td><input class="a2" type="text" name="amlich" value="<?php if(isset($nam_al)) echo $nam_al;?>" readonly></td>
        </tr>

        <tr>
            <td colspan="3" align="center" style="color: red;"><?php if(isset($e)) echo $e ?></td>
        </tr>

        <tr>
            <td colspan="3" align="center"><img src="<?php if(isset($hinh)) echo $hinh ?>" width="150px"></td>
        </tr>

        <tr>
            <td colspan="3" align="center">
                <?php if(isset($_POST['submit'])) echo "<input class='a3' type='submit' name='reset' value='Nhập lại'>"?>
            </td>

        </tr>

    </table>
</form>
</body>
</html>