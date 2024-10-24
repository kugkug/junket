<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminModulesController extends Controller
{
    public $data = [];
    public function __construct(Request $request) {
        $themes = config('custom.theme_mode');
        
        $this->data['settings'] = $request->current_user_settings ? 
        [ 'theme_class' => $themes[$request->current_user_settings['theme_mode']] ] :
        [ 'theme_class' => $themes['light'] ];
        
    }
    public function login() {
        return view('login');
    }

    public function admin_dashboard(Request $request) {
        return view('admin.dashboard', $this->data);
    }

    //Companies
    public function companies() {
        return view('admin.companies.index', $this->data);
    }

    public function company_registration() {
        return view('admin.companies.create', $this->data);
    }

    public function company_edit() {
        return view('admin.companies.edit',$this->data);
    }

    public function accounts() {
        return view('admin.accounts.index',$this->data);
    }

    public function account_create() {
        return view('admin.accounts.create', $this->data);
    }
    
    public function account_edit() {
        return view('admin.accounts.edit', $this->data);
    }

    public function reports() {
        return view('admin.reports', $this->data);
    }
}