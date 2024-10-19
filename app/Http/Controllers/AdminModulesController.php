<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminModulesController extends Controller
{
    public function login() {
        return view('login');
    }

    public function admin_dashboard() {
        return view('admin.dashboard');
    }

    //Companies
    public function companies() {
        return view('admin.companies.index');
    }

    public function company_registration() {
        return view('admin.companies.create');
    }

    public function company_edit() {
        return view('admin.companies.edit');
    }

    public function accounts() {
        return view('admin.accounts.index');
    }

    public function account_create() {
        return view('admin.accounts.create');
    }
    
    public function account_edit() {
        return view('admin.accounts.edit');
    }

    public function reports() {
        return view('admin.reports');
    }
}