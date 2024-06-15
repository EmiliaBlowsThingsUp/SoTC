<?php
 
namespace App\Controllers;

use App\Models\GoldModel; 
use App\Controllers\BaseController;
use CodeIgniter\Controller;
 
class Dashboard extends BaseController
{

public function __construct()
{
    $this->filter('auth', ['before' => ['index', 'updateGoldCount']]);
}

    public function index()
    {
        
        $userId = session()->get('user_id'); // Assuming user_id is stored in session upon login
        $goldModel = new GoldModel();
        $data['goldcounts'] = $goldModel->where('user_id', $userId)->findAll();

        return view('dashboard', $data);
    }

    public function updateGoldCount($id)
    {
        $userId = session()->get('user_id');
        $goldModel = new GoldModel();
        $goldcount = $goldModel->find($id);

        // Ensure the gold count entry belongs to the current user
        if ($goldcount['user_id'] == $userId) {
            $previousGoldCount = $goldcount['gold_count'];
            $newGoldCount = $this->request->getPost('gold_count');
            $difference = $newGoldCount - $previousGoldCount;

            $goldModel->update($id, ['gold_count' => $newGoldCount]);

            session()->setFlashdata('gold_difference', $difference);
            session()->setFlashdata('gold_id', $id);
        }

        return redirect()->to('/dashboard');
    }
}
