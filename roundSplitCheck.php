
<?php
require('tools.php');
require('Form.php');

# new form object
$form = new DWA\Form($_GET);

# variales
$subtotal = $form->get('subtotal');
$tip = $form->get('tip');
$people = $form->get('people');


# function that calculates what each person owes
# after incorporating the tip
function splitCheck($subtotal, $tip, $people) {
    
    $amountDue = ($subtotal * (1+$tip))/$people;
    return $amountDue;

} # end function splitCheck


$due = splitCheck($subtotal, $tip, $people);
