<?php
/**
 * @var name
 * @var surname
 * @var zone
 * @var ticket_type
 * @var quantity
 */
require 'vendor/autoload.php';
$templates = new League\Plates\Engine('templates', 'phtml');
$price = 0;
$zone = $_POST['zone'];
$type = $_POST['ticket_type'];
$quantity = $_POST['quantity'];
if (is_numeric($zone)) {
    switch ($zone) {
        case 1:
            $price = 1.4; break;
        case 2:
            $price = 1.8; break;
        case 3:
            $price = 2.2; break;
    }
}
switch ($type) {
    case 'one-way':
        $price; break; //it doesn't change
    case 'hourly':
        $price*=1.5; break;
    case 'day':
        $price*=2; break;
};
$ids = [];
for($i = 0; $i < $quantity; $i++) {
    array_push($ids, bin2hex(random_bytes(9)));
}
echo $templates->render('ticket', [
    'name' => $_POST['name'],
    'surname' => $_POST['surname'],
    'logo_path' => "assets/logo",
    'date_time_purchase' => date('Y-n-d h:m:s'),
    'ids' => $ids,
    'zone' => $zone,
    'type' => $type,
    'quantity' => $quantity,
    'price' => number_format($price, 2)
]);
