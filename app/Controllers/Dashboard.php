<?php
 
namespace App\Controllers;

use App\Models\TileModel; 
use App\Controllers\BaseController;
 
class Dashboard extends BaseController
{
    public function index()
    {
        $userId = session()->get('user_id'); // Assuming user_id is stored in session upon login

        $GoldModel = new GoldModel();
        $data['gold'] = $GoldModel->where('user_id', $userId)->findAll();

        return view('dashboard', $data);
    }
    public function updateGoldCount($id)
    {
        $userId = session()->get('user_id');
        $tileModel = new TileModel();
        $tile = $tileModel->find($id);

        // Ensure the tile belongs to the current user
        if ($tile['user_id'] == $userId) {
            $tileModel->update($id, ['gold_count' => $this->request->getPost('gold_count')]);
        }

        return redirect()->to('/dashboard');
    }
}
