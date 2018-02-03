<div class="tm-home-img-container">
    <div>
        Create Blog
    </div>
    <img src="/images/008.jpg" alt="Image" class="hidden-lg-up img-fluid">
</div>

<!-- include summernote css/js -->
<link href="/assets/summernote/dist/summernote.css" rel="stylesheet">
<script src="/assets/summernote/dist/summernote.js"></script>
<section class="tm-section">
    <div class="container">
        <input type="text" class="form-control" placeholder="Title">
        <form method="post">
            <textarea id="summernote" name="editordata"></textarea>
        </form>
        <input type="submit" value="Save" class="btn btn-success btn-lg" style="width: 100%;">
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
