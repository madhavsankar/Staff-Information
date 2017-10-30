<?php
   include('session.php');
   $ses_sql = mysqli_query($db,"select username,fname,mname,lname,age,place,joindate,dob,salary from info where username = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
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
	width: 600px;
	
	transition: all 0.2s ease;
	
	transform: translateX(-50%) translateY(-50%);
	
	background: #fff;
	
	padding: 20px;
}

td {
	width: 100%;
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
      
      
      <table>
	<tr>
		<td colspan="3">
			<div class="name"><?php echo $login_session; ?></div>
		</td>
	</tr>
	<tr>
		<td colspan="100%" class="details-td">
			<div class="label">First Name</div> : <div class="fname" style="text-align: right;"> <?php if($row["fname"]!=NULL) { echo $row["fname"]; } else { echo " "; }  ?></div>
			<br><div class="label">Middle Name</div> : <div class="mname"> <?php if($row["mname"]!=NULL) { echo $row["mname"]; } else { echo " "; }  ?></div>
			<br><div class="label">Last Name</div> : <div class="lname"> <?php if($row["lname"]!=NULL) { echo $row["lname"]; } else { echo " "; }  ?></div>
			<br><div class="label">Age</div> : <div class="age"> <?php if($row["age"]!=NULL) { echo $row["age"]; } else { echo " "; }  ?></div>
			<br><div class="label">Place</div> : <div class="place"> <?php if($row["place"]!=NULL) { echo $row["place"]; } else { echo " "; }  ?></div>
			<br><div class="label">Join Date</div> : <div class="joindate"> <?php if($row["joindate"]!=NULL) { echo $row["joindate"]; } else { echo " "; }  ?></div>
			<br><div class="label">Date of Birth</div> : <div class="dob"> <?php if($row["dob"]!=NULL) { echo $row["dob"]; } else { echo " "; }  ?></div>
			<br><div class="label">Salary</div> : <div class="salary"> <?php if($row["salary"]!=NULL) { echo $row["salary"]; } else { echo " "; }  ?></div>
		</td>
	</tr>
	<tr>
		<td colspan="3">
		<h2 class = "update" style="text-align: right;"><a href = "update.php"> <img src = "update-blue-square-d-realistic-web-button-isolated-88658155.jpg" style="height: 70px; width : 100px;" /></a></h2>
		</td>
	</tr>
</table>
<h2 class = "logout" style="text-align: right;"><a href = "display.php"> <img src = "export_table-512.png" style="height: 100px; width : 100px;" /></a><a href = "logout.php"> <img src = "logout-button-md.png" style="height: 100px; width : 100px;" /></a>
</h2>
   </body>
   
</html>
