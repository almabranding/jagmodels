<div id="sectionHeader">
    <a href="<?= URL ?>models/lista"><div id="arrowBack">Back to models</div></a>
    <h1><?= $this->model['name']; ?></h1>
    <div id="sectionNav">
        <div class="linkNav" id="allSelect">Select all photos</div>
        <a target="_blank" href="<?= WEB; ?>ES/gallery/model/<?= $this->id; ?>"><div class="linkNav" id="">View portfolio</div></a>
        <div class="btn blue" id="selectHeadsheet">Use as a headsheet</div>
        <div id="deleteImage" class="btn red" >Delete</div>
        <div class="btn grey" onclick="showPop('newImage');" >Add new photo</div>
        <a href="<?= URL ?>/models/editmodel/<?= $this->id; ?>"><div class="btn grey" >Edit model</div></a>
    </div>
    <div class="clr"></div>
</div>
<input id="model_id" value="<?= $this->model['model_id'] ?>" type="hidden">
    <ul id="library" rel="0">
        <? if ($this->modelPhotosReserva) foreach ($this->modelPhotosReserva as $key => $value) { ?>
                <li rel="<?= $value['id']; ?>" class="modelList imgmove">
                    <input value="<?= $value['id']; ?>" name="check[]" class="checkFoto" type="checkbox">
                    <img width="154" height="207" class="listImage" caption="<?= $value['caption_' . LANG]; ?>" src="<?= URL . UPLOAD . Model::getRouteImg($value['img_date']) . 'thumb_' . $value['file_name'] . $strNoCache; ?>"/>
                    <div class="buttons">
                        <a target="_blank" href="<?= URL . UPLOAD . Model::getRouteImg($value['img_date']) . $value['file_name']; ?>"><input id="h1096" class="btnSmall" type="button" value="View" ></a>
                        <input id="h1096" class="btnSmall editImg" type="button" value="Edit" onclick="location.href = '<?=URL;?>models/viewImage/<?php echo $value['id']; ?>'" >
                        <input class="btnSmall btnDelete" type="button" value="Delete" onclick="secureMsg('Do you want to delete this photo?', 'models/deleteImg/<?= $value['id']; ?>');">
                    </div>
                </li>      
            <? } ?>
    </ul>

<div id="models-gallery">
    <?php for ($i = 1; $i < 22; $i++) { ?>
        <ul class="group-box" rel="<?= $i ?>">
            <?php if ($this->modelPhotos[$i]) foreach ($this->modelPhotos[$i] as $key => $value) { ?>
                    <li rel="<?= $value['id']; ?>" class="modelList imgmove <?= ($value['main']) ? 'mainPic' : '' ?>" onclick="">
                        <input value="<?= $value['id']; ?>" name="check[]" class="checkFoto" type="checkbox">
                        <img width="154" height="207" class="listImage" caption="<?= $value['caption_' . LANG]; ?>" src="<?= URL . UPLOAD . Model::getRouteImg($value['img_date']) . 'thumb_' . $value['file_name'] . $strNoCache; ?>"/>
                        <div class="buttons">
                            <a target="_blank" href="<?= URL . UPLOAD . Model::getRouteImg($value['img_date']) . $value['file_name']; ?>"><input id="h1096" class="btnSmall" type="button" value="View" ></a>
                            <input id="h1096" class="btnSmall editImg" type="button" value="Edit" onclick="location.href = '<?= URL; ?>models/viewImage/<?php echo $value['id']; ?>'" >
                            <input class="btnSmall btnDelete" type="button" value="Delete" onclick="secureMsg('Do you want to delete this photo?', '/models/deleteImage/<?= $this->model['model_id'] ?>/<?= $value['id'] ?>');">
                        </div>
                    </li>
                <?php } ?>
        </ul>
    <?php } ?>
</div>

<div class="white_box hide" id="newImage" style="width:auto;left:30%;position:absolute;">
    <? $this->viewUploadFile('models/addPhoto/' . $this->id); ?>
</div>
