<?php
if (!defined('e107_INIT')) { exit; }

include("bp_functions.php");

$bp_title = "BOINC Project Statistics";
$text = "Can't connect to DB";


if(defined("BULLET"))
{
       $bullet = "<img src='".THEME_ABS."images/".BULLET."' alt='' style='vertical-align: middle;' />";
}
elseif(file_exists(THEME."images/bullet2.gif"))
{
       $bullet = "<img src='".THEME_ABS."images/bullet2.gif' alt='bullet' style='vertical-align: middle;' />";
}
else
{
       $bullet = "";
}


mysql_select_db($db_db);

$query = "select name,project_id from b_projects where shown='Y' and project_id <> 19 order by name";

$res = mysql_query($query);
if (!$res) {
       $text = "DB Error";
} else {

       $text = "$bullet <a href=\"".e_PLUGIN."boinc/bp.php?project=19\">BOINC Combined</a>";

       while ($row = mysql_fetch_array($res) )
       {
           $name = $row["name"];
           $project_id = $row["project_id"];

           $text .= "<br/>$bullet <a href=\"".e_PLUGIN."boinc/bp.php?project=$project_id\">$name</a>";
       }
}
mysql_select_db($db_e107);

$ns->tablerender($bp_title,$text);

?>

