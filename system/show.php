<?php
if (is_null($_GET['id'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0;url=/?msg=" . urlencode("Blog not found!.") . ".\">";
    echo "Redirecting...";
    exit();
}

require "system/config.php";
$blog = mysqli_fetch_assoc(mysqli_query($conn, "SELECT blogs.id, title,content, blogs.updated_at, blogs.created_at, username FROM  blogs JOIN users ON users.id = user_id WHERE blogs.id = " . $_GET['id']));
?>
<div class="tm-home-img-container">
    <div>
        <div style="width: 100%; height: 1.5em; overflow: hidden; padding: 15px;" align="center">
            <?php echo $blog['title'] ?>
        </div>
        <div style="font-size: .3em !important;" align="center">
            Created: <?php echo $blog['created_at'] ?>
            <br>
            Updated: <?php echo $blog['updated_at'] ?>
            <br>
            By: <?php echo $blog['username'] ?>
            <br>
        </div>
    </div>
    <img src="/images/008.jpg" alt="Image" class="hidden-lg-up img-fluid">
</div>

<section class="tm-section">
    <div class="container">
        <h2>
            <?php echo $blog['title']; ?>
        </h2>
        <?php echo html_entity_decode($blog['content']); ?>
        <hr>
        <table width="100%">
            <tr>
                <td>
                    <a href="/" class="btn btn-primary btn-lg">BACK</a>
                </td>
                <td align="right">
                    <?php if (!is_null($_SESSION['user']) && $_SESSION['user']['username'] == $blog['username']): ?>
                        <a href="/?page=edit&id=<?php echo $blog['id']; ?>" class="btn btn-warning btn-lg">EDIT</a>
                        <a onclick="return confirm('Do you want to delete this blog?')" href="/?page=delete&id=<?php echo $blog['id']; ?>" class="btn btn-danger btn-lg">DELETE</a>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
    </div>
</section>
