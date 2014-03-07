
<footer id="footer">
    <ul id="footer_list">
        <li>JAG Models | 
        <li>20 West 20th | 
        <li>Suite 905 | 
        <li>New York, NY 10011 | 
        <li>646.398.9684
    </ul><ul class="socialIcons">
        <li><a  href="http://facebook.com/jagmodels" target="_blank"><div id="fb"></div></a>
        <li><a  href="http://twitter.com/jagmodels" target="_blank"><div id="tw"></div></a>
        <li><a  href="http://instagram.com/jagmodels" target="_blank"><div id="ins"></div></a>
        <!--<li><a  href="#"><div id="yt"></div></a>-->
    </ul>

</footer> 
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="<?= URL; ?>public/js/custom.js"></script>
<script src="<?= URL; ?>public/js/mobile.js"></script>
<script src="<?= URL; ?>public/js/zebra_form.js"></script>


<?php
if (isset($this->js))
    foreach ($this->js as $js)
        echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
?>
</body>
</html>