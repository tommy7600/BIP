<div class="span7">
    <button type="button" id="nextImage" class="btn" onClick="AddNextInputFields">Add next</button>
    <form action="Galleries/uploadImages" method="post" enctype="multipart/form-data">
        <div id="uploadImages">
            Image <input type="file" name="image">
            Description <input type="text" name="description">
        </div>
        <input type="submit" value="Submit">
    </form>
</div>