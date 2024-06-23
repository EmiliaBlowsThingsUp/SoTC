<?php

namespace App\Models;

use CodeIgniter\Model;

class EmissaryModel extends Model
{
    protected $table = 'sotc_emissaries';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'gold_hoarders','order_of_souls', 'merchant_alliance', 'reapers_bones', 'hunters_call', 'athenas_fortune', 'guardians_of_fortune', 'servants_of_the_flame', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
