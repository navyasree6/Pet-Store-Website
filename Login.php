<?php
    session_start();
    # connect to db
    include 'Dbconnection.php';
    $con = OpenCon();
if(isset($_POST['Submit'])){
    
    $error1="";
    $error2="";
    $error3="";
      
    $email= $_POST['Email'];
    $password= $_POST['Password'];
    $pass="123456";
   
 if(empty($email))
 {
  $error1 = "\r\n"."enter your email !";
  
 }
 if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
 {
  $error2= "\r\n"."Not valid email !";
 }
  if($password != $pass)
 {
    $error3= "\r\n"."Not valid password !";
 }

 if ($error1!="" ||$error2!=""||$error3!="" )
 {

			 echo $error1.$error2.$error3;
   }


else
{

   mysqli_autocommit($con,FALSE);
    $query1="SELECT roleId FROM users WHERE email='$email' ";
    $result= mysqli_query($con,$query1);
    $row1= mysqli_fetch_array($result);
    if($row1[0]==1)
    {
        header("Location:BusinessPetStore.html");
       
  
    }
    else
    {
      header("Location:ClientPetStore.html");
    }
    mysqli_commit($con);
}
}
    #close connection
    CloseCon($con);
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/pet.css">
	<meta name="meta" content="width=device-width">
	<!--<script type="text/javascript" >
	function validateForm() {
          if (!myForm.Email.value)
           {
          alert("Please enter your Email Address");
            myForm.Email.focus();
             return false;
         }
     else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g.test(myForm.Email.value))
        {
   
      alert("You have entered an invalid email address!");
    return (false);
         }
   else if(!myForm.Password.value)
    {
    	alert("Please enter your Password");
    	myForm.Password.focus();
    	return false;
    }
    else if(!(document.myForm.Password.value=="123456"))
    {
    	alert("Please enter correct Password");
    	myForm.Password.focus();
    	return false;
    }
    
 
   return true;
}
 </script> -->

	<title>Pet Store Website</title>
</head>
<body>
<div id= wrapper>
	<h1>Pet Store</h1>
	<div class= "row">
	<div class= "leftcolumn" style="background-color: #90C7E3">
	<nav>
		<a href="index.php">Home</a>  
		<a href=" AboutUs.php">  About Us</a> 
		<a href="contactUs.php" >Contact Us</a> 
		<a href="client.php"  >Client</a> 
		<a href="service.php">Service</a>
		<a href="Login.php">Login</a>		
	</nav>
</div>
<div class= "rightcolumn">
	<img src="images/petstoreimage.png" alt="petstoreimage" style="width: 100%;" >
	<form name="myForm" method ="POST" action="#" onsubmit="return (validateForm());">	
		<h2>Login</h2>
		<p>Required Information is marked with an asterisk(*)</p>
	<table class= "container" cellspacing="15" >
		<tr>
			
			<td>* E-mail:</td>
			<td>
				<input type="email" name="Email" required /></td>
			</td>
		</tr>
		<tr>
			<td>*Password:</td>
			<td>
				<input type="password" name="Password" required /></td>
			</td>
		</tr>
		<tr>
			<td>
				<input type="Submit" name="Submit" value="Submit"/></td>
			</td>
		</tr>
		
	</table>
</form>
	
	<footer>
		<p><small><em>Copyright &copy;2018 Pet Store<br>
			<a href="mailto:navyasree@atluri.com"onmouseover="this.style.color='blue';"><u>navyasree@atluri.com</u></a></em></small></p>
	</footer> </div>
</div>
</div>
</body>
</html>