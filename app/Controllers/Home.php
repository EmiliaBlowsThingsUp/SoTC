<?php
 
namespace App\Controllers;
 
use App\Controllers\BaseController;
use App\Models\GoldModel;
use App\Models\UserModel;
 
class Home extends BaseController
{
    public function index()
    {
        $goldModel = new GoldModel();
        $leaderboard = $goldModel->select('sotc_users.username, sotc_goldcount.gold_count')
                                ->join('sotc_users', 'sotc_users.id = sotc_goldcount.user_id')
                                ->orderBy('sotc_goldcount.gold_count', 'desc')
                                ->findAll(10);

        $data['leaderboard'] = $leaderboard;

        return view('home', $data);
    }
}