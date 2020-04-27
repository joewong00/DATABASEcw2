<?php
    include_once 'demos/demo1.php';
    include 'cwindex.php';

    if(isset($_GET['insert'])){
        if(!empty($_GET['inscol'])){
            $column = $_GET["col"];
            $ins = $_GET["inscol"]; 
    
            $inssql1 = implode("', '", $ins); //values to be inserted
            $inssql2 = "'" .$inssql1. "'";
            $colsql = implode(", ",$column); //column name to be inserted
            
            $sql = "INSERT INTO city($colsql) VALUES($inssql2)";
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
        else{
            echo "Please select at least one column";
        }
    }
        echo "</table>";

   
    
?>
