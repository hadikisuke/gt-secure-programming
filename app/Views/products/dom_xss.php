<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>DOM-BASES SIMULASI</h1>
    <p>Masukan Teks Simulasi</p>
    <input type="text" id="userInput">
    <!-- <button onclick="show()">Tampilkan Hasil</button> -->
    <button type="button" id="show">Tampilkan Hasil</button>

    <h2>Hasil</h2>
    <div id="hasil">
        <script src="<?=base_url('js/dom-xss.js')?>"></script>
    </div>
</body>
</html>