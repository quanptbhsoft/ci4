<?php

namespace App\Models;

use CodeIgniter\Database\Query;
use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['idcourse','iduser','Status'];
    
    public function getOrder($check)
    {
        return $this   ->join('course', 'course.ID = `order`.idcourse')
                ->join('user', 'user.ID = `order`.iduser')
                ->select('user.Name AS username')
                ->select('`order`.ID AS idorder,`order`.iduser')
                ->select('course.Name AS name course')
                ->where('`order`.status', $check)
                ->paginate(2);
    }
}
