<? $packURL= PACKAGE . urlencode(str_replace('&','and',$this->package['id'] . ' ' .$this->package['name'])).'/' . $this->package['type'];
$packURL=str_replace('+','-',$packURL);?>
<div id="sectionHeader">
    <a href="<?= URL ?>packages/lista"><div id="arrowBack">Back to packages</div></a>
    <h1><?= $this->package['name'] ?></h1>
    <div id="sectionNav">
        
        <a href="<?= URL . LANG; ?>/packages/getPdfPackage/<?= $this->id; ?>/<?= $this->package['name'] ?>" target="_blank"><div class="linkNav" id="print" style="margin-right: 5px;">Print PDF</div></a>
        <a href="<?= $packURL ?>" target="_blank"><div class="linkNav" id="">View package</div></a>
        <a href="<?php echo URL . LANG; ?>/packages/sortByName/<?= $this->id; ?>"><div class="linkNav" id="">Order by name</div></a>
        <div class="btn blue" onclick="location.href = '<?= URL ; ?>/packages/addModel/<?= $this->id; ?>'" >Add a model</div><div class="btn blue" id="saveInputs">Save</div>
        <div class="btn grey" onclick="location.href = '<?= URL ; ?>/packages/editCreatePackage/<?= $this->id; ?>'">Edit package</div>
        
        <div class="btn grey" onclick="location.href = '<?= URL ; ?>/packages/deliver/<?= $this->id; ?>'">Deliver package</div>
        <div class="btn red" id="deleteModels" onclick="">Delete models</div>
        <div class="btn red" id="deletePackage" onclick="">Delete package</div>
    </div>
    <div class="clr"></div>
</div>
<div id="sectionContent">
    <h4><?= $packURL?></h4>
    <input type="hidden" value="<?= $this->id; ?>" id="packageId">
    <ul id="sortable" class="ui-sortable sortable" rel="cosa">
        <?php foreach ($this->modelsPackage as $key => $value) { ?>
            <li id="foo_<?= $value['model_id']; ?>" class="ui-state-default listImage modelList" onclick="">
                <input value="<?= $this->id; ?>_<?= $value['model_id']; ?>" name="check[]" class="checkFoto" type="checkbox">
                <img caption="<?= $value['caption']; ?>" src="<?= URL . UPLOAD . Model::getRouteImg($value['img_date']) . 'thumb_' . $value['file_name']; ?>">
                <p><?=$value['name']?></p>
                <textarea rows="4" cols="50" name="note[<?=$value['model_id']; ?>]" class='inputSmall' value='<?=$value['note']?>'></textarea>
                <a href="<?=WEB?>gallery/model/<?=$value['model_id']?>" target="_blank"><input class="btnSmall editImg" type="button" value="View Portfolio"></a>
                <a href="<?=URL?>models/editportafolio/<?= $value['model_id']; ?>" target="_blank"><input class="btnSmall editImg" type="button" value="Edit Portfolio"></a>
                <input id="" class="btnSmall deleteSingle" type="submit" value="Delete"onclick="" style="background: #bb0000;">
            </li>
        <?php } ?>
</div>