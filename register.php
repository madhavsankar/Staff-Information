<?php
   include("config.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $myfname = mysqli_real_escape_string($db,$_POST['fname']);
      $mymname = mysqli_real_escape_string($db,$_POST['mname']); 
      $mylname = mysqli_real_escape_string($db,$_POST['lname']);
      $myage = mysqli_real_escape_string($db,$_POST['age']); 
      $myplace = mysqli_real_escape_string($db,$_POST['place']);
      $myjoindate = mysqli_real_escape_string($db,$_POST['joindate']);
      $mydob = mysqli_real_escape_string($db,$_POST['dob']);
      $mysalary = mysqli_real_escape_string($db,$_POST['salary']);  
      
      $sql = "SELECT username FROM info WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);
      
      if($myusername != "" && $mypassword != "" && $count == 0)
      {
      	$sql = "INSERT into info values('$myusername', '$mypassword', '$myfname', '$mymname', '$mylname', '$myage', '$myplace', '$myjoindate', '$mydob', '$mysalary')";
      	if(mysqli_query($db,$sql)) {
         	header("location: login.php");
     	}
     	else {
    		echo "Error updating record: " . mysqli_error($db);
     	}
     }
     else {
     		$error = "Your Login Name or Password is invalid";
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
                  <label>*Username  :</label>
                  </td>
                  <td>
                  <input type = "text" name = "username" class = "box" />
                  </td>
               </tr><tr><td></td></tr>
               <tr>
                  <td>
                  <label>*Password  :</label>
                  </td>
                  <td>
                  <input type = "password" name = "password" class = "box" />
                  </td>
               </tr><tr><td></td></tr>
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
		<div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($error)) { echo $error; } ?></div>	
            </div>
				
         </div>
			
      </div>

   </body>
</html>

