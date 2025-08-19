<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xử lý mảng</title>
</head>
<style>
    table{background-color: #fed6f1; width: 500px;}
    td{padding-left: 10px;}
    .header{
        font-size: 20px; 
        color: white; 
        padding: 5px; 
        font-weight: bold;
    }
    .n, .a{width: 172px;}
    .btn{width: 100px; background-color: lightyellow; height: 25px;}
    .btn1{width: 180px; background-color: lightyellow; height: 25px;}
    .mang, .b{width: 345px;}
</style>
<body>
<?php
if(isset($_POST['submit'])){
    $n=$_POST['n'];
    if(isset($n) and is_numeric($n) and $n>0 and $n<20 and $n%2==1){
        tao_mang($n,$a);
        $in=in_mang($a);
        $cp=in_cp($a);
        $tong=tong_cp($a);
    }
    else{
        $error="Nhập lại!";
    }
}
else if(isset($_POST['reset'])){
    $n="";
}
function tao_mang($n,&$a){
    for($i=0;$i<$n;$i++){
        $a[$i]=rand(-100,100);
    }
    return $a;
}
function in_mang($a){
    $mang="";
    for($i=0;$i<count($a)-1;$i++){
        $mang .= $a[$i]." | ";
    }
    $mang .= $a[count($a)-1];
    return $mang;
}
function kt_cp($x){
    for($i=2;$i<=sqrt($x);$i++){
        if($i*$i == $x){
            return true;
        }
    }
    return 0;
}
function in_cp($a){
    $mang="";
    for($i=0;$i<count($a);$i++){
        if($a[$i] < 100){
            if(kt_cp($a[$i])){
                $mang .= $a[$i]." ";
            }
        }
    }
    return $mang;
}
function tong_cp($a){
    $tong=0;
    for($i=0;$i<count($a);$i++){
        if($a[$i] < 100){
            if(kt_cp($a[$i])){
                $tong+=$a[$i];
            }
        }
    }
    return $tong;
}
?>
<form action="" method="POST" name="mang">
    <table align="center">
        <tr align="center" bgcolor="#a70f74">
            <td colspan="2" class="header">BÀI TẬP 1</td>
        </tr>
        <tr>
            <td>Nhập n: </td>
            <td>
                <input class="n" type="text" name="n" value="<?php if(isset($n)) echo $n;?>" required>
                <b style="color:red;"><?php if(isset($error)) echo $error;?></b>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button class="btn1" name="submit">Phát sinh và tính toán</button>
                <!-- <input class="btn" type="submit" name="submit" value="Thực hiện"> -->
                <?php // if(isset($_POST['submit'])) echo "<input class='btn' type='submit' name='reset' value='Nhập lại'>"?>
                <?php if(isset($_POST['submit'])) echo "<button class='btn' name='reset'>Nhập lại</button>"?>
            </td>
        </tr>
        <tr>
            <td>Mảng phát sinh:</td>
            <td><input class="mang" type="text" value="<?php if(isset($in)) echo $in; ?>" readonly></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <textarea name="" id="" cols="45" rows="5" readonly>
                    <?php 
                        if(isset($cp)){
                            if($cp != ""){
                                printf("\nCác số chính phương trong mảng: $cp\n");
                                echo "Tổng các số chính phương: $tong";
                            }else{
                                printf("\nKhông tồn tại số chính phương thỏa điều kiện!!");
                            }
                        }
                    ?>
                    <?php //echo "Các số chính phương trong mảng: "; if(isset($cp)) echo "$cp"; ?>
                    <?php //echo "Tổng các số chính phương: "; if(isset($tong)) echo $tong; ?>
                </textarea>
            </td>
        </tr>
    </table>
</form>
</body>
</html>