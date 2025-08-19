<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    $tp = "";
    $tinh = "";
    $qg = 1;
    // Ket noi SQL
    if(isset($_POST['them'])){
        $severname="localhost";
        $username="root";
        $password="";
        $dbname="chuyenbay";
        $conn = mysqli_connect($severname, $username, $password, $dbname);
        // Khai Bao
        $tp = $_POST['tp'];
        $tinh = $_POST['tinh'];
        $qg = $_POST['qg'];

        $strSql = "INSERT INTO `thanhpho`( `tentp`, `tentinh`, `quocgia`) VALUES ('$tp','$tinh','$qg')"; // lay trong my SQL
        // Them 
        if(mysqli_query($conn, $strSql)){
            echo "them thanh cong";
        }
        else{
            echo "that bai";
        }
    }
    // Nut reset
    if(isset($_POST['reset'])){
        $tp = "";
        $tinh = "";
        $qg = 1;
    }
    // Xem KQ
    if(isset($_POST['xem'])){
        header("location:ontap2_k1.php");
    }

?>
<body>
    <form action="" method="post" name="f2">
        <table>
            <tr><td colspan="2">Form nhap quoc gia</td></tr>
            <tr>
                <td>ten tp : </td>
                <td>
                    <input type="text" name="tp">
                </td>
            </tr>
            <tr>
                <td>ten tinh : </td>
                <td>
                   <input type="text" name="tinh">
                </td>
            </tr>
            <tr>
                <td>ma quoc gia : </td>
                <td>
                    <select name="qg" id="">
                        <option value="1" <?php echo $qg == 1 ? "selected" : ""; ?>>1</option>
                        <option value="2" <?php echo $qg == 2 ? "selected" : ""; ?>>2</option>
                        <option value="3" <?php echo $qg == 3 ? "selected" : ""; ?>>3</option>
                        <option value="4" <?php echo $qg == 4 ? "selected" : ""; ?>>4</option>
                    </select>
                </td>    
            </tr> 
            <tr>
                <td colspan="2"> 
                    <button type="submit" name="them" >them</button>
                    <button type="submit" name="reset" >reset</button>
                    <button type="submit" name="xem">xem ket qua</button>
                </td>
            </tr>  
        </table>
    </form>
</body>
</html> 