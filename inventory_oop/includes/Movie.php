<?php
    //Class name
    class Movie extends Media { 
        
        //Instance Properties
        protected $id;
        protected $title;
        protected $productionCompany;
        protected $yearReleased;
        protected $director;
        // Instance Methods
        public function __construct($id, $title, $productionCompany, $yearReleased, $director) {
            $this->id = $id;
            $this->title = $title;
            $this->productionCompany = $productionCompany;
            $this->yearReleased = $yearReleased;
            $this->director  = $director;
        }
        
        public static function all($dbc) {
            $query ="SELECT * FROM movies";
            $result = $dbc->fetchArray($query);
            return $result;
        }
        // Inserting an SQL statement with 'this' into the database
        public function create($dbc) {
            $query = "INSERT into movies values (0, '$this->title', '$this->productionCompany', $this->yearReleased, '$this->director')";
            $result = $dbc->sqlQuery($query);
            return $result;
        }
        // creating a static function to delete a movie title
        public static function delete($dbc, $title) {
            $query = "DELETE FROM movies WHERE title = '$title'";
            $result = $dbc->sqlQuery($query);
            return $result;
        }
        //finding the record and map properties to a new movie
        public static function find($dbc, $title) {
            $query = "SELECT * FROM movies WHERE title = '$title' LIMIT 1";
            $result = $dbc->fetchRecord($query);
            $newObj = new self($result['id'], $result['title'],
                               $result['production_company'],
                               $result['year_released'],
                               $result['director']);
            return $newObj;
        }
        //dynamically constructing an SQL statement to update using the object
        public function update($dbc) {
            $query = "UPDATE movies SET title = '$this->title', " .
                     "production_company = '$this->productionCompany', ". 
                     "year_released = '$this->yearReleased', ". 
                     "director = '$this->director' WHERE id = '$this->id' ";
            $result = $dbc->sqlQuery($query);
            return $result;
        }
        
    }
?>