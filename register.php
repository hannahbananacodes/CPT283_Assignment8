<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Weather Wizards Registration!</title>
</head>
<body>
<?php 

# CPT 283 Program 8 - register.php
# Created 10 Sep 2023
# Created by Hannah Holmes
# This script is a self-handling registration form

include ('includes/header.html');

// declare variables

// workshops array
$workshop[] = "";

//determine if form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // declare and assign variable for child name
    if (!empty($_POST['childName'])) 
    {
        $childName = $_POST['childName'];
    } 
    else // if nothing entered, assign null and print error message
    {
        $childName = NULL;
        echo '<p class="error">You forgot to enter your name!</p>';
    }

    // declare and assign variable for parent/guardian name
    if (!empty($_POST['parentName'])) 
    {
        $parentName = $_POST['parentName'];
    } 
    else  // if nothing entered, assign null and print error message
    {
        $parentName = NULL;
        echo '<p class="error">You forgot to enter your parent or guardian\'s name!</p>';
    }

    // declare and assign variable for parent/guardian email
    if (!empty($_POST['email'])) 
    {
        $email = $_POST['email'];
    } 
    else  // if nothing entered, assign null and print error message
    {
        $email = NULL;
        echo '<p class="error">You forgot to enter your parent or guardian\'s email address!</p>';
    }

    // declare and assign variable for parent/guardian phone
    if (!empty($_POST['phone'])) 
    {
        $phone = $_POST['phone'];
    } 
    else  // if nothing entered, assign null and print error message
    {
        $phone = NULL;
        echo '<p class="error">You forgot to enter your parent or guardian\'s phone number!</p>';
    }

    // declare and assign variable for membership status
    if (!empty($_POST['membershipStatus'])) 
    {
        $membershipStatus = $_POST['membershipStatus'];
    } 
    else  // if nothing entered, assign null and print error message
    {
        $membershipStatus = NULL;
        echo '<p class="error">You forgot to enter your membership status!</p>';
    }

    // declare and assign variable for location
    if (!empty($_POST['center'])) 
    {
        $center = $_POST['center'];
    } 
    else  // if nothing entered
    {
        $center = NULL;
    }
    // array for workshops
    if (isset($_POST['workshop']))
	{
		foreach ($_POST['workshop'] as $value)
		{
			$workshop[] = $value;
		}  
	} 

    // selection to determine if all required fields were filled
    if ($childName == NULL || $parentName == NULL || $email == NULL || $phone == NULL || $membershipStatus == NULL) 
    {
        echo '<p class="error">Weather Wizard, we need your name, your parent or guardian\'s name, and their email and phone number to sign you up.
            Hit the back button on the browser and try again.</p>';
    } 
    else // if all are NOT NULL, print confirmation message and proceed
    {
        echo "<p>Thank you for your submission, Weather Wizard! We will be in touch with your parent or guardian soon regarding workshop registration.</p>";

    // selection to determine location confirmation message
        if ($center == 'charleston') 
        {
            echo "<p>You are nearest to our Charleston, SC location, the Holy City! Go River Dogs!";
        } 
        elseif ($center == 'summerville') 
        {
            echo "<p>You are nearest to our Summerville, SC location, the birthplace of Sweet Tea! Refreshing!";
        } 
        elseif ($center == 'mtpleasant') 
        {
            echo "<p>You are nearest to our Mt. Pleasant, SC location that has a historical and beachy vibe!";
        } 
        else // if dropdown left on default selection, print this message
        {
            echo "<p>Not sure of the closest location? We will send you an email to keep in touch!";
        }

    // selection to determine membership confirmation message
        if ($membershipStatus == 'yes') 
        {
            echo "<p>Welcome back, $childName! Thank you for being a member of Weather Wizards.</p>";
        } 
        elseif ($membershipStatus == 'no') 
        {
            echo "<p>Hi, $childName, we hope you'll join Weather Wizards. We have more fun than a jar full of lightning bugs!</p>";
        } 
        else // if "sign me up" option selected
        {
            echo "<p>Hi, $childName! Welcome to Weather Wizards, where the forecast is always a 99% chance of fun!</p>";
        }
$mark = 1;
    // foreach loop to print the name of each selected workshop
        if (array_key_exists($mark, $workshop))
        {
            echo "<p>You have chosen the following workshops.</p>";
            foreach ($workshop as $value)
            { // print the name of each workshop selected on a new line
                echo "<p>$value</p>";
            }
         
        }
        else
        {
            echo "<p>You have not chosen a workshop, but we add new workshops all the time.
            We'll keep you updated by e-mail.</p>";
        }
        
    }
}
//print_r ($workshop);
?>

<h1 class="text">Weather Wizards Workshops</h1>
<p class="text">We host Weather Wizards Workshops throughout the year for kids from 6-12.</p>
<p class="text">Please note that the following workshops are free to members:</p>
<ul>
    <li>Make a Rain Gauge</li>
    <li>Make a Thermometer</li>
</ul>

<form action="register.php" method="post">
    <fieldset>
        <legend>Register Your Interests</legend>
        <input type="checkbox" id="rain" name="workshop[]" value="Make a Rain Gauge" <?php if (in_array('Make a Rain Gauge', $workshop)) echo(' CHECKED '); ?>>
        <label for="rain">Make a Rain Gauge</label><br>
        <input type="checkbox" id="thermometer" name="workshop[]" value="Make a Thermometer" <?php if (in_array('Make a Thermometer', $workshop)) echo(' CHECKED '); ?>>
        <label for="thermometer"></label>Make a Thermometer</label><br>
        <input type="checkbox" id="windsock" name="workshop[]" value="Make a Windsock" <?php if (in_array('Make a Windsock', $workshop)) echo(' CHECKED '); ?>>
        <label for="windsock"></label>Make a Windsock</label><br>
        <input type="checkbox" id="lightning" name="workshop[]" value="Make Lightning in Your Mouth" <?php if (in_array('Make Lightning in Your Mouth', $workshop)) echo(' CHECKED '); ?>>
        <label for="lightning"></label>Make Lightning in Your Mouth</label><br>
        <input type="checkbox" id="hygrometer" name="workshop[]" value="Make a Hygrometer" <?php if (in_array('Make a Hygrometer', $workshop)) echo(' CHECKED '); ?>>
        <label for="hygrometer"></label>Make a Hygrometer</label><br><br>

        <label for="childname" >Your name:</label>
        <input type="text" name ="childName" value="<?php if (isset($_POST['childName'])) echo $_POST['childName']; ?>"><br><br>

        <label for="parent">Your parent or guardian's name:</label>
        <input type="text" name="parentName" value="<?php if (isset($_POST['parentName'])) echo $_POST['parentName']; ?>"><br><br>

        <label for="email">Your parent or guardian's email:</label>
        <input type="text" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"><br><br>

        <label for="phone">Your parent or guardian's phone:</label>
        <input type="text" name="phone" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>"><br><br>

        <label for="center">Your closest center:</label>
        <select id="center" name="center">
            <option value="selectOne" selected <?php if (isset($_POST['center']) && ($_POST['center'] == 'selectOne')) echo 'selected = "selected"'; ?>>Select One</option>
            <option value="charleston" <?php if (isset($_POST['center']) && ($_POST['center'] == 'charleston')) echo 'selected = "selected"'; ?>>Charleston</option>
            <option value="summerville" <?php if (isset($_POST['center']) && ($_POST['center'] == 'summerville')) echo 'selected = "selected"'; ?>>Summerville</option>
            <option value="mtpleasant" <?php if (isset($_POST['center']) && ($_POST['center'] == 'mtpleasant')) echo 'selected = "selected"'; ?>>Mt. Pleasant</option>
        </select><br><br>

        <p id="membership">Are you a member?
        <input type="radio" id="yes" name="membershipStatus" value="yes" <?php if (isset($_POST['membershipStatus']) && ($_POST['membershipStatus'] == 'yes')) echo 'checked="checked"'; ?>>
        <label for="yes">Yes</label>

        <input type="radio" id="no" name="membershipStatus" value="no" <?php if (isset($_POST['membershipStatus']) && ($_POST['membershipStatus'] == 'no')) echo 'checked="checked"'; ?>>
        <label for="no">No</label>

        <input type="radio" id="signup" name="membershipStatus" value="signup" <?php if (isset($_POST['membershipStatus']) && ($_POST['membershipStatus'] == 'signup')) echo 'checked="checked"'; ?>>
        <label for="signup">Sign me up</label><br><br>
        </p>

    </fieldset>
    <div class="end">
        <input type="submit" name="submit" value="Submit My Information">
        <input type="reset">
    </div>
</form>
<?php
include ('includes/footer.html');
?>
</body>
</html>




