<?php foreach ($galleries as $gallery): ?>
<a href="galleries/show/<?php echo $gallery->gallery_id ?>"><h4><?php echo $gallery->title->title ?></h4></a>
<?php endforeach ?>