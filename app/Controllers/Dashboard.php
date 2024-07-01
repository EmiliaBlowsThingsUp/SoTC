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

    public function updateEmissaries()
    {
        // Ensure user is authenticated
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $request = $this->request;
        $userId = session()->get('user_id');

        // Fetch all emissary data from the form submission
        $goldHoardersData = $request->getPost('gold_hoarders');
        $orderOfSoulsData = $request->getPost('order_of_souls');
        $merchantAllianceData = $request->getPost('merchant_alliance');
        $reapersBonesData = $request->getPost('reapers_bones');
        $huntersCallData = $request->getPost('hunters_call');
        $athenasFortuneData = $request->getPost('athenas_fortune');
        $guardiansOfFortuneData = $request->getPost('guardians_of_fortune');
        $servantsOfTheFlameData = $request->getPost('servants_of_the_flame'); 
        
        $emissaryModel = new EmissaryModel();

        if (!empty($goldHoardersData)) {
            foreach ($goldHoardersData as $id => $level) {
                $emissary = $emissaryModel->find($id);
                if ($emissary && $emissary['user_id'] == $userId) {
                    $emissaryModel->update($id, [
                        'gold_hoarders' => $level,
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }

        if (!empty($orderOfSoulsData)) {
            foreach ($orderOfSoulsData as $id => $level) {
                $emissary = $emissaryModel->find($id);
                if ($emissary && $emissary['user_id'] == $userId) {
                    $emissaryModel->update($id, [
                        'order_of_souls' => $level,
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }

        if (!empty($merchantAllianceData)) {
            foreach ($merchantAllianceData as $id => $level) {
                $emissary = $emissaryModel->find($id);
                if ($emissary && $emissary['user_id'] == $userId) {
                    $emissaryModel->update($id, [
                        'merchant_alliance' => $level,
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }

        if (!empty($reapersBonesData)) {
            foreach ($reapersBonesData as $id => $level) {
                $emissary = $emissaryModel->find($id);
                if ($emissary && $emissary['user_id'] == $userId) {
                    $emissaryModel->update($id, [
                        'reapers_bones' => $level,
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }

        if (!empty($huntersCallData)) {
            foreach ($huntersCallData as $id => $level) {
                $emissary = $emissaryModel->find($id);
                if ($emissary && $emissary['user_id'] == $userId) {
                    $emissaryModel->update($id, [
                        'hunters_call' => $level,
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }

        if (!empty($athenasFortuneData)) {
            foreach ($athenasFortuneData as $id => $level) {
                $emissary = $emissaryModel->find($id);
                if ($emissary && $emissary['user_id'] == $userId) {
                    $emissaryModel->update($id, [
                        'athenas_fortune' => $level,
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }

        if (!empty($guardiansOfFortuneData)) {
            foreach ($guardiansOfFortuneData as $id => $level) {
                $emissary = $emissaryModel->find($id);
                if ($emissary && $emissary['user_id'] == $userId) {
                    $emissaryModel->update($id, [
                        'guardians_of_fortune' => $level,
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }

        if (!empty($servantsOfTheFlameData)) {
            foreach ($servantsOfTheFlameData as $id => $level) {
                $emissary = $emissaryModel->find($id);
                if ($emissary && $emissary['user_id'] == $userId) {
                    $emissaryModel->update($id, [
                        'servants_of_the_flame' => $level,
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                }
            }
        }

        // Redirect or return response as needed
        return redirect()->to('/dashboard')->with('success', 'Emissaries updated successfully');
    }
}