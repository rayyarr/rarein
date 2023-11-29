<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/mulai.css') }}">
</head>
<body>
    <div class="container">
        <form action="#">
        <div class="content">
            <h1 style="text-align: center;justify-content: center; display: flex; margin-bottom: 70px;">Selamat Datang</h1>
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Judul</span>
                        <input type ="text" placeholder="Judul Acara" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Tanggal Acara</span>
                        <input type="date" placeholder ="Tanggal Acara" required>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Lanjut">
                </div>
        </div>
    </form>
    </div>
</body>
</html>