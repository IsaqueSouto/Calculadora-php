<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
</head>

<body>

<?php
$valorA = isset($_POST['numA']) ? $_POST['numA'] : '';
$valorB = isset($_POST['numB']) ? $_POST['numB'] : '';
$operacao = isset($_POST['opera']) ? $_POST['opera'] : '';
$resultado = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!is_numeric($valorA) || !is_numeric($valorB)) {
        $resultado = "Digite apenas números válidos";
    } else {

        switch ($operacao) {
            case '+':
                $resultado = $valorA + $valorB;
                break;
            case '-':
                $resultado = $valorA - $valorB;
                break;
            case '*':
                $resultado = $valorA * $valorB;
                break;
            case '/':
                $resultado = ($valorB != 0) ? round($valorA / $valorB, 3) : "Erro: divisão por zero";
                break;
            default:
                $resultado = "Escolha uma operação";
        }
    }
}
?>

<h1>Calculadora PHP</h1>

<form method="post">

    <input type="text" name="numA"
        value="<?php echo $valorA; ?>"
        placeholder="Primeiro número"><br><br>

    <input type="radio" name="opera" value="+" <?php if($operacao=='+') echo 'checked'; ?>> +
    <input type="radio" name="opera" value="-" <?php if($operacao=='-') echo 'checked'; ?>> -
    <input type="radio" name="opera" value="*" <?php if($operacao=='*') echo 'checked'; ?>> *
    <input type="radio" name="opera" value="/" <?php if($operacao=='/') echo 'checked'; ?>> /

    <br><br>

    <input type="text" name="numB"
        value="<?php echo $valorB; ?>"
        placeholder="Segundo número"><br><br>

    <input type="submit" value="Calcular">

</form>

<?php
if ($resultado !== '') {
    echo "<p>Resultado: $resultado</p>";
}
?>

<style>
body {
    font-family: Arial;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 70vh;
    background-color: whitesmoke;
}

input[type="text"] {
    width: 150px;
    padding: 5px;
}

input[type="submit"] {
    padding: 5px 10px;
    background-color: #4CAF50;
    color: black;
    border-radius: 5px;
    border: none;
    cursor: pointer;
}
</style>

</body>
</html>
