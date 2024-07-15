<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{ url('api/profile/update-password') }}" method="POST">
        @csrf
        <!-- Ambil id user dari session['id'], di bawah ini statis hanya contoh -->
        <input type="hidden" name="id_user" value="1">
        <div>
            <label for="">Password lama</label>
            <input type="password" name="old_password">
        </div>
        <div>
            <label for="">Password baru</label>
            <input type="password" name="password">
        </div>
        <div>
            <label for="">Konfirmasi password</label>
            <input type="password" name="password_confirmation">
        </div>
        <button type="submit">Save</button>
    </form>
</body>

</html>