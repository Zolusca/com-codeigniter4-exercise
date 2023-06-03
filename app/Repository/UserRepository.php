<?php
namespace App\Repository;

use App\Models\UserModel;

class UserRepository
{
    private $db;
    private UserModel $user;

    public function __construct()
    {
        $this->db=\Config\Database::connect();
        $this->user=new UserModel();
    }

    public function InsertUser(UserModel $user)
    {
        // $this->db=db_connect();
        $query    =   'insert into user (nama,email,password,tipe_user) values(?,?,?,?)';
        $statment =   $this->  db->query($query,[
            $user->getNama(),
            $user->getEmail(),
            $user->getPassword(),
            $user->getTipeUser()
        ]);
        if($statment){
            return true;
        }else{
            return false;
        }
    }
    
    public function findByEmail(string $email)
    {
        $query      =   'select id_user,nama,email,password from user where email=?';
        $statment   =   $this-> db->query($query,[$email]);
        
        try{
            if($statment->getResult()!=null){
                foreach ($statment->getResult() as $row) {
                    $this->   user->setEmail($row->email);
                    $this->   user->setNama($row->nama);
                    $this->   user->setPassword($row->password);
                    $this->   user->setId($row->id_user);
                }
                return $this->user;
            }else
            {
                return null;
            }
            
        }finally{
            $this-> db->close();
        }
        
    }
    
}