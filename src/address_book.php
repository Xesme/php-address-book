<?php
class Contact
{
    private $first_name;
    private $last_name;
    private $email;
    private $number;


    function __construct($first_name, $last_name, $email, $number)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->number = $number;
    }

    function setFirstName($new_first_name) {
        $this->first_name = (string) $new_first_name;
    }

    function getFirstName() {
        return $this->first_name;
    }

    function setLastName($new_last_name) {
        $this->last_name = (string) $new_last_name;
    }

    function getLastName() {
        return $this->last_name;
    }

    function setEmail($new_email) {
        $this->email = (string) $email;
    }

    function getEmail() {
        return $this->email;
    }

    function setNumber($new_number) {
        $this->number = $number;
    }

    function getNumber() {
        return $this->number;
    }

    function save()  {
        array_push($_SESSION['list_of_contacts'], $this);
    }

    static function getALL() {
        return $_SESSION['list_of_contacts'];
    }

    function deleteALL() {
        return $_SESSION['list_of_contacts'] = array();
    }
}
?>
