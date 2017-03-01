<?php require('roundSplitCheck.php'); ?>

<!DOCTYPE html>
    
<html>

<head>
    <meta charset="utf-8">
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link href='style.css' rel='stylesheet'>
    <title>A2: Split the Check!</title>

</head>

<body>

    <h1>Split the Check!</h1>
    
    
    <form>
        
        <label for="subtotal" >Bill Total (subtotal)<span class="required">*</span>:</label><br/>
        <input type="number" step="0.01" id="subtotal" name="subtotal" value="<?=$form->prefill('subtotal', '0.00')?>" /><br/>
        
        <label for="tip" >How much tip would you like to leave?<span class="required">*</span></label><br/>      
        <select name="tip" id="tip">
            <option value=0 <?=$form->prefillSelect('tip', '0')?>>No Tip</option>
            <option value=.1 <?=$form->prefillSelect('tip', '.1')?>>10%</option>
            <option value=.15 <?=$form->prefillSelect('tip', '.15')?>>15%</option>
            <option value=.20 <?=$form->prefillSelect('tip', '.20')?>>20%</option>
            <option value=.25 <?=$form->prefillSelect('tip', '.25')?>>25%</option>
        </select>
        <br/>
        
        <input type="checkbox" name="round" <?php if($round) echo 'CHECKED' ?>> Round the total (including the tip) up to the nearest whole dollar<br>
        
        <label for="people" >The check should be split between how many people?<span class="required">*</span></label><br/>
        <input type="number" id="people" name="people" value="<?=$form->prefill('people', '2')?>" /><br/>
        
        <input type='submit' class='btn'>
         
        <?php if($form->isSubmitted()): ?>
        
            <?php if($errors): ?>     
            
                <div class='alert alert-danger'>
                    <ul>
                        <?php foreach($errors as $error): ?>
                        <li><?=$error?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>    
        
            <?php else: ?>
        
                <div class="alert alert-success">
                    <?=$successMessage?>
                </div>
        
            <?php endif; ?>
            
        <?php endif; ?>
    
    </form>
    
    <div>
        <p><span class="required">*</span> Indicates a required field.</p>
    </div>
    
</body>
</html>