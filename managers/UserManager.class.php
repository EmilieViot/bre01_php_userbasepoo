<?php

require "../models/User.class.php";

class UserManager {
    
    private array $users = [];
    private PDO $db;
    
    
    public function __construct()
    {
        $host = "db.3wa.io";
        $port = "3306";
        $dbname = "emilieviot_userbase_poo";
        $connexionString = "mysql:host=$host;port=$port;dbname=$dbname";
        
        $user = "emilieviot";
        $password = "5a1798f311dc7281a54638f13a8bcb31";
        
        $this->db = new PDO(
                $connexionString,
                $user,
                $password
                );
    }
    
    public function getUsers(): array
    {
        return $this->users;
    }

    public function setUsers(array $users): void
    {
        $this->users = $users;
    }
    
    public function loadUsers(): void
    {
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $usersDatas = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $usersTab = [];
        
        foreach($usersDatas as $userData) {
            $user = new User($userData["id"], $userData["username"], $userData["email"], $userData["password"], $userData["role"], $userData["created_at"]);
            $user->setId($userData["id"]);
            $usersTab[]=$user;
        }
        
        $this->setUsers($usersTab);

    }
    
    public function saveUser(): void
    {
        $this->user = $user;
    }
    
    public function deleteUser(): void
    {
        $this->user = $user;
    }
    
}