<?php
$arquivoJSON = 'archives/billing.json'; 
$arquivoXML = 'archives/billing_data.xml'; 


if (file_exists($arquivoJSON)) {
    $dadosFaturamento = json_decode(file_get_contents($arquivoJSON), true);
    
    $valoresValidos = [];
    $total = 0;

    foreach ($dadosFaturamento as $registro) {
        $valor = floatval($registro['valor']);
        if ($valor > 0) { // Ignora dias com faturamento 0
            $valoresValidos[] = $valor;
            $total += $valor;
        }
    }

    $menor = min($valoresValidos);
    $maior = max($valoresValidos);
    $media = $total / count($valoresValidos);

    $diasAcimaMedia = 0;
    foreach ($valoresValidos as $valor) {
        if ($valor > $media) {
            $diasAcimaMedia++;
        }
    }

    echo "Menor valor de faturamento: R$ " . number_format($menor, 2, ',', '.') . PHP_EOL;
    echo "Maior valor de faturamento: R$ " . number_format($maior, 2, ',', '.') . PHP_EOL;
    echo "Número de dias com faturamento acima da média: " . $diasAcimaMedia . PHP_EOL;
} else {
    echo "O arquivo JSON de faturamento não foi encontrado!" . PHP_EOL;
}

if (file_exists($arquivoXML)) {
    $xml = simplexml_load_file($arquivoXML);

    echo "Conteúdo do arquivo XML:" . PHP_EOL;
    foreach ($xml->row as $row) {
        echo "Dia: " . $row->dia . ", Faturamento: R$ " . number_format($row->valor, 2, ',', '.') . PHP_EOL;
    }
} else {
    echo "O arquivo XML não foi encontrado!" . PHP_EOL;
}
?>
