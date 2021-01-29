<?php

if (!is_writable(session_save_path())) {
//    echo 'Session path "'.session_save_path().'" is not writable for PHP!';
}

if (!empty($_POST['Submit']) && $_POST['Submit'] == 'Submit') {
    $Username = $_POST['username'];
    $Password = $_POST['password'];
    $auth_message = user_authorization($Username, $Password, 'TEST-LOGIN', 1);
    if ($auth_message == 'GOOD') {
        $query = "SELECT count(*) as total FROM vicidial_users VU
JOIN
vicidial_user_groups VUG
ON
VUG.user_group = VU.user_group

WHERE VUG.status = 'Y' AND VU.user = '".$Username."' AND VU.pass = '".$Password."'";
        $GroupActive = $database->query($query)->fetchAll(PDO::FETCH_ASSOC);

        if($GroupActive[0]['total'] == 0){
            $_SESSION['msg'] = "You donot have a permission to log in!!";
        }else{
            $user_auth = 1;
            $_SESSION['Login']['user'] = $Username;
            $_SESSION['Login']['password'] = $Password;

            $role_id = user_permissions($Username);
            $stmtRole = "select m.key as module, rp.create, rp.edit, rp.view, rp.delete
                     from `role_permissions`as rp
                    inner join modules m on m.id = rp.module_id
                    inner join roles r on r.id and  rp.role_id
                    where rp.role_id = $role_id";

            $userPermissions = $DBUTG->query($stmtRole)->fetchAll(PDO::FETCH_ASSOC);
            if($userPermissions && count($userPermissions)>0) {
                foreach($userPermissions as $permission){
                    $_SESSION['role'][$permission['module']] = $permission;
                }
            }
            login_user_setup($database, $Username,$DBUTG);
            header('location:'.base_url('welcome'));
            exit;
        }
    }else if ($auth_message == 'BAD') {
        //$_SESSION['msg'] = "You do not have permission to be here";

        $_SESSION['msg'] = "Invalid Username and/or password ";
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
                    <div class="d-none d-lg-block col-lg-4">
                        <div class="slider-light">
                            <div class="slick-slider">
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-amy-crisp" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('../assets/images/bg1.jpg');"></div>
                                        <div class="slider-content"><h3>One Platform, Every Customer</h3>
                                            <p>UTGONE Gateway has enhanced functionality and data analytics to give you deeper understanding of your customers and  the tools to connect with them for unparalleled results.</p></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-amy-crisp" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('../assets/images/bg2.jpg');"></div>
                                        <div class="slider-content"><h3>REST API</h3>
                                            <p>The UTGONE API is built on the (REST) architecture. It uses the HTTPS protocol to communicate with UTGONE platform. Easy to use in cloud-based applications, as well as across multiple platforms and programming languages</p></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('../assets/images/bg4.jpg');"></div>
                                        <div class="slider-content"><h3>GAMIFICATION</h3>
                                            <p>Associates perform better with goals and rewards. Happier Associates means better performance, better performance equals greater results.</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">

                        <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                            <div class="mb-5"><img src="https://www.utgone.com/assets/img/logo/logo.png" ></div>

                            <?php if (!empty($_SESSION['msg']) && $_SESSION['msg']) { ?>

                                    <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="margin:-3px -11px 0 0;">×</button>
                                    <strong>ERROR:</strong>&nbsp;<?php
                                            echo $_SESSION['msg'];
                                            unset($_SESSION['msg']);
                                            ?>
                                </div>
                            <?php } ?>
                            <h4 class="mb-0">
                                <span class="d-block">Welcome back,</span>
                                <span>Please sign in to your account.</span></h4>
                            <div class="divider row"></div>
                            <div>
                                <form id="login-form" class="form" action="" method="post" autocomplete="">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="exampleEmail" class="">Username</label>
                                                <input type="text" class="form-control rounded" placeholder="username"  name="username" required=""/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="examplePassword" class="">Password</label>
                                                <input type="password" class="form-control rounded" placeholder="Password"  name="password" required=""/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="position-relative form-check">
                                        <input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
                                        <label for="exampleCheck" class="form-check-label">Keep me logged in</label>
                                    </div>
                                    <div class="divider row"></div>
                                    <div class="d-flex align-items-center">
                                        <div class="ml-auto">
                                            <!--<a href="javascript:void(0);" class="btn-lg btn btn-link">Recover Password</a>-->
                                            <button type="submit" class="btn btn-primary btn-lg" name="Submit" value="Submit">Login to Dialler</button>
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
