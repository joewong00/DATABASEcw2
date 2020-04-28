<?php
    include_once 'demos/demo1.php';
    include 'cwindex.php';

    if ($_GET['submit']=='INSERT'){ //if we pressed insert
        echo "<p> <font color=white>Enter information:";
        echo "<br>";
        echo "<br>";
        echo "<form action = 'insert2.php' method = 'get'>";
        if(!empty($_GET["col2"])){
            foreach($_GET["col2"] as $col2){
                echo "$col2<input type = 'checkbox', value = '$col2', name = 'col2[]' checked> : <input type = 'text' name = 'inscol2[]' id='datacol' class='data'>";
                echo "<br>";
                echo "<br>";
            }
            echo "<input type = 'submit' name = 'insert' value = 'submit' id='submit1_btn' class='submit1'>";
            echo "<br><br>";
        }

        echo "</form>";
        echo "<br>";
    echo "<table border='1' cellpadding='2' bordercolor='#f0932b' width = '100%'>";
    echo "<tr>";
    if(isset($_GET['submit'])){
        if(!empty($_GET["col2"])){
            foreach($_GET["col2"] as $col2){
                echo"<th><p> <font color=white>$col2</th>";
            }
            echo"<th><p> <font color=white>ACTIONS</th>";
        echo"</tr>";

		$sql = "SELECT * FROM country;";
        $result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($_GET["col2"] as $col2){
                    echo "<td><p> <font color=white>".$row["$col2"]."</td>";
                }
                echo '<td align="center"><form action="delete2.php" method="get">';
                    foreach($_GET["col2"] as $col2){
                        echo "<p> <font color=white><input type='hidden' value='$col2' name='col2[]'>";
                    }
                echo'<input type="hidden" name="primKey" value='.$row["Country_abb"].'> <input type="hidden" name="name" value='.$row["Country_Name"].'> <input type="submit" name="delete" value="DELETE" id="delete_btn" class= "delete">';
                echo'<input type="submit" name="update" value="UPDATE" id="update_btn" class= "update"></form></td>';
                echo "</tr>";
            }
        }
        else{
            echo "<p> <font color=white>Please select at least one column";
        }
    }
        echo "</table>";
    }

    else{ //if we pressed select
    echo "<b><ul><u>country</b></ul></u>";
    echo "<br>";
    echo "<table border='1' cellpadding='2' bordercolor='#f0932b' width = '100%'>";
    echo "<tr>";
    if(isset($_GET['submit'])){
        if(!empty($_GET["col2"])){
            foreach($_GET["col2"] as $col2){
                echo"<th><p> <font color=white>$col2</th>";
            }
            echo"<th><p> <font color=white>ACTIONS</th>";
        echo"</tr>";

		$sql = "SELECT * FROM country;";
        $result = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($_GET["col2"] as $col2){
                    echo "<td><p> <font color=white>".$row["$col2"]."</td>";
                }
                echo '<td align="center"><form action="delete2.php" method="get">';
                    foreach($_GET["col2"] as $col2){
                        echo "<p> <font color=white><input type='hidden' value='$col2' name='col2[]'>";
                    }
                echo'<input type="hidden" name="primKey" value='.$row["Country_abb"].'> <input type="hidden" name="name" value='.$row["Country_Name"].'> <input type="submit" name="delete" value="DELETE" id="delete_btn" class= "delete">';
                echo'<input type="submit" name="update" value="UPDATE" id="update_btn" class= "update"></form></td>';
                echo "</tr>";
            }
        }
        else{
            echo "<p> <font color=white>Please select at least one column";
        }
    }
        echo "</table>";
}

?>
