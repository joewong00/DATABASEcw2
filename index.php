<?php
	include_once 'demos/demo1.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>WORLD DATABASE</h1>
	<form action = "index.php" method = "Get">
	<select name="table">
		<option value="0">Select a table</option>
		<option value="city">city</option>
		<option value="country">country</option>
		<option value="language">language</option> 
	</select>
	<input type = "submit">
	</form>
	<br>

	<?php
if(isset($_GET["table"])){
	$table = $_GET["table"];
	if($table == "city"){
		echo "<form action = 'table.php' method = 'get'>";
		echo "ID<input type = 'checkbox' name = 'col[]' value = 'ID'>";
		echo " City_Name <input type = 'checkbox' name = 'col[]' value = 'City_Name'>";
		echo " Country_abb<input type = 'checkbox' name = 'col[]' value = 'Country_abb'>";
		echo " Province<input type = 'checkbox' name = 'col[]' value = 'Province'>";
		echo " Population<input type = 'checkbox' name = 'col[]' value = 'Population'>";
		echo "<br>";
		echo "<input type = 'submit' name = 'submit' value = 'SELECT'>";
		echo "</form>";
		echo "<br>";
			
	}
	else if($table == "country"){
		echo "<form action = 'table2.php' method = 'get'>";
		echo "Country_abb<input type = 'checkbox' name = 'col2[]' value = 'Country_abb'>";
		echo " Country_Name<input type = 'checkbox' name = 'col2[]' value = 'Country_Name'>";
		echo " Continent<input type = 'checkbox' name = 'col2[]' value = 'Continent'>";
		echo " Region<input type = 'checkbox' name = 'col2[]' value = 'Region'>";
		echo " Area<input type = 'checkbox' name = 'col2[]' value = 'Area'>";
		echo " Year_of_Ind<input type = 'checkbox' name = 'col2[]' value = 'Year_of_Ind'>";
		echo " Population<input type = 'checkbox' name = 'col2[]' value = 'Population'>";
		echo " Life_Expectancy<input type = 'checkbox' name = 'col2[]' value = 'Life_Expectancy'>";
		echo " Gnp<input type = 'checkbox' name = 'col2[]' value = 'Gnp'>";
		echo " Gnp_Old<input type = 'checkbox' name = 'col2[]' value = 'Gnp_Old'>";
		echo " Local_Name<input type = 'checkbox' name = 'col2[]' value = 'Local_Name'>";
		echo " Gov_Form<input type = 'checkbox' name = 'col2[]' value = 'Gov_Form'>";
		echo " Head_of_State<input type = 'checkbox' name = 'col2[]' value = 'Head_of_State'>";
		echo " Capital<input type = 'checkbox' name = 'col2[]' value = 'Capital'>";
		echo " Country_Code<input type = 'checkbox' name = 'col2[]' value = 'Country_Code'>";
		echo "<br>";
		echo "<input type = 'submit' name = 'submit' value = 'SELECT'>";
		echo "</form>";
		echo "<br>";
		
	}
	else if($table == "language"){
		echo "<form action = 'table3.php' method = 'get'>";
		echo "Country_abb<input type = 'checkbox' name = 'col3[]' value = 'Country_abb'>";
		echo " Language<input type = 'checkbox' name = 'col3[]' value = 'Language'>";
		echo " Official<input type = 'checkbox' name = 'col3[]' value = 'Official'>";
		echo " Percentage<input type = 'checkbox' name = 'col3[]' value = 'Percentage'>";
		echo "<br>";
		echo "<input type = 'submit' name = 'submit' value = 'SELECT'>";
		echo "</form>";
		echo "<br>";
		
	}
	else
		echo "Please select a table";
}
	?>
</body>
</html>

