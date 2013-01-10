<div class="span8 well">
    <form action="Galleries/selectImages" method="post">
        <?php if (isset($images)): ?>
            <ul class="thumbnails">
                <?php foreach ($images as $image) : ?>
                    <li class="span2">
                        <div class="thumbnail">
                            <img src="<?php echo $image->path ?>" width="100" height="100">
                            <p> <input type="checkbox" name="selectedImage[<?php echo $image->id ?>]"></p>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <input type="submit" value="Select">
    </form>
</div>