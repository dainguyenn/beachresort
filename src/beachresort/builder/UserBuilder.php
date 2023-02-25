<?php

include_once '/_Ky5/PHP/src/authentication/UserDetail.php';

class UserBuilder
{
    private $id;
    private $fullName;
    private $username;
    private $password;
    private $email;
    private $gender;
    private $address;
    private $dob;
    private $hobby;
    private $avatar;



    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Set the value of hobby
     *
     * @return  self
     */
    public function setHobby($hobby)
    {
        $this->hobby = $hobby;

        return $this;
    }

    /**
     * Set the value of fullName
     *
     * @return  self
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function build()
    {
        return new User($this->id, $this->fullName, $this->username, $this->password, $this->email, $this->gender, $this->address, $this->dob, $this->hobby, $this->avatar);
    }

    /**
     * Set the value of avatar
     *
     * @return  self
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }
}
