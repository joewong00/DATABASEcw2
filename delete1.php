<?php
    include_once 'demos/demo1.php';
    include 'cwindex.php';
    
     
        $key = $_GET["primKey"];
        $delsql = "'" . $key . "'";
        //echo "$key";
        if(isset($_GET['delete'])){ //if we pressed delete

        $sql = "DELETE FROM city WHERE ID=($delsql)";

        if(mysqli_query($conn,$sql)){
            echo "Row deleted";
        }
        else
            echo "Row not deleted";

        echo "<br>";
        echo "<br>";
    echo "<table border='1' cellpadding='2'>";
    echo "<tr>";
    
        if(!empty($_GET["col"])){
            foreach($_GET["col"] as $col){
                echo"<th>$col</th>";
            }
            echo"<th>ACTIONS</th>";
        echo"</tr>";

		$sql = "SELECT * FROM city;";
        $result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($_GET["col"] as $col){
                    echo "<td>".$row["$col"]."</td>";
                }
                echo '<td><form action="delete1.php" method="get">';
                    foreach($_GET["col"] as $col){
                        echo "<input type='hidden' value='$col' name='col[]'>";
                    }
                echo'<input type="hidden" name="primKey" value='.$row["ID"].'> <input type="submit" name="delete" value="DELETE">';
                echo'<input type="submit" name="update" value="UPDATE"></form></td>'; 
                echo "</tr>";
            }
        }
       
        echo "</table>";
    }


    else{ //if we pressed update

        echo "Enter information:";
        echo "<br>";
        
        echo "<form action = 'update1.php' method = 'get'>";

        if(!empty($_GET["col"])){
            foreach($_GET["col"] as $col){
                if($col == 'ID')
                    echo "$col<input type = 'hidden', value = '$key', name = 'primKey' checked> : <input type = 'text' value = '$key'>";
                else
                    echo "$col<input type = 'hidden', value = '$col', name = 'col[]' checked> : <input type = 'text' name = 'updcol[]'>";
                echo "<br>";
                echo "<br>";
            }
            echo "<input type = 'submit' name = 'update' value = 'UPDATE'></form>";
        }

        echo "<br>";
    echo "<table border='1' cellpadding='2'>";
    echo "<tr>";

        if(!empty($_GET["col"])){
            foreach($_GET["col"] as $col){
                echo"<th>$col</th>";
            }
            echo"<th>ACTIONS</th>";
        echo"</tr>";

		$sql = "SELECT * FROM city;";
        $result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($_GET["col"] as $col){
                    echo "<td>".$row["$col"]."</td>";
                }
                echo '<td><form action="delete1.php" method="get">';
                foreach($_GET["col"] as $col){
                    echo "<input type='hidden' value='$col' name='col[]'>";
                }
            echo'<input type="hidden" name="primKey" value='.$row["ID"].'> <input type="submit" name="delete" value="DELETE">';
            echo'<input type="submit" name="update" value="UPDATE"></form></td>'; 
            echo "</tr>";
            }
        }
        echo "</table>";

    }


?>
