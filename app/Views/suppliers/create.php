<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Supplier</title>
</head>

<body>

    <h1>Add Supplier</h1>

    <?php if (session()->has('errors')): ?>

        <ul>

            <?php foreach (session()->get('errors') as $error): ?>

                <li>
                    <?= esc($error) ?>
                </li>

            <?php endforeach; ?>

        </ul>

    <?php endif; ?>


    <form action="/suppliers" method="post">

        <?= csrf_field() ?>


        <!-- Supplier Code -->

        <div>

            <label for="supplier_code">
                Supplier Code
            </label>

            <br>

            <input
                type="text"
                id="supplier_code"
                name="supplier_code"
                value="<?= old('supplier_code') ?>"
                placeholder="SUP-001"
            >

        </div>

        <br>


        <!-- Name -->

        <div>

            <label for="name">
                Name
            </label>

            <br>

            <input
                type="text"
                id="name"
                name="name"
                value="<?= old('name') ?>"
                placeholder="Supplier Material F"
            >

        </div>

        <br>


        <!-- Address -->

        <div>

            <label for="address">
                Address
            </label>

            <br>

            <textarea
                id="address"
                name="address"
                rows="4"
                cols="40"
                placeholder="Jl. Industri No. 10, Depok"
            ><?= old('address') ?></textarea>

        </div>

        <br>


        <!-- Phone -->

        <div>

            <label for="phone">
                Phone
            </label>

            <br>

            <input
                type="text"
                id="phone"
                name="phone"
                value="<?= old('phone') ?>"
                placeholder="628123456789"
            >

        </div>

        <br>


        <!-- Email -->

        <div>

            <label for="email">
                Email
            </label>

            <br>

            <input
                type="text"
                id="email"
                name="email"
                value="<?= old('email') ?>"
                placeholder="supplier@example.test"
            >

        </div>

        <br>


        <!-- Status -->

        <div>

            <label for="status">
                Status
            </label>

            <br>

            <select
                id="status"
                name="status"
            >

                <option value="">
                    -- Pilih Status --
                </option>

                <option
                    value="ACTIVE"
                    <?= old('status') === 'ACTIVE' ? 'selected' : '' ?>
                >
                    ACTIVE
                </option>

                <option
                    value="INACTIVE"
                    <?= old('status') === 'INACTIVE' ? 'selected' : '' ?>
                >
                    INACTIVE
                </option>

            </select>

        </div>

        <br>


        <button type="submit">
            Save Supplier
        </button>

    </form>

    <br>

    <a href="/suppliers">
        Back to Supplier List
    </a>

</body>

</html>