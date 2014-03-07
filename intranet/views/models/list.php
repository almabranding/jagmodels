<div id="sectionHeader">
    <h1>Model</h1>
    <div id="sectionNav">
        <a class="btn grey" href='<?= URL?>/models/webview'>Web view</a>
        <div class="btn blue" onclick="location.href = '<?= URL?>/models/addmodel'">Add new model</div>
    </div>
    <div class="clr"></div>
</div>
<div id="sectionContent">
    <? $this->searchModel->render('views/models/custom-template.php'); ?>
    <ul id="" class="ui-sortable" rel="cosa">
        <? foreach ($this->models as $key => $value) { ?>
            <li rel="<?= $value['model_id']?>" class="ui-state-default modelList" onclick="">
                <a target="_blank" href="<?= WEB . 'gallery/model/' . $value['model_id'] . '-' . $value['name']; ?>"><img caption="<?= $value['caption_' . LANG]; ?>" src="<?= URL . UPLOAD . $value['img'].$strNoCache ?>"></a>
                <p class="modelName"><?= $value['name']; ?></p> 
                <p><?= $this->categories[$value['category_id']]['name'] ?></p>
                <input class="btnSmall editImg" type="button" value="Portfolio" onclick="location.href = '<?= URL ?>/models/editportafolio/<?= $value['model_id']; ?>'">
                <input class="btnSmall editImg" type="button" value="Edit" onclick="location.href = '<?= URL?>/models/editmodel/<?= $value['model_id']; ?>'" >
                <input id="" class="btnSmall deleteModel" type="submit" value="Delete" style="background: #bb0000;">
            </li>
        <? } ?>
    </ul>
<? $this->getView('pagination'); ?>
</div>
