<?php
include_once '/_Ky5/PHP/const.php';
include_once PATH_DIR_RESORT . '/entity/Contact.php';

class ContactBuilder
{
    private $id;
    private $name;
    private $email;
    private $subject;
    private $message;

    /**
     * add the value of id
     *
     * @return  self
     */
    public function addId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * add the value of name
     *
     * @return  self
     */
    public function addName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * add the value of email
     *
     * @return  self
     */
    public function addEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * add the value of subject
     *
     * @return  self
     */
    public function addSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * add the value of message
     *
     * @return  self
     */
    public function addMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function build()
    {
        return new Contact(
            $this->id,
            $this->name,
            $this->email,
            $this->subject,
            $this->message
        );
    }
}
