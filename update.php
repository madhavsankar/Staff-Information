<?php
   include('session.php');   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myfname = mysqli_real_escape_string($db,$_POST['fname']);
      $mymname = mysqli_real_escape_string($db,$_POST['mname']); 
      $mylname = mysqli_real_escape_string($db,$_POST['lname']);
      $myage = mysqli_real_escape_string($db,$_POST['age']); 
      $myplace = mysqli_real_escape_string($db,$_POST['place']);
      $myjoindate = mysqli_real_escape_string($db,$_POST['joindate']);
      $mydob = mysqli_real_escape_string($db,$_POST['dob']);
      $mysalary = mysqli_real_escape_string($db,$_POST['salary']);  
      
      $ses_sql = mysqli_query($db,"select username,fname,mname,lname,age,place,joindate,dob,salary from info where username = '$user_check' ");
      $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
      if($myfname == "")
      		$myfname = $row["fname"];
      if($mymname == "")
      		$mymname = $row["mname"];
      if($mylname == "")
      		$mylname = $row["lname"];
      if($myage == "")
      		$myage = $row["age"];
      if($myplace == "")
      		$myplace = $row["place"];
      if($myjointdate == "")
      		$myjointdate = $row["jointdate"];
      if($mydob == "")
      		$mydob = $row["dob"];
      if($mysalary == "")
      		$mysalary = $row["salary"];
      
      
      $sql = "UPDATE info SET fname = '$myfname', mname = '$mymname', lname = '$mylname', age = '$myage', place = '$myplace', joindate = '$myjoindate', dob = '$mydob', salary = '$mysalary'  WHERE username = '$user_check'";
      
      if(mysqli_query($db,$sql)) {
         header("location: welcome.php");
     	}
     	else {
    echo "Error updating record: " . mysqli_error($db);
     }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
	background: #c2e59c; /* fallback for old browsers */
	background: -webkit-linear-gradient(to left, #c2e59c , #64b3f4); /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to left, #c2e59c , #64b3f4); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */ 
	
	color: #666;
	font-family: 'Roboto Condensed', sans-serif;
}
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:800px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
               <table>
               <tr>
                  <td>
                  <label>First Name  :</label>
                  </td>
                  <td>
                  <input type = "text" name = "fname" class = "box" />
                  </td>
               </tr><tr><td></td></tr>
               <tr>
                  <td>
                  <label>Middle Name  :</label>
                  </td>
                  <td>
                  <input type = "text" name = "mname" class = "box" />
                  </td>
               </tr><tr><td></td></tr>
               <tr>
                  <td> 
                  <label>Last Name  :</label>
                  </td>
                  <td>
                  <input type = "text" name = "lname" class = "box" />
                  </td>
               </tr><tr><td></td></tr>
               <tr>
                  <td>   
                  <label>Age  :</label>
                  </td>
                  <td>
                  <input type = "text" name = "age" class = "box" />
                  </td>
               </tr><tr><td></td></tr>
               <tr>
                  <td>
                  <label>Place  :</label>
                  </td>
                  <td>
                  <input type = "text" name = "place" class = "box" />
                  </td>
               </tr><tr><td></td></tr>
               <tr>
               	  <td>
                  <label>Join Date  :</label>
                  </td>
                  <td>
                  <input type = "Date" name = "joindate" class = "box"/>
                  </td>
               </tr><tr><td></td></tr>
               <tr>
                  <td>
                  <label>Date of Birth  :</label>
                  </td>
                  <td>
                  <input type = "Date" name = "dob" class = "box"/>
                  </td>
               </tr><tr><td></td></tr>
               <tr>
                  <td>
                  <label>Salary  :</label>
                  </td>
                  <td>
                  <input type = "text" name = "salary" class = "box"/>
                  </td>
               <tr><tr><td></td></tr>
               <tr>
               	  <td>
                  <input type = "submit" value = " Submit "/><br />
                  </td>
               </tr>
               </form>
		<h1><?php echo $user_check ?>			
            </div>
				
         </div>
			
      </div>

   </body>
</html>

