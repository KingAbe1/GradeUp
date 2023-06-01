<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoicePreview extends Controller
{
  public function index(Invoice $id)
  {
    $invoices = Invoice::join('users', 'invoices.user_id', 'users.id')->join('transactions', 'invoices.transaction_id', 'transactions.id')->join('plans', 'transactions.plan_id', 'plans.id')->where('invoices.id', $id->id)
      ->select('invoices.id as id', 'invoices.created_at as created_at', 'plans.name as name', 'plans.price as price')
      ->get();
    // dd($invoices);
    return view('content.apps.app-invoice-preview', [
      'invoices' => $invoices
    ]);
  }
}