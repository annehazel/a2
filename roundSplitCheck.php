
<?php
require('tools.php');
require('Form.php');

# new form object
$form = new DWA\Form($_GET);

# variables used to collet what was entered in the form fields
# plus $total to calculate the total bill to be output to the screen

$subtotal = $form->get('subtotal');
$tip = $form->get('tip');
$people = $form->get('people');
$round = $form->isChosen('round');
$successMessage = '';
$maxPeople = $total*100;




if ($form->isSubmitted()) {
    
    $total = getTotal($subtotal, $tip, $round);
    $amountDue = splitCheck($total, $people);
    
    $errors = $form->validate(
            [
            'subtotal' => 'required|numeric|min:.01',
            'tip' => 'required|numeric',
            'people' => 'required|numeric'
            ]
            );
    
    if (count($errors) == 0){
        $duePerPerson = splitCheck($total, $people);
        $successMessage = "Including the tip, the bill comes to $" . $total . ". Split between " . $people . " people, each person owes $" . $duePerPerson . ".";
        return $duePerPerson;
     } 
}


# function that calculates what each person owes
# after incorporating the tip, always rounding up to the nearsest penny
function splitCheck($total, $people) {

    $amountDue = $total/$people;
    $amountDue = round($amountDue, 2, PHP_ROUND_HALF_UP);
    
    
    return $amountDue;

} # end function splitCheck

function getTotal($subtotal, $tip, $round = false) {
    
    $total = $subtotal * (1+$tip);
    $total = round($total, 2);
    
    if ($round){
        $total = round($total);
        return $total;
    }
      
    return $total;

} # end function getTotal



