<div id="sectionHeader">
    <a href="<?= URL ?>models/lista"><div id="arrowBack">Back to models</div></a>
    <h1>Web View</h1>
    <div class="clr"></div>
    <div id="sectionNav">
        <div class="linkNav" id="websortByName">Order by name</div> 
   </div>
    <div class="clr"></div>
</div>
<div id="sectionContent">
    <h4><?= $packURL?></h4>
    <input type="hidden" value="<?= $this->id; ?>" id="packageId">
    <ul id="sortable" class="ui-sortable sortable" rel="cosa">
        <?php foreach ($this->models as $key => $value) { ?>
            <li id="foo_<?= $value['model_id']; ?>" class="ui-state-default listImage modelList">
                <img caption="<?= $value['caption']; ?>" src="<?= URL . UPLOAD . Model::getRouteImg($value['img_date']) . 'thumb_' . $value['file_name']; ?>">
                <p><?=$value['name']?></p>
            </li>
        <?php } ?>
</div>