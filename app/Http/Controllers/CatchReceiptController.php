<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatchReceiptRequest;
use App\Models\CatchReceipt;
use Illuminate\Http\Request;

class CatchReceiptController extends Controller
{

    public function index()
    {
        $catchReceipts =CatchReceipt::all();
        return view('dashboard.catch-receipt.index',compact('catchReceipts'));
    }

    public function create()
    {
        return view('dashboard.catch-receipt.create');
    }


    public function store(CatchReceiptRequest $request)
    {
        $data=$request->validated() ;
        try {
           CatchReceipt::create($data);
            return redirect()->route('catch-receipt.index')->with('done','تمت العمليه بنجاح');
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
        $catchReceipt = CatchReceipt::findOrFail($id);
        return view('dashboard.catch-receipt.edit',compact('catchReceipt'));
    }


    public function update(CatchReceiptRequest $request, $id)
    {
        $data=$request->validated() ;
        try {
            $catchReceipt = CatchReceipt::findOrFail($id);
            $catchReceipt->update($data);
            return redirect()->route('catch-receipt.index')->with('done','تمت العمليه بنجاح');
        }catch (\Exception $exception){
            return back()->with('failed','حدث خطأ الرداء المحاوله لاحقا');
        }

    }

    public function destroy($id)
    {
        //
    }
}
