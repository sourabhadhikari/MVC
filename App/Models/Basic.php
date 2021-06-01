<?php 
namespace App\Models;

use PDO;
use PDOException;

class Basic extends \Core\Model{
    public static function check(){
       

        $connection=mysqli_connect('localhost','root','','cms');
        // if($connection){
        //     echo "we are connected";
        // }
        
    }
    public static function navVariables(){
        
        
        try{
            $db=static::getDB();
            $query = $db->query("SELECT * FROM categories");
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
                return $results;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }   
        

    }
    public static function fetchPosts(){
        
        try{
            $db=static::getDB();
            $query = $db->query("SELECT * FROM posts");
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
                return $results;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }  
    }
    
    
}

?>