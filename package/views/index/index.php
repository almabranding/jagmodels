<div id="cover_wrapper" style="<? if($this->image) echo "background:url('".WEB."/uploads/models/".Model::idToRute($this->image[0]['id'])."original/".$this->image[0]['file_file_name']."') no-repeat";?>">
    <?=$this->package['photo_id']?>
</div>
<style>
    #cover_wrapper{
        height: 100%;
    margin: auto;
    position: absolute;
    }
    #footer_wrapper {
    position: absolute !important;
}
    </style>