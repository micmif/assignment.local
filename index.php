<?php
    include 'libraries/database.php';
    include 'libraries/login-check.php';

    // pages can be built using templates.
    include 'template/header.php';
?>

<header class="page-header row no-gutters py-4 border-bottom">
    <div class="col-12">
        <h3 class="text-center text-md-left">Updates</h3>
    </div>
</header>

              <div class="card gedf-card">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                                <div class="form-group">
                                    <label class="sr-only" for="message">post</label>
                                    <textarea class="form-control" id="message" rows="3" placeholder="What are you thinking?"></textarea>
                                </div>
                        </div>
                        <div class="btn-toolbar justify-content-between">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary">share</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Post 1-->
                <div class="card gedf-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="35" img src="icon.png" alt="">
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0">Michela Mifsud</div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="text-muted h7 mb-2"> <i class="far fa-clock"></i>10 min ago</div>
                        <a class="card-link" href="#">
                            <h5 class="card-title">Lorem ipsum dolor sit amet, consectetur adip.</h5>
                        </a>

                        <p class="card-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo recusandae nulla rem eos ipsa praesentium esse magnam nemo dolor
                            sequi fuga quia quaerat cum, obcaecati hic, molestias minima iste voluptates.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-link"><i class="far fa-thumbs-up"></i> Like</a>
                        <a href="#" class="card-link"><i class="far fa-comment"></i> Comment</a>
                    </div>
                </div>
                <!-- End Post 1-->

                <!--Post 2-->
                <div class="card gedf-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="35" img src="icon.png" alt="">
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0">Andrew Tanti</div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="text-muted h7 mb-2"> <i class="far fa-clock"></i>15 min ago</div>
                        <a class="card-link" href="#">
                            <h5 class="card-title">Lorem ipsum dolor sit amet, consectetur adip.</h5>
                        </a>

                        <p class="card-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo recusandae nulla rem eos ipsa praesentium esse magnam nemo dolor
                            sequi fuga quia quaerat cum, obcaecati hic, molestias minima iste voluptates.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-link"><i class="far fa-thumbs-up"></i> Like</a>
                        <a href="#" class="card-link"><i class="far fa-comment"></i> Comment</a>
                    </div>
                </div>
                <!-- End Post 2-->

                <!--Post 3-->
                <div class="card gedf-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="35" img src="icon.png" alt="">
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0">Andrew Tanti</div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="text-muted h7 mb-2"> <i class="far fa-clock"></i>15 min ago</div>
                        <a class="card-link" href="#">
                            <h5 class="card-title">Lorem ipsum dolor sit amet, consectetur adip.</h5>
                        </a>

                        <p class="card-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo recusandae nulla rem eos ipsa praesentium esse magnam nemo dolor
                            sequi fuga quia quaerat cum, obcaecati hic, molestias minima iste voluptates.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-link"><i class="far fa-thumbs-up"></i> Like</a>
                        <a href="#" class="card-link"><i class="far fa-comment"></i> Comment</a>
                    </div>
                </div>
                <!-- End Post 3-->
            </div>
        </div>
    </div>


<?php
    include 'template/footer.php';
?>
