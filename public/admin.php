<?php
if(isset($_POST['username']) && isset($_POST['password'])){
    $mysqli = new mysqli("localhost", "root", "root", "three_little_pigs");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT password, salt FROM pigs WHERE username = '$username';";
    $result = $mysqli->query($query);
    if($result->num_rows < 1) //no such user exists
    {
        header('Location: /login.php');
    }
    $userData = $result->fetch_assoc();
    $hash = hash('sha256', $userData['salt'] . hash('sha256', $password) );
    if($hash != $userData['password']) //incorrect password
    {
        header('Location: /login.php');
    }
    $mysqli->close();
} else {
    header('Location: /login.php');
}

$page_title = 'Hidden Admin';
include('header.php');
?>

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="login-form"><!--login form-->
                        <h2>Welcome! You've made it to the Admin section</h2>
                    </div><!--/login form-->
                </div>
            </div>
        </div>
    </section><!--/form-->

<?php include('footer.php'); ?>
