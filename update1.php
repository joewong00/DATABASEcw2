<?php
    include_once 'demos/demo1.php';
    include 'cwindex.php';

    if(isset($_GET['update'])){
        if(!empty($_GET['updcol'])){
            $key = $_GET["primKey"]; //primary key of that row
            $updprimKey = $_GET["updprimKey"]; //update primary key
            $column = $_GET["col"]; //column name array
            $upd = $_GET["updcol"]; //update value array
            

            $sql = "UPDATE city SET ID = $updprimKey WHERE ID = '$key'";
            mysqli_query($conn,$sql);
                    
            if(mysqli_query($conn,$sql)){
                foreach ($column as $colkey => $value){
                    $updsql = "{$column[$colkey]} = '{$upd[$colkey]}'";
                    $sql = "UPDATE city SET $updsql WHERE ID = '$updprimKey'";
                    mysqli_query($conn,$sql);
                }
            }

            else{
                echo "<font color=white>Error: " .mysqli_error($conn);
                foreach ($column as $colkey => $value){
                    $updsql = "{$column[$colkey]} = '{$upd[$colkey]}'";
                    $sql = "UPDATE city SET $updsql WHERE ID = '$updprimKey'";
                    mysqli_query($conn,$sql);
                }
            }
            
            if(mysqli_query($conn,$sql)){
                echo "<font color=white>Values updated for ID = $key";
            }
            else {
                echo "<p> <font color=white>Values not updated";
                // print code
                echo "<br><br>$sql<br>";
                echo "Error: " .mysqli_error($conn);
            }
            echo "<br>";
        }
    }

    echo "<br>";
    echo "<table border='1' cellpadding='2' bordercolor='#f0932b' width = '100%'>";
    echo "<tr>";
    array_unshift($column, 'ID');
    
    if(isset($_GET['update'])){
        if(!empty($_GET["updcol"])){
            foreach($column as $col){
                echo"<th><p> <font color=white>$col</th>";
            }
            echo"<th><p> <font color=white>ACTIONS</th>";
        echo"</tr>";

		$sql = "SELECT * FROM city;";
        $result = mysqli_query($conn, $sql);


			while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($column as $col){
                    echo "<td><p> <font color=white>".$row["$col"]."</td>";
                }
                echo '<td align="center"><form action="delete1.php" method="get">';
                    foreach($column as $col){
                        echo "<input type='hidden' value='$col' name='col[]'>";
                    }
                echo'<input type="hidden" name="primKey" value='.$row["ID"].'> <input type="hidden" name="name" value='.$row["City_Name"].'> <input type="submit" name="delete" value="DELETE" id="delete_btn" class= "delete">';
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
