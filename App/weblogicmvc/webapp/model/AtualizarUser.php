<?php


use ArmoredCore\WebObjects\Session;

class AtualizarUser
{
    public function AtualizarUser($id, $primeiroNome, $ultimoNome, $email)
    {
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

        $sql = "update users set primeiroNome = '$primeiroNome', ultimoNome = '$ultimoNome',  email = '$email' where userID = '$id';";
        if ($conn->query($sql) === TRUE) {
            //$msg = "<strong class='msg_sucesso'>O seu registo foi feito com sucesso!</strong>";
            $sql = "SELECT * FROM users WHERE userID = '$id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $result = $result->fetch_row();
                Session::set('user', $result);
            }
        }

        return $scores;
    }
}