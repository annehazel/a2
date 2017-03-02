<!--A2 - Assignment A2
2017, dynamic web applications
Anne Hazel-->


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

<div class="container">
    <div class="col-md-8">  
    
        <h1>Split the Check!</h1>
        
        <p>Use the calculator below to figure out how much money each person owes in order to pay the check.</p>
        
        <!--Begin form-->
    
        <form method="get">
            
    
            <!--textbox, type of number-->
            <div class="form-group">
                <label for="subtotal" >Bill total (subtotal)<span class="required">*</span>:</label><br/>
                <input type="number" step="0.01" id="subtotal" name="subtotal" value="<?=$form->prefill('subtotal', '0.00')?>" /><br/>
            </div>
            
            <!--dropdown -->
            <div class="form-group">
                <label for="tip" >How much tip would you like to leave?<span class="required">*</span></label><br/>      
                <select name="tip" id="tip">
                    <option value=0 <?=$form->prefillSelect('tip', '0')?>>No Tip</option>
                    <option value=.1 <?=$form->prefillSelect('tip', '.1')?>>10%</option>
                    <option value=.15 <?=$form->prefillSelect('tip', '.15')?>>15%</option>
                    <option value=.20 <?=$form->prefillSelect('tip', '.20')?>>20%</option>
                    <option value=.25 <?=$form->prefillSelect('tip', '.25')?>>25%</option>
                </select>
                <br/>
            </div>
            
            <!--checkbox -->
            <div class="form-group">
                <input type="checkbox" name="round" <?php if($round) echo 'CHECKED' ?>>
                <label for="round">Yes, round the total (including the tip) up to the nearest whole dollar</label>
                <br/>
            </div>
            
            <!--textbox, number -->
            <div class="form-group">
                <label for="people" >The check should be split between how many people?<span class="required">*</span></label><br/>
                <input type="number" id="people" name="people" value="<?=$form->prefill('people', '2')?>" /><br/>
            </div>
            
            <input type="submit" class="btn">
             
             <!-- php to handle the display of errors -->
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
    </div>   <!-- end container class -->  
</div>  <!-- end container class -->



</body>
</html>