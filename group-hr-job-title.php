<!DOCTYPE html>
<html>
<head>
	<!--Names: Anthony Epps, Christian Bernstein Cuevas, Anish Upadhyaya
        Class Section: 0002
  -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Job Title Results</title>
    <link rel='stylesheet' href='style.css'>
</head>

<body>
<header>
      <h1>Welcome to the HR Portal</h1>
      <img src="hrimg.jpg"  width="400" height="150" alt="HR logo">
  </header>    

<?php include 'access.php';

$server = $db_server; //default server we set up in sql lab
$user = $db_user; //default user we set up in sql lab
$pw = $db_password; //default pw we set up in sql lab
$db = $db_name; //name of database for project

$connect = mysqli_connect ($server, $user, $pw, $db);
$input = $_POST['jobtitle'];

// QUERYING TO DISCOVER EMPLOYEES AND THEIR INFO BASED ON A JOB TITLE INPUT
$query = 
"SELECT employees.employee_id, employees.first_name, employees.last_name, jobs.job_id, jobs.job_title, employees.salary
FROM jobs
INNER JOIN employees
ON jobs.job_id = employees.job_id
WHERE jobs.job_title = '$input'";

if (!$connect){
    die("ERROR: Cannot connect to database $db on server $server using username $user (".mysqli_connect_errno(). ", ".mysqli_connect_error(). ")");
}

$result = mysqli_query($connect, $query);

print("<h1 style='color:white;'><u>List of ${input}s</u></h1>");
print("<table border=\"1\">"); 
print(
"<thead><tr>
<th>Employee ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Job ID</th>
<th>Job Title</th>
<th>Salary</th>
</tr></thead><tbody class=\"taccent\">"
);

// Auto-generates rows for as many corresponding results the query yields.
while ($row = mysqli_fetch_assoc($result)) {
print (
"<tr><td>".$row['employee_id'].
"</td><td>".$row['first_name'].
"</td><td>".$row['last_name'].
"</td><td>".$row['job_id'].
"</td><td>".$row['job_title'].
"</td><td>$".$row['salary'].
"</td></tr>"); 
} 
// Ends the table. If this was included in the above print, the table would end after the first row of data.
print("</tbody></table");

// QUERYING FOR THE AVERAGE SALARY OF AN INPUT JOB TITLE
$avg_query = 
"SELECT ROUND(AVG(employees.salary), 2)
FROM employees 
INNER JOIN jobs
ON employees.job_id = jobs.job_id
WHERE jobs.job_title = '$input' ";

$avg_result = mysqli_query($connect, $avg_query);

while($row = mysqli_fetch_array($avg_result)) {
	print "<h3><i> Average $input Salary: $$row[0]</i></h3>";
}

?>


<div>
<a href="group-hr-tbd.html"> Search another job title </a>
</div>

<footer class="fctr">
    <a href="group-hr-portal.html">Return to Main Page</a>
  <p>&copy; oof</p>
</footer>
</body>

</html>
