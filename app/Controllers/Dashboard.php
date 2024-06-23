<?php

namespace App\Controllers;

use App\Models\EmissaryModel;
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

        // Fetch gold counts for the user
        $goldModel = new GoldModel();
        $data['goldcounts'] = $goldModel->where('user_id', $userId)->findAll();

        if (empty($data['goldcounts'])) {
            $data['message'] = "No data found for user ID: $userId";
        } else {
            $data['message'] = "Data found for user ID: $userId";
        }

        // Fetch all emissary levels for the user
        $emissaryModel = new EmissaryModel();
        $data['gold_hoarders'] = $emissaryModel->where('user_id', $userId)->findAll();
        $data['order_of_souls'] = $emissaryModel->where('user_id', $userId)->findAll();
        $data['merchant_alliance'] = $emissaryModel->where('user_id', $userId)->findAll();
        $data['reapers_bones'] = $emissaryModel->where('user_id', $userId)->findAll();
        $data['hunters_call'] = $emissaryModel->where('user_id', $userId)->findAll();
        $data['athenas_fortune'] = $emissaryModel->where('user_id', $userId)->findAll();
        $data['guardians_of_fortune'] = $emissaryModel->where('user_id', $userId)->findAll();
        $data['servants_of_the_flame'] = $emissaryModel->where('user_id', $userId)->findAll();

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

    public function updateGoldHoarders($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('user_id');
        $emissaryModel = new EmissaryModel(); 
        $goldhoarder = $emissaryModel->find($id); 

        if ($goldhoarder['user_id'] == $userId) {
            $previousGoldHoarders = $goldhoarder['gold_hoarders']; 
            $newGoldHoarders = $this->request->getPost('gold_hoarders');
            $difference = $newGoldHoarders - $previousGoldHoarders;

            $emissaryModel->update($id, ['gold_hoarders' => $newGoldHoarders, 'updated_at' => date('Y-m-d H:i:s')]);

            session()->setFlashdata('hoarders_difference', $difference);
            session()->setFlashdata('hoarders_id', $id);
        }

        return redirect()->to('/dashboard');
    }

    public function updateOrderofSouls($id)
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    $userId = session()->get('user_id');
    $emissaryModel = new EmissaryModel(); 

    $order_of_soul = $emissaryModel->find($id); 

    if ($order_of_soul && $order_of_soul['user_id'] == $userId) {
        $previousOrder_of_Soul = $order_of_soul['order_of_souls']; 
        $newOrder_of_Soul = $this->request->getPost('order_of_souls');

        $difference = $newOrder_of_Soul - $previousOrder_of_Soul;

        $emissaryModel->update($id, [
            'order_of_souls' => $newOrder_of_Soul,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        session()->setFlashdata('souls_difference', $difference);
        session()->setFlashdata('souls_id', $id);
    } else {
        // Handle unauthorized access or emissary not found
        session()->setFlashdata('error', 'Unauthorized access or emissary not found.');
    }

    return redirect()->to('/dashboard');
}

}
