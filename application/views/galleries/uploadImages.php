<div class="span7">
    <?php if (isset($error)): ?>
        <div class="alert alert-error">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    <intup type="button" id="nextImage" class="btn" onClick="AddNextInputFields()">Add next</intup>
    <form action="Galleries/uploadImages" method="post" enctype="multipart/form-data">
        <div id="uploadImages">
            <p>
                Image <input type="file" name="image[]">
            </p>
        </div>
        <input type="submit" value="Submit">
    </form>
</div>