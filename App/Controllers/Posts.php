<?php 

namespace App\Controllers;
use \Core\View;
use App\Models\Basic;
use App\Models\Post;

class Posts extends \Core\Controller{
    public function indexAction(){
        
        View::render('Templates/header.php');
        View::render('Home/index.php',[
            'name'=>'Dave',
            'colours'=>['red','green']
        ]);

        $nav_variables = Basic::navVariables();
        $fetch_posts= Basic::fetchPosts();
        View::render('Templates/navigation.php',['nav_variables'=>$nav_variables]);
        // View::render('Home/index.php',['fetch_posts'=>$fetch_posts]);
        // View::render('Templates/footer.php');
        // echo $_SERVER['QUERY_STRING'];
        $view_post=Post::viewPost();
        // echo "hahahahaha";
        // print_r($view_post);
        View::render('Home/post.php',['view_post'=>$view_post]);
        $posted_comments=Post::postedComments();
        View::render('Home/postedcomments.php',['posted_comments'=>$posted_comments]);
        
    }
    protected function before(){
     
        $check=Basic::check();
       
    }
    protected function after(){
        Post::postComment();
    }
}
?>