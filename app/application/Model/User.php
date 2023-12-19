<?php

namespace SmartSolucoes\Model;

use SmartSolucoes\Core\Model;
use SmartSolucoes\Libs\Helper;

class User extends Model
{

  public function allUsers()
  {
    $sql = "
          SELECT nome, id, acesso, telefone, email
          FROM user 
        ";
    $query = $this->PDO()->prepare($sql);
    $query->execute();
    return $query->fetchAll();
  }
}
