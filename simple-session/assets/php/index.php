<!doctype html>
   <html lang="en">
  <head>
    <meta charset="utf-8" />

    <title>Session Page</title>
    <meta name="description" content="home" />
    <meta name="author" content="thiago" />

    <link rel="stylesheet" href="../css/index.css" />
  </head>

  <body>
    <div class="container">
      <div class="content-title">
            <h1>Thiago Melonzini</h1>
      </div>

<?php
session_start();
echo session_id();
echo "<br>";
$_SESSION['Mindroom'] = 'This is my assignment';
$mySession = $_SESSION['Mindroom'];

echo $mySession;
?>

    </div>
  </body>
</html>
