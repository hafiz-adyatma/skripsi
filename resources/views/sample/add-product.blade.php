<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- <form action="{{ url('api/product/store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="name"> <br>
        <input type="file" name="photo" placeholder="photo"> <br>
        <input type="text" name="price" placeholder="price"> <br>
        <input type="text" name="color" placeholder="color"> <br>
        <input type="text" name="description" placeholder="description">
        <button type="submit">Save</button>
    </form> -->
    <h1>Create Product</h1>
    <form action="{{ url('api/product/store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Name:</label>
            <input type="text" name="name">
        </div>
        <div>
            <label>Photo:</label>
            <input type="file" name="photo">
        </div>
        <div>
            <label>Price:</label>
            <input type="text" name="price">
        </div>
        <div>
            <label>Color:</label>
            <input type="text" name="color">
        </div>
        <div>
            <label>Description:</label>
            <textarea name="description"></textarea>
        </div>
        <div id="sizes">
            <h4>Sizes</h4>
            <div>
                <label>Size:</label>
                <input type="text" name="sizes[0][size]">
                <label>Stock:</label>
                <input type="number" name="sizes[0][stock]">
            </div>
        </div>
        <button type="button" onclick="addSize()">Add Size</button>
        <button type="submit">Create</button>
    </form>

    <script>
        let sizeCount = 1;

        function addSize() {
            const sizesDiv = document.getElementById('sizes');
            const newSizeDiv = document.createElement('div');
            newSizeDiv.innerHTML = `
                <label>Size:</label>
                <input type="text" name="sizes[${sizeCount}][size]">
                <label>Stock:</label>
                <input type="number" name="sizes[${sizeCount}][stock]">
            `;
            sizesDiv.appendChild(newSizeDiv);
            sizeCount++;
        }
    </script>
</body>

</html>