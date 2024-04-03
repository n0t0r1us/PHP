<?php
    $severname="localhost";
    $username="root";
    $password="";
    $dbname="ql_ban_sua";
    $conn = mysqli_connect($severname, $username, $password, $dbname);
    $query = "SELECT * FROM sua";
    $result = mysqli_query($conn,$query);
    
    
    $numRows = mysqli_num_rows($result);
    $rowsPerPage=6; 
    
    $maxPage = ceil($numRows/$rowsPerPage);
    if(!isset($_GET['page']))
    {
        $_GET['page']='1';
    }
    
    $offset = ($_GET['page']-1)*$rowsPerPage;
   
    $query = "SELECT a.Ten_sua,b.Ten_hang_sua,c.Ten_loai,a.Trong_luong,a.Don_gia FROM sua a JOIN hang_sua b ON a.Ma_hang_sua = b.Ma_hang_sua JOIN loai_sua c ON a.Ma_loai_sua = c.Ma_loai_sua LIMIT $offset,$rowsPerPage";
    $result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>THÔNG TIN SỮA</title>
    </head>
    <style>
        a{color: #bd2307;}
    </style>
    <body>
        <form action="">
            <h1 align='center' style="color: #bd2307;">THÔNG TIN SỮA</h1>
            <table align="center" border="1" width='700px'>
                <tr bgcolor='#fee0c1' style="color: #bd2307; font-weight: bold;">
                    <td>Số TT</td>
                    <td>Tên sữa</td>
                    <td>Hãng sữa</td>
                    <td>Loại sữa</td>
                    <td>Trọng lượng</td>
                    <td>Đơn giá</td>
                </tr>
                
                <?php
                if(mysqli_num_rows($result)!=0){
                    $stt=1; 
                    $a=1;
                    while ($rows=mysqli_fetch_row($result)){
                        if($a==1){
                            $color="#fefefe";
                            $tcolor="#bd2307";
                            $a=2;
                        }else{
                            $color="#fee0c1";
                            $tcolor="black";
                            $a=1;
                        }
                        echo "<tr bgcolor='$color' style='color: $tcolor;'>";
                        echo "<td align='center'>".$stt++."</td>";
                        echo "<td>$rows[0]</td>";
                        echo "<td>$rows[1]</td>";
                        echo "<td>$rows[2]</td>";
                        echo "<td>$rows[3] gram</td>";
                        echo "<td>$rows[4] VNĐ</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>
            <div align='center' style="margin-top: 26px;">
                <a href="2_4.php?page=1"><?php if($_GET['page']==1) echo ""; else echo '<<';?></a>
                <a href="2_4.php?page=<?php echo $_GET['page']-1;?>"><?php if($_GET['page']==1) echo ""; else echo '<';?></a>
                <?php for($i=1;$i<=$maxPage;$i++){ ?>
                <a href="2_4.php?page=<?php echo $i ?>"><?php echo $i ?></a>
                <?php } ?>
                <a href="2_4.php?page=<?php echo $_GET['page']+1;?>"><?php if($_GET['page']==$maxPage) echo ""; else echo '>';?></a>
                <a href="2_4.php?page=<?php echo $maxPage?>"><?php if($_GET['page']==$maxPage) echo ""; else echo '>>';?></a>
            </div>
        </form>
    </body>
    </html>
