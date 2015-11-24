<?php
class Database {
   /* private $id;
    private $firstname;
    private $lastname;
    private $city;
*/

    function get($database, $mysqli){
/*        $this->id = $data[0];
        $this->firstname = $data[1];
        $this->lastname = $data[2];
        $this->city = $data[3];*/

        $sql = $mysqli->query("SELECT * FROM $database");
        return $sql;
    }

    function add($data, $mysqli){
        $this->id = $data[0];
        $this->firstname = $data[1];
        $this->lastname = $data[2];
        $this->city = $data[3];

        $sql = $mysqli->query("INSERT INTO users VALUES ('', '$this->firstname', '$this->lastname', '$this->city')");
    }
    function delete($data, $mysqli){
        $this->id = $data[0];
        $this->firstname = $data[1];
        $this->lastname = $data[2];
        $this->city = $data[3];

        $sql = $mysqli->query("DELETE FROM users WHERE id = '$this->id')");
    }
    function edit($data, $mysqli){
        $this->id = $data[0];
        $this->firstname = $data[1];
        $this->lastname = $data[2];
        $this->city = $data[3];

        $sql = $mysqli->query("UPDATE users SET firstname = '$this->firstname', lastname = '$this->lastname', city = '$this->city' WHERE id = '$this->id'");
    }
}