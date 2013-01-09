function AddNextInputFields()
{
    form = document.getElementById("uploadImages");
    form.innerHTML+="<p>Image <input type='file' name='image[]'></p>";
}

