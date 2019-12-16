<!DOCTYPE html>
<html>
<head>
    <?php include_once("script_link.php");?>
</head>
<body>
<div class="container-fluid col-md-4">
    <div class="login_wrapper" style="">
        <div style="position:relative;margin-top:100px">
            <section class="">

                <form method="post" action="submit_post/login.php" class="" style="padding: 5px;">
                    <div class="form-group text-center">
                        <h1>Migration Login</h1>
                    </div>
                    <div class="container-fluid" style="<?=$errTitleStyle?>"><?php echo $errMsg; ?></div>
                    <div class="form-group">
                        <label for="email">Username</label>
                        <input type="text" id="user_name" class="form-control" placeholder="" name="user_name" style="<?=$errStyle?>"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder=""  name="user_password" style="<?=$errStyle?>"/>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary btn-block btn-round" value="Log In" />
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>