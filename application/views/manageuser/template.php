<?php include Kohana::find_file('views', 'template/header') ?>
<div id ="content">
    <?php if ($content): ?>
        <?php include $content ?>
    <?php endif ?>
</div>
<?php include Kohana::find_file('views', 'template/footer') ?>