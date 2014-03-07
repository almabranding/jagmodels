<div id="sectionHeader">
    <h1>Press</h1>
    <div id="sectionNav">
        <div class="btn blue" onclick="location.href = '<?=URL  ?>press/view/'" >Create new article</div>
    </div>
    <div class="clr"></div>
</div>
<div id="sectionContent">
    <?
    $this->getView('table');
    $this->getView('pagination');
    ?>
</div>