<?php
/**
* Database Class
**/
class Entry {
    private $id;
    private $cat_id;
    private $date;
    private $subject;
    private $body;

    public static function find($sql, $bindVal = null) {
        global $dbc;
        $entries = $dbc->fetchArray($sql, $bindVal);
        if (!$entries) {
            return [];
        }

        foreach($entries as $entry) {
            $entryObjArray[] = new self($entry['id'],
                                        $entry['cat_id'],
                                        $entry['date'],
                                        $entry['subject'],
                                        $entry['body']
            );
        }
        return $entryObjArray;
    }

    public function __construct($id,$cat_id,$date,$subject,$body) {
        $this->id = $id;
        $this->cat_id = $cat_id;
        $this->date = $date;
        $this->subject = $subject;
        $this->body = $body;
    }

    public function create() {
        global $dbc;
        $sql = "INSERT INTO entries (cat_id, date, subject, body)
                VALUES(:cat_id,NOW(),:subject,:body)";
        $bindVal = ['cat_id' => $this->cat_id,
                    'subject' => $this->subject,
                    'body' => $this->body];
        return $dbc->sqlQuery($sql, $bindVal);
    }

    public function update() {
        global $dbc;
        $sql = "UPDATE entries SET cat_id = :cat_id," . 
               " subject = :subject," . 
               " body = :body WHERE id = :id";
        $bindVal = ['cat_id'     => $this->cat_id,
                    'subject'   => $this->subject,
                    'body'      => $this->body,
                    'id'        => $this->id];
        return $dbc->sqlQuery($sql, $bindVal);
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    public function getCat_id() {
        return $this->catId;
    }
    public function setCat_id($cat_id) {
        $this->cat_id = $cat_id;
        return $this;
    }
    public function getDate() {
        return $this->date;
    }
    public function setDate($date) {
        $this->date = $date;
        return $this;
    }
    public function getSubject() {
        return $this->subject;
    }
    public function setSubject($subject) {
        $this->subject = $subject;
        return $this;
    }
    public function getBody() {
        return $this->body;
    }
    public function setBody($body) {
        $this->body = $body;
        return $this;
    }
}
?>