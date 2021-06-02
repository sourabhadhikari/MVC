<?php 
namespace App\Controllers;
use \Core\View;
use App\Models\Basic;
use App\Models\Nav;

class Home extends \Core\Controller{
    public function indexAction(){
        
        View::render('Templates/header.php');
        View::render('Home/index.php',[
            'name'=>'Dave',
            'colours'=>['red','green']
        ]);

        $nav_variables = Basic::navVariables();
        
        View::render('Templates/navigation.php',['nav_variables'=>$nav_variables]);
        $fetch_posts=[];
        $fetch_posts= Basic::fetchPosts();
        View::render('Home/index.php',['fetch_posts'=>$fetch_posts]);
        
        View::render('Templates/footer.php');
        
        
    }
    protected function before(){
     
        // $check=Basic::check();
       
    }
    protected function after(){
        // echo "(after)";
    }
}
?>