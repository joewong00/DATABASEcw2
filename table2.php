<?php
    include_once 'demos/demo1.php';
    include 'cwindex.php';

    if ($_GET['submit']=='INSERT'){ //if we pressed insert
        echo "Enter information:";
        echo "<br>";
        echo "<i>For inserting a text, please enclosed text with quotation(' ')</i>";
        echo "<br>";
        echo "<br>";
        echo "<form action = 'insert2.php' method = 'get'>";
        if(!empty($_GET["col2"])){
            foreach($_GET["col2"] as $col2){
                echo "$col2<input type = 'checkbox', value = '$col2', name = 'col2[]' checked> : <input type = 'text' name = 'inscol2[]'>";
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
                echo "<td><input type = 'submit' value = 'UPDATE'> <input type = 'submit' value = 'DELETE'></td>";
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
                echo "<td><input type = 'submit' value = 'UPDATE'> <input type = 'submit' value = 'DELETE'></td>";
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
