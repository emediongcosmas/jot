<?php
    if(isset($_POST['addNote']))
    {
        note::AddNote(
            $user_id,
            $_POST['title'], 
            $_POST['body']
        );
    }       
?>

<a href="" data-toggle="modal" data-target="#addNote" class="float">
    <i class="fa fa-plus my-float"></i>
</a>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        
        <?php 
        
            $notes = note::FetchNotes($id);
            
            if($notes){
            foreach($notes as $note) {
                
        ?> 

            <!-- Content Column -->
            <div class="col-lg-5 mb-4">
                <!-- Content -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><?= $note['title']; ?></h6>
                    </div>
                    <div class="card-body">
                        <p><?= $note['body']; ?></p>
                    </div>
                </div>
            </div>
        
        <?php } } ?>
        
    </div>

</div>
<!-- /.container-fluid -->