<?php
    include 'libraries/database.php';
    include 'libraries/login-check.php';
    include 'libraries/form.php';

    include 'template/header.php';

    $formdata = get_formdata();
    $posts = get_all_posts();
?>

<header class="page-header row no-gutters py-4 border-bottom">
    <div class="col-12">
        <h3 class="text-center text-md-left">Updates</h3>
    </div>
</header>
          <form class="row content" action="post-add-process.php" method="post">
              <div class="card gedf-card">
                    <div class="card-body">
                      <?php if (has_error($formdata, 'content')): ?>
                                      <div class="alert-danger mb-3 p-3">
                                          <?php echo get_error($formdata, 'content'); ?>
                                      </div>
                      <?php endif; ?>
                                      <textarea name="content" rows="2" cols="160" placeholder="What's on your mind?" class="form-control mb-3"><?php echo get_value($formdata, 'content'); ?></textarea>
                        <div class="btn-toolbar justify-content-between">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary">share</button>
                            </div>
                        </div>
                    </div>
                </div>

        </form>
<?php while ($row = mysqli_fetch_assoc($posts)):

$post_time = intdiv((time() - $row['time']), 60);
?>

                <div class="card gedf-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="35" img src="icon.png" alt="">
                                </div>
                                <!--calling the name and surname of the logged in user-->
                                <div class="ml-2">
                                    <div class="h5 m-0"><?php echo $row['name']; ?> <?php echo $row['surname']; ?></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="text-muted h7 mb-2"> <i class="far fa-clock"></i> <?php echo $post_time;?> minutes ago</div>
<!--calling the post content of the logged in user-->
                        <p class="card-text">
                            <?php echo $row['post_content']; ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-link"><i class="far fa-thumbs-up"></i> Like</a>
                        <a href="#" class="card-link"><i class="far fa-comment"></i> Comment</a>
                    </div>
                </div>
<?php endwhile; ?>
<?php
    include 'template/footer.php';
?>
