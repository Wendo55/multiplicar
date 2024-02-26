<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Multiplicar</title>
</head>
<body>
    <h2>Tabla de Multiplicar</h2>
    <form action="" method="post">
        <label for="numero">Número:</label>
        <input type="number" id="numero" name="numero" required>
        <label for="inicio">Desde:</label>
        <input type="number" id="inicio" name="inicio" required>
        <label for="fin">Hasta:</label>
        <input type="number" id="fin" name="fin" required>
        <button type="submit" name="submit">Mostrar tabla</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $numero = $_POST['numero'];
        $inicio = $_POST['inicio'];
        $fin = $_POST['fin'];

        // Asegurar que $inicio sea menor o igual que $fin
        if ($inicio > $fin) {
            $temp = $inicio;
            $inicio = $fin;
            $fin = $temp;
        }

        echo "<h3>Tabla de Multiplicar del $numero desde $inicio hasta $fin:</h3>";
        echo "<form action='' method='post'>";
        for ($i = $inicio; $i <= $fin; $i++) {
            $resultado = $numero * $i;
            echo "$numero x $i = <input type='number' name='respuesta[$i]' required><br>";
        }
        echo "<button type='submit' name='verificar'>Verificar</button>";
        echo "<input type='hidden' name='numero' value='$numero'>";
        echo "<input type='hidden' name='inicio' value='$inicio'>";
        echo "<input type='hidden' name='fin' value='$fin'>";
        echo "</form>";
    }

    if (isset($_POST['verificar'])) {
        $numero = $_POST['numero'];
        $inicio = $_POST['inicio'];
        $fin = $_POST['fin'];
        $respuestas = $_POST['respuesta'];
        $correctas = 0;

        echo "<h3>Respuestas:</h3>";
        echo "<ul>";
        for ($i = $inicio; $i <= $fin; $i++) {
            $respuesta = $respuestas[$i];
            $resultado = $numero * $i;
            echo "<li>$numero x $i = $resultado";
            if ($respuesta == $resultado) {
                echo " - Correcto</li>";
                $correctas++;
            } else {
                echo " - Incorrecto</li>";
            }
        }
        echo "</ul>";

        echo "<p>Respuestas correctas: $correctas</p>";
    }
    ?>
</body>
</html>