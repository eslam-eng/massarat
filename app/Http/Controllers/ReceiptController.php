<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatchReceiptRequest as ReceiptRequest;
use App\Models\Receipt;

class ReceiptController extends Controller
{

    public function index()
    {
        $receipts =Receipt::all();
        return view('dashboard.receipt.index',compact('receipts'));
    }

    public function create()
    {
        return view('dashboard.receipt.create');
    }


    public function store(ReceiptRequest $request)
    {
        $data=$request->validated() ;
        try {
            Receipt::create($data);
            return redirect()->route('receipt.index')->with('done','تمت العمليه بنجاح');
        }catch (\Exception $exception){
            return back()->with('failed','حدث خطأ الرداء المحاوله لاحقا');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $receipt = Receipt::findOrFail($id);
        return view('dashboard.receipt.edit',compact('receipt'));
    }


    public function update(ReceiptRequest $request, $id)
    {
        $data=$request->validated() ;
        try {
            $catchReceipt = Receipt::findOrFail($id);
            $catchReceipt->update($data);
            return redirect()->route('receipt.index')->with('done','تمت العمليه بنجاح');
        }catch (\Exception $exception){
            return back()->with('failed','حدث خطأ الرداء المحاوله لاحقا');
        }

    }

    public function destroy($id)
    {
        //
    }
}
