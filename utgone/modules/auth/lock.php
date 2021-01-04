<?php
if (!empty($_POST['Submit']) && $_POST['Submit'] == 'Submit') {
    $Username = $_SESSION['Login']['user'];
    $Password = $_POST['password'];
    $auth_message = user_authorization($Username, $Password, 'TEST-LOGIN', 1);
    if ($auth_message == 'GOOD') {
      $_SESSION['CurrentLogin']['Lock'] = 1;
      header('location:'.base_url('welcome'));
      exit;
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Login | UTGONE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">
    <link rel="icon" href="<?php echo publicAssest();?>assets/images/favicon.ico">
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

<link href="../assets/css/main.87c0748b313a1dda75f5.css" rel="stylesheet"></head>

<body>
<div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100">
                <div class="h-100 no-gutters row">

                    <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-12" style="background-image: url('../assets/images/lock.jpg'); height: 100% !important;
    width: 100%;
    background-position: bottom;
    position: fixed;">

                        <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                            <div class="mb-5"><img src="../assets/images/logo/logo.png" ></div>

                            <h4 class="mb-0">
                                <span class="d-block">Screen Locked</span>
                            </h4>
                            <div class="divider row" style="width: 50%; margin-left: 0;"></div>
                            <div>
                                <form id="login-form" class="form" action="" method="post" autocomplete="">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="examplePassword" class="">Enter Password to Unlock  <a href="<?php echo base_url('logout') ?>">Logout</a></label>
                                                <input type="password" class="form-control rounded" placeholder="Password"  name="password" required=""/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <!--<a href="javascript:void(0);" class="btn-lg btn btn-link">Recover Password</a>-->
                                            <button type="submit" class="btn btn-primary btn-lg" name="Submit" value="Submit">Log in</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<script type="text/javascript" src="../assets/js/main.87c0748b313a1dda75f5.js"></script>
</body>
</html>
