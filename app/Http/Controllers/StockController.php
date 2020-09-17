<?php

namespace App\Http\Controllers;

use App\Inquiry;
use App\Stock;
use App\StockImage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Validator;
use DB;

class StockController extends Controller
{
    public function index()
    {
        $showStockList = Stock::with('images')->get();
        return view('admin.stock-list', compact('showStockList'));
    }

    public function create()
    {
        $showStockList = Stock::with('images')->get();
        return view('admin.create', compact('showStockList'));
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $validator = Validator::make($data, [
            'stocks_id' => 'required|max:255|unique:stocks',
            'make' => 'required',
            'model' => 'required',
            'chasis_code' => 'required',
            'color' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $stocks = new Stock();
        $stocks->stocks_id = $request->stocks_id;
        $stocks->make = $request->make;
        $stocks->grade = $request->grade;
        $stocks->model = $request->model;
        $stocks->year = $request->year;
        $stocks->chasis_code = $request->chasis_code;
        $stocks->seat = $request->seat;
        $stocks->door = $request->door;
        $stocks->color = $request->color;
        $stocks->engine_cc = $request->engine_cc;
        $stocks->mileage = $request->mileage;
        $stocks->fuel = $request->fuel;
        $stocks->transmission = $request->transmission;
        $stocks->price = $request->price;
        $stocks->fob = $request->fob;
        $stocks->description = $request->description;
        $stocks->status = $request->status;
        $stocks->save();
        Toastr::success('Stock has been successfully inserted', 'Success');

        if ($stockImgs = $request->file('image')) {
            foreach ($stockImgs as $image) {
                $originalName = $image->getClientOriginalName();
                $renameFile = uniqid(). '.' . $originalName;
                $directory = public_path('/stockimg/');
                $fileUrl = $directory.$renameFile;
                \Image::make($image->getRealPath())->save($fileUrl);

                $stockImg = new StockImage();
                $stockImg->stock_id = $stocks->id;
                $stockImg->image = $renameFile;
                $stockImg->save();
            }
        }

        return redirect()->back();

    }

    public function edit($id)
    {
        $showStockList = Stock::with('images')->get();
        $stock = Stock::with('images')->find($id);
        return view('admin.stock_edit', compact('showStockList', 'stock'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
//        $validator = Validator::make($data, [
//            'stocks_id' => 'required|unique:stocks,stocks_id,'.$id,
//        ]);
//        if ($validator->fails()) {
//            return redirect()->back()
//                ->withErrors($validator)
//                ->withInput();
//        }

        $stocks = Stock::find($id);
        $stocks->stocks_id = $request->stocks_id;
        $stocks->make = $request->make;
        $stocks->grade = $request->grade;
        $stocks->model = $request->model;
        $stocks->year = $request->year;
        $stocks->chasis_code = $request->chasis_code;
        $stocks->seat = $request->seat;
        $stocks->door = $request->door;
        $stocks->color = $request->color;
        $stocks->engine_cc = $request->engine_cc;
        $stocks->mileage = $request->mileage;
        $stocks->fuel = $request->fuel;
        $stocks->transmission = $request->transmission;
        $stocks->price = $request->price;
        $stocks->fob = $request->fob;
        $stocks->description = $request->description;
        $stocks->status = $request->status;
        $stocks->save();
        Toastr::success('Stock update successfully inserted', 'Success');

        if ($stockImgs = $request->file('image')) {
            foreach ($stockImgs as $image) {
                $originalName = $image->getClientOriginalName();
                $renameFile = uniqid(). '.' . $originalName;
                $directory = public_path('/stockimg/');
                $fileUrl = $directory.$renameFile;
                \Image::make($image->getRealPath())->save($fileUrl);

                $stockImg = new StockImage();
                $stockImg->stock_id = $stocks->id;
                $stockImg->image = $renameFile;
                $stockImg->save();
            }
        }

        return redirect()->back();

    }

    public function stockDelete(Request $request)
    {
        $stock = Stock::find($request->id);
        $stock->delete();
        Toastr::success('Stock list has been successfully deleted', 'Success');
        return redirect()->back();
    }

    public function showStockListInquiry()
    {
        $inquiryShow = Inquiry::orderBy('id', 'desc')->get();
        return view('admin.inquiry', compact('inquiryShow'));
    }

    public function showInquiry($id)
    {
        $stockInquiryDetails = Inquiry::with('stock', 'stockImages')->find($id);
        //return $stockInquiryDetails;
        return view('admin.inquiry-view', compact('stockInquiryDetails'));
    }

    public function inquiryDelete(Request $request)
    {
        Inquiry::find($request->id)->delete();
        Toastr::success('Inquiry delete successfully', 'Success');
        return redirect()->back();
    }

    public function imageDelete($id){

        $stockImg = StockImage::find($id);
        if ($stockImg->image){
            if (!file_exists(public_path('/stockimg/'.$stockImg->image))){
                $stockImg->image = null;
            }else{
                unlink('stockimg/'. $stockImg->image);
            }
        }

        $stockImg->delete();
        Toastr::success('Stock image delete successfully inserted', 'Success');

        return redirect()->back();

    }
}
