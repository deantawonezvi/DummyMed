<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewPatients(){
        return view('patients.view');
    }
    public function viewInventory(){
        return view('inventory.view');
    }
    public function viewReports(){
        return view('reports.view');
    }
    public function viewSettings(){
        return view('settings.view');
    }
    public function viewPayments(){
        return view('payments.view');
    }
    public function viewStaff(){
        return view('staff.view');
    }
}
