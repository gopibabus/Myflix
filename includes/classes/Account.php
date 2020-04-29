<?php
class Account
{
    private $con;
    private $errorArray = [];

    public function __construct($con)
    {
        $this->con = $con;
    }

    /**
     * @param String $name
     * @return Account
     */
    public function validateFirstName(string $name)
    {
        if (strlen($name) <= 2 || strlen($name) >= 25) {
            $this->errorArray[] = 'First name wrong length';
        }
        return $this;
    }

    /**
     * @param String $name
     * @return String
     */
    public function getError(string $error)
    {
        if (in_array($error, $this->errorArray)) {
            return $error;
        }
    }
}