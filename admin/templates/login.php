<!DOCTYPE html>

<html lang="en-us" >

<head>
    <title>Log in | MSF site admin</title>
    <link rel="stylesheet" type="text/css" href="static/login.css" />
</head>

<body class="login" data-admin-utc-offset="0">

    <!-- Container -->
    <div id="container">


        <!-- Header -->
        <div id="header">
            <div id="branding">
                <h1 id="site-name"><a href="">Administration</a></h1>
            </div>
        </div>
        <!-- END Header -->



        <!-- Content -->
        <div id="content" class="colM">
            <div id="content-main">

                <form action="" method="post" id="login-form">
                    <div class="form-row">
                        <label class="required" for="username">Username:</label>
                        <?php $login_form->echoInput('username'); ?>
                    </div>
                    <div class="form-row">
                        <label class="required" for="password">Password:</label>
                        <?php $login_form->echoInput('password'); ?>
                    </div>
                    <div class="submit-row">
                        <?php $login_form->submit('Log in'); ?>
                    </div>
                </form>

            </div>
            <br class="clear" />
        </div>
        <!-- END Content -->


        <div id="footer"></div>
    </div>
    <!-- END Container -->

</body>
</html>
