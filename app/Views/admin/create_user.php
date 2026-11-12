<h2>MEMBUAT PENGGUNA BARU</h2>
<form action="<?= site_url('admin/users')?>" method="post">
    <div>
        <label for="">Username</label>
        <input type="text" name="username">
    </div>
    <div>
        <label for="">Email</label>
        <input type="text" name="email">
    </div><div>
        <label for="">Nama Lengkap</label>
        <input type="text" name="fullname">
    </div>
    <div>
        <label for="">Password</label>
        <input type="password" name="password">
    </div>
    <div>
        <label for="">Role</label>
        <select name="role" id="">
            <option value="STAFF">STAFF</option>
            <option value="ADMIN">ADMIN</option>
        </select>
    </div>
    <button type="submit">Buat Pengguna Baru</button>
</form>