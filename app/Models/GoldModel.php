<?php

namespace App\Models;

use CodeIgniter\Model;

class GoldModel extends Model
{
    protected $table = 'sotc_goldcount';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'gold_count'];
    protected $useTimestamps = true; // Enable automatic timestamps
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}