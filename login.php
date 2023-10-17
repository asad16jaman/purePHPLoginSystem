<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <?php include "./nav.php" ?>

    <?php
        if(isset($_SESSION['islogin'])){
            header("Location: wellcom.php");
        }
        $dataerror = false;
        $alertmessages = '';
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $_POST['username'];
            $pass = $_POST['pass'];
            include "./conn.php";
            $sql = "SELECT * FROM profile where username='$username'";
            $result = mysqli_query($cnct,$sql);
            if(mysqli_num_rows($result)==1){
                $row = mysqli_fetch_assoc($result);
                if (password_verify($pass, $row["password"])){
                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['islogin'] = true;
                    header("Location: wellcom.php");
                }else{
                    $dataerror = true;
                }
                
                
            }else{
                $dataerror = true;
            }
        }
        if($dataerror){
           echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
           <strong> Hy! '.$username.'!</strong> inter valid username and password
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
        }
    ?>

    <div class="container">
        <h1 class="text-center my-2">Login page..</h1>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>