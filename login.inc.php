<?php

session_start();

$notifications = array();

if(!empty($_POST['login'])) {

    if(empty($_POST['username']) || empty($_POST['password'])) {
        $notifications[] = 'Login failed! Please provide a username and password.';
    }

    if(count($notifications) == 0) {
        try {
            $dbh = new PDO('mysql:dbname=guestspot;host=127.0.0.1', 'root', '');

            $sql = "SELECT username FROM user WHERE username = :username AND password = :password";
            $sth = $dbh->prepare($sql);
            $sth->execute(array(
                ':username' => $_POST['username'],
                ':password' => $_POST['password']
            ));

            $result = $sth->fetch(PDO::FETCH_ASSOC);

            if($result) {
                // Set session details and redirect user to members page
                session_regenerate_id();
                $_SESSION['logged_in'] = true;
                $_SESSION['verified'] = $result['verified'];
                $_SESSION['created'] = time();
                $_SESSION['ua'] = $_SERVER['HTTP_USER_AGENT'] . 'fable3';

                header('Location: index.php');
            } else {
                $notifications[] = "Username or Password incorrect.";
            }
        } catch (PDOException $e) {
            echo 'We\'re having database issues at the moment. Don\'t worry, we\'re getting it sorted!';
        }
    }

} elseif(!empty($_POST['forgot_password'])) {
    // Not yet implemented
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Custom style for url -- adding icon-->
  <link rel="shortcut icon" type="image/x-icon" href="image/ub.png">
</head>

<body style=background-image:url("image/ubob.jpg"); >
  <div class="container">
  

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-8 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" method="POST" action="">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Enter Username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" name = "password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Enter Password" required>
                    </div>
                    <input type="submit" name="login" value="Login" class="btn btn-outline-danger btn-user btn-block">
                    
                  </form>
                     <?php if(count($notifications) > 0) : ?>
                    <ul>
                        <?php foreach($notifications as $notification) : ?>
                            <li><?php print $notification ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>

