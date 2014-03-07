<section id="press" class="wrapper">
    <div id="leftSide" class="sides">
        <ul>
        <?foreach($this->press['left'] as $press){?>
            <li>
                <h1><?=$press['name']?></h1>
                <h4><?=$press['subtitle']?></h4>
                <div class="content"><?=$press['content']?></div>
                <a href="<?=$press['link']?>" target="_blanl"><?=$this->lang['View article']?></a>
            </li>
        <?}?></ul>
    </div><div id="rightSide" class="sides"> <ul>
        <?foreach($this->press['right'] as $press){?>
            <li>
                <h1><?=$press['name']?></h1>
                <h4><?=$press['subtitle']?></h4>
                <div class="content"><?=$press['content']?></div>
                <a href="<?=$press['link']?>" target="_blanl"><?=$this->lang['View article']?></a>
            </li>
        <?}?>
    </ul></div>
</section>