<?php 
    
?>                             
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">post title</label>
    <input type="text" class="form-control" name="post_title" />
  </div>
 
 
    
  <select name="post_category" id="">
    <?php 
        
        foreach($nav_variables as $row){
            $cat_title=$row['cat_title'];
            $cat_id=$row['cat_id'];
            echo "<option value='{$cat_id}'>{$cat_title}</option>";
        }
    ?>
  </select>
 
  <div class="form-group">
    <label for="author">post author</label>
    <input type="text" class="form-control" name="post_author" />
  </div>
 
  <div class="form-group">
    <label for="post_status"> Post status</label>
    <input type="text" class="form-control" name="post_status" />
  </div>
 
  <div class="form-group">
    <label for="post_image">post image</label>
    <input type="file" name="post_image" />
  </div>
 
  <div class="form-group">
    <label for="post_tags">post tags</label>
    <input type="text" class="form-control" name="post_tags" />
  </div>
 
  <div class="form-group">
    <label for="post_content">post content</label>
      <textarea class="form-control" name="post_content"  rows="10" cols="30"></textarea>
    </div>
 
    <div class="form-group">
      <input class="btn btn-primary" type="submit" name="create_post" value="add post">
    </div>
</form>
