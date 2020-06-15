<?php

use ArmoredCore\WebObjects\URL;

class Register
{
    public $email_user;
    public $primeiroNome;
    public $ultimoNome;
    public $msg;
    public function register_user($primeiro, $ultimo, $email, $password)
    {
        $chk_email = $this->emailCheck($email);
        if ($chk_email == 0) {

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

            $sql = "INSERT INTO users (primeiroNome, ultimoNome, email, password) VALUES ('$primeiro', '$ultimo', '$email', '$password')";

            if ($conn->query($sql) === TRUE) {
                $this->primeiroNome = "";
                $this->ultimoNome = "";
                $this->email_user = "";
                $msg = "<strong class='msg_sucesso'>O seu registo foi feito com sucesso!</strong>";

                header("Location: ".Url::toRoute('home/login'));
                die("Location: ".Url::toRoute('home/login'));

            } else {
                $msg = "<strong>Error: ($chk_email)</strong>>" . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }else{
            $msg = "<strong class='msg_erro'>O email: $email  já se encontra registado na base de dados!</strong>";
        }
        return $msg;
    }

    private function emailCheck($email){
        $exist = 0;

        $DB_HOST = "localhost";
        $DB_USER = "root";
        $DB_PASS = "";
        $DB_NAME = "mydb";

        $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT email FROM users where email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          $exist = 1;
        }

        $conn->close();
        return $exist;
    }
}