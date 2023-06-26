<?php
require_once ('config.php');
?>

<?php
    if (isset($_POST["login"]))
    {
        if (empty($_POST["username"]) || empty($_POST["password"]))
        {
            $message = '<label>All fields are required</label>';
        }
        else
        {
            $query = "SELECT * FROM login WHERE username = :username AND password = :password";
            $statement = $connect->prepare($query);
            $statement->execute(array(
                'username' => $_POST["username"],
                'password' => $_POST["password"]
            ));
            $count = $statement->rowCount();
            if ($count > 0)
            {
                $_SESSION["username"] = $_POST["username"];
                header("location:loginSuccess.php");
            }
            else
            {
                $message = '<label>Wrong Data</label>';
            }
        }
    }
?>

<!DOCTYPE html>  
 <html>
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="thiago" />
      <title>Login Page</title>
      <link rel="stylesheet" type="text/css" href="../css/loginPage.css">
   </head>
   <body>
      <div>
         <h1>Login</h1>
      </div>
         <div>
            <p><a href="registerPage.php">Register</a> | <a href="loginPage.php">Login</a></p>
            <form action="" method="POST">
            <legend>
            <fieldset>
               Username: <input type="text" name="username"><br /><br />
               Password: <input type="password" name="password"><br /><br />	
               <input type="submit" value="Login" name="login" />
               </fieldset>
         </legend>
            </form>
         </div>
         <div>
         <?php
if (isset($message))
{
    echo '<label class="text-danger">' . $message . '</label>';
}
?> 
         </div>
   </body>
</html>
