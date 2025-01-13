<?php
$inputString = "Exemplo de string";

$reversedString = "";

$length = strlen($inputString);
for ($i = $length - 1; $i >= 0; $i--) {
    $reversedString .= $inputString[$i]; //Adiciona o caractere à nova string
}

echo "String original: " . $inputString . PHP_EOL;
echo "String invertida: " . $reversedString . PHP_EOL;
?>
