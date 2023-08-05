<?php

class LoginContr extends Login
{
    public function loginUser($email, $pswd)
    {
        if ($this->emptyInput($email, $pswd) == false) {
            header("location:../login.php?error=emptyinput");
            exit();
        }
        if ($this->invalidEmail($email) == false) {
            header("location:../login.php?error=invalidemail");
            exit();
        }
        $this->signinUser($email, $pswd);
    }

    private function emptyInput($email, $pswd)
    {
        $result = '';
        if (empty($email) || empty($pswd)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail($email)
    {
        $result = '';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
