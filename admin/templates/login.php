<!DOCTYPE html>

<html lang="en-us" >

<head>
    <title>Log in | MSF site admin</title>
    <link rel="stylesheet" type="text/css" href="static/login/login.css" />
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
                    <?php echo( empty($erreur['notAdmin']) ? "" : "<p>".$erreur['notAdmin']."</p>") ?>
                    <?php echo( empty($erreur['verification']) ? "" : "<p>".$erreur['verification']."</p>") ?>
                    <div class="form-row">
                        <label class="required" for="email">Email:</label>
                        <?php $login_form->echoInput('email'); ?>
                        <?php echo( empty($erreur['compte']) ? "" : "<p>".$erreur['compte']."</p>") ?>
                    </div>
                    <div class="form-row">
                        <label class="required" for="mdp">Password:</label>
                        <?php $login_form->echoInput('mdp'); ?>
                        <?php echo( empty($erreur['mdp']) ? "" : "<p>".$erreur['mdp']."</p>") ?>
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
