<?php
class Account
{
    private $con;
    private $errorArray = [];

    public function __construct(PDO $con)
    {
        $this->con = $con;
    }

    public function register(
        $firstName,
        $lastName,
        $username,
        $email,
        $email2,
        $password,
        $password2
    ) {
        $this->validateFirstName($firstName);
        $this->validateLastName($lastName);
        $this->validateUsername($username);
        $this->validateEmails($email, $email2);
        $this->validatePasswords($password, $password2);

        if (empty($this->errorArray)) {
            return $this->insertUserDetails(
                $firstName,
                $lastName,
                $username,
                $email,
                $password
            );
        }
    }

    public function login($username, $password)
    {
        $password = hash("sha512", $password);

        $query = $this->con->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
        $query->bindValue(":username", $username);
        $query->bindValue(":password", $password);

        $query->execute();

        if ($query->rowCount() === 1) {
            return true;
        }

        $this->errorArray[] = Constants::$loginFailed;
        return false;
    }

    private function insertUserDetails($firstName, $lastName, $username, $email, $password)
    {
        $password = hash("sha512", $password);

        $query = $this->con->prepare(
            "INSERT INTO users (firstName, lastName, username, email, password)  
                    VALUES (:firstName, :lastName, :username, :email, :password)"
        );
        $query->bindValue(":firstName", $firstName);
        $query->bindValue(":lastName", $lastName);
        $query->bindValue(":username", $username);
        $query->bindValue(":email", $email);
        $query->bindValue(":password", $password);

        return $query->execute();
    }

    /**
     * @param String $name
     * @return Account
     */
    private function validateFirstName(string $name)
    {
        if (strlen($name) <= 2 || strlen($name) >= 25) {
            $this->errorArray[] = Constants::$firstNameCharacters;
        }
        return $this;
    }

    /**
     * @param String $name
     * @return Account
     */
    private function validateLastName(string $name)
    {
        if (strlen($name) <= 2 || strlen($name) >= 25) {
            $this->errorArray[] = Constants::$lastNameCharacters;
        }
        return $this;
    }

    /**
     * @param String $name
     * @return Account
     */
    private function validateUsername(string $name)
    {
        if (strlen($name) <= 2 || strlen($name) >= 25) {
            $this->errorArray[] = Constants::$userNameCharacters;
            return $this;
        }

        $query = $this->con->prepare("SELECT * FROM users WHERE username=:username");
        $query->bindValue(":username", $name);
        $query->execute();

        if ($query->rowCount() != 0) {
            $this->errorArray[] = Constants::$userNameTaken;
        }

        return $this;
    }

    private function validateEmails($email, $email2)
    {
        if ($email !== $email2) {
            $this->errorArray[] = Constants::$emailsDonotMatch;
            return $this;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errorArray[] = Constants::$emailInvalid;
            return $this;
        }

        $query = $this->con->prepare("SELECT * FROM users WHERE email=:email");
        $query->bindValue(":email", $email);
        $query->execute();

        if ($query->rowCount() != 0) {
            $this->errorArray[] = Constants::$emailTaken;
        }

        return $this;
    }

    private function validatePasswords($password, $password2)
    {
        if ($password !== $password2) {
            $this->errorArray[] = Constants::$passwordsDonotMatch;
            return $this;
        }

        if (strlen($password) <= 2 || strlen($password) >= 25) {
            $this->errorArray[] = Constants::$passwordLength;
            return $this;
        }
    }

    /**
     * @param String $name
     * @return String
     */
    public function getError(string $error)
    {
        if (in_array($error, $this->errorArray)) {
            return "<span class='errorMessage'>$error</span>";
        }
    }
}