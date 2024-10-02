<?php

function findFile($directory, $filename) {
    // Verifica se o diretório fornecido é válido
    if (!is_dir($directory)) {
        return false;
    }

    // Lista todos os arquivos e diretórios dentro do diretório fornecido
    $items = scandir($directory);

    // Percorre cada item dentro do diretório
    foreach ($items as $item) {
        // Ignora os diretórios especiais '.' e '..'
        if ($item == '.' || $item == '..') {
            continue;
        }

        // Cria o caminho completo do item atual
        $itemPath = $directory . DIRECTORY_SEPARATOR . $item;

        // Verifica se o item atual é o ficheiro que estamos procurando
        if ($item == $filename) {
            return $itemPath;
        }

        // Se o item atual é um diretório, chama a função recursivamente
        if (is_dir($itemPath)) {
            $result = findFile($itemPath, $filename);
            if ($result !== false) {
                return $result;
            }
        }
    }

    // Retorna false se o ficheiro não for encontrado no diretório e seus subdiretórios
    return false;
}
/*
// Exemplo de uso da função
$directory = __DIR__ . '/inc/';
$filename = 'Teste.php';
$foundFile = findFile($directory, $filename);

if ($foundFile !== false) {
    echo "Ficheiro encontrado: " . $foundFile;
} else {
    echo "Ficheiro não encontrado.";
}
*/
spl_autoload_register(function ($class)
{
    // Define the base directory for the namespace prefix
    $base_dir = realpath(".") . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR;
    
    // Replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    //$file = $base_dir . $class . '.php';
    
    $filename = "{$class}.php";
    $file = findFile($base_dir, $filename);
    
    // If the file exists, require it
    if (file_exists($file))
    {
        require_once $file;
    }
});
