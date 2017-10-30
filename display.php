<?php
   include('session.php');
   $result = mysqli_query($db,"select username,fname,mname,lname,age,place,joindate,dob,salary from info ");
   
   if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>UserName</th><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Age</th><th>Place</th><th>Join Date</th><th>Date of Birth</th><th>Salary</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["username"]."</td><td>".$row["fname"]."</td><td>".$row["mname"]."</td><td>".$row["lname"]."</td><td>".$row["age"]."</td><td>".$row["place"]."</td><td>".$row["joindate"]."</td><td>".$row["dob"]."</td><td>".$row["salary"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>
<html>
   
   <head>
      <title>Welcome </title>
      <style type = "text/css">
      @import url(https://fonts.googleapis.com/css?family=Roboto+Condensed:300);

body {
	background: #c2e59c; /* fallback for old browsers */
	background: -webkit-linear-gradient(to left, #c2e59c , #64b3f4); /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to left, #c2e59c , #64b3f4); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */ 
	
	color: #666;
	font-family: 'Roboto Condensed', sans-serif;
}

table {
	position: absolute;
	top: 50%;
	left: 50%;
	width: 800px;
	
	transition: all 0.2s ease;
	
	transform: translateX(-50%) translateY(-50%);
	
	background: #fff;
	
	padding: 20px;
}


.name {
	font-size: 30px;
	border-bottom: 2px solid #888;
	margin-bottom: 20px;
}
.name:first-letter {
	font-size: 300%;
}

.label {
	width: 100px;
	font-weight: bold;
}

.label, .fname, .mname, .lname, .age, .joindate, .place , .dob, .salary {
	display: inline-block;
}

.details-td {
	border-right: 1px solid #eee;
	white-space: nowrap;
	width: 100%;
	padding: 20px;
	padding-right: 40px;
}
      </style>
   </head>
   
   <body>
      
      
      
<h2 class = "logout" style="text-align: right;"><a href = "logout.php"> <img src = "logout-button-md.png" style="height: 100px; width : 100px;" /></a></h2>
   </body>
   
</html>
