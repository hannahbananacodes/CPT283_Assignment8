<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    
</head>
<body>

<?php 

# CPT 283 Program 8 - data.php
# Created by Hannah Holmes
# This script prints the climate data for all cities to a table on the page
# Created 01 Oct 2023



$page_title = 'Climate Data for All Cities';
include ('includes/header.html');

echo '<h1>Climate Data for All Cities</h1>';

require ('mysqli_connect.php');



$query = "SELECT * FROM city_stats ORDER BY city ASC";
$run_query = @mysqli_query($dbc, $query);

$num = mysqli_num_rows($run_query);
if ($num > 0) 
{
	echo "<p>There are currently $num cities.</p>\n";
}

if ($run_query) 
{
	echo '<table align="center" cellspacing="3" width="75%">
	<tr>
		<td align="left" class="city"><b>City</b></td>
		<td align="left" class="colname"><b>State</b></td>
		<td align="left" class="colname"><b>High</b></td>
		<td align="left" class="colname"><b>Low</b></td>
		<td align="left" class="colname"><b>Days Clear</b></td>
		<td align="left" class="colname"><b>Days Cloudy</b></td>
		<td align="left" class="colname"><b>Days with Precip</b></td>
		<td align="left" class="colname"><b>Days with Snow</b></td>
	</tr>
	';

	while ($row = mysqli_fetch_array($run_query, MYSQLI_ASSOC)) {
		echo '<tr><td align="left">' . $row['city'] . '</td><td align="left">' 
		. $row['state'] . '</td><td align="left">' 
		. $row['record_high'] . '</td><td align="left">' 
		. $row['record_low'] . '</td><td align="left">' 
		. $row['days_clear'] . '</td><td align="left">' 
		. $row['days_cloudy'] . '</td><td align="left">' 
		. $row['days_with_precip'] . '</td><td align="left">'
		. $row['days_with_snow'] . 
		'</td></tr>
		';
	}
	echo '</table>';

	mysqli_free_result ($run_query);

} 
else 
{
	echo "There are currently no cities in the database.";
}



mysqli_close($dbc);
include ('includes/footer.html');
?>

</body>
</html>