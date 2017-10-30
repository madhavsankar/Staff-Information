<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      $error = "";
      $sql = "SELECT username FROM info WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);
	
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         header("location: welcome.php");
      }else {
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
         <div style = "width:400px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <td><div style="float: left"><input type = "submit" value = " Submit "/></div>
                  
                  <div style="float: right;"><a href = "register.php"><button type="button" >Register</button></a></div></td>
                  <br>
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($error)) { echo $error; } ?></div>
		  			
            </div>
				
         </div>
			
      </div>

   </body>
</html>

