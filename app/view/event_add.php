<form method="post" enctype="multipart/form-data">
    <div>
        <article>
            <label for="image">Image</label><br>
            <input type="file" name="image" id="image">Choose your image</input>  
        </article>
    </div>

    <div>
        <article>
            <label for="Title">Title</label><br>
            <input type="text" id="title" name="title">
        </article>
    </div>

    <div>
        <article>
            <label for="content">Description</label><br>
            <textarea name="description" id="description"></textarea>
        </article>
    </div>

    <div style="display:none;">
        <article>
            <input type="text" id="id" name="id" value="">
        </article>
    </div>

    <div>
        <article>
            <input type="submit" id="add" name="add" value="Add">
        </article>
    </div>
</form>