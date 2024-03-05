<html>

<head>
    <meta charset="UTF-8">

    <title>Yuliia Kuliievych</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php

    include("autoryzacja.php");

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Blad polaczenia: ' . mysqli_connect_error());

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $gracz_id = isset($_POST['gracz_id']) ? $_POST['gracz_id'] : "";
        $imie = isset($_POST['imie']) ? $_POST['imie'] : "";
        $nazwisko = isset($_POST['nazwisko']) ? $_POST['nazwisko'] : "";
        $numer = isset($_POST['numer']) ? $_POST['numer'] : "";
        $druzyna_id = isset($_POST['druzyna_id']) ? $_POST['druzyna_id'] : "";

        
        $query = "UPDATE gracze SET imie='$imie', nazwisko='$nazwisko', numer='$numer', druzyna_id='$druzyna_id' WHERE gracz_id='$gracz_id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Aktualizacja ponyslna";
        } else {
            echo "Wystapil blad podczas aktualizacji danych gracza: " . mysqli_error($conn);
        }
    }

  
    $gracz_id = isset($_GET['gracz_id']) ? $_GET['gracz_id'] : "";
    $query = "SELECT * FROM gracze WHERE gracz_id='$gracz_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
    ?>
        <form action="zmien.php" method="post">
            <input type="hidden" name="gracz_id" value="<?php echo $row['gracz_id'] ?? ''; ?>">
            ImiÄ™: <input type="text" name="imie" value="<?php echo $row['imie'] ?? ''; ?>"><br>
            Nazwisko: <input type="text" name="nazwisko" value="<?php echo $row['nazwisko'] ?? ''; ?>"><br>
            Numer: <input type="text" name="numer" value="<?php echo $row['numer'] ?? ''; ?>"><br>
            DruĹĽyna ID: <input type="text" name="druzyna_id" value="<?php echo $row['druzyna_id'] ?? ''; ?>"><br>
            <input type="submit" value="Zapisz zmiany">
        </form>
    <?php
    } else {
        echo "Blad zapytania: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    ?>
</body>

</html>
