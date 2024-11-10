<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CashierModulesController extends Controller
{
    public $data = [];
    
    public function cashier_dashboard() {
        return view('cashier.dashboard');
    }

    public function enrollments() {
        return view('cashier.player.index');
    }

    public function enrollment_create(Request $request) {
        $this->data['nationalities'] = lookupHelper()->getNationalities();
        $this->data['agents'] = lookupHelper()->getAllAgents();
        return globalHelper()->makeView('cashier.player.create', $this->data, $request);
    }

    public function player_transactions($id, Request $request) {
        $this->data['player_info'] = lookupHelper()->getPlayerInfoViaId($id);
        $this->data['player_info']['photo'] = url("/") . '/images/passports/'.$this->data['player_info']['photo'];
        $this->data['fnb'] = lookupHelper()->getFNB();
        
        return globalHelper()->makeView('cashier.player.transactions', $this->data, $request);
    }
    
    public function enrollment_edit() {
        return view('cashier.player.edit');
    }

    public function agents() {
        return view('cashier.agents.index');
    }

    public function agent_add(Request $request) {
        // $this->data['nationalities'] = lookupHelper()->getNationalities();
        return globalHelper()->makeView('cashier.agents.create', $this->data, $request);
     
    }
}