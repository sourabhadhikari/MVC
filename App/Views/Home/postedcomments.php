<!-- Posted Comments -->
<?php
            
            foreach($posted_comments as $row){
                
                $comment_date = $row['comment_date'];
                $comment_author = $row['comment_author'];
                $comment_content = $row['comment_content'];
            ?>
                <div class="media">


                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>
             <?php }
            ?>
            <!-- Comment -->


            <!-- Comment -->


        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php
        // include "includes/sidebar.php";
        ?>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->

    <?php
    // include "includes/footer.php";
    ?>