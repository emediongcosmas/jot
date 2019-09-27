$('#edit-note').on('show.bs.modal', function (e) {
    
    var note_id= $(e.relatedTarget).data('id');
    var url = 'note::FetchSingleNote(note_id)';
    
    $.ajax({
        url: url,
        method: "POST",
        data:{note_id:note_id},
        dataType:"JSON",
        success:function(data)
        {   
            $('#proPrice').text(data.price);
            $('#proName').text(data.name);
            $('#proNameTitle').text(data.name);
            $('#proDesc').text(data.description);
            $('#proImage').html(data.img); 
        }
    });
    
});