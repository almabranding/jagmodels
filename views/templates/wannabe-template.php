

<!--
    in reality you'd have this in an external stylesheet;
    i am using it like this for the sake of the example
-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<!--
    again, in reality you'd have this in an external JavaScript file;
    i am using it like this for the sake of the example
-->

<?php echo (isset($zf_error) ? $zf_error : (isset($error) ? $error : '')) ?>

<?= $user_id ?>
<div id="signup-box">
    <ul style="position: absolute;bottom: 0;opacity: 0;">
        <li class="row even"><?php echo $imagen_1 ?>
        <li class="row even"><?php echo $imagen_2 ?>
        <li class="row even"><?php echo $imagen_3 ?>
    </ul>
    <ul>
        <li class="row even">
            <?php echo $label_name . $name ?>
        </li>
        <li class="row even age">
            <?php echo $label_age . $age ?>
        </li>
        <li class="row even height">
            <?php echo $label_height . $height ?>
        </li>
        <li class="row even">
            <?php echo $label_location . $location ?>
        </li>
        <li class="row even">
            <?php echo $label_email . $email ?>
        </li>
        <li class="row even">
            <?php echo $label_phone . $phone ?>
        </li>
        <li class="row even">
            <?php //echo $label_message . $message ?>
        </li>
    </ul>
    <ul class="imagenes">
        <li class="row even"><?php echo $label_imagen_1 ?><div><?php echo $label_imagen_1 ?></div>
        <li class="row even"><?php echo $label_imagen_2 ?><div><?php echo $label_imagen_2 ?></div>
        <li class="row even"><?php echo $label_imagen_3 ?><div><?php echo $label_imagen_3 ?></div>
    </ul>
    
    <div class="clear"></div>
</div>
<div class="row last"><?php echo $_btnsubmit ?></div>

