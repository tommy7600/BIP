<div>
    <h4> <?php echo $galleryTitle ?></h4>
</div>
<div class="span8">
    <?php if (isset($images)): ?>
        <ul class="thumbnails">
            <?php foreach ($images as $image) : ?>
            <?php $image->reload(); ?>
                <li class="span2">
                    <div class="thumbnail">
                        <img src="<?php echo $image->image->path ?>" width="100" height="100">
                        <?php echo $image->description->description ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

<a href="galleries/edit/<?php echo $galleryId ?>" class="btn">Edit</a>