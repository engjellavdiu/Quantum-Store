<?php

require_once "Database.php";

class MessageMapper extends DatabaseConfig
{
    private $connection;
    private $query;

    public function __construct()
    {
        $this->connection = $this->getConnection();
    }

    public function insertMessage($emri, $mbiemri, $email, $msg)
    {
        $this->query = "insert into messages (emri, mbiemri, email, msg) values (:emri, :mbiemri, :email, :msg)";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":emri", $emri);
        $statement->bindParam(":mbiemri", $mbiemri);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":msg", $msg);
        $statement->execute();
    }

    public function getAllMessages()
    {
        $this->query = "select * from messages order by id desc";
        $statement = $this->connection->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getUnreadMessages()
    {
        $this->query = "select * from messages where is_read=0 order by id desc";
        $statement = $this->connection->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getMessageById($id)
    {
        $this->query = "select * from messages where id=:id";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function setAsRead($id)
    {
        $this->query = "update messages set is_read=1 where id=:id";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public function setAsUnread($id)
    {
        $this->query = "update messages set is_read=0 where id=:id";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public function deleteMessage($id)
    {
        $this->query = "delete from messages where id=:id";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    public function getText()
    {
        $this->query = "select * from rrethnesh";
        $statement = $this->connection->prepare($this->query);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateText($id, $text)
    {
        $this->query = "update rrethnesh set text=:newtext where id=:id";
        $statement = $this->connection->prepare($this->query);
        $statement->bindParam(":id", $id);
        $statement->bindParam(":newtext", $text);
        $statement->execute();
    }
}
