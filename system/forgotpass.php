<?php
$errors = [];
$requests = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require "system/config.php";
    if (is_null($_SESSION['step'])) {
        $inputs = [
            'username',
            'email',
            'firstname',
            'lastname',
        ];
        $errors = [];
        foreach ($inputs as $input) {
            $request = $_POST[$input];
            if (is_null($request) || $request == '') {
                $errors[$input] = ucfirst($input) . " is required!";
            }
            $requests[$input] = $request;
        }
        $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '" . $requests['username'] . "' AND email = '" . $requests['email'] . "' AND firstname = '" . $requests['firstname'] . "' AND lastname = '" . $requests['lastname'] . "';") or die(mysqli_error($conn));
        $count = mysqli_num_rows($query);
        if ($count <= 0) {
            $errors[] = "Information is invalid!";
        }
        if (count($errors) <= 0) {
            $user = mysqli_fetch_assoc($query);
            $_SESSION['step'] = 2;
            $_SESSION['userId'] = $user['id'];
        }

    } elseif ($_SESSION['step'] == 2) {
        $inputs = [
            'password',
            'password_confirmation',
        ];
        $errors = [];
        foreach ($inputs as $input) {
            $request = $_POST[$input];
            if (is_null($request) || $request == '') {
                $errors[$input] = ucfirst($input) . " is required!";
            }
            $requests[$input] = $request;
        }
        if ($requests['password'] != $requests['password_confirmation']) {
            $errors['password_confirmation'] = "Password confirmation do not match!";
        }

        if (count($errors) <= 0) {
            mysqli_query($conn, "UPDATE users SET password = '" . md5($_POST['password']) . "' WHERE id = " . $_SESSION['userId']) or die(mysqli_error($conn));
            session_destroy();
            echo "<meta http-equiv=\"refresh\" content=\"0;url=/?page=login&msg=" . urlencode("Password has reset successfully.") . ".\">";
            echo "Redirecting...";
            exit();
        }
    }
}
?>
<div class="tm-home-img-container">
    <div>
        Forgot Password
    </div>
    <img src="/images/008.jpg" alt="Image" class="hidden-lg-up img-fluid">
</div>

<section class="tm-section">
    <div class="container">
        <form action="/?page=forgotpass" method="post">
            <div class="col-sm-8 col-md-offset-2">
                <?php if (count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if (is_null($_SESSION['step'])): ?>
                    <div class="row">
                        <div class="col-sm-6 m-b-1">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="col-sm-6 m-b-1">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                        <div class="col-sm-6 m-b-1">
                            <input type="text" class="form-control" name="firstname" placeholder="Firstname">
                        </div>
                        <div class="col-sm-6 m-b-1">
                            <input type="text" class="form-control" name="lastname" placeholder="Lastname">
                        </div>
                    </div>
                <?php elseif ($_SESSION['step'] == 2): ?>
                    <div class="row">
                        <div class="col-sm-6 m-b-1">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="col-sm-6 m-b-1">
                            <input type="password" class="form-control" name="password_confirmation"
                                   placeholder="Retype Password">
                        </div>
                    </div>
                <?php endif; ?>
                <input type="submit" value="Reset Password" class="btn btn-primary btn-lg" style="width: 100%;">
                <div class="row">
                    <div class="col-sm-12">
                        Do not have account? <a href="/?page=register">Register</a> or <a href="/?page=login">Login</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
