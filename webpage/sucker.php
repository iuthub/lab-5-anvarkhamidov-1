


<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Buy Your Way to a Better Education!</title>
    <link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css" type="text/css" rel="stylesheet" />
</head>

<body>
<?php
$name = isset($_POST['name']) ? $_POST['name'] : "";
$section = isset($_POST['section']) ? $_POST['section'] : "";
$creditCard =isset($_POST['credit_card']) ? $_POST['credit_card'] : "";
$ccType = isset($_POST['cc-type']) ? $_POST['cc-type'] : "";

$filled = boolval(($name != "") & ($section != "") & ($creditCard != "") & ($ccType != ""));

if ($filled) {
    file_put_contents('suckers.txt', $name.';'.$section.';'.$creditCard.';'.$ccType.PHP_EOL, FILE_APPEND);
}
?>
<? if (!$filled) {?>
    <h1>Sorry</h1>
    <p>You did not fill out  the form completely</p>
<? } else { ?>
    <h1>Thanks, sucker!</h1>

    <p>Your information has been recorded.</p>

    <dl>
        <dt>Name</dt>
        <dd><?=$name ?></dd>

        <dt>Section</dt>
        <dd><?=$section ?></dd>

        <dt>Credit Card</dt>
        <dd><?=$creditCard.' ('.$ccType.')' ?></dd>
    </dl>

    <p>Here are all the suckers who submitted there:</p>
    <pre><?=file_get_contents('suckers.txt')?></pre>
<? } ?>
</body>

</html>