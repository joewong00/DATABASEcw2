<?php
    include_once 'demos/demo1.php';
    include 'cwindex.php';

    $key = $_GET["primKey"];
    $name = $_GET["name"];
    $delsql = "'" . $key . "'";

    //echo "$key";
    if(isset($_GET['delete'])){ //if we pressed delete

    $sql = "DELETE FROM city WHERE ID=($delsql)";

    if(mysqli_query($conn,$sql)){
        echo "<p> <font color=white>Deleted the entry for $name";
    }
    else{
        echo "<p> <font color=white>$name not deleted<br>";
        echo "Error: " .mysqli_error($conn);
    }

    echo "<br>";

    // print code
    echo "<br>$sql<br>";

    echo "<br>";
    echo "<table border='1' cellpadding='2' bordercolor='#c23616' width = '100%'>";
    echo "<tr>";

        if(!empty($_GET["col"])){
            foreach($_GET["col"] as $col){
                echo"<th><p> <font color=white>$col</th>";
            }
            echo"<th><p> <font color=white>ACTIONS</th>";
        echo"</tr>";

		$sql = "SELECT * FROM city;";
        $result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($_GET["col"] as $col){
                    echo "<td><p> <font color=white>".$row["$col"]."</td>";
                }
                echo '<td align="center"><form action="delete1.php" method="get">';
                    foreach($_GET["col"] as $col){
                        echo "<input type='hidden' value='$col' name='col[]'>";
                    }
                echo'<input type="hidden" name="primKey" value='.$row["ID"].'><input type="hidden" name="name" value='.$row["City_Name"].'> <input type="submit" name="delete" value="DELETE" id="delete_btn" class= "delete">';
                echo'<input type="submit" name="update" value="UPDATE" id="update_btn" class= "update"></form></td>';
                echo "</tr>";
            }
        }

        echo "</table>";
    }


    else{ //if we pressed update

        echo "<p> <font color=white>Enter information:";
        echo "<br>";

        echo "<form action = 'update1.php' method = 'get'>";

        if(!empty($_GET["col"])){
            foreach($_GET["col"] as $col){
                if($col == 'ID')
                    echo "<p> <font color=white>$col<input type = 'hidden', value = '$key', name = 'primKey' checked> : <input type = 'text' name = 'updprimKey' value = '$key' id='datacol' class='data'>";
                else
                    echo "<p> <font color=white>$col<input type = 'hidden', value = '$col', name = 'col[]' checked> : <input type = 'text' name = 'updcol[]' id='datacol' class='data'>";
                echo "<br>";
                echo "<br>";
            }
            echo "<input type = 'submit' name = 'update' value = 'UPDATE' id='update1_btn' class='update1'></form>";
            echo "<br>";
        }

        echo "<br>";
    echo "<table border='1' cellpadding='2'bordercolor='#c23616' width = '100%'>";
    echo "<tr>";

        if(!empty($_GET["col"])){
            foreach($_GET["col"] as $col){
                echo"<th><p> <font color=white>$col</th>";
            }
            echo"<th><p> <font color=white>ACTIONS</th>";
        echo"</tr>";

		$sql = "SELECT * FROM city;";
        $result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($_GET["col"] as $col){
                    echo "<td><p> <font color=white>".$row["$col"]."</td>";
                }
                //echo "<td><input type = 'submit' value = 'UPDATE'> <input type = 'submit' value = 'DELETE'></td>";
                echo '<td align="center"><form action="delete1.php" method="get">';
                foreach($_GET["col"] as $col){
                    echo "<input type='hidden' value='$col' name='col[]'>";
                }
                echo'<input type="hidden" name="primKey" value='.$row["ID"].'> <input type="hidden" name="name" value='.$row["City_Name"].'> <input type="submit" name="delete" value="DELETE" id="delete_btn" class= "delete"> <input type="submit" name="update" value="UPDATE" id="update_btn" class= "update"></form></td>';
                echo "</tr>";
            }
        }
        echo "</table>";

    }


?>
