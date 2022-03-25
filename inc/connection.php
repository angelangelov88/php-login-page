<?php  

$dsn = 'mysql';
$host = 'localhost';
$port = 3306;
$dbname = 'vpws_main';
// $user = 'angelang_user';
// $pass = 'Q3LQFGQLue2HwNC';

$user = 'root';
$pass = '';
 
try {
    $db = new PDO("$dsn:host=$host;port=$port;dbname=$dbname", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (Exception $e) {
    echo 'Unable to connect - ';
    echo $e->getMessage();
    exit;
}

// if (!$con = mysqli_connect($host, $user, $pass, $dbname)) {
//     die('failed to connect!');
// }

?>
