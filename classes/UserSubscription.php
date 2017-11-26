<?php
// require ('User.php');
require ('UserManager.php');
/**
 * This class is called when a new user wants to subscribe.
 */
class UserSubscription
{
    protected $db; //Get db infos
    protected $name; 
    protected $firstName; 
    protected $email; 
    protected $password; 
    protected $password_conf;
    protected $user;

/**
 * Params : $db, Oject User (this object gets infos filled in the form.) 
 * Return : Assignation of the variables. 
 */
    public function __construct($db, User $user)
    {
        $this->db        = $db;
        $this->name      = $user->getData('name');
        $this->firstName = $user->getData('firstname');
        $this->email     = $user->getData('email');
        $this->password  = $user->getData('password');
        $this->pass_conf = $user->getData('password_Conf');
        $this->user      = $user;
    }
/**
 * Verify if the form is POSTED. If, verify if all the input are correct. 
 * If OK, create a new UserManager which manage the DB queries, and invoke addUser() method
 * that add the User in DB. 
 */
/**/
    public function subscribe()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $testName      = $this->user->validName($this->name);
            $testFirstName = $this->user->validFirstName($this->firstName);
            $testEmail     = $this->user->validEMail($this->email);
            $testPass      = $this->user->validPassword($this->password, $this->pass_conf);
            
            if($testName == false || $testFirstName == false || 
            $testEmail == false || $testPass = false)
                {	
                    echo "<p>Please retry</p>";
                    return false;
                }
            else
            {
                $addUser = new UserManager($this->db, $this->user);
                $addUser->addUser();
                return true; 
            }
                
                
        
         }
    }
}