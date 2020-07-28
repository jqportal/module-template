<?php
/*****  This is a demo page with message and form.  In your templates folder you have 'your_template.tpl' that will generate html preview for testpage.php, with message. ****/
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

/********* We recommend the usage of constants CLIENT_SIDE and PREV_SIDE as default definitions of client area execution; not using these or changing values can interfere with login or cart packages ******/
define("DEF_BASE", "../..");
define("CLIENT_SIDE", 2);
define("PREV_SIDE", 1);
require_once(DEF_BASE . "/config/clientConf.php");

/*** setting smarty default templates folder to point to your package templates folder ****/
$smarty->setTemplateDir("templates");
$smarty->setCompileDir(DEF_BASE . "/helpers/compiled");
if (isset($_GET['parameter'])) {
    $receivedparam = $_GET['parameter'];
    
    /*** connection  was obtained from clientConf.php ***/
    $res = mysqli_fetch_object($conn->query("SELECT count(*) as count FROM ".MYSQL_DATABASE.".`a_table` WHERE `param_column`='" . $conn->real_escape_string($receivedparam) . "'"));
    
    if ($res !== NULL && $res->count == 0) {
        $smarty->assign('messagen', "Could not find this parameter value.");
    } else {
        $smarty->assign('messagen', "Found it!!!");
    }
    $smarty->display('your_template.tpl');
    return false;
} 

/***** message shown if no 'parameter' value was sent to page  ****/
if(!isset($conn)){
    $smarty->assign('messagen', "Could not connect to database. Please check your database connection parameters in config/your_config.json. If parameters are correct but you don't have a_table in database, please run run_sql.sql");
    $smarty->assign('runsql','true');
} elseif(isset($conn)){
    $count = mysqli_fetch_object($conn->query("SELECT count(*) as count FROM ".MYSQL_DATABASE.".a_table"))->count;
    echo $count;
    if(!isset($count)){
        $smarty->assign('runsql','true');
        $smarty->assign('messagen', "You need to import test table. Click 'Run SQL import for test'." . $count);
    }
} else {
    $smarty->assign('messagen', "You can check a parameter here.");
}   
$smarty->display('your_template.tpl');
?>