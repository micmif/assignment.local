<?php
    include 'libraries/database.php';
    include 'libraries/login-check.php';

    include 'template/header.php';

//Different users will have their personal extentions
    $sub_title = get_all_extentions($_COOKIE['id']);
?>

<header class="page-header row no-gutters py-4 border-bottom">
    <div class="col-12">
        <h6 class="text-center text-md-left">Extention Requests</h6>
        <h3 class="text-center text-md-left">All Extentions</h3>
    </div>
</header>

<div class="row content">
    <div class="col">

        <div class="card">
            <div class="card-header border-bottom-0">
              <div class="float-right">
                    <a href="/extension-add.php">New Extention</a>
                </div>
                <h6 class="m-0">Extention</h6>
            </div>

            <div class="card-body p-0 text-center">
                <table class="table mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Reason</th>
                            <th scope="col">Date</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
<?php while($row = mysqli_fetch_assoc($sub_title)): ?>
                        <tr>
                            <td><span class="counter"></span></td>
                            <td><?php echo $row['sub-title']; ?></td>
                            <td><?php echo $row['reason']; ?></td>
                            <td><?php echo $row['sub-date']; ?></td>
                            <td>
                                <a href="ext-delete.php?id=<?php echo $row['sub_title']; ?>">
                                    <i class="icon fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>

<?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>


<?php include 'template/footer.php'; ?>
