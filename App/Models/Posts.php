<?php

namespace App\Models;

use \Core\Model;

class Posts 
{    
    public function getAllPosts()
    {
        $connect = Model::connectTo();
        $connect->sqlQuery("
            SELECT <some data>
            FROM <some table>
        ");
        $connect->executeQuery();
        return $connect->resultSet();
    }
}