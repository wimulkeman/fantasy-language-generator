<?php
include_once 'available-languages.php';

$characters = array_merge(
    range(0, 9),
    range('A', 'F')
);
$characterCodes = range(33, 126);
?>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/layout.css">
        <?php
            echo getAllLanguageStyleSheets();
        ?>
    </head>
    <body>
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="/">Home</a>
        </nav>
        <div class="container-fluid">
            <table>
                <?php
                echo '<tr>';
                foreach (array_keys($languages) as $language) {
                    echo "<td>$language</td>";
                }
                echo '</tr>';
                foreach ($characterCodes as $characterCode) {
                    $character = chr($characterCode);
                    echo '<tr>';
                    foreach ($languages as $language) {
                        echo "<td style='font-family: {$language['font-family']}'>$character</td>";
                    }
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </body>
</html>
