<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Bud</title>

        <!-- The Bootstrap CSS file -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.min.css">

        <!-- FontAwesome Icons -->
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>
    </head>
    <body>
        <aside id="sidebar" class="collapse d-block">
            <header class="navbar navbar-light align-items-stretch">
                <h4 class="navbar-brand">Bud</h4>

                <a href="#sidebar" class="toggle-sidebar ml-auto d-block d-md-none border-left" data-toggle="collapse">
                    <i class="icon fas fa-arrow-left"></i>
                </a>
            </header>

            <nav id="sidebar-nav">
                <ul class="nav flex-column">
                    <li class="nav-item dropright">
                        <a href="newsfeed.php" class="nav-link">
                            <i class="icon far fa-newspaper"></i>
                            <span>Home</span>
                        </a>
                    </li>

                        <li class="nav-item dropright">
                        <a href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon far fa-sticky-note"></i>
                            <span>Notes</span>
                        </a>

                        <div class="dropdown-menu">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="notes.php" class="nav-link">
                                        <i class="icon fas fa-bars"></i>
                                        <span>All Notes</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="notes-add.php" class="nav-link">
                                        <i class="icon fas fa-plus"></i>
                                        <span>Add Note</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                  <li class="nav-item dropright">
                  <a href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="icon fas fa-file-signature"></i>
                      <span>Form Submission</span>
                  </a>

                  <div class="dropdown-menu">
                      <ul class="nav">
                          <li class="nav-item">
                              <a href="extension.php" class="nav-link">
                                  <i class="icon fas fa-pencil-alt"></i>
                                  <span>Extension Requests</span>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="extension-add.php" class="nav-link">
                                  <i class="icon fas fa-pencil-alt"></i>
                                  <span>New Extension</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </li>

                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            <i class="icon fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <div id="content">
            <nav class="navbar navbar-light align-items-stretch">
                <a href="#sidebar" class="toggle-sidebar ml-auto d-block d-md-none border-left" data-toggle="collapse">
                    <i class="icon fas fa-bars"></i>
                </a>
            </nav>

            <div class="container-fluid px-4">
