<?php
require "system/config.php";
if (!is_null($_GET['id'])) {
    $blog = mysqli_fetch_assoc(mysqli_query($conn, "SELECT blogs.id, title,content, blogs.updated_at, blogs.created_at, username FROM  blogs JOIN users ON users.id = user_id WHERE blogs.id = " . $_GET['id']));
}
if (is_null($_SESSION['user']) || is_null($_GET['id']) || $_SESSION['user']['username'] != $blog['username']) {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=/?msg=" . urlencode("Permission Deny.") . ".\">";
    echo "Redirecting...";
    exit();
}

if (isset($_POST['title'])) {
    $inputs = [
        'title',
        'content',
    ];
    foreach ($inputs as $input) {
        $request = $_POST[$input];
        if (is_null($request) || $request == '') {
            $errors[$input] = ucfirst($input) . " is required!";
        }
        $requests[$input] = htmlentities($request, ENT_QUOTES);
    }
    if (count($errors) <= 0) {
        mysqli_query($conn, "UPDATE blogs SET title = '" . $requests['title'] . "', content = '" . $requests['content'] . "', updated_at = NOW() WHERE id = " . $_GET['id']) or die(mysqli_error($conn));
        echo "<meta http-equiv=\"refresh\" content=\"0;url=/?page=show&id=" . $_GET['id'] . "&msg=" . urlencode("Blog has updated successfully.") . ".\">";
        echo "Redirecting...";
        exit();
    }
}
?>

<div class="tm-home-img-container">
    <div>
        Edit Blog
    </div>
    <img src="/images/008.jpg" alt="Image" class="hidden-lg-up img-fluid">
</div>

<!-- include summernote css/js -->
<link href="/assets/summernote/dist/summernote.css" rel="stylesheet">
<script src="/assets/summernote/dist/summernote.js"></script>
<section class="tm-section">
    <div class="container">
        <?php if (count($errors) > 0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form action="/?page=edit&id=<?php echo $blog['id']; ?>" method="post">
            <input type="text" name="title" value="<?php echo $blog['title']; ?>" class="form-control"
                   placeholder="Title">
            <textarea id="summernote" name="content"><?php echo $blog['content']; ?></textarea>
            <input type="submit" value="Save" class="btn btn-success btn-lg" style="width: 100%;">
        </form>

    </div>
</section>

<script type="text/javascript">
    $(document).ready(function () {
        $('#summernote').summernote({
            height: 500,
            placeholder: "Content"
        });
        $('.note-popover').hide();
    });
</script>
