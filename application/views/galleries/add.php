<form action="Galleries/operation" method="post">
    <div class="offset 2 span5">

        <p>
            Title:<input type="text" name="galleryName">
            <input class="btn"  type="submit" value="Submit" name="action">
        </p>
    </div>
    <div class="span8">
        <input class="btn"  type="submit" value="Upload" name="action">
        <input class="btn"  type="submit" value="Select" name="action">
    </div>
    <div class="span8">
        <?php if (isset($images)): ?>
            <ul class="thumbnails">
                <?php foreach ($images as $image) : ?>
                    <li class="span2">
                        <div class="thumbnail">
                            <img src="<?php echo $image['path'] ?>" width="100" height="100">
                            <input type="text" name="description[<?php echo $image['id'] ?>]" class="span2" <?php echo isset($description[$image['id']]) ? 'value="' . $description[$image['id']] . '"' : '' ?>">
                            <p> <input type="checkbox" name="selectedImage[<?php echo $image['id'] ?>]" <?php echo isset($selectedImage[$image['id']]) ? 'checked="checked"' : '' ?>></p>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</form>