<?php
namespace Backend\Model;

// require '../Database/Connection.php';
require 'Base.php';

use Backend\Database\Connection as Connection;
use Backend\Model\Base;

class Domanda extends Base{
    private static $table = "domanda";
    public function __construct(){
        parent::setTable(self::$table);
    }
    public static function findArg($id){
        $data = array();
        $newc = new Connection();
        $newc->connect();
        $query = "SELECT * FROM ".self::$table." WHERE argomento_id = '$id'";
        $result = mysqli_query($newc->conn,$query);
        if($result){
        for($i=0;$i<mysqli_num_rows($result);$i++){
            $row = mysqli_fetch_assoc($result);
            array_push($data, $row);
        }
        print_r(json_encode($data));
        mysqli_free_result($result);
        }
        $newc->close();
    }
}
