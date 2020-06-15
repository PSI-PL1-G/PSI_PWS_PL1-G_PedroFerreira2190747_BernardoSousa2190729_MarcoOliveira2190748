<?php


class Consultas
{
    public function scorespessoais($user) {
        $scores = null;
        $DB_HOST = "localhost";
        $DB_USER = "root";
        $DB_PASS = "";
        $DB_NAME = "mydb";

        // Create connection
        $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM scores WHERE user = '$user[0]' ";
        $result = $conn->query($sql);
        $count = 0;
        while ($row = $result->fetch_row()) {
            $scores[$count] = $row;
            $count++;
        }
        return $scores;
    }

    public function topscores() {
        $scores = null;
        $DB_HOST = "localhost";
        $DB_USER = "root";
        $DB_PASS = "";
        $DB_NAME = "mydb";

        // Create connection
        $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "SELECT s.scoreID, u.primeiroNome, u.ultimoNome, s.score, s.state, s.data FROM scores s
                inner join users u on s.user = u.userID
                ORDER BY score DESC LIMIT 10;";
        $result = $conn->query($sql);
        $count = 0;
        while ($row = $result->fetch_row()) {
            $scores[$count] = $row;
            $count++;
        }

        return $scores;
    }

    public function users(){
        $users = null;
        $DB_HOST = "localhost";
        $DB_USER = "root";
        $DB_PASS = "";
        $DB_NAME = "mydb";

        // Create connection
        $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select * from users order by primeiroNome asc;";
        $result = $conn->query($sql);
        $count = 0;
        while ($row = $result->fetch_row()) {
            $users[$count] = $row;
            $count++;
        }

        return $users;
    }
}