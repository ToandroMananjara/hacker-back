<?php
class Comments
{
    private $table = "about";
    private $connexion = null;

    public $id;
    public $post_id;
    public $user_id;
    public $content;
    public $create_at;

    public function __construct($conn)
    {
        if ($this->connexion == null) {
            $this->connexion = $conn;
        }
    }
}
