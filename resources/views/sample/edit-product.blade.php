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
    <h1>Edit Product</h1>
    <form action="{{ url('api/product/update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ $product->name }}">
        </div>
        <div>
            <label>Photo: (Optional)</label>
            <input type="file" name="photo">
        </div>
        <div>
            <label>Price:</label>
            <input type="number" name="price" value="{{ $product->price }}">
        </div>
        <div>
            <label>Color:</label>
            <input type="text" name="color" value="{{ $product->color }}">
        </div>
        <div>
            <label>Description:</label>
            <textarea name="description">{{ $product->description }}</textarea>
        </div>
        <div id="sizes">
            <h4>Sizes</h4>
            @foreach($product_detail as $key => $d)
            <div>
                <label>Size:</label>
                <input type="text" name="sizes[{{$key}}][size]" value="{{ $d->size }}">
                <label>Stock:</label>
                <input type="number" name="sizes[{{$key}}][stock]" value="{{ $d->stock }}">
            </div>
            @endforeach
        </div>
        <button type="submit">Update</button>
    </form>
</body>

</html>