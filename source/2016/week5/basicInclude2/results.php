<?php
include('includes/mysql_connect.inc.php');
include('includes/results_format.inc.php');

if (isset($_GET['req'])) {
$request = $_GET['req'];
$heading = str_replace('_', ' ', $request);
$content_name = ucwords($heading);

if ($request == 'all_content') {
$headers = array('content id', 'content name', 'description', 'content', 'created', 'link');
$cells = array('contentid', 'contentname', 'contentdesc', 'contenttext', 'contentcreated');
$query = 'SELECT * FROM content';
$result = basicQuery($query);
$link = '<a href="content_viewer.inc.php?contentid=';
$link_end = '">View content</a>';
outputTable($headers, $cells, $result, $link, $link_end);
}
else if ($request == 'all_users') {
$headers = array('user id', 'username', 'first name', 'last name', 'created');
$cells = array('userid', 'username', 'firstname', 'lastname', 'usercreated');
$query = 'SELECT * FROM users';
$result = basicQuery($query);
$link = '<a href="user_viewer.inc.php?userid=';
$link_end = '">View User</a>';
outputTable($headers, $cells, $result, $link, $link_end);
}
//handle empty requests
else {
// for user error reporting
exit('Invalid request - Please return to the <a href="./">Home menu</a>.');
}

}
else {
exit('No request - Please return to the <a href="./">Home menu</a>.');
}


?>