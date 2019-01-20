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
        <h6 class="text-center text-md-left">Extension</h6>
        <h3 class="text-center text-md-left">New Extension</h3>
    </div>
</header>

<form class="row content" action="extension-add-process.php" method="post">
    <div class="col-12 col-lg-9">
        <div class="card">
            <div class="card-body">
<?php if (has_error($formdata, 'sub-title')): ?>
                <div class="alert-danger mb-3 p-3">
                    <?php echo get_error($formdata, 'sub-title'); ?>
                </div>
<?php endif; ?>
                <input type="text" name="sub-title" class="form-control mb-3" placeholder="Title"
                    value="<?php echo get_value($formdata, 'sub-title'); ?>">

<?php if (has_error($formdata, 'reason')): ?>
                <div class="alert-danger mb-3 p-3">
                    <?php echo get_error($formdata, 'reason'); ?>
                </div>
<?php endif; ?>
                <textarea name="reason" rows="8" cols="80" placeholder="The reason why you're requesting an extension." class="form-control mb-3"><?php echo get_value($formdata, 'reason'); ?></textarea>

<?php if (has_error($formdata, 'sub-date')): ?>
            <div class="alert-danger mb-3 p-3">
                <?php echo get_error($formdata, 'sub-date'); ?>
            </div>
<?php endif; ?>
                <div class="form-group row">
                    <label for="input-sub-date" class="col-sm-3 col-form-label">Submission Date:</label>
                    <div class="col-sm-9">
                        <input type="text" name="sub-date" class="form-control mb-3" placeholder="01/01/2019"
                            id="input-sub-date" value="<?php echo get_value($formdata, 'sub-date'); ?>">
                    </div>
                </div>
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
