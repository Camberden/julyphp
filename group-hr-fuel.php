<!DOCTYPE html>
<html>
<head>
	<!--Names: Anthony Epps, Christian Bernstein Cuevas, Anish Upadhyaya
        Class Section: 0002
  -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Job Title Results</title>
    <!-- <link rel='stylesheet' href='style.css'> -->
</head>
<body>
<header>
      <h1>Welcome to the HR Portal</h1>
      <img src="hrimg.jpg"  width="400" height="150" alt="HR logo">
  </header>       
<?php

//Variables
$mpg = $_POST['mpg'];
$gas = $_POST['gasprice'];
$miles = $_POST['miles'];

//calcs

$travelCost = ($miles/$mpg) * $gas;

print ("<h3>Thanks for entering your trip information</h3>");
print ("<h3> Your estimated trip cost is: $" . $travelCost . "</h3>");


?>

<div>
<a href="group-hr-fuel.html">Plan another trip</a>
</div>


<footer class="footer">
  <a href="group-hr-portal.html">Return to Main Page</a>
<p>&copy; oof</p>
</footer>
</body>

</html>    