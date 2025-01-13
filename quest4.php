<?php
$faturamentoPorEstado = [
    'SP' => 67836.43,
    'RJ' => 36678.66,
    'MG' => 29229.88,
    'ES' => 27165.48,
    'Outros' => 19849.53
];

$faturamentoTotal = array_sum($faturamentoPorEstado);

echo "Faturamento total mensal: R$ " . number_format($faturamentoTotal, 2, ',', '.') . PHP_EOL;

foreach ($faturamentoPorEstado as $estado => $faturamento) {
    $percentual = ($faturamento / $faturamentoTotal) * 100;
    echo "Percentual de " . $estado . ": " . number_format($percentual, 2, ',', '.') . "%" . PHP_EOL;
}
?>
