<?php
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
    include_once("./helpers/database/database.php");
    include_once("./helpers/model-utilitis/Model.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>social project</title>
</head>
<body>
    <?php
        echo "This will be social project<br>";
        $test = new Model($conn);
        $test->create("User", [
            "PersonID" => "int(6) AUTO_INCREMENT PRIMARY KEY",
            "LastName" => "varchar(255)",
            "FirstName" => "varchar(255)",
            "Age" => "varchar(255)"
        ]);

        // $test->insert([
        //     "LastName" => "kalin",
        //     "FirstName" => "linux",
        //     "Age" => "100"
        // ]);

        // $test->updateById(1,[
        //     "LastName" => "new karnel",
        //     "Age" => "100"
        // ]);

        // $test->delete(["PersonID", "1"])
        // $test->find(["PersonID", "FirstName"]);
        foreach($test->find() as $row) {
            print_r($row);
            echo "<br>";
        }
            

      

    ?>
</body>
</html>

