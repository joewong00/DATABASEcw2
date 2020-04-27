<?php
    include_once 'demos/demo1.php';
    include 'cwindex.php';

    if(isset($_GET['update'])){
        if(!empty($_GET['updcol'])){
            $key = $_GET["primKey"]; //primary key of that row
            $column = $_GET["col"]; //column name array
            $upd = $_GET["updcol"]; //update value array

            foreach ($column as $colkey => $value){
                $updsql = "{$column[$colkey]} = '{$upd[$colkey]}'";
                $sql = "UPDATE city SET $updsql WHERE ID = $key";
                mysqli_query($conn,$sql);
              }
            
            if(mysqli_query($conn,$sql)){
                echo "Values updated";
            }
            else
                echo "Values not updated";

            echo "<br>";
        }
    }

    echo "<br>";
    echo "<table border='1' cellpadding='2'>";
    echo "<tr>";
    array_unshift($column, 'ID'); 
    if(isset($_GET['update'])){
        if(!empty($_GET["updcol"])){
            foreach($column as $col){
                echo"<th>$col</th>";
            }
            echo"<th>ACTIONS</th>";
        echo"</tr>";

		$sql = "SELECT * FROM city;";
        $result = mysqli_query($conn, $sql);
        
        
			while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($column as $col){
                    echo "<td>".$row["$col"]."</td>";
                }
                echo '<td><form action="delete1.php" method="get">';
                    foreach($column as $col){
                        echo "<input type='hidden' value='$col' name='col[]'>";
                    }
                echo'<input type="hidden" name="primKey" value='.$row["ID"].'> <input type="submit" name="delete" value="DELETE">';
                echo'<input type="submit" name="update" value="UPDATE"></form></td>'; 
                echo "</tr>";
            }
        }
        else{
            echo "No value updated";
        }
    }
        echo "</table>";

?>