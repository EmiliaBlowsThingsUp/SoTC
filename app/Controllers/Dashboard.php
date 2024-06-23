<?php

namespace App\Controllers;

use App\Models\GoldModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user_id');
        $goldModel = new GoldModel();
        $data['goldcounts'] = $goldModel->where('user_id', $userId)->findAll();

        if (empty($data['goldcounts'])) {
            $data['message'] = "No data found for user ID: $userId";
        } else {
            $data['message'] = "Data found for user ID: $userId";
        }

        return view('dashboard', $data);
    }

    public function updateGoldCount($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user_id');
        $goldModel = new GoldModel();
        $goldcount = $goldModel->find($id);

        if ($goldcount['user_id'] == $userId) {
            $previousGoldCount = $goldcount['gold_count'];
            $newGoldCount = $this->request->getPost('gold_count');
            $difference = $newGoldCount - $previousGoldCount;

            $goldModel->update($id, ['gold_count' => $newGoldCount, 'updated_at' => date('Y-m-d H:i:s')]);

            session()->setFlashdata('gold_difference', $difference);
            session()->setFlashdata('gold_id', $id);
        }

        return redirect()->to('/dashboard');
    }
}
