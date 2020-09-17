<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Http\Controllers\Controller;
use App\OnlinePayment;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function list()
    {
        $showBank = Bank::orderBy('id', 'desc')->get();
        return view('admin.bank.list', compact('showBank'));
    }

    public function bankCreateShowForm()
    {
        return view('admin.bank.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'branch' => 'required',
            'account_name' => 'required',
            'account_no' => 'required',
            'swift' => 'required',
            'routing' => 'required',
        ]);

        try {
            $bank = new Bank();
            $bank->name = $request->name;
            $bank->branch = $request->branch;
            $bank->account_name = $request->account_name;
            $bank->account_no = $request->account_no;
            $bank->swift = $request->swift;
            $bank->routing = $request->routing;
            $bank->save();
            \Brian2694\Toastr\Facades\Toastr::success('Bank inserted successfully', 'Success');
            return redirect()->back();
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function bankEditForm(Bank $bank)
    {
        return view('admin.bank.edit', compact('bank'));
    }

    public function bankUpdateForm(Request $request, Bank $bank)
    {
        $this->validate($request, [
            'name' => 'required',
            'branch' => 'required',
            'account_name' => 'required',
            'account_no' => 'required',
            'swift' => 'required',
            'routing' => 'required',
        ]);

        try {
            $bank->name         = $request->name;
            $bank->branch       = $request->branch;
            $bank->account_name = $request->account_name;
            $bank->account_no   = $request->account_no;
            $bank->swift        = $request->swift;
            $bank->routing      = $request->routing;
            $bank->save();
            \Brian2694\Toastr\Facades\Toastr::success('Bank update successfully', 'Update');
            return redirect()->back();
        }catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function bankDelete(Request $request)
    {
        $bank = Bank::find($request->id);
        $bank->delete();
        \Brian2694\Toastr\Facades\Toastr::success('Bank delete successfully', 'Delete');
        return redirect()->back();
    }

    public function bankActive(Bank $bank)
    {
        $bank->status = 0;
        $bank->save();
        \Brian2694\Toastr\Facades\Toastr::success('Bank Active successfully', 'Active');
        return redirect()->back();
    }

    public function bankInactive(Bank $bank)
    {
        $bank->status = 1;
        $bank->save();
        \Brian2694\Toastr\Facades\Toastr::success('Bank Inactive successfully', 'Inactive');
        return redirect()->back();
    }

    public function onlinePayments()
    {
        $onlinePayments = OnlinePayment::orderBy('id', 'desc')->get();
        return view('admin.bank.online-payments', compact('onlinePayments'));
    }

    public function onlinePaymentDelete(Request $request)
    {
        OnlinePayment::find($request->id)->delete();
        \Brian2694\Toastr\Facades\Toastr::success('Online payment delete successfully', 'Success');
        return redirect()->back();
    }
}
