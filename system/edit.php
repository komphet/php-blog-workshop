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
        <form action="/?page=create" method="post">
            <input type="text" name="title" class="form-control" placeholder="Title">
            <textarea id="summernote" name="content"></textarea>
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
