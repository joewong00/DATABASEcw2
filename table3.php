<?php
    include_once 'demos/demo1.php';
    include 'cwindex.php';

    if ($_GET['submit']=='INSERT'){ //if we pressed insert
        echo "Enter information:";
        echo "<br>";

        echo "<br>";
        echo "<br>";
        echo "<form action = 'insert3.php' method = 'get'>";
        if(!empty($_GET["col3"])){
            foreach($_GET["col3"] as $col3){
                echo "$col3<input type = 'checkbox', value = '$col3', name = 'col3[]' checked> : <input type = 'text' name = 'inscol3[]'>";
                echo "<br>";
                echo "<br>";
            }
            echo "<input type = 'submit' name = 'insert' value = 'submit'>";
        }
        
        echo "</form>";
        echo "<br>";
    echo "<table border='1' cellpadding='2'>";
    echo "<tr>";
    if(isset($_GET['submit'])){
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
            
                echo '<td><form action="delete3.php" method="get"> <input type="hidden" name="primKey[]" value='.$row["Country_abb"].'> <input type="hidden" name="primKey[]" value='.$row["Language"].'>
                <input type="submit" name="delete" value="DELETE"> <input type="submit" name="update" value="UPDATE"></form></td>';
                //echo "<td><input type = 'submit' value = 'UPDATE'> <input type = 'submit' value = 'DELETE'></td>";
                echo "</tr>";
            }
        }
        else{
            echo "Please select at least one column";
        }
    }
        echo "</table>";
    }

    else{ //if we pressed select
    echo "<br>";
    echo "<table border='1' cellpadding='2'>";
    echo "<tr>";
    if(isset($_GET['submit'])){
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
    }
        echo "</table>";
}
?>
