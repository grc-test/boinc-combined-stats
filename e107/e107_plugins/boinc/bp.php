<?php

// Remember that we must include class2.php
require_once("../../class2.php");

require_once("bp_functions.php");
include_lan(e_PLUGIN.'boinc/languages/'.e_LANGUAGE.'/lan_boinc.php');

$project_id = $_GET["project"];

$bp_title = get_project_name($project_id);
$bp_title .= LAN_150;
 
$mytext = get_project_info($project_id);

require_once(HEADERF);

$ns->tablerender($bp_title,$mytext,array('forum', 'forum'));
require_once(FOOTERF);

?>

