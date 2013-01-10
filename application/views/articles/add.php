<div class="well">
    <?php foreach($messages as $message): ?>
    <div class="alert alert-success">
        <?php echo $message; ?>
    </div>
    <?php endforeach; ?>
    <h2>Add new article</h2>
    <form method="post" action="" class="form-horizontal">
        <div class="control-group">
            <label class="control-label" for="Title">Article title</label>
            <div class="controls">
                <input type="text" id="articleTitle" name="Title" placeholder="Article title" value="<?php echo isset($_POST['Title']) ? $_POST['Title'] : '';?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="Content">Article content</label>
            <div class="controls">
                <textarea id="articleContent" name="Content" rows="10"><?php echo isset($_POST['Content']) ? $_POST['Content'] : '';?></textarea>
            </div>
        </div>
        <button class="btn btn-success" type="submit">Add article</button>
        <button class="btn" type="reset">Rest form</button>
    </form>
</div>