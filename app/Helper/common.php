<?php

function get_module_asset_paths(): array
{
    $paths = [];

    if (file_exists('build/manifest.json')) {
        $files = json_decode(file_get_contents('build/manifest.json'), true);

        foreach ($files as $file) {
            $paths[] = $file['src'];
        }
    }

    return $paths;
}