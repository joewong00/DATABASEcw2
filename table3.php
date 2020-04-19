<?php
    include_once 'demos/demo1.php';

    echo "<br>";
    echo "<table border='1' cellpadding='2'>";
    echo "<tr>";
    if(isset($_GET['submit'])){
        if(!empty($_GET["col3"])){
            foreach($_GET["col3"] as $col3){
                echo"<th>$col3</th>";
            }
        echo"</tr>";

		$sql = "SELECT * FROM lang;";
        $result = mysqli_query($conn, $sql);
        
			while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($_GET["col3"] as $col3){
                    echo "<td>".$row["$col3"]."</td>";
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