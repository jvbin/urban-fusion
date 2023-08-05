<?php

class Login extends Dbh
{
    protected function signinUser($email, $pswd)
    {
        $sql = "SELECT password_hashed FROM Users Where email='user1@example.com'";
        $stmt = $this->connect()->query($sql);
        $row = $stmt->fetchAll();

        $storedHashedPassword = $row[0]["password_hashed"]; // Retrieved from the database.

        if ($pswd != $storedHashedPassword) {
            header("location:../login.php?error=wrongpassword");
            exit();
        } elseif ($pswd == $storedHashedPassword) {
            $sql = "SELECT * FROM Users WHERE email=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email]);
            $datas = $stmt->fetchAll();
            foreach ($datas as $data) {
                $email = $data["email"];
                $userid = $data["users_id"];
                $name = $data["users_name"];
            }
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["users_id"] = $userid;
            $_SESSION["users_name"] = $name;
        }
    }
}
