<div id="header">
    <div id="header_wrapper">
        <a href="/<?= LANG ?>/<?= PACKAGE ?>/<?= TYPEBOOKING ?>"><h1><?= $this->title ?></h1></a>
    </div>
</div>
<div id="gallery_wrapper" style='margin-top: 40px;'>
     <a href="/<?= LANG ?>/<?= PACKAGE ?>/<?= TYPEBOOKING ?>/all"><div id="arrowBack">Back to package</div></a>
    <section id="modelGallery">      
        <div id="banner" class="royalSlider rsMinW">
            <?
            foreach ($this->modelGallery as $pack) {
                $multiple = (sizeof($pack) > 1) ? 'multiple' : '';
                ?>
                <div class="banner-box <?= $multiple ?>"><ul >
    <? foreach ($pack as $value) { ?>
                            <li>
                                <img class="" src="<?= WEB ?>/uploads/<?= Model::getRouteImg($value['img_date']) . $value['file_name']; ?>">
    <? } ?></ul></div><? } ?>
        </div>
        <div class="modelListInfo">
            <h2><?= $this->model['name']; ?></h2>
            <div class="modelExtraInfo">
                <ul>
                    <?
                    if ($this->SIU) {
                        foreach ($this->siuList as $value) 
                            echo ($this->siu[$value]) ? '<li><span class="attr">' . $this->lang[$value] . '</span>: <span>' . $this->siu[$value] . '</span></li>' : '';
                    }
                    ?>
                </ul>
                <div class="clr"></div>
            </div>
        </div>

    </section>
</div>

