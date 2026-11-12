<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Product Search</h1>
    <form action="/products/search" method="get">
        <label for='q'>Kata Kunci : </label>
        <input type="text" id="q" name="q">
        <button type="submit">Cari</button>
    </form>

    <h2>Hasil Pencarian</h2>
    <p>Kamu Mencari : <?=esc($keyword) ?? '' ?></p>
    <a href="/products">Kembali ke Daftar Product</a>
</body>
</html>