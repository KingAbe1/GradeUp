<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceList extends Controller
{
  public function index()
  {
    if (Auth::user()->role_id == 1) {
      $invoices = Invoice::join('users', 'invoices.user_id', 'users.id')->join('transactions', 'invoices.transaction_id', 'transactions.id')->join('plans', 'transactions.plan_id', 'plans.id')->select('invoices.id as id', 'users.first_name as first_name', 'users.last_name as last_name', 'plans.name as plan_name', 'invoices.created_at as created_date')->get();
    } else {
      $invoices = Invoice::join('users', 'invoices.user_id', 'users.id')->join('transactions', 'invoices.transaction_id', 'transactions.id')->join('plans', 'transactions.plan_id', 'plans.id')->select('invoices.id as id', 'users.first_name as first_name', 'users.last_name as last_name', 'plans.name as plan_name', 'invoices.created_at as created_date')->where('users.id', Auth::user()->id)->get();
    }

    return view('content.apps.app-invoice-list', [
      'invoices' => $invoices
    ]);
  }
}