<?php
    include_once 'demos/demo1.php';
    include 'cwindex.php';

    if(isset($_GET['update'])){
        if(!empty($_GET['updcol3'])){
            $key = $_GET["primKey"]; //primary key of that row
            $column = $_GET["col3"]; //column name array
            $upd = $_GET["updcol3"]; //update value array

            foreach ($column as $colkey => $value){
                $updsql = "{$column[$colkey]} = '{$upd[$colkey]}'";
                $sql = "UPDATE lang SET $updsql WHERE Country_abb = '$key[0]' AND Language = '$key[1]'";
                mysqli_query($conn,$sql);
              }

            if(mysqli_query($conn,$sql)){
                echo "<p> <font color=white>Values updated for $key[1] for $key[0]";
            }
            else{
                echo "<p> <font color=white>Values not updated";

                echo "<br><br>Failed to update '$upd[$colkey]' into $column[$colkey]";
                // print code
                echo "<br><br>$sql";
            }
            echo "<br>";
        }
    }


    echo "<br>";
    echo "<table border='1' cellpadding='2' bordercolor='#fff200' width = '100%'>";
    echo "<tr>";
    array_unshift($column, 'Country_abb', 'Language');
    if(isset($_GET['update'])){
        if(!empty($_GET["updcol3"])){
            foreach($column as $col3){
                echo"<th><p> <font color=white>$col3</th>";
            }
            echo"<th><p> <font color=white>ACTIONS</th>";
        echo"</tr>";

		$sql = "SELECT * FROM lang;";
        $result = mysqli_query($conn, $sql);


			while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($column as $col3){
                    echo "<td><p> <font color=white>".$row["$col3"]."</td>";
                }
                echo '<td align="center"><form action="delete3.php" method="get">';
                    foreach($column as $col3){
                        echo "<input type='hidden' value='$col3' name='col3[]'>";
                    }
                echo'<input type="hidden" name="primKey[]" value='.$row["Country_abb"].'> <input type="hidden" name="primKey[]" value='.$row["Language"].'>
                <input type="submit" name="delete" value="DELETE" id="delete_btn" class= "delete">';
                echo' <input type="submit" name="update" value="UPDATE" id="update_btn" class= "update"></form></td>';
                echo "</tr>";
            }
        }
        else{
            echo "<p> <font color=white>No value updated";
        }
    }
        echo "</table>";

?>
