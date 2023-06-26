<?php
require_once ('config.php');
?>


<?php

$userSession = $_SESSION["username"];

if ($userSession == 'adminstaff'){
    if (isset($_POST["submitWorkout"]))
    {
        if (empty($_POST["clientName"]) || empty($_POST["workoutName"]) || empty($_POST["workoutEquipment"]) || empty($_POST["workoutSet"]) || empty($_POST["workoutRep"]))
        {
            $message = '<label>Wrong Data</label>';
        }
        else
        {
            $query = "INSERT INTO workout (clientName, workoutName, workoutEquipment, workoutSet, workoutRep) VALUES (:clientName, :workoutName, :workoutEquipment, :workoutSet, :workoutRep)";
            $statement = $connect->prepare($query);
            $statement->execute(array(
                'clientName' => $_POST["clientName"],
                'workoutName' => $_POST["workoutName"],
                'workoutEquipment' => $_POST["workoutEquipment"],
                'workoutSet' => $_POST["workoutSet"],
                'workoutRep' => $_POST["workoutRep"]
            ));
            $count = $statement->rowCount();
            if ($count > 0)
            {
                $message = '<label>Workout successfully added</label>';
            }
        }
    }
}
else {
    header("location:../html/specialArea.html");;
}
?>

<!doctype html>
<html>
   <head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="thiago" />
      <title>Workout Page</title>
      <link rel="stylesheet" type="text/css" href="../css/workoutAdd.css">
   </head>
   <body>
      <p><a href="../html/specialArea.html">Back to the Previous Page</a></p>
      <body>
      <div>
        <h1>Add the workout</h1>
     </div>
     <form action="" method="POST">
        <legend>
           <fieldset>
              Client Name: <input type="text" name="clientName"><br /><br />
              Workout Name: <input type="text" name="workoutName"><br /><br />	
              Equipment Name: <input type="text" name="workoutEquipment"><br /><br />
              Set: <input type="text" name="workoutSet"><br /><br />
              Rep: <input type="text" name="workoutRep"><br /><br />
              <input type="submit" value="add workout" name="submitWorkout" />
           </fieldset>
        </legend>
     </form>
      <?php
if (isset($message))
{
    echo '<label class="text-danger">' . $message . '</label>';
}
?>
   </body>
</html>
