<!DOCTYPE html>
<html>
<head>
	<!--Names: Anthony Epps, Christian Bernstein Cuevas, Anish Upadhyaya
        Class Section: 0002
  -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employee Search Results</title>
    <link rel='stylesheet' href='style.css'>
</head>
<body>
<header>
      <h1>Welcome to the HR Portal</h1>
      <img src="hrimg.jpg"  width="400" height="150" alt="HR logo">
  </header>     

<?php include 'keys.php';
// connect to database
$server = ""; //default server we set up in sql lab
$user = ""; //default user we set up in sql lab
$pw = ""; //default pw we set up in sql lab
$db = ""; //name of database for project

$connect = mysqli_connect ($server, $user, $pw, $db); //typical db connection based on php powerpoint

if (!$connect){ //if attempt to connect does not work, display error message below
    die("ERROR: Cannot connect to database $db on server $server using username $user (".mysqli_connect_errno(). ", ".mysqli_connect_error(). ")");

}


// Insert code here for the employee search
$input = $_POST['input']; //takes input entered from webform and assigns to the input variable
$query = "SELECT employee_id, first_name, last_name, job_id, salary FROM employees WHERE last_name = '$input' OR employee_id = '$input'"; //set query to SQL query but replaces syntax with input

$result = mysqli_query($connect, $query);

if (!$result){ //if attempt to connect does not work, display error message below
    die("Could not successfully run query ($query) from $db: " .mysqli_error($connect) );
}

if (mysqli_num_rows($result) == 0){

    print ("No records found with query $query");
} else {
    print ("<h1>LIST OF MATCHING EMPLOYEES</h1>");
    print ("<table border = \"1\">");
    print ("<tr><th>EMP ID</th><th>First Name</th><th>Last Name</th><th>Job ID</th><th>Salary</th></tr>");

    while ($row = mysqli_fetch_assoc($result)){
        print ("<tr><td>".$row['employee_id']."</td><td>".$row['first_name']."</td><td>".$row['last_name']."</td><td>".$row['job_id']."</td><td>".$row['salary']."</td></tr>");
    }

    print("</table>");

}


?>

<div>
<a href="group-hr-emp-search.html">Search for employee</a>
</div>
<footer class="fctr">
    <a href="group-hr-portal.html">Return to Main Page</a>
    <p>&copy; oof</p>
</footer>
</body>

</html>