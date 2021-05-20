<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Classification Phone Number</title>
    <style>
        h1 {
            color: red;
        }
    </style>
</head>
<body>
<form action="" method="post" id="classify">
    <h1>Classification Phone Number</h1>
    <table>
        <tr>
            <th>Input phone number:</th>
            <td><textarea name="phone_number" form="classify"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Classify"></td>
        </tr>
    </table>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST["phone_number"];
    $length = strlen($input);
    $limitHigh = 10;
    $limitLow = 9;
    $flag = false;
    $message = "<h2>Wrong type of phone number</h2>";

    if (empty($input)) {
        $flag = false;
        return;
    } elseif ($length > $limitHigh || $length < $limitLow) {
        $flag = false;
        return;
    }
    $viettel = ["0162", "0163", "0164", "0165", "0166", "0167", "0168", "0169", "032", "033", "034", "035", "036", "037", "038", "039"];
    $mobiphone = ["090", "093", "089", "0120", "0121", "0122", "0126", "0128"];
    $vinaphone = ["0125", "0127", "0129", "085", "081", "082"];
    $isViettel = [];
    $isMobi = [];
    $isVina = [];
    $phone = explode(",", $input);
    foreach ($phone as $item) {
        $substr1 = substr($item, 0, 4);
        $substr2 = substr($item, 0, 3);

        for ($i = 0; $i < count($viettel); $i++) {
            if ($substr1 == $viettel[$i] || $viettel[$i] == $substr2) {
                array_push($isViettel, $item);
                $flag = true;
            }
        }
        for ($i = 0; $i < count($mobiphone); $i++) {
            if ($substr1 == $mobiphone[$i] || $mobiphone[$i] == $substr2) {
                array_push($isMobi, $item);
                $flag = true;
            }
        }
        for ($i = 0; $i < count($vinaphone); $i++) {
            if ($substr1 == $vinaphone[$i] || $vinaphone[$i] == $substr2) {
                array_push($isVina, $item);
                $flag = true;
            }
        }
    }

    if ($flag == false) {
        echo $message;
    }

    echo "Viettel's Phone number is: " . implode(", ", $isViettel) . "<br>";
    echo "Mobiphone's Phone number is: " . implode(", ", $isMobi) . "<br>";
    echo "Vinaphone's Phone number is: " . implode(", ", $isVina) . "<br>";
}
?>
</body>
</html>
