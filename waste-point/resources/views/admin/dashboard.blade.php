<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Welcome Admin</h1>
    <form action ="/logout" method="post">
        @csrf
        <button type="submit" class=""><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
    </form>
</body>
</html>