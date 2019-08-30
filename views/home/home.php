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
                // $time = $jot['timestamp'];
                
        ?> 

            <!-- Content Column -->
            <div class="col-lg-3 d-inline mb-4">
                <!-- Content -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary float-left"><?= $note['title']; ?></h6>
                    </div>
                    <div class="card-body">
                        <p><?= $note['body']; ?></p>
                        <br>
                        
                        <div class="text-center options">
                            <!-- EDIT OPTION -->
                            <form action="edit-note" method="post">
                                <input type="hidden" name="id" value="<?php echo $note['id']; ?>">
                                <button type="submit" class="btn options"><i class="far fa-edit"></i></button>
                            </form>
                            <!-- DELETE OPTION -->
                            <form action="delete" method="post">
                                <input type="hidden" name="id" value="<?php echo $note['id']; ?>">
                                <button type="submit" class="btn options"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
        <?php } } ?>
        
    </div>

</div>
<!-- /.container-fluid -->