<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use Illuminate\Http\Request;

class AdminModulesController extends Controller
{
    public $data = [];
    public function __construct(Request $request) {}
    public function login() {
        return view('login');
    }

    public function admin_dashboard(Request $request) {
        return globalHelper()->makeView('admin.dashboard', $this->data, $request);
    }

    #Companies
    public function companies(Request $request) {
        return globalHelper()->makeView('admin.companies.index', $this->data, $request);
    }

    public function company_registration(Request $request) {
        return globalHelper()->makeView('admin.companies.create', $this->data, $request);
    }

    public function company_edit(Request $request) {
        return globalHelper()->makeView('admin.companies.edit', $this->data, $request);
    }

    #Accounts
    public function accounts(Request $request) {
        return globalHelper()->makeView('admin.accounts.index', $this->data, $request);
    }

    public function account_create(Request $request) {
        $this->data['companies'] = lookupHelper()->getCompanies();
        $this->data['positions'] = config('custom.user_type');
        return globalHelper()->makeView('admin.accounts.create', $this->data, $request);
    }
    
    public function account_edit($id, Request $request) {
        $this->data['companies'] = lookupHelper()->getCompanies();
        $this->data['positions'] = config('custom.user_type');
        $this->data['account_info'] = lookupHelper()->getAccountInfoViaId($id); 
        
        return globalHelper()->makeView('admin.accounts.edit', $this->data, $request);
    }

    #Reports
    public function reports(Request $request) {
        return globalHelper()->makeView('admin.reports', $this->data, $request);
    }
}