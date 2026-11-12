<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    
    <?php if (session()->has('errors')): ?>
        <ul>
            <?php foreach (session()->get('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="/products" method="post">
        <div>
            <label for="product_code">Product Code</label><br>
            <input type="text" id="product_code" name="product_code">
        </div>
        <br>
        <div>
            <label for="name">Name</label><br>
            <input type="text" id="name" name="name">
        </div>
        <br>
        <div>
            <label for="description">Description</label><br>
            <input type="text" id="description" name="description">
        </div>
        <br>
        <div>
            <label for="unit">Unit</label><br>
            <input type="text" id="unit" name="unit">
        </div>
        <br>
        <div>
            <label for="minimum_stock">Minimum Stock</label><br>
            <input type="text" id="minimum_stock" name="minimum_stock">
        </div>
        <br>
        <div>
            <label for="status">Status</label><br>
            <input type="text" id="status" name="status">
        </div>
        <br>
        <button type="submit">Save Product</button>
        
    </form>
    <br>
    <a href="/products">Back to Product List</a>
</body>
</html>