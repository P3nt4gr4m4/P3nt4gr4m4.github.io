<?php
if (isset($_GET['url']) && isset($_GET['format'])) {
    $videoUrl = $_GET['url'];
    $format = $_GET['format'];

    $apiUrl = "https://loader.to/ajax/download.php?format=$format&url=" . urlencode($videoUrl);

    // Inicializar cURL
    $ch = curl_init();

    // Configurar cURL
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Ejecutar cURL
    $response = curl_exec($ch);

    // Verificar si hay errores
    if ($response === false) {
        echo json_encode(['success' => false, 'message' => 'Error al conectarse a la API.']);
    } else {
        // Devolver la respuesta JSON al cliente
        echo $response;
    }

    // Cerrar cURL
    curl_close($ch);
} else {
    echo json_encode(['success' => false, 'message' => 'URL o formato no proporcionados.']);
}
?>
