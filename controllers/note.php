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
            'body' => $body,
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
        
        $post = $db->query("SELECT * FROM note WHERE user_id = :user_id ORDER BY timestamp DESC", $param,true);
        
        if ($post) {
            
            return $post ;
            
        }
        
    }
}