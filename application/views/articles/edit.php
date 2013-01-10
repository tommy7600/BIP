<div class="well">
    <?php foreach($errors as $error): ?>
    <div class="alert alert-error">
        <?php echo $error; ?>
    </div>
    <?php endforeach; ?>
     <?php foreach($messages as $message): ?>
    <div class="alert alert-info">
        <?php echo $message; ?>
    </div>
    <?php endforeach; ?>
    <?php if($articleLoaded === TRUE): ?>
    <h2>Edit article</h2>
    <form method="post" action="" class="form-horizontal">
        <div class="control-group">
            <label class="control-label" for="Title">Article title</label>
            <div class="controls">
                <input type="text" id="articleTitle" name="Title" placeholder="Article title" value="<?php echo $articleTitle;?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="Content">Article content</label>
            <div class="controls">
                <textarea id="articleContent" name="Content" rows="10"><?php echo $articleContent;?></textarea>
            </div>
        </div>
        <button class="btn btn-success" type="submit">Submit!</button>
    </form>
    <?php endif; ?>
</div>