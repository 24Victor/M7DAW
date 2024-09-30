<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Calculadora Web</title>
</head>
<body>
    <h1>Calculadora web númerica i de strings</h1>
    <form action="" method="POST">
        <label for="valor10">Valor 1:</label>
        <input type="text" id="valor1" name="valor1" required><br><br>

        <label for="valor2">Valor 2:</label>
        <input type="text" id="valor2" name="valor2" required><br><br>

        <label for="operacio">Operació</label>
        <select id="operacio" name="operacio">
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplicar">Multiplicar</option>
            <option value="dividir">Dividir</option>
            <option value="concatenar">Concatenar</option>
            <option value="eliminar">Eliminar Substring</option>
        </select>
        <br><br>

        <input type="submit" value="Calcular">
    </form>
</body>

<?php
//Verificar si el Formulari ha sigut enviat
if($_SERVER['REQUEST_METHOD'] == "POST")    
    //Guardar els valors enviats del formulari
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $operacio = $_POST['operacio'];

    //Variable per a emmagatzemar el resultat
    $resultat ="";

    function sumar($a, $b){
        return $a + $b;
    }

    function resta($a, $b){
        return $a - $b;
    }

    function multiplicar($a, $b){
        return $a * $b;
    }

    function dividir($a, $b){
        if($b == 0){
            return "ERROR: No es pot dividir per cero";
        }
        return $a / $b;
    }

    function concatenar($string1, $string2){
        return $string1 . $string2;
    }

    // Utilitzem la funció str_replace per a reemplaçar o eliminar la subcadena
    function eliminar($string, $subString) {
        return str_replace($subString, "", $string);
    }

    switch ($operacio){
        case 'suma':
            //Funcio floatval convertix les variables valor 1 i 2 en numeros decimals
            $resultat = sumar(floatval($valor1), floatval($valor2));
            break;
        case 'resta':
            $resultat = resta(floatval($valor1), floatval($valor2));
            break;
        case 'multiplicar':
            $resultat = multiplicar(floatval($valor1), floatval($valor2));
            break;
        case 'dividir':
            $resultat = dividir(floatval($valor1), floatval($valor2));
            break;
        case 'concatenar':
            $resultat = concatenar($valor1, $valor2);
            break;
        case 'eliminar':
            $resultat = eliminar(($valor1),$valor2);
            break;
        default:
            $resultat = "Operació no valida.";
            break;
    }

    echo "<h2>Resultat: $resultat</h2>";
?>
