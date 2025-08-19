<?php
    $severname="localhost";
    $username="root";
    $password="";
    $dbname="phi";
    $conn = mysqli_connect($severname, $username, $password, $dbname);
    if(!$conn){
        die("connect failed: ". mysqli_connect_error());
    }
    $query="SELECT * FROM 'thongtinsv' WHERE id_lop=1";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)!=0){
        while($row = mysqli_fetch_array($result)){
            for($i=0;$i<mysqli_num_fields($result);$i++){
                    echo $row[$i] . " ";
                echo "<br>";
            }
        }
    }
?>