<?php require('roundSplitCheck.php'); ?>

<!DOCTYPE html>
    
<html>

<head>
    <meta charset="utf-8">
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    
    <title>A2: Split the Check!</title>

</head>

<body>

    <h1>Split the Check!</h1>
    
    
    <form>
        
        <label for="subtotal" >Bill Total:</label><br/>
        <input type="text" id="subtotal" name="subtotal" value="<?=$form->prefill('subtotal', '0.00')?>"/><br/>
        
        <label for="tip" >How much tip would you like to leave?</label><br/>      
        <select name="tip" id="tip">
            <option value=0 <?=$form->prefillSelect('tip', '0')?>>No Tip</option>
            <option value=.1 <?=$form->prefillSelect('tip', '.1')?>>10%</option>
            <option value=.15 <?=$form->prefillSelect('tip', '.15')?>>15%</option>
            <option value=.20 <?=$form->prefillSelect('tip', '.20')?>>20%</option>
            <option value=.25 <?=$form->prefillSelect('tip', '.25')?>>25%</option>
        </select>
        <br/>
        
        <label for="people" >The check should be split between how many people?</label><br/>
        <input type="number" id="people" name="people" value="<?=$form->prefill('people', '2')?>" /><br/>
        
         <input type='submit' class='btn'>
         
         <div class="alert alert-success">
            <strong>Success!</strong> Indicates a successful or positive action.
        </div>
         
    </form>
    
    <?php
    dump($_GET);
    dump($subtotal);
    dump($tip);
    dump($people);
    dump($duePerPerson);
    dump($errors);
    dump($subtotal);
    dump($form->sanitize($subtotal));
    ?>
    
</body>
</html>