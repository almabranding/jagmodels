<div id="sectionHeader">
    <? if($this->model){ ?>
    <a href="<?=URL?>models/editportafolio/<?=$this->model['model_id'];?>"><div id="arrowBack">Back to model</div></a>
    <h1>Edit <?=$this->model['name'];?></h1>
    <? }else{?>
     <a href="<?=URL?>models/lista"><div id="arrowBack">Back to models</div></a>
    <h1>Create model <?=$this->model['name'];?></h1>
    <?}?>
    <div class="clr"></div>
</div>
<div id="sectionContent">
    <?php $this->form->render(); ?>
</div>
