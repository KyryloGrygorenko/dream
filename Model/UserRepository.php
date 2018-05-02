<?php

namespace Model;

use Library\PdoAwareTrait;
use Model\Entity\User;

class UserRepository
{
    use PdoAwareTrait;
    
    public function find($email, $password)
    {
        $sth = $this->pdo->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
        
        $sth->execute([
            'email' => $email,
            'password' => $password

        ]);

        $res = $sth->fetch(\PDO::FETCH_ASSOC);

        $isAdmin=false;

        if ($res['role']=='admin'){
            $isAdmin=true;
        }
        
        if (!$res) {
            return null;
        }

        $role=$res['role'];
        return (new User())->setEmail($email)->setIsAdmin($isAdmin)->setId($res['id'])->setRole($role);
    }

    public function findAll($offset, $count)
    {
        $sth = $this->pdo->query("SELECT * FROM `users` LIMIT {$offset}, {$count} ; ");
        $collection=[];

        while($res = $sth->fetch(\PDO::FETCH_ASSOC)){
            $users = (new User())
                ->setId($res['id'])
                ->setName($res['name'])
                ->setEmail($res['email'])
                ->setRole($res['role']);
            $collection[] = $users;
        }
        return $collection;

    }

    public function findByTag($offset, $count,$tag)
    {
        $tag='%'.$tag.'%';
        $collection = [];
        $sth = $this->pdo->prepare("SELECT * FROM `users` WHERE (name LIKE :tag) OR (email LIKE :tag) OR (role LIKE :tag) LIMIT {$offset}, {$count};");

        $sth->execute([
            'tag' => $tag,
        ]);

        while($res = $sth->fetch(\PDO::FETCH_ASSOC)){
            $users = (new User())
                ->setId($res['id'])
                ->setName($res['name'])
                ->setEmail($res['email'])
                ->setRole($res['role']);
            $collection[] = $users;
        }

        return $collection;
    }

    public function add($name,$email,$password,$role)
    {
        $sth = $this->pdo->prepare('INSERT INTO `users` VALUES (null, :name, :email, :password, :role)');

        $sth->execute([
            'name' =>$name,
            'email' =>$email,
            'password' =>$password,
            'role' =>$role,
        ]);

    }

    public function update($user_id,$name,$email,$role)
    {
        $sth = $this->pdo->prepare("UPDATE `users` SET `name` =:name, `email` =:email, `role` =:role WHERE `id` = :user_id;");
        $sth->execute([
            'user_id' => $user_id,
            'name' =>$name,
            'email' =>$email,
            'role' =>$role
        ]);
    }

    public function updatePassword($user_id,$password)
    {
        $sth = $this->pdo->prepare("UPDATE `users` SET `password` =:password WHERE `id` = :user_id;");
        $sth->execute([
            'user_id' => $user_id,
            'password' =>$password
        ]);
    }
    
    public function delete($user_id)
    {
        $sth = $this->pdo->prepare("DELETE FROM `users` WHERE `id` = :user_id ");
        $sth->execute(['user_id' => $user_id]);

    }


    public function count(){
        $sth = $this->pdo->prepare("SELECT COUNT(*) AS count FROM users;");
        $sth->execute();
        return $sth->fetchColumn();
    }

    public function countByTag($tag){
        $tag='%'.$tag.'%';
        $sth = $this->pdo->prepare("SELECT COUNT(*) AS count FROM users WHERE (name LIKE :tag) OR (email LIKE :tag) OR (role LIKE :tag);");
        $sth->execute(['tag' => $tag]);
       return $sth->fetchColumn();
    }



}