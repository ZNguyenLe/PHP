<!DOCTYPE html>
<html>
    <head>
        <title>Create MOVIES Table</title>
    </head>
    <body>
        <?php
            // Bootstrap application by loading required library files
            require_once('includes/bootstrap.php'); // grabs the bootstrap file inside the includes folder once
            //PDO method to connect to the database instead of mysqli_connect function
            $dbc = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD); 
            // running a query to drop the entire table
            $query = "DROP TABLE music ";
            // running an sql function to call the query
            $sql = $query;
            $result = $dbc->query($sql);    
            
            if ($result) {
                echo "The Query was successfully executed!";
            } else {
                echo "The Query could not be executed!" .$dbc->errorInfo() [2];
            }
        ?>
    </body>
</html>