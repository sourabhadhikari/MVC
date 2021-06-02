<?php 

namespace App\Controllers;
use \Core\View;
use App\Models\Basic;
use App\Models\Post;

class AddPost extends \Core\Controller{
    public function indexAction(){
        View::render('Templates/header.php');
        $nav_variables = Basic::navVariables();
        
        View::render('Templates/navigation.php',['nav_variables'=>$nav_variables]);
        $nav_variables = Basic::navVariables();
        View::render('Home/addPost.php',['nav_variables'=>$nav_variables]);
        if(isset($_POST['create_post'])){
            Post::addPost();
        }
    }
    protected function before(){
     
       
       
    }
    protected function after(){
    
    }
}
?>