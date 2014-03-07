/*function updateDragItem() {
 var a = $("#compositeBox li input").serialize();
 var model_id = $("#model_id").val();
 $.post(ROOT + 'models/compositeSort', a + '&action=updateOrder&model_id=' + model_id).done(function(data) {
 });
 }
 function updateListItem(itemId, newStatus) {
 var sorted = $("#sortable").sortable("serialize");
 $.post(ROOT + 'models/sort', sorted + '&action=updateOrder').done(function(data) {
 });
 }*/
function updateListItem(itemId, newStatus) {
    var sorted = $("#sortable").sortable("serialize");
    $.post(ROOT + 'models/websort', sorted + '&action=updateOrder').done(function(data) {
    });
}
function updateGroup(group) {
    var sorted = '';
    var id = group.attr('rel');
    group.find('.imgmove').each(function(index) {
        sorted = sorted + 'foo[]=' + $(this).attr('rel') + '&';
    });
    sorted = sorted + 'group=' + id + '&';
    $.post(ROOT + 'models/sortGroup', sorted + 'action=updateOrder').done(function(data) {
    });
}
$(document).ready(function() {
    var $model_id = $('#model_id').val();

    $('.imgmove').draggable({
        revert: 'invalid',
        appendTo: 'body', 
        helper: 'clone',
        connectToSortable: ".group-box",
        refreshPositions: true ,
        stop: function() {
            $(this).draggable('option', 'revert', 'invalid');
        }
    });
    $('.group-box').droppable({
        drop: function(event, ui) {
            var $this = $(this);
            var parent=false;
            console.log();
            $this.find('.imgmove').each(function(){
                if($(this).attr('rel')===ui.draggable.attr('rel')) parent=true;
            });
            if ($this.find('.imgmove').length >= 2 && !parent) {
                ui.draggable.draggable('option', 'revert', true);
                return;
            }
            ui.draggable.appendTo($this).css({
                top: '0px',
                left: '0px'
            });
            updateGroup($this);
        },
        out: function() {
        }
    });
  /*  $('.group-box').on('mouseover', function() {
        if ($(this).find('.imgmove').length == 2) {
            console.log(1);
            $('.group-box').droppable("disable");
        }
    });
    $('.group-box').on('mouseout', function() {
        if ($(this).find('.imgmove').length == 2) {
            console.log(2);
            $('.group-box').droppable("enable");
        }
    });
    $('.group-box').sortable({
        update: function(event, ui) {
            updateGroup($(this));
        }
    });*/
    $('#library').droppable({
        drop: function(event, ui) {
            var $this = $(this);
            ui.draggable.appendTo($this).css({
                top: '0px',
                left: '0px'
            });
            updateGroup($this);
        }
    });
    $('#websortByName').on('click', function() {
        $.post(ROOT + 'ES/models/websortByName').done(function(data) {
            location.reload();
        });
    });
    $('.listImage').on('click', function() {
        var $checkbox = $(this).parent().children('.checkFoto');
        $checkbox.prop('checked', !$checkbox.prop('checked'));
    });
    $('#deleteImage').on('click', function() {
        var $listaImages = $('.checkFoto:checked').serialize();
        if (confirm('¿Estas seguro?'))
            $.post(ROOT + 'ES/models/deleteImages', $listaImages).done(function(data) {
                location.reload();
            });
    });
    $('#allSelect').on('click', function() {
        var $checkbox = $('.checkFoto');
        $checkbox.prop('checked', true);
    });
    $('#selectHeadsheet').on('click', function() {
        $('.checkFoto:checked').index();
        var $listaImages = $('.checkFoto:checked').serialize();
        if ($('.checkFoto:checked').size() > 1) {
            alert('Select only one picture');
            return 0;
        }
        $.post(ROOT + 'ES/models/selectHeadsheet', $listaImages + '&model_id=' + $model_id).done(function(data) {
            location.reload();
        });
    });
});