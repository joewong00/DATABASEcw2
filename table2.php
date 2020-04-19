<?php
    include_once 'demos/demo1.php';

    echo "<br>";
    echo "<table border='1' cellpadding='2'>";
    echo "<tr>";
    if(isset($_GET['submit'])){
        if(!empty($_GET["col2"])){
            foreach($_GET["col2"] as $col2){
                echo"<th>$col2</th>";
            }
        echo"</tr>";

		$sql = "SELECT * FROM country;";
        $result = mysqli_query($conn, $sql);
        
			while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($_GET["col2"] as $col2){
                    echo "<td>".$row["$col2"]."</td>";
                }
                echo "</tr>";
            }
        }
        else{
            echo "Please select at least one column";
        }
    }
		echo "</table>";
?>