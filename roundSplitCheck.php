
<?php
require('tools.php');
require('Form.php');

/**
* NEW FORM OBJECT
*/
$form = new DWA\Form($_GET);


/**
* VARIABLES FROM FORM SUBMISSION
*/

$subtotal = $form->get('subtotal');
$tip = $form->get('tip');
$people = $form->get('people');
$round = $form->isChosen('round');
$successMessage = '';



/**
* ERROR HANDLING AND DISPLAY MESSAGES
*/

# If the form has been submitted and there are no errors, run getTotal and splitcheck functions
if ($form->isSubmitted()) {
    
    $total = getTotal($subtotal, $tip, $round);
    $maxPeople = $total*100 +1;
    
    #check for errors, use $maxPeople to make sure the total is divisible but at least .01 per person
    $errors = $form->validate(
            [
            'subtotal' => 'required|numeric|min:.01',
            'tip' => 'required|numeric',
            'people' => 'required|numeric|max:' . $maxPeople,
            ]
            );
    
    #if there are no errors, or the $errors array is empty: 
    if (count($errors) == 0){
        #$total = getTotal($subtotal, $tip, $round);
        $duePerPerson = splitCheck($total, $people);
        $successMessage = "Including the tip, the bill comes to $" . $total . ". Split between " . $people . " people, each person owes $" . $duePerPerson . ".";
        return $duePerPerson;
     } 
}

/**
* FUNCTIONS
*/

/**
* The splitCheck function takes the total (found by the getTotal function) and divides it by
* the number of people indicated by the user.
*
* The amount each person owes is always rounded up in order to assure the entire bill is covered
* 
*/
function splitCheck($total, $people) {

    $amountDue = $total/$people;
    $amountDue = round($amountDue, 2, PHP_ROUND_HALF_UP);
    
    return $amountDue;

} # end function splitCheck


/**
* The getTotal function is used to get the total that the application should use and display,
* adding in the tip amount (indicated by the user) and rounding of to the nearest dollar 
* if rounding up is indicated by the user.
* 
*  The $round variable holds a boolean value, indicating whether the user wants the total to be rounded off
*  to the nearest dollar.
*/
   
function getTotal($subtotal, $tip, $round = false) {
    
    $total = $subtotal * (1+$tip);
    $total = round($total, 2);
    
    if ($round){
        $total = round($total);
        return $total;
    }
      
    return $total;

} # end function getTotal



