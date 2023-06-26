<?php
require_once ('config.php');
?>

<?php
    $query = "SELECT * FROM workout ORDER BY id DESC";
    $statement = $connect->query($query);

    $workouts = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html>
   <head>
      <meta charset="UTF-8">
	   <meta http-equiv="X-UA-Compatible" content="IE=edge">
	   <meta name="viewport" content="width=device-width, initial-scale=1.0">
	   <meta name="author" content="thiago" />
      <title>Workout View Page</title>
      <link rel="stylesheet" type="text/css" href="../css/workoutView.css">
   </head>
   <body>
      <p><a href="../html/specialArea.html">Back to the Previous Page</a></p> 
      <div>
        <h1>Add the workout</h1>
     </div>
     <form action="" method="POST">
        <legend>
           <fieldset>
            <?php
                if ($workouts) {
                    foreach ($workouts as $workout) {
                        echo $workout['clientName'] . '<br>';
                        echo $workout['workoutName'] . '<br>';
                        echo $workout['workoutEquipment'] . '<br>';
                        echo $workout['workoutSet'] . '<br>';
                        echo $workout['workoutRep'] . '<br>';
                    }
                }
            ?>
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
