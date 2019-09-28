<?php


class note
{
    public static function AddNote($user_id, $title, $body) 
    {
        
        global $db; 
        
        $slug = request::slug($title);
        $param = array(
            'user_id' => $user_id,
            'title' => $title,
            'body' => nl2br($body),
            'slug' => $slug,
            'timestamp' => date("Y-m-d H:i:s")
        );

        $statement = "INSERT INTO note (user_id, title, body, slug, timestamp) VALUES (:user_id, :title, :body, :slug, :timestamp)";

        if ($db->query($statement, $param)) {
            respond::alert('success', '', 'Noted Added Successfully');
            header('Location: home');
        }else {
            respond::alert('danger', '', 'Sorry! Please try again');
        }

    }
    
    public static function FetchNotes($id) 
    {
        
        global $db;
        
        $param = array(
            'user_id' => $id
        );
        
        $note = $db->query("SELECT * FROM note WHERE user_id = :user_id ORDER BY timestamp DESC", $param,true);
        
        if ($note) {
            
            return $note ;
            
        }
        
    }
    
    public static function FetchSingleNote($id) 
    {
        
        global $db;
        
        $param = array(
            'id' => $id
        );
        
        $note = $db->query("SELECT * FROM note WHERE id = :id", $param, false);
         
        if($note){
            return $note;
        }
        
    }
    
    public static function UpdateNote($id, $title, $body) 
    {
        
        global $db;
        
        $slug = request::slug($title);
        $param = array(
            'id' => $id,
            'title' => $title,
            'body' => nl2br($body),
            'slug' => $slug,
            'timestamp' => date("Y-m-d H:i:s")
        );
        
        $update = "UPDATE note SET title = :title, body = :body, timestamp = :timestamp, slug = :slug  
                               WHERE id = :id";
        $note = $db->query($update, $param, false);
         
        if($note){
            return $note;
        }
        
    }
    
    public static function DeleteNote($id) 
    {
        global $db;
        
        $param = array(
            'id' => $id
        );
        
        $delete = "DELETE FROM table_name WHERE id = :id";
        $note = $db->query($delete, $param);
        
        if($note){
            return $note;
        }
    }
}