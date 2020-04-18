<?php
    include_once 'demos/demo1.php';
    
    echo "<br>";
    echo "<table border='1' cellpadding='2'>";
    echo "<tr>";
    if(isset($_GET['submit'])){
        if(!empty($_GET["col"])){
            foreach($_GET["col"] as $col){
                echo"<th>$col</th>";
            }
        echo"</tr>";

		$sql = "SELECT * FROM city;";
        $result = mysqli_query($conn, $sql);
        
			while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                foreach($_GET["col"] as $col){
                    echo "<td>".$row["$col"]."</td>";
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