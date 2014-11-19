<?php
    $page_title = 'Home';
    include('header.php');
?>

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form action="/admin.php" method="POST">
                            <input type="text" name="username" placeholder="Name" />
                            <input type="password" name="password" placeholder="Password" />
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
            </div>
        </div>
    </section><!--/form-->

<?php include('footer.php'); ?>
