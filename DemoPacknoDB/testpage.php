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
$smarty->display('your_template.tpl');
?>