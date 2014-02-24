function updateDragItem() {
    var a = $("#compositeBox li input").serialize();
    var model_id = $("#model_id").val();
    $.post(ROOT + 'models/compositeSort', a + '&action=updateOrder&model_id=' + model_id).done(function(data) {
    });
}
function updateListItem(itemId, newStatus) {
    var sorted = $("#sortable").sortable("serialize");
    $.post(ROOT + 'models/sort', sorted + '&action=updateOrder').done(function(data) {
    });
}
$(document).ready(function() {
    var $model_id = $('#model_id').val();
    $('.imgmove').draggable({
        revert: 'invalid',
        stop: function() {
            // Make it properly draggable again in case it was cancelled
            $(this).draggable('option', 'revert', 'invalid');
        }
    });

    $('.group-box').droppable({
        drop: function(event, ui) {
            var $this = $(this);
            // Check number of elements already in
            if ($this.find('.imgmove').length >= 2) {
                // Cancel drag operation (make it always revert)
                ui.draggable.draggable('option', 'revert', true);
                return;
            }

            // Put dragged item into container
            ui.draggable.appendTo($this).css({
                top: '0px',
                left: '0px'
            });

            // Do whatever you want with ui.draggable, which is a valid dropped object
        }
    });
    $('#library').droppable({
        drop: function(event, ui) {
            var $this = $(this);
            ui.draggable.appendTo($this).css({
                top: '0px',
                left: '0px'
            });
        }
    });
    /*$("#compositeBox, #draggable").sortable({
     connectWith: ".compositeBox,.sortable",
     update: function(event, ui) {
     updateDragItem();
     }
     });*/
    $('.listImage').on('click', function() {
        var $checkbox = $(this).parent().children('.checkFoto');
        $checkbox.prop('checked', !$checkbox.prop('checked'));
    });
    $('.deleteSingle').on('click', function() {
        var $lista = $(this).parent().children('.checkFoto').val();
        $lista = 'check%5B%5D=' + $lista;
        if (confirm('¿Estas seguro?'))
            $.post(ROOT + 'ES/models/deleteImages', $lista).done(function(data) {
                location.reload();
            });
    });
    $('#deleteImage').on('click', function() {
        var $listaImages = $('.checkFoto:checked').serialize();
        if (confirm('¿Estas seguro?'))
            $.post(ROOT + 'ES/models/deleteImages', $listaImages).done(function(data) {
                location.reload();
            });
    });
    $('.deleteModel').on('click', function() {
        var $listaImages = $(this).parent().attr('rel');
        if (confirm('¿Estas seguro?'))
            $.post(ROOT + 'ES/models/deleteModel/' + $listaImages).done(function(data) {
                location.reload();
            });
    });
    $('#saveInputs').on('click', function() {
        var $listaInputs = $(':input').serialize();
        $.post(ROOT + 'ES/models/saveInputs', $listaInputs).done(function(data) {
            alert("Changes has been saved");
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