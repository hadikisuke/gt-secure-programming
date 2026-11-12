<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Supplier List</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        h1 {
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
        }

        .btn {
            display: inline-block;
            padding: 8px 14px;
            background: #2563eb;
            color: white;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #f3f4f6;
        }
    </style>
</head>

<body>

    <h1>Supplier List</h1>

    <?php if (session()->has('success')): ?>
        <div class="success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <a href="/suppliers/create" class="btn">
        Add Supplier
    </a>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Supplier Code</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            <?php if (!empty($suppliers)): ?>

                <?php foreach ($suppliers as $supplier): ?>

                    <tr>
                        <td>
                            <?= esc($supplier['id']) ?>
                        </td>

                        <td>
                            <?= esc($supplier['supplier_code']) ?>
                        </td>

                        <td>
                            <?= esc($supplier['name']) ?>
                        </td>

                        <td>
                            <?= esc($supplier['address']) ?>
                        </td>

                        <td>
                            <?= esc($supplier['phone']) ?>
                        </td>

                        <td>
                            <?= esc($supplier['email']) ?>
                        </td>

                        <td>
                            <?= esc($supplier['status']) ?>
                        </td>
                    </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>
                    <td colspan="7">
                        Belum ada data supplier.
                    </td>
                </tr>

            <?php endif; ?>

        </tbody>

    </table>

</body>

</html>