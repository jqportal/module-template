<?php
/*****************  
    edit /packages/routed.php to get here, i.e. 
 *   if (isset($_REQUEST['requestSentToDemoRoute'])) {
 *      require_once("DemoPackDB/demoPackRoute.php");
 *   }
 * 
 */
if (!defined("CLIENT_SIDE")) {
    header("Location: ../");
    die;
}
if (isset($_REQUEST["requestSentToDemoRoute"])) {
    /*****  ajax request sent from client got here; do some action *****/
}
?>