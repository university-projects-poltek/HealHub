<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function getUserDashboard()
  {
    return view('pages.user.dashboard');
  } 

  public function getAdminDashboard()
  {
    return view('pages.admin.dashboard');
  }
}
