<?php
namespace packages\DemoPacknoDB;

use \includes\Login;
use \packages\SendMail;


class DemoPacknoDB  {
    
    private static $instance = null;
    
    private $conn;
    private $wid;

    public function __construct() {
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
    
    
    public function after_load() {
        
        // gets called after module classes initialization; it can be executed if you need code executed after initialization; is not mandatory;
        if (isset($_GET['logout'])) {
            $this->logout($_GET['logout']);
        };
       
        // or maybe you want to register client token next to a random 10 digits number
            $vv = Login::getInstance();
            $tok = $vv->checkToken();
            
    }

    private function logout($uid = '0') {
        unset($_SESSION[$this->mysessdata]);
    }

    public function sendMail($email) {
        global $package;
        // example of mail package usage
        if (isset($package['SendMail'])) {
            $mailer = $package['SendMail']; 
            if (!isset($mailer))
                return false;
            $mdata = array();
            $mdata['subject'] = APP_NAME ." sent this";
            $mdata['email_to'] = $email;
            $mdata['message'] = "<br><br>This is a demo email from <br> " . urldecode($_SERVER['HTTP_HOST']);

            $mailer->init();
            $mresp = $mailer->send($mdata);
            if ($mresp)
                return true;
        }
        return false;
    }
}

?>