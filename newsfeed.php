<?php
    include 'libraries/database.php';
    include 'libraries/login-check.php';

    // pages can be built using templates.
    include 'template/header.php';
?>

<div class="card">
  <div class="card-body">
    <div class="card">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
      <img src="..." class="card-img-top" alt="...">
    </div>

    <div class="card">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
      <img src="..." class="card-img-top" alt="...">
    </div>
  
  </div>
</div>


<?php
    include 'template/footer.php';
?>
