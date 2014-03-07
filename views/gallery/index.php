
    <section id="modelGallery" class="wrapper">        
        <div id="banner" class="royalSlider rsMinW">
            <? foreach ($this->modelGallery as $pack) {
                $multiple = (sizeof($pack) > 1) ? 'multiple' : '';
                ?>
                <div class="banner-box <?= $multiple ?>"><ul >
                        <? foreach ($pack as $value) { ?>
                            <li>
                                <img class="" src="/uploads/<?= Model::getRouteImg($value['img_date']) . $value['file_name']; ?>">
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

