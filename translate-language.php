<?php
function translateDethek ($text) {
    $words = [
        'bad water' => 'bad-water.png',
        'bad waters' => 'bad-water.png',
        'danger' => 'danger-be-alert.png',
        'hazard' => 'danger-be-alert.png',
        'be alert' => 'danger-be-alert.png',
        'be on alert' => 'danger-be-alert.png',
        'on alert' => 'danger-be-alert.png',
        'dragon' => 'dragon.png',
        'dragons' => 'dragon.png',
        'dwarf' => 'dwarf.png',
        'dwarves' => 'dwarf.png',
        'elf' => 'elf.png',
        'elves' => 'elf.png',
        'gnome' => 'gnome.png',
        'gnomes' => 'gnome.png',
        'halfling' => 'halfling.png',
        'halflings' => 'halfling.png',
        'human' => 'human.png',
        'humans' => 'human.png',
        'orc' => 'orc.png',
        'orces' => 'orc.png',
        'safe drinking water' => 'safe-drinking-water.png',
        'safe place' => 'safe-place-shelter.png',
        'safe shelter' => 'safe-place-shelter.png',
        'safe harbor' => 'safe-place-shelter.png',
        'safe trail' => 'safe-trail.png',
        'good trail' => 'safe-trail.png',
    ];

    array_walk_recursive($words, function(&$image, $word) {
        $image = "<img src='/img/dethek/$image' alt='$word'>";
    });

    return str_ireplace(array_keys($words), $words, $text);
}