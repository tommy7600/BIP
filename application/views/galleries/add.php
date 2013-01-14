<form action="Galleries/add" method="post">
    <div class="offset 2 span5">
        <?php if (isset($error)): ?>
            <div class="alert alert-error">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <p>
            Title:<input type="text" name="galleryName">
            <input class="btn"  type="submit" value="Submit">
        </p>
    </div>
</form>