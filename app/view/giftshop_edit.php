<form method="post" enctype="multipart/form-data">
    <div>
        <article>
            <label for="image">Image</label><br>
            <input type="file" name="image" id="image">Choose your image</input>  
        </article>
    </div>

    <div>
        <article>
            <label for="Name">Name</label><br>
            <input type="text" id="name" name="name">
        </article>
    </div>

    <div>
        <article>
            <label for="content">Price</label><br>
            <textarea name="price" id="price"></textarea>
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
            <input type="submit" id="edit" name="edit" value="Edit">
        </article>
    </div>
</form>