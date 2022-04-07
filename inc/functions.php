<?php
// echo error_reporting();

function check_login($db) {
    if(isset($_SESSION['url_address'])) {
        $url_address = $_SESSION['url_address'];

        try {
            $query = "SELECT * FROM users WHERE url_address = :url_address LIMIT 1";

            $stmt = $db->prepare($query);
            $stmt->bindParam(":url_address", $url_address);
            $check = $stmt->execute();    
            
            if($check) {
                $data = $stmt->fetchAll(PDO::FETCH_OBJ);
                if(is_array($data) && count($data) > 0) {
                    return $data[0];
                }
    
            }       
        } catch (Exception $e) {
            echo "Unable to connect - ";
            echo $e->getMessage();
            return false;
          }
        
                        
    } 
        header("Location: login.php");
        die;   
    

}

           

function get_random_string($length) {
    $array = array(0,1,2,3,4,5,6,7,8,9,'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    $text = "";
    $length = rand(4, $length);
    for($i=0; $i<$length; $i++) {
        $random = rand(0, 61);
        $text .= $array[$random];
    }
    return $text;
}

?>