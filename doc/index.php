<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $severname="localhost";
        $username="root";
        $password="";
        $dbname="baitap1";
        $conn= mysqli_connect($severname, $username, $password, $dbname);
        //check connect
        if(!$conn){
            die("connect failed: ". mysqli_connect_error());
        }

        if(isset($_POST['gui'])){
            $ten = $_POST['ten'];
            $ho = $_POST['ho'];
            $diachi = $_POST['diachi'];
            $malop = $_POST['malop'];

            $query = "INSERT INTO sinhvien(ten,ho,diachi,idlop) VALUE ('$ten','$ho','$diachi','$malop')";

            $result=mysqli_query($conn,$query);
        }
        if(isset($_POST['xem']))
            header('localhost:./xemkq.php');
        
    ?>
    <form method="post" action="">
        <table align="center" bgcolor="orange">
            <tr>
                <td colspan="2" align="center"><h1>Nhap thong tin sv</h1></td>
            </tr>
            <tr>
                <td>Tên</td>
                <td><input type="text" name="ten" value="<?php if(isset($ten)) echo $ten ?>" required size="35"></td>
            </tr>
            <tr>
                <td>Họ</td>
                <td><input type="text" name="ho" value="<?php if(isset($ho)) echo $ho ?>" required size="35"></td>
            </tr>
            <tr>
                <td>Dịa chỉ</td>
                <td><input type="text" name="diachi" value="<?php if(isset($diachi)) echo $diachi ?>" required size="35"></td>
            </tr>
            <tr>
                <td>ID Lớp</td>
                <td>
                    <select name="malop">
                        <option value="1">Lop1</option>
                        <option value="2">Lop2</option>
                    </select>
                </td>
                <!-- <td><input type="text" name="ID" value="<?php //if(isset($malop)) echo $malop ?>" require size="35" readonly></td> -->
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="gui" value="Gui">
                    <input type="submit" name="xoa" value="Xoa">
                    <input type="submit" name="ketqua" value="Xem Ket Qua">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="color: red;">
                    <?php
                        if(isset ($result))
                            if(!($result)) die ('<b>Query failse </b>');
                            else echo "chen thanh cong";
                    ?>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>