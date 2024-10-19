<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CashierModulesController extends Controller
{
    public function cashier_dashboard() {
        return view('cashier.dashboard');
    }

    public function enrollments() {
        return view('cashier.enrollment.index');
    }

    public function enrollment_create() {
        return view('cashier.enrollment.create');
    }
    
    public function enrollment_edit() {
        return view('cashier.enrollment.edit');
    }
}