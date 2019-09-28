$(document).ready(function(){
    $(document).on('Click' , 'bn-delete' , function(){
        if(confirm('Are you sure about this?')) {
            var id = this.id;
            $.ajax({
                url: 'delete.php',
                type: 'POST',
                dataType: 'JSON',
                data: {"id":id},
                success:function(response){
                loadData();
                }
            });
        }
    });
});