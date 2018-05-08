<?php 

/*$dir = "C:\wamp64\www\\tests\\tests\\";
chmod($dir, 777);

foreach (scandir($dir) as $fileName) {
  if (!is_readable($fileName)) {
    chmod($dir.$fileName, 777);
    $content = file_get_contents($dir.'/'.$fileName);

    //echo $fileName." ".$content."";
    
    $obj = json_encode($content);
    echo $obj;
  }
  
}

*/

include ('connect.php');

$reponse = $db->query('SELECT COUNT(*) as NB FROM advert');
$result = $reponse->fetch();
$reponse->closeCursor();
echo $result['NB'];
 ?>