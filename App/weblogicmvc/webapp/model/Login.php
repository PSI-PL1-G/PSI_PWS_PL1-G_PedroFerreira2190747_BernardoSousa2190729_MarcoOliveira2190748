<?php
/*session_start();*/
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\URL;

class Login
{
    public $email_user;
    public function login_user( $email, $password)
    {
        $chk_email = $this->emailCheck($email);
        if ($chk_email == 1) {

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

            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $result = $result->fetch_row();
                Session::set('user', $result);
                header("Location: ".Url::toRoute('home/shutthebox')); //TROCAR
                die("Location: ".Url::toRoute('home/shutthebox'));
                //$msg = "<strong class='msg_sucesso'>O seu login foi feito com sucesso!</strong>";
            } else {
                $msg = "<strong class='msg_erro'>E-mail ou Palavra pass estao incorretos! Verifique e tente novamente </strong>";
            }

            $conn->close();
        }else{
            $msg = "<strong class='msg_erro'>O email: $email nao se encontra registado na base de dados!</strong>";
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