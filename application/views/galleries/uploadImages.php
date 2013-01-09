<div class="span7">
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