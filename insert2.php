<?php
    include_once 'demos/demo1.php';
    include 'cwindex.php';

    if(isset($_GET['insert'])){
        if(!empty($_GET['inscol2'])){
            $column = $_GET["col2"];
            $ins = $_GET["inscol2"]; 
    
            $inssql1 = implode("', '",$ins); //values to be inserted
            $inssql2 = "'" .$inssql1. "'";
            $colsql = implode(", ",$column); //column name to be inserted
            
            $sql = "INSERT INTO country($colsql) VALUES($inssql2)";
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
                echo '<td><form action="delete2.php" method="get">';
                    foreach($_GET["col2"] as $col2){
                        echo "<input type='hidden' value='$col2' name='col2[]'>";
                    }
                echo'<input type="hidden" name="primKey" value='.$row["Country_abb"].'> <input type="submit" name="delete" value="DELETE">';
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
