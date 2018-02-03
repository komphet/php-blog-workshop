<?php
$errors = [];
$requests = [];

if (isset($_POST['username'])) {
    require "system/config.php";
    $inputs = [
        'username',
        'password',
        'password_confirmation',
        'email',
        'firstname',
        'lastname'
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

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE username = '" . $requests['username'] . "' OR email = '" . $requests['email'] . "';")) > 0) {
        $errors['username'] = "Username or Email has been taken!";
    }

    if (count($errors) <= 0) {
        $query = mysqli_query($conn, "INSERT INTO users VALUES(NULL,"
            . "'" . $requests['username'] . "',"
            . "'" . md5($requests['password']) . "',"
            . "'" . $requests['email'] . "',"
            . "'" . $requests['firstname'] . "',"
            . "'" . $requests['lastname'] . "',"
            . "NOW(),NOW()"
            . ");") or die(mysqli_error($conn));
        if ($query) {
            echo "<meta http-equiv=\"refresh\" content=\"0;url=/?page=login&msg=". urlencode("Registration successfully. Please sign in.")."\">";
            echo "Redirecting...";
            exit();
        }
    }
}
?>

<div class="tm-home-img-container">
    <div>
        Register
    </div>
    <img src="/images/008.jpg" alt="Image" class="hidden-lg-up img-fluid">
</div>

<section class="tm-section">
    <div class="container">
        <form action="/?page=register" method="post">
            <div class="col-sm-8 col-md-offset-2">
                <fieldset>
                    <legend>Personal Information</legend>
                    <div class="row">
                        <div class="col-sm-6 m-b-1">
                            <input value="<?php echo array_key_exists("firstname", $requests) ? $requests['firstname'] : ''; ?>"
                                   type="text" class="form-control" name="firstname" placeholder="Firstname">
                            <?php if (array_key_exists("firstname", $errors)): ?>
                                <div class="text-danger"><?php echo $errors['firstname']; ?></div>
                            <?php endif ?>
                        </div>
                        <div class="col-sm-6 m-b-1">
                            <input value="<?php echo array_key_exists("lastname", $requests) ? $requests['lastname'] : ''; ?>" type="text" class="form-control" name="lastname" placeholder="Lastname">
                            <?php if (array_key_exists("lastname", $errors)): ?>
                                <div class="text-danger"><?php echo $errors['lastname']; ?></div>
                            <?php endif ?>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>System Information</legend>
                    <div class="row">
                        <div class="col-sm-6 m-b-1">
                            <input value="<?php echo array_key_exists("username", $requests) ? $requests['username'] : ''; ?>" type="text" class="form-control" name="username" placeholder="Username">
                            <?php if (array_key_exists("username", $errors)): ?>
                                <div class="text-danger"><?php echo $errors['username']; ?></div>
                            <?php endif ?>
                        </div>
                        <div class="col-sm-6 m-b-1">
                            <input value="<?php echo array_key_exists("email", $requests) ? $requests['email'] : ''; ?>" type="email" class="form-control" name="email" placeholder="Email">
                            <?php if (array_key_exists("email", $errors)): ?>
                                <div class="text-danger"><?php echo $errors['email']; ?></div>
                            <?php endif ?>
                        </div>
                        <div class="col-sm-6 m-b-1">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <?php if (array_key_exists("password", $errors)): ?>
                                <div class="text-danger"><?php echo $errors['password']; ?></div>
                            <?php endif ?>
                        </div>
                        <div class="col-sm-6 m-b-1">
                            <input type="password" class="form-control" name="password_confirmation"
                                   placeholder="Retype Password">
                            <?php if (array_key_exists("password_confirmation", $errors)): ?>
                                <div class="text-danger"><?php echo $errors['password_confirmation']; ?></div>
                            <?php endif ?>
                        </div>
                    </div>
                </fieldset>
                <input type="submit" value="REGISTER" class="btn btn-primary btn-lg" style="width: 100%;">
            </div>
        </form>
    </div>
</section>

