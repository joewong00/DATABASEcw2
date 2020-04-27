<?php
    include_once 'demos/demo1.php';
    include 'cwindex.php';

        $key = $_GET["primKey"];
        $inssql = "'" . $key . "'";
        //echo "$key";

        if(isset($_GET['delete'])){ //if we pressed delete

        $sql = "DELETE FROM country WHERE Country_abb=($inssql)";

        if(mysqli_query($conn,$sql)){
            echo "Row deleted";
        }
        else
            echo "Row not deleted";

        echo "<br>";
        echo "<br>";
    echo "<table border='1' cellpadding='2'>";
    echo "<tr>";
    
        if(!empty($_GET["col2"])){
            foreach($_GET["col2"] as $col2){
                echo"<th>$col2</th>";
            }
            echo"<th>ACTIONS</th>";
        echo"</tr>";

		$sql = "SELECT * FROM country;";
        $result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($_GET["col2"] as $col2){
                    echo "<td>".$row["$col2"]."</td>";
                }
                echo '<td><form action="delete2.php" method="get">';
                    foreach($_GET["col2"] as $col2){
                        echo "<input type='hidden' value='$col2' name='col2[]'>";
                    }
                echo'<input type="hidden" name="primKey" value='.$row["Country_abb"].'> <input type="submit" name="delete" value="DELETE">';
                echo'<input type="submit" name="update" value="UPDATE"></form></td>'; 
                echo "</tr>";
            }
        }
        else{
            echo "Please select at least one column";
        }
        echo "</table>";
    }

    else{ //if we pressed update

        echo "Enter information:";
        echo "<br>";
       
        echo "<form action = 'update2.php' method = 'get'>";

        if(!empty($_GET["col2"])){
            foreach($_GET["col2"] as $col2){
                if($col2 == 'Country_abb')
                    echo "$col2<input type = 'hidden', value = '$key', name = 'primKey' checked> : <input type = 'text' value = '$key'>";
                else
                    echo "$col2<input type = 'hidden', value = '$col2', name = 'col2[]' checked> : <input type = 'text' name = 'updcol2[]'>";
                echo "<br>";
                echo "<br>";
            }
            echo "<input type = 'submit' name = 'update' value = 'UPDATE'></form>";
        }

        echo "<br>";
    echo "<table border='1' cellpadding='2'>";
    echo "<tr>";

        if(!empty($_GET["col2"])){
            foreach($_GET["col2"] as $col2){
                echo"<th>$col2</th>";
            }
            echo"<th>ACTIONS</th>";
        echo"</tr>";

		$sql = "SELECT * FROM country;";
        $result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($_GET["col2"] as $col2){
                    echo "<td>".$row["$col2"]."</td>";
                }
                //echo "<td><input type = 'submit' value = 'UPDATE'> <input type = 'submit' value = 'DELETE'></td>";
                echo '<td><form action="delete2.php" method="get"> <input type="hidden" name="primKey" value='.$row["Country_abb"].'> <input type="submit" name="delete" value="DELETE"> <input type="submit" name="update" value="UPDATE"></form></td>';
                echo "</tr>";
            }
        }
        echo "</table>";

    }

?>