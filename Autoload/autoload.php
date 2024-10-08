<?php
function findFile($directory, $filename) {
    if (!is_dir($directory)) {
        return false;
    }

    $items = scandir($directory);

    foreach ($items as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }
        $itemPath = $directory . DIRECTORY_SEPARATOR . $item;
        if ($item == $filename) {
            return $itemPath;
        }
        if (is_dir($itemPath)) {
            $result = findFile($itemPath, $filename);
            if ($result !== false) {
                return $result;
            }
        }
    }
    return false;
}
