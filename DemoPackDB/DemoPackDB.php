<?php
namespace packages\DemoPackDB;

use \includes\Login;
use \packages\SendMail;


class DemoPackDB  {
    
    private static $instance = null;
    
    private $conn;
    private $wid;

    public function __construct($mysqlObject, $wdata) {
        //$mysqlObject gives access to database connection
        $this->conn = $mysqlObject->getconninfo();
        $this->mysessdata = 'sess_data_name';
        //website id 
        $this->wid = $wdata['wId_idd'];
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
            $this->conn->query("insert into `my_log_data` (`tok`, `some_data`) values ('" .$tok."','" . \includes\loadFunctionHelper::random_text('numeric', 10)."'");
            
    }

    private function logout($uid = '0') {
        unset($_SESSION[$this->mysessdata]);
    }

    public function sendRegisterMail($email) {
        global $package;
        // example of mail package usage
        if (isset($package['SendMail'])) {
            $mailer = $package['SendMail']; //::getInstance();
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