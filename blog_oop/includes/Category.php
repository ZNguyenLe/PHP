<?php
/**
* Database Class
**/
class Category {
    private $id;
    private $cat;

    public static function all()    {
        $sql = "SELECT * FROM categories";
        return Category::find($sql);
    }
    
    public static function find($sql, $bindVal = null) {
        global $dbc;
        $categories = $dbc->fetchArray($sql, $bindVal);
        if (!$categories) {
            return [];
        }

        foreach($categories as $category) {
            $categoryObjArray[] = new self($category['id'],
                                            $category['cat']
            );
        }
        return $categoryObjArray;
    }

    public function __construct($id, $cat) {
        $this->id = $id;
        $this->cat = $cat;
    }

    public function create() {
        global $dbc;
        $sql = "INSERT INTO categories (cat) VALUES (:cat)";
        $bindVal = ['cat' => $this->cat];
        return $dbc->sqlQuery($sql, $bindVal);
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
        return $this;
    }
    public function getCategory() {
        return $this->cat   ;
    }
    public function setCategory($cat) {
        $this->cat = $cat;
        return $this;
    }
}
?>