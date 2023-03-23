<?php

namespace Source\Interpretation;

class User
{
    private $firstName;
    private $latsName;
    private $email;

    /**
     * @param $firstName
     * @param $latsName
     * @param $email
     */
    public function __construct($firstName, $latsName, $email)
    {
        $this->firstName = $firstName;
        $this->latsName = $latsName;
        $this->email = $email;
    }

    public function __clone()
    {
        $this->firstName = null;
        $this->latsName = null;
        echo "<p class='trigger accept'>Clonou!!</p>";
    }

    public function __destruct()
    {
        var_dump($this);
        echo "<p class='trigger error'>O objeto {$this->firstName} foi destruido!!</p>";
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @param mixed $latsName
     */
    public function setLatsName($latsName): void
    {
        $this->latsName = $latsName;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }


    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLatsName()
    {
        return $this->latsName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

}