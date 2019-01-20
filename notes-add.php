<?php
    include 'libraries/form.php';
    include 'libraries/database.php';
    include 'libraries/login-check.php';

    include 'template/header.php';

	// we can use a function to make this part easy.
    $formdata = get_formdata();
?>

<header class="page-header row no-gutters py-4 border-bottom">
    <div class="col-12">
        <h6 class="text-center text-md-left">Notes</h6>
        <h3 class="text-center text-md-left">Add New Note</h3>
    </div>
</header>

<form class="row content" action="notes-add-process.php" method="post">
    <div class="col-12 col-lg-9">
        <div class="card">
            <div class="card-body">
<?php if (has_error($formdata, 'title')): ?>
                <div class="alert-danger mb-3 p-3">
                    <?php echo get_error($formdata, 'title'); ?>
                </div>
<?php endif; ?>
                <input type="text" name="title" class="form-control mb-3" placeholder="Title"
                    value="<?php echo get_value($formdata, 'title'); ?>">

<?php if (has_error($formdata, 'note-body')): ?>
                <div class="alert-danger mb-3 p-3">
                    <?php echo get_error($formdata, 'note-body'); ?>
                </div>
<?php endif; ?>
                <textarea name="note-body" rows="8" cols="80" placeholder="Write your note" class="form-control mb-3"><?php echo get_value($formdata, 'note-body'); ?></textarea>

            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3 mt-3 mt-lg-0">
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>

<?php include 'template/footer.php'; ?>
