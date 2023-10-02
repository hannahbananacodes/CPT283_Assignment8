<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Heat Index</title>
</head>
<body>
<?php 

# CPT 283 Program 8 - heat.php
# Created by Hannah Holmes
# This script calculates the heat index ('Feels Like' temperature) based on a given temperature and relative humidity.
# Heat index formula source: http://www.wpc.ncep.noaa.gov/html/heatindex_equation.shtml
# Created 09 Sep 2023

include ('includes/header.html');
// Set table heading value

echo "<p>In the Summer, when people say \"It's not the heat, it's the humidity\", what do they mean? There are 2 factors 
    that make a hot day feel really hot. The first is the air temperature and the second is relative humidity. After taking 
    measurements for temperature and relative humidity, we can calculate a heat index that is called our \"feels like\" temperature.</p>";

define ('TABLE_HEADER', 'Heat Index');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	// temperature variable
	if (!empty($_REQUEST['temperature'])) 
	{
		$temperature = $_REQUEST['temperature'];
	} 
	else 
	{
		$temperature = NULL;
	}
	
	// humidity variable
	if (!empty($_REQUEST['relativeHumidity'])) 
	{
		$relativeHumidity = $_REQUEST['relativeHumidity'];
	} 
	else
	{
		$relativeHumidity = NULL;
	}

	
	

	// checks if the variables are not null, completes calculation, prints result
	if (($temperature <> NULL) && ($relativeHumidity <> NULL)) 
	{
		// checks if numbers entered are in the correct range
        if (($temperature >= 80) && ($temperature <= 112) && ($relativeHumidity >= 13) && ($relativeHumidity <= 85))
        {
			$heatIndex =  -42.379 + (2.04901523 * $temperature) + (10.14333127 * $relativeHumidity) - 
				(.22475541 * $temperature * $relativeHumidity) - 
				(.00683783 * $temperature * $temperature) - (.05481717 * $relativeHumidity * $relativeHumidity)
 				+ (.00122874 * $temperature * $temperature * $relativeHumidity) + 
 				(.00085282 * $temperature * $relativeHumidity * $relativeHumidity) - 
 				(.00000199 * $temperature * $temperature * $relativeHumidity * $relativeHumidity);

			echo "<p style=\"font-size: 1.1rem; color: orange;\";>If the temperature is " . $temperature . " and the humidity is " . $relativeHumidity . " then it feels like " . $heatIndex . " outside.</p>";
	    } 
        else // prints error if the numbers are not within range
        {
            echo "<p style=\"color: red; font-style: italic;\">The temperature should be a number between 80 and 112.<br>
            The humidity should be a number between 13 and 85.<br>
            Please try again.</p>";
        }
    }
	elseif (($temperature == NULL) || ($relativeHumidity == NULL)) // prints error message if the values are null
	{
		echo "<p style=\"color: red; font-style: italic;\">Please enter the temperature and humidity!</p>";
	}
}
?>
<br>
        <form name="heat.php" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<fieldset>
				<legend>Enter temperature and humidity:</legend><br>

				<label>Temperature: </label>
                <input type="number" name="temperature" value="<?php if (isset($_POST['temperature'])) echo $_POST['temperature']; ?>"><br><br>
				
                <label>Humidity: </label>
                <input type="number" name="relativeHumidity" value="<?php if (isset($_POST['relativeHumidity'])) echo $_POST['relativeHumidity']; ?>"><br><br>
				
                <input type="submit" value="Gimme the Heat Index">
			</fieldset>
		</form>


<?php
echo "<p>If you need to take the temperature, but don't have a Thermometer, then see our Weather Workshops to find a
workshop on How to make a Thermometer. <a href=\"workshops.php\">See all workshops!</a><br><br>
If you need to measure the relative humidity, but don't have a Hygrometer. Don't worry, we have a Weather Workshops 
that shows you how to make a Hygrometer too! <a href=\"workshops.php\">See all workshops!</a></p>";

include ('includes/footer.html');
?>

</body>
</html>