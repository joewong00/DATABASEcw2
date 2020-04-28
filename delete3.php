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
        echo "<p> <font color=white>Deleted the entry for $key[1] for $key[0]";
    }
    else
        echo "<p> <font color=white>Row not deleted";

    echo "<br>";

    // print code
    echo "<br>$sql<br>";

    echo "<br>";
    echo "<table border='1' cellpadding='2' bordercolor='#fff200' width = '100%'>";
    echo "<tr>";

        if(!empty($_GET["col3"])){
            foreach($_GET["col3"] as $col3){
                echo"<th><p> <font color=white>$col3</th>";
            }
            echo"<th><p> <font color=white>ACTIONS</th>";
        echo"</tr>";

		$sql = "SELECT * FROM lang;";
        $result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($_GET["col3"] as $col3){
                    echo "<td><p> <font color=white>".$row["$col3"]."</td>";
                }
                echo '<td align="center"><form action="delete3.php" method="get">';
                    foreach($_GET["col3"] as $col3){
                        echo "<input type='hidden' value='$col3' name='col3[]'>";
                    }
                echo'<input type="hidden" name="primKey[]" value='.$row["Country_abb"].'> <input type="hidden" name="primKey[]" value='.$row["Language"].'>
                <input type="submit" name="delete" value="DELETE" id="delete_btn" class= "delete">';
                echo'<input type="submit" name="update" value="UPDATE" id="update_btn" class= "update"></form></td>';
                echo "</tr>";
            }
        }

        echo "</table>";
    }

    else{ //if we pressed update

        echo "<p> <font color=white> Enter information:";
        echo "<br>";

        echo "<form action = 'update3.php' method = 'get'>";

        if(!empty($_GET["col3"])){
            foreach($_GET["col3"] as $col3){
                if($col3 == 'Country_abb')
                    echo "$col3<input type = 'hidden', value = '$key[0]', name = 'primKey[]' checked> : <input type = 'text' value = '$key[0]' id='datacol' class='data'>";
                else if($col3 == 'Language')
                    echo "$col3<input type = 'hidden', value = '$key[1]', name = 'primKey[]' checked> : <input type = 'text' value = '$key[1]' id='datacol' class='data'>";
                else
                    echo "$col3<input type = 'hidden', value = '$col3', name = 'col3[]' checked> : <input type = 'text' name = 'updcol3[]' id='datacol' class='data'>";
                echo "<br>";
                echo "<br>";
            }
            echo "<input type = 'submit' name = 'update' value = 'UPDATE' id='update1_btn' class='update1'></form>";
            echo "<br>";
        }

        echo "<br>";
    echo "<table border='1' cellpadding='2' bordercolor='#fff200' width = '100%'>";
    echo "<tr>";

        if(!empty($_GET["col3"])){
            foreach($_GET["col3"] as $col3){
                echo"<th><p> <font color=white>$col3</th>";
            }
            echo"<th><p> <font color=white>ACTIONS</th>";
        echo"</tr>";

		$sql = "SELECT * FROM lang;";
        $result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($_GET["col3"] as $col3){
                    echo "<td><p> <font color=white>".$row["$col3"]."</td>";
                }
                //echo "<td><input type = 'submit' value = 'UPDATE'> <input type = 'submit' value = 'DELETE'></td>";
                echo '<td align="center"><form action="delete3.php" method="get">';
                foreach($_GET["col3"] as $col3){
                    echo "<input type='hidden' value='$col3' name='col3[]'>";
                }
                echo'<input type="hidden" name="primKey" value='.$row["Country_abb"].'> <input type="hidden" name="primKey[]" value='.$row["Language"].'>';
                echo'<input type="submit" name="delete" value="DELETE" id="delete_btn" class= "delete"> <input type="submit" name="update" value="UPDATE" id="update_btn" class= "update"></form></td>';
                echo "</tr>";
            }
        }
        echo "</table>";

    }

?>
