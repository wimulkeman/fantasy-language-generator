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

    <title>Convert text</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="/">Home</a>
</nav>
<div class="container">
    <h1>Convert a custom text to a specific language</h1>
    <form method="post">
        <div class="form-group">
            <label for="text">Your text</label>
            <textarea class="form-control" id="text" name="text"><?php echo isset($_POST['text']) ? $_POST['text'] : ''; ?></textarea>
        </div>
        <div class="form-group form-check">
            <label>Convert to:</label>
            <?php
            foreach (array_keys($languages) as $key => $language) {
                $checked = '';
                if (isset($_POST['language'][$language])) {
                    $checked = 'checked="checked"';
                }

                echo '<div class="form-check">';
                echo "<input type='radio' class='form-check-input' id='language-$key' name='language[$language]' $checked>";
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

            echo '<div class="row">';
            echo '    <div class="col" style="font-family: '.$languages[$language]['font-family'].'">';
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
        <button type="button" class="btn btn-primary" onclick="print()">Print the text</button>
    </div>
<?php } ?>
</body>
</html>
