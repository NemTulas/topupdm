<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Penjumlahan Sederhana</h1>
    <form method="post" action="">
        Bilangan 1: <input type="number" name="bilangan1"><br>
        Bilangan 2: <input type="number" name="bilangan2"><br>
        Bilangan 3: <input type="number" name="bilangan3"><br>
        <input type="submit" name="submit" value="hitung">
    </form>

    <?php
        if (isset($_POST['submit'])){
            $bilangan1 = $_POST['bilangan1'];
            $bilangan2 = $_POST['bilangan2'];
            $bilangan3 = $_POST['bilangan3'];
            $hasil = $bilangan1 + $bilangan2 * $bilangan3;

            
            echo "Hasil Penjumlahan: " .$hasil;
            
        }
    ?>
</body>
</html>