<?php
    include_once 'demos/demo1.php';
    include 'cwindex.php';

        $key = $_GET["primKey"];
        $delsql1 = "'" . $key[0] . "'";
        $delsql2 = "'" . $key[1] . "'";
        //echo "$key";

        if(isset($_GET['delete'])){ //if we pressed delete

        $sql = "DELETE FROM lang WHERE Country_abb=($delsql1) AND Language=($delsql2) ";

        if(mysqli_query($conn,$sql)){
            echo "Row deleted";
        }
        else
            echo "Row not deleted";

        echo "<br>";
        echo "<br>";
    echo "<table border='1' cellpadding='2'>";
    echo "<tr>";
    
        if(!empty($_GET["col3"])){
            foreach($_GET["col3"] as $col3){
                echo"<th>$col3</th>";
            }
            echo"<th>ACTIONS</th>";
        echo"</tr>";

		$sql = "SELECT * FROM lang;";
        $result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($_GET["col3"] as $col3){
                    echo "<td>".$row["$col3"]."</td>";
                }
                echo '<td><form action="delete3.php" method="get">';
                    foreach($_GET["col3"] as $col3){
                        echo "<input type='hidden' value='$col3' name='col3[]'>";
                    }
                echo'<input type="hidden" name="primKey[]" value='.$row["Country_abb"].'> <input type="hidden" name="primKey[]" value='.$row["Language"].'>
                <input type="submit" name="delete" value="DELETE">';
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
       
        echo "<form action = 'update3.php' method = 'get'>";

        if(!empty($_GET["col3"])){
            foreach($_GET["col3"] as $col3){
                if($col3 == 'Country_abb')
                    echo "$col3<input type = 'hidden', value = '$key[0]', name = 'primKey[]' checked> : <input type = 'text' value = '$key[0]'>";
                else if($col3 == 'Language')
                    echo "$col3<input type = 'hidden', value = '$key[1]', name = 'primKey[]' checked> : <input type = 'text' value = '$key[1]'>";
                else 
                    echo "$col3<input type = 'hidden', value = '$col3', name = 'col3[]' checked> : <input type = 'text' name = 'updcol3[]'>";
                echo "<br>";
                echo "<br>";
            }
            echo "<input type = 'submit' name = 'update' value = 'UPDATE'></form>";
        }

        echo "<br>";
    echo "<table border='1' cellpadding='2'>";
    echo "<tr>";

        if(!empty($_GET["col3"])){
            foreach($_GET["col3"] as $col3){
                echo"<th>$col3</th>";
            }
            echo"<th>ACTIONS</th>";
        echo"</tr>";

		$sql = "SELECT * FROM lang;";
        $result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($_GET["col3"] as $col3){
                    echo "<td>".$row["$col3"]."</td>";
                }
                //echo "<td><input type = 'submit' value = 'UPDATE'> <input type = 'submit' value = 'DELETE'></td>";
                echo '<td><form action="delete3.php" method="get"> <input type="hidden" name="primKey[]" value='.$row["Country_abb"].'> <input type="hidden" name="primKey[]" value='.$row["Language"].'>
                <input type="submit" name="delete" value="DELETE"> <input type="submit" name="update" value="UPDATE"></form></td>';
                echo "</tr>";
            }
        }
        echo "</table>";

    }

?>