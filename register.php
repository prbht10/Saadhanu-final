

<?php

session_start();

include('server/connection.php');

// if user has sucessfully registered take them to the account page
if(isset($_SESSION['logged_in'])){

  header('location: account.php');
  exit;
}


/*if(isset($_POST['register'])){

    $name= $_POST['name'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $confirm_password= $_POST['confirmpassword']; */

    
   
     if(isset($_POST['register'])){
      
     $name= $_POST['name'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $confirm_password= $_POST['confirmpassword'];


    /*if ($name=="") {
      $nameErr = "Name is required";
    }
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
      }
    
    
    if ($email=="") {
      $emailErr = "Email is required";
    } 
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    
  
    
      if (strlen($password) <= '8') {
          $passwordErr = "Your Password Must Contain At Least 8 Characters!";
      }
      elseif(!preg_match("#[0-9]+#",$password)) {
          $passwordErr = "Your Password Must Contain At Least 1 Number!";
      }
      elseif(!preg_match("#[A-Z]+#",$password)) {
          $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
      }
      elseif(!preg_match("#[a-z]+#",$password)) {
          $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
      }
  
  elseif(!empty($confirm_password)) {
      $confirmpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
  } else {
       $passwordErr = "Please enter password";
  }

  
  


  
 // if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
   
  
  /*function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    } */

   /* $name= $_POST['name'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $confirm_password= $_POST['confirmpassword']; */ 


   
 
    
    // if passwords don't match
     if($password !== $confirm_password){
        header('location: register.php?error=passwords do not match');
       
    }
   
    // if password has less than 6 characters
    else if(strlen($password) < 6){
       header('location: register.php?error=password must be at least be 6 characters');
       
    } 


   

    

    // if there is no error
    else{
    //check whether there is a user with this email or not
   $stmt1 = $conn->prepare("SELECT count(*) FROM users where user_email=?");
   $stmt1->bind_param('s',$email);
   $stmt1->execute();
   $stmt1->bind_result($num_rows);
   $stmt1->store_result();
   $stmt1->fetch();

   // if there is a user already regsitered with an email
   if($num_rows != 0){
    header('location: register.php?error=user with this email already exists!');
    
   
    // if no user registered with this email before
   }
   
   else{

    //create a new user
    $stmt= $conn->prepare("INSERT INTO users (user_name,user_email,user_password)
                    VALUES (?,?,?);");

    

    
    $stmt->bind_param('sss',$name,$email,md5($password));

    // if account was created sucessfully
   if($stmt->execute()){
     $user_id = $stmt->insert_id;
     $_SESSION['user_id'] = $user_id;
     $_SESSION['user_email']= $email;
     $_SESSION['user_name']= $name;
     $_SESSION['logged_in']= true;
     header('location: account.php?register_success=You regsitered sucessfully');
   
    // account could not not be created
   }else{

    header('location: register.php?error=Account could not be created');
   }


   }

}



}


//$nameErr = $emailErr = $passwordErr =$confirmpasswordErr  = "";

/* if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["confirmpassword"])) {
    $password = test_input($_POST["password"]);
    $confirm_password = test_input($_POST["confirmpassword"]);
    if (strlen($_POST["password"]) <= '8') {
        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
}
elseif(!empty($_POST["password"])) {
    $confirmpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
} else {
     $passwordErr = "Please enter password   ";
}
} */

/*function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  } */

  










?>





<?php include('layouts/header.php');    ?>

      <!--Register-->

      <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
          <h2 class="form-weight-bold"> Register </h2>
         
        </div>
        <div class="mx-auto container">
            <form method="POST" action="register.php"  id="register-form">
                <p style="color:red;"> <?php if(isset($_GET['error'])){ echo $_GET['error']; } ?> </p> 
                <div class="form-group">
                    <label> Name </label>
                    <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required/>
                    

                </div>

                <div class="form-group">
                    <label> Email</label>
                    <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required/>
                    

                </div>
                <div class="form-group">
                    <label> Password </label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required/>
                    
                </div>

                <div class="form-group">
                    <label> Confirm Password </label>
                    <input type="password" class="form-control" id="register-confirm-password" name="confirmpassword" placeholder="Confirm Password" required/>
                    
                </div>

                    <div class="form-group">
                        
                        <input type="submit" class="btn" id="register-btn" name="register" value="Register"/>
                        
                    </div>

                    <div class="form-group">
                       <a id="login-url" class="btn" href="login.php"> Do you Have an Account? Login</a> 
                       
                    </div>

                
                    
                
            </form>
        </div>

         </section>










         <?php include('layouts/footer.php');    ?>