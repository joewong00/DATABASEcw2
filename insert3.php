<?php
    include_once 'demos/demo1.php';
    include 'cwindex.php';

    if(isset($_GET['insert'])){
        if(!empty($_GET['inscol3'])){
            $column = $_GET["col3"];
            $ins = $_GET["inscol3"]; 
    
            $inssql = implode(", ",$ins); //values to be inserted
            $colsql = implode(", ",$column); //column name to be inserted
            
            $sql = "INSERT INTO lang($colsql) VALUES($inssql)";
            if(mysqli_query($conn,$sql)){
                echo "Values inserted";
            }
            else
                echo "Values not inserted";
                
            echo "<br>";
        }
    }

    echo "<br>";
    echo "<table border='1' cellpadding='2'>";
    echo "<tr>";
    if(isset($_GET['insert'])){
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
                echo "<td><input type = 'submit' value = 'UPDATE'> <input type = 'submit' value = 'DELETE'></td>";
                echo "</tr>";
            }
        }
        else{
            echo "Please select at least one column";
        }
    }
        echo "</table>";

   
    
?>