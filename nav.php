<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">LoginSystem</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
            <div class=" flex-grow-1">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-center">

                    <?php 
                        session_start();
                        if(isset($_SESSION['islogin'])){
                            echo '<li class="nav-item">
                            <a class="nav-link" href="#">Profile</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                          </li>';
                        }else{
                            echo '<li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./login.php">Login</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="./register.php">Registration</a>
                          </li>';
                        }

                    ?>
                  </ul>
            </div>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>