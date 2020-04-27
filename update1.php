<?php
    include_once 'demos/demo1.php';
    include 'cwindex.php';

    if(isset($_GET['update'])){
        if(!empty($_GET['updcol2'])){
            $key = $_GET["primKey"]; //primary key of that row
            $column = $_GET["col2"]; //column name array
            $upd = $_GET["updcol2"]; //update value array

            foreach ($column as $colkey => $value){
                $updsql = "{$column[$colkey]} = '{$upd[$colkey]}'";
                $sql = "UPDATE country SET $updsql WHERE Country_abb = '$key'";
                mysqli_query($conn,$sql);
              }
            
            if(mysqli_query($conn,$sql)){
                echo "<p> <font color=white>Values updated";
            }
            else
                echo "<p> <font color=white>Values not updated";

            echo "<br>";
        }
    }

    echo "<br>";
    echo "<table border='1' cellpadding='2' bordercolor='#f0932b' width = '100%'>";
    echo "<tr>";
    array_unshift($column, 'Country_abb'); 
    if(isset($_GET['update'])){
        if(!empty($_GET["updcol2"])){
            foreach($column as $col2){
                echo"<th><p> <font color=white>$col2</th>";
            }
            echo"<th><p> <font color=white>ACTIONS</th>";
        echo"</tr>";

		$sql = "SELECT * FROM country;";
        $result = mysqli_query($conn, $sql);
        
        
			while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($column as $col2){
                    echo "<td><p> <font color=white>".$row["$col2"]."</td>";
                }
                echo '<td align="center"><form action="delete2.php" method="get">';
                    foreach($column as $col2){
                        echo "<input type='hidden' value='$col2' name='col2[]'>";
                    }
                echo'<input type="hidden" name="primKey" value='.$row["Country_abb"].'> <input type="submit" name="delete" value="DELETE" id="delete_btn" class= "delete">';
                echo'<input type="submit" name="update" value="UPDATE" id="update_btn" class= "update"></form></td>'; 
                echo "</tr>";
            }
        }
        else{
            echo "<p> <font color=white>No value updated";
        }
    }
        echo "</table>";

?>
