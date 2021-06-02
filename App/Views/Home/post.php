

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php
              
            // foreach($view_post as $row) {
            //     $post_title = $row['post_title'];
            //     $post_author = $row['post_author'];
            //     $post_date = $row['post_date'];
            //     $post_image = $row['post_image'];
            //     $post_content = $row['post_content'];
            
            // 
                $post_title = $view_post['post_title'];
                $post_author = $view_post['post_author'];
                $post_date = $view_post['post_date'];
                $post_image = $view_post['post_image'];
                $post_content = $view_post['post_content'];
            ?>

                <!-- <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> -->

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            <?php


            // }
            ?>
            
            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="" method="post" role="form">
                    <label for="comment_author">author</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="comment_author">
                    </div>
                    <label for="comment_email">email</label>
                    <div class="form-group">
                        <input type="email" class="form-control" name="comment_email">
                    </div>
                    <label for="comment">comment</label>
                    <div class="form-group">
                        <textarea name="comment_content" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                </form>
            </div>

            <hr>

            