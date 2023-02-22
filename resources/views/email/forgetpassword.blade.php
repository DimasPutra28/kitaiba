<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body{
            background-color: #b2bbba
        }

        .erga a{
            color: black;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center">Lupa Password Bantu Mereka</h1><br>
    <div class="container">

        <p>Hai, dermawan</p>
        <br>
        Klik tombol dibawah ini untuk melakukan reset password:
        <div class="erga">
            <a class="btn btn-danger" href="{{ route('reset.password.get', $token) }}">Reset Password</a>
        </div>
        <br>
        <p>Terima kasih atas partisipasi anda dalam website ini</p>
        <footer>
            <small style="font-style: italic">Website Bantu Mereka, 2023</small>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
