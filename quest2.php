<?php
function pertenceFibonacci($numero) {
    $fibonacci = [0, 1];
    $i = 2;

    while ($fibonacci[$i - 1] < $numero) {
        $fibonacci[] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
        $i++;
    }

    if (in_array($numero, $fibonacci)) {
        return "O número $numero pertence à sequência de Fibonacci.";
    } else {
        return "O número $numero NÃO pertence à sequência de Fibonacci.";
    }
}

$numero = 21; 

echo pertenceFibonacci($numero);
?>
