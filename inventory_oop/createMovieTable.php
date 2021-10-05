<!DOCTYPE html>
<html>
    <head>
        <title>Create MOVIES Table</title>
    </head>
    <body>
        <?php
            // Bootstrap application by loading required library files
            require_once('includes/bootstrap.php');
            // PDO method to connect to the database
            $dbc = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
            // an SQL query to create the movies table
            $query = "CREATE TABLE movies (
                id INT UNSIGNED NOT NULL  PRIMARY KEY AUTO_INCREMENT,
                title VARCHAR(255),
                production_company VARCHAR(255),
                year_released VARCHAR(255),
                director VARCHAR(255)
                )";
        
            $sql = $query;
            $result = $dbc->query($sql);    
            // Will prompt if the sql query is successfully created or not. and display error message if it fails
            if ($result) {
                echo "The Query was successfully executed!";
            } else {
                echo "The Query could not be executed!" .$dbc->errorInfo() [2];
            }
        ?>
    </body>
</html>