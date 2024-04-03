<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHÉP TÍNH TRÊN 2 SỐ</title>
</head>
<style>
    .a, .b{
        text-align: right;
        font-weight: bold;
    }
    .a{color: #B42069;}
    .b{color: purple;}
</style>
<body>
<form action="bt6mr.php" method="post">
    <table align="center">
        <tr>
            <td colspan="2" align="center"><h3 style="color: #420FB6;">PHÉP TÍNH TRÊN 2 SỐ</h3></td>
        </tr>

        <tr>
            <td class="a">Chọn phép tính: </td>
            <td style="color: purple;">
                <input type="radio" name="cal" value= "cong" checked>Cộng
                <input type="radio" name="cal" value= "tru">Trừ
                <input type="radio" name="cal" value= "nhan">Nhân
                <input type="radio" name="cal" value= "chia">Chia
            </td>

        </tr>

        <tr>
            <td class="b">Số thứ nhất: </td>
            <td>
                <input type="text" name="a" size="26px" required> 
            </td>

        </tr>

        <?php if(isset($error1)) echo "<tr><td><td><b style='color: red;'>$error1</b></td></td></tr>" ?>
        <tr>
            <td class="b">Số thứ hai: </td>
            <td><input type="text" name="b" size="26px" required></td>
        </tr>
        
        <?php if(isset($erro2)) echo "<tr><td><td><b style='color: red;'>$error2</b></td></td></tr>" ?>
        <?php if(isset($error3)) echo "<tr><td><td><b style='color: red;'>$error3</b></td></td></tr>" ?>
        <tr>
            <td></td>
            <td align="left">
                <input type="submit" name="submit" value="TÍNH">
            </td>

        </tr>

    </table>
</form>
</body>
</html>