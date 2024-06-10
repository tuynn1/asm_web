<?php

namespace Tuyennt\Asm2Oop\Models;

use Tuyennt\Asm2Oop\Commons\Model;

class Product extends Model
{
    protected string $tableName = 'products';

    public function findByEmail($email)
    {
        return $this->queryBuilder
        ->select('*')
        ->from($this->tableName)
        ->where('email = ?')
        ->setParameter(0, $email)
        ->fetchAssociative();
    }

}