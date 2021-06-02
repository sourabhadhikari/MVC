<?php 
namespace App\Models;

use PDO;
use PDOException;
class Post extends \Core\Model{
    public static function viewPost(){
        $connection=mysqli_connect('localhost','root','','cms');
        if(isset($_GET['id'])){
            $the_post_id=$_GET['id'];
        }
        
        $query = "SELECT * FROM posts WHERE post_id=$the_post_id";
        $select_all_posts_query = mysqli_query($connection, $query);
        $result=mysqli_fetch_assoc($select_all_posts_query);
        return $result;
        
    }
    public static function categoryPost(){
        $connection=mysqli_connect('localhost','root','','cms');
        if(isset($_GET['id'])){
            $the_post_id=$_GET['id'];
        }
        
        $query = "SELECT * FROM posts WHERE post_category_id=$the_post_id";
        $select_all_posts_query = mysqli_query($connection, $query);
        $result=mysqli_fetch_assoc($select_all_posts_query);
        return $result;
    }
    public static function postComment(){
        $connection=mysqli_connect('localhost','root','','cms');
            if (isset($_POST['create_comment'])) {
                $the_post_id = $_GET['id'];
                $comment_author = $_POST['comment_author'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];

                $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
                $query .= "VALUES ($the_post_id, '$comment_author', '$comment_email', '$comment_content', 'Unapproved', now() )";

                $add_comment = mysqli_query($connection, $query);
                if (!$add_comment) {
                    die('query failed' . mysqli_error($connection));
                }

                $query="UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id={$the_post_id} ";
                $update_comment_count  = mysqli_query($connection,$query);
                if(!$update_comment_count){
                    die('commnent count failed'.mysqli_error($connection));
                }
            }
            
    }
    public static function postedComments(){
        try{
            $db=static::getDB();
            $the_post_id=$_GET['id'];
            $sql = 'SELECT * FROM COMMENTS WHERE comment_post_id LIKE ?';
            $q=$db->prepare($sql);
            $q->execute([$the_post_id]);
            $results = $q->fetchAll(PDO::FETCH_ASSOC);
            return $results;
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }  
        

    }
    
    public static function addPost(){
            $connection=mysqli_connect('localhost','root','','cms');
            $post_title= $_POST['post_title'];
            $post_author= $_POST['post_author'];
            $post_category_id= $_POST['post_category'];
            $post_status= $_POST['post_status'];
            $post_image= $_FILES['post_image']['name'];
            $post_image_temp= $_FILES['post_image']['tmp_name'];
            $post_tags= $_POST['post_tags'];
            $post_date= date('d-m-y');
            $post_comment_count=4;
            $post_content=$_POST['post_content'];
    
            // move_uploaded_file($post_image_temp, "../Images/$post_image");
            $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date,post_image,post_content,post_tags,post_comment_count,post_status) ";
                 
            $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_comment_count}','{$post_status}') "; 
                   
            $create_post_query = mysqli_query($connection, $query);
            
            if(!$create_post_query){
                die('commnent count failed'.mysqli_error($connection));
            }
            
            
        
    }
}

?>