<?php
include_once 'available-languages.php';
include_once 'translate-language.php';
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" media="print" href="css/print.css">
    <?php echo getAllLanguageStyleSheets(); ?>

    <title>Cheatsheet</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="/">Home</a>
</nav>
<div class="container">
    <h1>Generate a language cheatsheet</h1>
    <form method="post">
        <div class="form-group">
            <label for="text">Cheatsheet text</label>
            <textarea class="form-control" id="text" name="text">
a b c d e f g h i j k l m n o p q r s t u v w x y z
A B C D E F G H I J K L M N O P Q R S T U V W X Y Z
0 1 2 3 4 5 6 7 8 9 . -
bad water - danger - be alert - dragon - dwarf - elf - gnome - halfling - human - orc - safe drinking water - safe shelter - safe trail
            </textarea>
        </div>
        <div class="form-group form-check">
            <label>Languages</label>
            <?php
            foreach (array_keys($languages) as $key => $language) {
                $checked = '';
                if (isset($_POST['language'][$language])) {
                    $checked = 'checked="checked"';
                }

                echo '<div class="form-check">';
                echo "<input type='checkbox' class='form-check-input' id='language-$key' name='language[$language]' $checked>";
                echo "<label class='form-check-label' for='language-$key'>$language</label>";
                echo '</div>';
            }
            ?>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
<?php if (isset($_POST['text']) && isset($_POST['language'])) { ?>
    <div class="container language-text">
        <?php
        foreach ($_POST['language'] as $language => $value) {
            if (!isset($languages[$language])) {
                continue;
            }

            preg_match('/^[^(]+/i', $language, $nameMatch);
            if (!isset($nameMatch[0])) {
                continue;
            }
            $languageName = $nameMatch[0];

            echo '<div class="row">';
            echo '    <div class="col">'.$languageName.'</div>';
            echo '    <div class="col-10" style="font-family: '.$languages[$language]['font-family'].'">';
            $text = $_POST['text'];
            if (isset($languages[$language]['translateFunction'])) {
                $translateFunction = $languages[$language]['translateFunction'];
                $text = $translateFunction($text);
            }
            echo nl2br($text);
            echo '    </div>';
            echo '</div>';
        }
        ?>
    </div>
    <div class="container">
        <button type="button" class="btn btn-primary" onclick="print()">Print cheatsheet</button>
    </div>
<?php } ?>
</body>
</html>
