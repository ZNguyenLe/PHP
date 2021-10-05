<?php
class Database {
    public $connection;
    //Connecting to the Database as a 'connection' value
    public function __construct() {              // construct used to initialize objects during the creation                    
       $this -> connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME , DB_USER , DB_PASSWORD);
    }
    
    public function sqlQuery($sql) {            // Executes SQL statements as a parameter.
        $dbc = $this->connection;               // Can only be used for 'Create', 'Update' or 'Delete' stuff
        $result = $dbc->query($sql);            // catch the result of the sql in the database connection
        return $result;                         // return the result of the sql in database connection
    }
    
    public function fetchArray($sql) {          // fetchArray  retrieves results from an SQL query and placed in an array
        $result = $this->sqlQuery($sql);        // catch the sql query of THIS array.
        $numberOfRows = $result->rowCount();    // counts the rows depending on how many arrays were counted.
            if ($numberOfRows == 0) {           // if the rows is less or equal to 0: return false
                return false;
            } else {
                $resultArray = $result->fetchAll(PDO::FETCH_ASSOC); // if all the rows in the array have more than 1, 
                return $resultArray;                                // fetch and return the array
            }
    }
    public function fetchRecord($sql) {         // fetchRecord only retrieves a single record
        $result = $this->sqlQuery($sql);        // the $sql is stored in $THIS inside the $result
        $numberOfRows = $result->rowCount();    // rowCount determines the number of rows returned by the query
            if ($numberOfRows == 0) {           // If there are 0 rows returned, return false
                return false;
            } else {
                $resultRow = $result->fetch(PDO::FETCH_ASSOC); // using the PDO method 'fetch(PDO::FETCH_ASSOC)' to return a single record in an associative array
                return $resultRow;
            }
    }
}
$dbc = new Database();      // A new class object created and is now the active database connection
?>