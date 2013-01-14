<form action="Galleries/edit/<?php echo $galleryId ?>" method="post">
    <div class="offset 2 span5">
        <?php if (isset($error)): ?>
            <div class="alert alert-error">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <p>
            Title:<input type="text" name="galleryName" value="<?php echo $galleryTitle ?>">
            <input class="btn"  type="submit" value="Submit">
        </p>
    </div>
    <div class="span8">
        <?php foreach ($images as $image) : ?>
            <?php var_dump($image); ?>
        <?php endforeach; ?>
        <?php if (isset($images)): ?>
            <ul class="thumbnails">
                <?php foreach ($images as $image) : ?>
                    <li class="span2">
                        <div class="thumbnail">
                            <img src="<?php echo $image->image->path ?>" width="100" height="100">
                            <input type="text" name="description[<?php echo $image->image->id ?>]" value="<?php echo $image->description->description ?>">
                            <input type="checkbox" name="selected[<?php echo $image->image->id ?>]" checked="checked">
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</form>
<a href="galleries/uploadImages" class="btn">Upload</a>
<a href="galleries/selectImages" class="btn">Select</a>