<div class="offset 2 span5">
    <form action="Galleries/add" method="post">
        <p>
            Title:<input type="text" name="galleryName">
            <input type="submit" value="Submit">
        </p>
    </form>
</div>
<div class="span8">
    <a class="btn" href="Galleries/uploadImages">Upload</a>
    <a class="btn" href="Galleries/selectImages">Select</a>
</div>
<div class="span8">
    <?php if (isset($images)): ?>
        <?php foreach ($images as $image) : ?>
        <img src="<?php echo $image['path'] ?>" width="100" height="100"></img>
        <?php endforeach; ?>
    <?php endif; ?>
</div>