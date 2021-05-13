<?php
$languages = [
    'Latin' => [
        'font-family' => 'Arial, sans-serif',
        'stylesheet' => null,
    ],
    'Dethek' => [
        'font-family' => 'Olde Dethek',
        'stylesheet' => 'fonts/dethek/webfonts/all.css',
        'translateFunction' => 'translateDethek',
    ],
    'Dethek italic' => [
        'font-family' => 'Olde Dethek Italic',
        'stylesheet' => null,
        'translateFunction' => 'translateDethek',
    ],
    'Cirth (Erebor)' => [
        'font-family' => 'Cirth Erebor',
        'stylesheet' => 'fonts/cirth/all.css',
    ],
    'Cirth (Erebor1)' => [
        'font-family' => 'Cirth Erebor1',
        'stylesheet' => null,
    ],
    'Cirth (Erebor2)' => [
        'font-family' => 'Cirth Erebor2',
        'stylesheet' => null,
    ],
    'Cirth (Erebcap)' => [
        'font-family' => 'Cirth Erebcap',
        'stylesheet' => 'fonts/cirth/all.css',
    ],
    'Cirth (Erebcap1)' => [
        'font-family' => 'Cirth Erebcap1',
        'stylesheet' => null,
    ],
    'Cirth (Erebcap2)' => [
        'font-family' => 'Cirth Erebcap2',
        'stylesheet' => null,
    ],
    'Khuzdul (Cirth)' => [
        'font-family' => 'Cirth Erebor',
        'stylesheet' => null,
    ],
];

function getAllLanguageStyleSheets() {
    global $languages;

    $stylesheets = '';
    foreach ($languages as $language) {
        if (null === $language['stylesheet']) {
            continue;
        }

        $stylesheets .= "<link rel='stylesheet' href='{$language['stylesheet']}'>";
    }

    return $stylesheets;
}