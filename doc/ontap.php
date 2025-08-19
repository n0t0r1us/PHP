<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php 
// textarea in cho rộng hơn
    // Khoi tao mang 
    if(isset($_POST['submit'])){
        $n = $_POST['n'];
        $arr = array();

        for($i=0; $i<$n; $i++){
            $arr[$i] = rand(-100, 100);
        }
        // Timf so chinh phuong
        $arr_scp = array();
        $vt = 0;
        for($i=0; $i<$n; $i++){
            if(sqrt($arr[$i]) == (int)sqrt($arr[$i])){
                $arr_scp[$vt] = $arr[$i];
                $vt ++;
            }
        }
    } 
?>
<body>
    <form action="" method="post" name="form1">
        <table align="center">
            <tr>
                <td>
                    Nhap n : 
                </td>
                <td>
                    <input type="text" name="n" value="<?php if(isset($_POST['submit'])){
                        if($n % 2 != 0 && $n>=1 && $n<=19){
                            echo $n;
                        }
                        else{
                            echo "nhap lai";
                        }
                    }?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="submit">Tạo mảng</button>
                </td> 
            </tr>
            <tr>
                <td>mang phat sinh : </td>
                <td>
                    <textarea name="" id="" cols="30" rows="10" readonly><?php if(isset($_POST['submit'])){
                        if($n % 2 != 0 && $n>=1 && $n<=19){
                            for($i=0; $i<$n;$i++){
                                echo $arr[$i] ." ";
                            }
                        }
                    }
                    ?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Hien thi so chinh phương : 
                </td>
                 
                <td>
                    <textarea name="" id="" cols="30" rows="10" readonly><?php if(isset($_POST['submit'])){
                        if($n % 2 != 0 && $n>=1 && $n<=19){
                            for($i=0; $i<$vt;$i++){
                                echo $arr_scp[$i] ." ";
                            }
                        }
                    }?>
                    </textarea>
                </td>
            </tr>
            
        </table>
    </form>
</body>
</html>
