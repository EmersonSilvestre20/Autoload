# FindFile - Função de Busca de Arquivos

A função `findFile` permite procurar um arquivo específico dentro de um diretório e seus subdiretórios de forma recursiva. Ela verifica se o diretório fornecido é válido e retorna o caminho completo do arquivo se encontrado, ou `false` se não for encontrado.

## Uso

### Instalação

1. Copie o código da função `findFile` e cole-o em seu arquivo PHP.
2. Certifique-se de que o diretório que deseja pesquisar esteja acessível e que você tenha permissão para lê-lo.

### Parâmetros

A função `findFile` aceita os seguintes parâmetros:

- **$directory** (string): O caminho do diretório onde a busca deve ser realizada.
- **$filename** (string): O nome do arquivo que você está procurando.

### Retorno

- Retorna o caminho completo do arquivo se ele for encontrado.
- Retorna `false` se o diretório não for válido ou se o arquivo não for encontrado.

### Exemplo de Uso

```php
$directory = __DIR__ . '/inc/';
$filename = 'Teste.php';
$foundFile = findFile($directory, $filename);

if ($foundFile !== false) {
    echo "Ficheiro encontrado: " . $foundFile;
} else {
    echo "Ficheiro não encontrado.";
}
