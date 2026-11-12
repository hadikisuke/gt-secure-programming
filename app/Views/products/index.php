<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>

<body>

    <h1>Product List</h1>

    <a href="/products/create">Add Product</a>
    <a href="/products/search">Search Product</a>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Code</th>
                <th>Name</th>
                <th>Unit</th>
                <th>Minimum Stock</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= esc($product['id']) ?></td>
                    <td><?= esc($product['product_code']) ?></td>
                    <td><?= esc($product['name']) ?></td>
                    <td><?= esc($product['unit']) ?></td>
                    <td><?= esc($product['minimum_stock']) ?></td>
                    <td><?= esc($product['status']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>
