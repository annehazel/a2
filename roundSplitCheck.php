
<?php
require('tools.php');
require('Form.php');

# new form object
$form = new DWA\Form($_GET);

# variables
$subtotal = $form->get('subtotal');
$tip = $form->get('tip');
$people = $form->get('people');
$total = $subtotal * (1+$tip);


$errors = $form->validate(
            [
            'subtotal' => 'required|numeric',
            'tip' => 'required|numeric'
            ]
            );


if ($form->isSubmitted()) {
    if (count($errors) == 0){
        $duePerPerson = splitCheck($total, $people);
     }
}


# function that calculates what each person owes
# after incorporating the tip
function splitCheck($total, $people) {
    
    $amountDue = $total/$people;
    $amountDue = round($amountDue, 2, PHP_ROUND_HALF_UP);
    return $amountDue;

} # end function splitCheck





