<?php 

    if(isset($_POST['id'])){
        $note   = note::FetchSingleNote($_POST['id']);
        $title  = $note['title'];
        $body   = preg_replace('#<br\s*/?>#', "\n", $note['body']); 
?>
 
<div class="container-fluid">
    <div class="row h-100">
        <div class="col-lg-8 d-inline mb-4">
            
            <form method="POST" id="post-form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>">
                </div>
                <div class="form-group">
                    <label for="description">Note</label>
                    <textarea class="form-control" name="body"><?php echo $body;?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="addNote">Save</button>
                <button type="button" class="btn btn-secondary" onclick="window.location.href='home';">Close</button>
            </form>
        </div>
        
    </div>
    
</div>
 
<?php } ?>
   