<!DOCTYPE html>
<html>
<head>
	<!--Names: Anthony Epps, Christian Bernstein Cuevas, Anish Upadhyaya
        Class Section: 0002
  -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Results</title>
    <link rel='stylesheet' href='style.css'>s
</head>

<body>
<header>
      <h1>Welcome to the HR Portal</h1>
      <img src="hrimg.jpg"  width="400" height="150" alt="HR logo">
  </header>    

<?php

$server = "";
$user = "";
$pw = "";
$db = "";

$connect = mysqli_connect ($server, $user, $pw, $db);
$input = $_POST['input'];

// QUERYING TO DISCOVER DEPARTMENT LOCATION AND STAFF AMOUNT
$query = 
"SELECT locations.street_address, locations.city, locations.state_province, locations.postal_code
FROM locations
INNER JOIN departments
ON locations.location_id = departments.location_id
WHERE departments.department_name = '$input'";

if (!$connect){
    die("ERROR: Cannot connect to database $db on server $server using username $user (".mysqli_connect_errno(). ", ".mysqli_connect_error(). ")");
}

$result = mysqli_query($connect, $query);

print("<h1 style='color:white;'><u>About the ${input} Department</u></h1>");
print("<table border=\"1\">"); 
print(
"<thead><tr>
<th>Street Address</th>
<th>City</th>
<th>State/Province</th>
<th>Postal Code</th>
</tr></thead>"
);

// Auto-generates rows for as many corresponding results the query yields.
while ($row = mysqli_fetch_assoc($result)) {
print (
"<tr><td>".$row['street_address'].
"</td><td>".$row['city'].
"</td><td>".$row['state_province'].
"</td><td>".$row['postal_code'].
"</td></tr>"); 
} 
// Ends the table. If this was included in the above print, the table would end after the first row of data.
print("</table");

// QUERYING FOR THE AVERAGE SALARY OF AN INPUT JOB TITLE
$avg_query = 
"SELECT COUNT(location_id)
FROM employees 
INNER JOIN departments
ON employees.department_id = departments.department_id
WHERE departments.department_name = '$input' ";

$avg_result = mysqli_query($connect, $avg_query);

while($row = mysqli_fetch_array($avg_result)) {
	print "<h3 style='color:violet;'><i> There are $row[0] employees in $input</i></h3>";
}




?>
<div>
<a href="group-hr-tbd.html">Search for another office</a>
</div>

<footer class="fctr">
    <a href="group-hr-portal.html">Return to Main Page</a>
  <p>&copy; oof</p>
</footer>
</body>


</html>
