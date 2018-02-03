<?php
require "system/config.php";
$blogs = mysqli_query($conn, "SELECT blogs.id,username, title, content, blogs.created_at  FROM blogs JOIN users ON users.id = blogs.user_id;") or die(mysqli_error($conn));
?>
<div class="tm-home-img-container">
    <div>
        Welcome to CSAG BLOG
    </div>
    <img src="/images/008.jpg" alt="Image" class="hidden-lg-up img-fluid">
</div>
<section class="tm-section">
    <div class="container-fluid">
        <div class="row">
            <?php while ($row = mysqli_fetch_array($blogs)): ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 m-b-3">
                    <div class="tm-content-box" style="height: 300px;">
                        <h4 class="tm-margin-b-20 tm-gold-text" style="width: 100%; height: 1.5em; overflow: hidden;">
                            <?php echo substr(strip_tags(html_entity_decode($row['title'])), 0, 100); ?>
                        </h4>
                        <p class="tm-margin-b-20" style="max-height: 150px; overflow: hidden;">
                            <?php echo substr(strip_tags(html_entity_decode($row['content'])), 0, 70); ?>
                            <br>
                            At:
                            <?php echo date_create_from_format("Y-m-d H:i:s",$row['created_at'])->format("d/m/Y"); ?>
                            <br>
                            By:
                            <?php echo $row['username']; ?>
                        </p>
                        <a href="/?page=show&id=" class="tm-btn text-uppercase">Read More</a>

                    </div>
                </div>
            <?php endwhile; ?>
        </div> <!-- row -->
    </div>
</section>