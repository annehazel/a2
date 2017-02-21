<?php require('roundSplitCheck.php'); ?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>A2: Split the Check!</title>

</head>

<body>

    <h1>Split the Check!</h1>
    
    
    <form>
        
        <label for="subtotal" >Bill Total:</label><br/>
        <input type="text" id="subtotal" name="subtotal" /><br/>
        
        <label for="tip" >How much tip would you like to leave?</label><br/>
        <input type="radio" id="tip0" name="tip" value=0> No tip
        <input type="radio" id="tip10" name="tip" value=0.10> 10%
        <input type="radio" id="tip15" name="tip" value=0.15> 15%
        <input type="radio" id="tip20" name="tip" value=0.20> 20%
        <input type="radio" id="tip25" name="tip" value=0.25> 25%<br/>
        
        <label for="subtotal" >The check should be split between how many people?</label><br/>
        <input type="number" id="people" name="people" /><br/>
        
    </form>
    
    
</body>
</html>