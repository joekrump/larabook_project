<?php
namespace Larabook\Registration;
/**
 * Description of RegisterUserCOmmand
 *
 * @author Joseph Krump
 */
class RegisterUserCommand {
    public $username;
    
    public $email;
    
    public $password;
    
    function __construct($username, $email, $password){
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }
}

?>
