<?php
$errors = [];
$requests = [];

if (isset($_POST['username'])) {
    require "system/config.php";
    $inputs = [
        'username',
        'password',
    ];
    $errors = [];
    foreach ($inputs as $input) {
        $request = $_POST[$input];
        if (is_null($request) || $request == '') {
            $errors[$input] = ucfirst($input) . " is required!";
        }
        $requests[$input] = $request;
    }
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '" . $requests['username'] . "' AND password = '" . md5($requests['password']) . "';") or die(mysqli_error($conn));
    $count = mysqli_num_rows($query);
    if($count <= 0){
        $errors['username'] = "Username or Password is invalid!";
    }
    if (count($errors) <= 0) {
        $user = mysqli_fetch_assoc($query);
        $_SESSION['user'] = $user;
        echo "<meta http-equiv=\"refresh\" content=\"0;url=/?page=home&msg=". urlencode("Login successfully. Welcome ".$user['username']).".\">";
        echo "Redirecting...";
        exit();
    }
}
?>

<div class="tm-home-img-container">
    <div>
        Login
    </div>
    <img src="/images/008.jpg" alt="Image" class="hidden-lg-up img-fluid">
</div>

<section class="tm-section">
    <div class="container">
        <form action="/?page=login" method="post">
            <div class="col-sm-8 col-md-offset-2">
                <div class="row">
                    <div class="col-sm-6 m-b-1">
                        <input value="<?php echo array_key_exists("username", $requests) ? $requests['username'] : ''; ?>"
                               type="text" class="form-control" name="username" placeholder="Username">
                        <?php if (array_key_exists("username", $errors)): ?>
                            <div class="text-danger"><?php echo $errors['username']; ?></div>
                        <?php endif ?>
                    </div>
                    <div class="col-sm-6 m-b-1">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>
                <input type="submit" value="Login" class="btn btn-primary btn-lg" style="width: 100%;">
                <div class="row">
                    <div class="col-sm-6">
                        Do not have account? <a href="/?page=register">Register</a>
                    </div>
                    <div class="col-sm-6" align="right">
                        <a href="/?page=forgotpass">Forgot password</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

