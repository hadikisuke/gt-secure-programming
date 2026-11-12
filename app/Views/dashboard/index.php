<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Secure Programming</title>
</head>

<body>
    <h1>Dashboard</h1>

    <p>
        Selamat datang,
        <?= esc(session()->get('full_name')) ?>.
    </p>

    <p>
        Username:
        <?= esc(session()->get('username')) ?>
    </p>

    <p>
        Role:
        <?= esc(session()->get('role')) ?>
    </p>


    <form action="<?= site_url('logout') ?>" method="post">
        <?= csrf_field() ?>

        <button type="submit">Logout</button>
    </form>

</body>

</html>