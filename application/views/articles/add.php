<div class="well">
    <?php foreach($messages as $message): ?>
    <div class="alert alert-success">
        <?php echo $message; ?>
    </div>
    <?php endforeach; ?>
    <?php foreach($errors as $error): ?>
    <div class="alert alert-alert">
        <?php echo $error; ?>
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
        <?php if($galleries->count() > 0): ?>
        <div class="control-group">
            <label class="control-label" for="Gallery">Gallery</label>
            <div class="controls">
                <select name="Gallery">
                    <?php foreach($galleries as $gallery): ?>
                        <option>None</option>
                        <option value="<?php echo $gallery->gallery_id; ?>"><?php echo $gallery->title->title; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <?php endif; ?>
        <button class="btn btn-success" type="submit">Add article</button>
        <button class="btn" type="reset">Rest form</button>
    </form>
</div>