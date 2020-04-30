<?php
    include_once 'demos/demo1.php';
    include 'cwindex.php';

    if ($_GET['submit']=='INSERT'){ //if we pressed insert
        echo "<p> <font color=white>Enter information:";

        echo "<br>";
        echo "<br>";
        echo "<form action = 'insert3.php' method = 'get'>";
        if(!empty($_GET["col3"])){
            foreach($_GET["col3"] as $col3){
                echo "<p> <font color=white>$col3<input type = 'checkbox', value = '$col3', name = 'col3[]' checked> : <input type = 'text' name = 'inscol3[]' id='datacol' class='data'>";
                echo "<br>";
                echo "<br>";
            }
            echo "<input type = 'submit' name = 'insert' value = 'submit' id='submit1_btn' class='submit1'>";
        }
        
        echo "</form>";
        echo "<br>";
    echo "<table border='1' cellpadding='2' bordercolor='#fff200' width = '100%'>";
    echo "<tr>";
    if(isset($_GET['submit'])){
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
        else{
            echo "<p> <font color=white>Please select at least one column";
        }
    }
        echo "</table>";
    }

    else{ //if we pressed select
    echo "<b><ul><u><font color = white>language</b></ul></u>";
    echo "<br>";
    echo "<table border='1' cellpadding='2' bordercolor='#fff200' width = '100%'>";
    echo "<tr>";
    if(isset($_GET['submit'])){
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
        else{
            echo "<p> <font color=white>Please select at least one column";
        }
    }
        echo "</table>";
}
?>
