<?php

class Message
{
    protected $id;
    protected $conversation_id;
    protected $user_id;
    protected $content;
    protected $created_at;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getConversationId()
    {
        return $this->conversation_id;
    }

    /**
     * @param mixed $conversation_id
     */
    public function setConversationId($conversation_id)
    {
        $this->conversation_id = $conversation_id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public static function getMessagesForConversationId($conversation_id): array
    {
        $db = init_db();

        $req = $db->prepare("SELECT * FROM messages WHERE conversation_id = ? ORDER BY created_at ASC");
        $req->execute([$conversation_id]);

        // Close database connection
        $db = null;

        return $req->fetchAll();
    }

    public static function createMessage(Message $message): Message
    {
        $db = init_db();

        $req = $db->prepare("INSERT INTO messages VALUES (NULL, ?, ?, ?, CURRENT_TIME())");
        $req->execute([
            $message->getConversationId(),
            $message->getUserId(),
            $message->getContent()
        ]);

        $message->setId($db->lastInsertId());

        // Close database connection
        $db = null;

        return $message;
    }

}
