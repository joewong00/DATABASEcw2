<?php
	include_once 'demos/demo1.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
</head>
<body style="background-color:#000000">

	<h1 style="color: white;">WORLD DATABASE</h1>
	<img src="globe.gif" class="avatar"/>

	<form action = "cwindex.php" method = "Get">
	<select name="table" id="option_btn" class="option">
		<option value="0">Select a table</option>
		<option value="city">city</option>
		<option value="country">country</option>
		<option value="language">language</option>
	</select>
	<input type = "submit" id="submit_btn" class="submit">
	</form>
	<br>

	<?php
if(isset($_GET["table"])){
	$table = $_GET["table"];
	if($table == "city"){
		echo "<p><font color=white><form name = 'table1' action = 'table.php' method = 'get'>";
		echo "<input type = 'checkbox' name = 'col[]' value = 'ID' checked> ID<br>";
		echo "<input type = 'checkbox' name = 'col[]' value = 'City_Name' checked> City_Name<br>";
		echo "<input type = 'checkbox' name = 'col[]' value = 'Country_abb' checked> Country_abb<br>";
		echo "<input type = 'checkbox' name = 'col[]' value = 'Province' checked> Province<br>";
		echo "<input type = 'checkbox' name = 'col[]' value = 'Population' checked> Population<br>";
		echo "<br>";
		echo "<input type = 'submit' name = 'submit' value = 'SELECT' id=select_btn class= 'select'>";
		echo "<input type = 'submit' name = 'submit' value = 'INSERT' id=select_btn class= 'select'>";
		echo "</form>";
		echo "<br>";


	}
	else if($table == "country"){
		echo "<p><font color=white><form name = 'table2' action = 'table2.php' method = 'get'>";
		echo "<input type = 'checkbox' name = 'col2[]' value = 'Country_abb' checked> Country_abb<br>";
		echo "<input type = 'checkbox' name = 'col2[]' value = 'Country_Name' checked> Country_Name<br>";
		echo "<input type = 'checkbox' name = 'col2[]' value = 'Continent' checked> Continent<br>";
		echo "<input type = 'checkbox' name = 'col2[]' value = 'Region' checked> Region<br>";
		echo "<input type = 'checkbox' name = 'col2[]' value = 'Area' checked> Area<br>";
		echo "<input type = 'checkbox' name = 'col2[]' value = 'Year_of_Ind' checked> Year_of_Ind<br>";
		echo "<input type = 'checkbox' name = 'col2[]' value = 'Population' checked> Population<br>";
		echo "<input type = 'checkbox' name = 'col2[]' value = 'Life_Expectancy' checked> Life_Expectancy<br>";
		echo "<input type = 'checkbox' name = 'col2[]' value = 'Gnp' checked> Gnp<br>";
		echo "<input type = 'checkbox' name = 'col2[]' value = 'Gnp_Old' checked> Gnp_Old<br>";
		echo "<input type = 'checkbox' name = 'col2[]' value = 'Local_Name' checked> Local_Name<br>";
		echo "<input type = 'checkbox' name = 'col2[]' value = 'Gov_Form' checked> Gov_Form<br>";
		echo "<input type = 'checkbox' name = 'col2[]' value = 'Head_of_State' checked> Head_of_State<br>";
		echo "<input type = 'checkbox' name = 'col2[]' value = 'Capital' checked> Capital<br>";
		echo "<input type = 'checkbox' name = 'col2[]' value = 'Country_Code' checked> Country_Code<br>";
		echo "<br>";
		echo "<input type = 'submit' name = 'submit' value = 'SELECT' id=select_btn class= 'select'>";
		echo "<input type = 'submit' name = 'submit' value = 'INSERT' id=select_btn class= 'select'>";
		echo "</form>";
		echo "<br>";

	}
	else if($table == "language"){
		echo "<p><font color=white><form name = 'table3' action = 'table3.php' method = 'get'>";
		echo "<input type = 'checkbox' name = 'col3[]' value = 'Country_abb' checked> Country_abb<br>";
		echo "<input type = 'checkbox' name = 'col3[]' value = 'Language' checked> Language<br>";
		echo "<input type = 'checkbox' name = 'col3[]' value = 'Official' checked> Official<br>";
		echo "<input type = 'checkbox' name = 'col3[]' value = 'Percentage' checked> Percentage<br>";
		echo "<br>";
		echo "<input type = 'submit' name = 'submit' value = 'SELECT' id=select_btn class= 'select'>";
		echo "<input type = 'submit' name = 'submit' value = 'INSERT' id=select_btn class= 'select'>";
		echo "</form>";
		echo "<br>";

	}
	else
		echo "Please select a table";
}
	?>
</body>
</html>
