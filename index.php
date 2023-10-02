<?php 
# CPT 283 Program 8 - index.php
# Created by Hannah Holmes
# This is the home page of the weather wizards website
# Created 09 Sep 2023

// This function outputs theoretical HTML
// for adding ads to a Web page.
function create_ad() {
	echo "<p class='ad'>Don't forget to <a href='register.php'>Register</a> to become a Weather Wizard!</p>";
} // End of the function definition.

$page_title = 'Welcome to the Weather Wizards Site!';
include ('includes/header.html');

// Call the function:
create_ad();
?>

<h1>Weather Wizards</h1>

	<p>Welcome to the Weather Wizards website for budding meteorologists in the South Carolina Lowcountry area.</p>	
	
	<p>Our website is flooded with information about local weather, workshops, and more. So check back often.</p>
<?php

// Call the function again:
create_ad();

include ('includes/footer.html');
?>