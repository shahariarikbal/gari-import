<?php

namespace App\Http\Controllers\Web;

use App\About;
use App\AuctionSheetReport;
use App\Bank;
use App\CmsPage;
use App\CmsPageSetting;
use App\Contact;
use App\ContactQuery;
use App\Faq;
use App\GenarelSetting;
use App\Http\Controllers\Controller;
use App\ImportRegulation;
use App\Inquiry;
use App\Mail\QueryContactMail;
use App\News;
use App\Stock;
use App\StockImage;
use App\TermsCondition;
use App\Vehicle;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use File;
use ZipArchive;
use DB;
use PDF;


class WebController extends Controller
{
    public function index()
    {
        $settings = GenarelSetting::first();
        $seoSettings = CmsPage::where('id', 1)->first();

        $cmsPageSettings = CmsPageSetting::where('cms_page_id', 1)->where('settings_key', 'slider_img')->get();
        $cmsPageCarLogos = CmsPageSetting::where('cms_page_id', 1)->where('settings_key', 'car_brand_logo')->get();

        return view('fontend.home.index', compact('settings',
                                                            'cmsPageSettings',
                                                            'cmsPageCarLogos',
                                                            'seoSettings'
                                                        ));
                                                    }

    public function about()
    {
        $settings = GenarelSetting::first();
        $aboutus = About::first();
        $seoSettings = CmsPage::where('id', 2)->first();
        return view('fontend.about.about', compact('settings', 'aboutus', 'seoSettings'));
    }

    public function termsCondition()
    {
        $settings = GenarelSetting::first();
        $termsCondition = TermsCondition::first();
        $seoSettings = CmsPage::where('id', 13)->first();
        return view('fontend.terms-condition.terms-condition', compact('settings', 'termsCondition', 'seoSettings'));
    }

    public function importRegulations()
    {
        $importRegulation = ImportRegulation::first();
        $settings = GenarelSetting::first();
        $termsCondition = TermsCondition::first();
        $seoSettings = CmsPage::where('id', 10)->first();
        return view('fontend.import-regulations.import-regulations', compact('settings','importRegulation', 'termsCondition', 'seoSettings'));
    }

    public function shippingInfo()
    {
        $importRegulation = ImportRegulation::first();
        $settings = GenarelSetting::first();
        $termsCondition = TermsCondition::first();
        $seoSettings = CmsPage::where('id', 9)->first();
        return view('fontend.shipping-info.shipping-info', compact('settings','importRegulation', 'termsCondition', 'seoSettings'));
    }

    public function stockList()
    {
        $settings = GenarelSetting::first();
        $stocks = Stock::with('images')->paginate(10);
        $seoSettings = CmsPage::where('id', 4)->first();
        return view('fontend.stock-list.stock-list', compact('settings', 'stocks', 'seoSettings'));
    }

    public function stockDetails($make, $model, $stockId)
    {
        $stock = Stock::where('stocks_id', $stockId)->first();

        $seoSettings = CmsPage::where('id', 4)->first();
        $settings = GenarelSetting::first();
        return view('fontend.stock-list.stock-details', compact('stock', 'seoSettings', 'settings'));
    }

    public function imageDownload($stocksId){
        $files = glob(public_path('zip-image/*'));
        foreach($files as $file){
            if(is_file($file))
                unlink($file);
        }
        $stock = Stock::with('images')->where('stocks_id', $stocksId)->first();
        $files = [];
        foreach ($stock->images as $i => $portfolioImage) {
            $files[$i] = public_path('stockimg/'). $portfolioImage->image;
        }
        $zip = new ZipArchive;
        $fileName = 'zip-image/'.time().'-'.makeHyphenUrl($stock->make).'.zip';
        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }
            $zip->close();
        }

        return response()->download(public_path($fileName));
    }

    public function stockDetailsShow($id)
    {
        $stock = Stock::find($id);
        if ((sizeof($stock->images) > 0) && file_exists('stockimg/'.$stock->images[0]->image)){
            $image = asset('/stockimg/'.$stock->images[0]->image);
        }else{
            $image = asset('images/default_car.jpg');
        }

        $stockData = [
            'id'          => $stock->id,
            'stocks_id'   => $stock->stocks_id,
            'make'        => $stock->make,
            'model'       => $stock->model,
            'chasis_code' => $stock->chasis_code,
            'year'        => $stock->year,
            'color'       => $stock->color,
            'engine_cc'   => $stock->engine_cc,
            'mileage'     => $stock->mileage,
            'price'       => $stock->price,
            'image'       => $image,
        ];

        return response()->json([
            'status' => 200,
            'stock_data' => $stockData
        ]);

    }


    public function ourBanks()
    {
        $settings = GenarelSetting::first();
        $bankDataShow = Bank::whereStatus(1)->get();
        $seoSettings = CmsPage::where('id', 6)->first();
        return view('fontend.bank.our-bank', compact('settings', 'bankDataShow', 'seoSettings'));
    }

    public function howtobuy()
    {
        $settings = GenarelSetting::first();
        $vehicleFromAuction = Vehicle::where('page_type', 2)->where('status', 1)->OrderBy('sort', 'asc')->get();
        $vehicleFromStock = Vehicle::where('page_type', 1)->where('status', 1)->OrderBy('sort', 'asc')->get();
        $seoSettings = CmsPage::where('id', 3)->first();
        return view('fontend.howtobuy.howtobuy', compact('settings', 'vehicleFromStock', 'vehicleFromAuction', 'seoSettings'));
    }

    public function auctionSheetGuide()
    {
        $settings = GenarelSetting::first();
        $seoSettings = CmsPage::where('id', 8)->first();
        return view('fontend.auction-guide.auction-guide', compact('settings', 'seoSettings'));
    }

    public function newsIndex()
    {
        $settings = GenarelSetting::first();
        $seoSettings = CmsPage::where('id', 11)->first();
        $newsShow = News::whereStatus(1)->paginate(4);
        return view('fontend.news.index', compact('settings', 'seoSettings', 'newsShow'));
    }
    public function newsDetails(News $news)
    {
        $settings = GenarelSetting::first();
        $seoSettings = CmsPage::where('id', 11)->first();
        return view('fontend.news.details', compact('settings', 'seoSettings', 'news'));
    }

    public function faqs()
    {
        $settings = GenarelSetting::first();
        $seoSettings = CmsPage::where('id', 12)->first();
        $faqShow = Faq::whereStatus(1)->paginate(4);
        return view('fontend.faq.faq', compact('settings', 'seoSettings', 'faqShow'));
    }

    public function contact()
    {
        $settings = GenarelSetting::first();
        $seoSettings = CmsPage::where('id', 12)->first();
        $contact = Contact::first();
        return view('fontend.contact.contact', compact('settings', 'seoSettings', 'contact'));
    }

    public function payment()
    {
        $settings = GenarelSetting::first();
        $seoSettings = CmsPage::where('id', 12)->first();
        return view('fontend.payment.payment', compact('settings', 'seoSettings'));
    }

    public function contactQuery(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $queryContact = new ContactQuery();
        $queryContact->name = $request->name;
        $queryContact->phone = $request->phone;
        $queryContact->email = $request->email;
        $queryContact->subject = $request->subject;
        $queryContact->message = $request->message;
        if($queryContact->save()){
            $email = 'support@gari-import.com.bd';
            Mail::send('fontend.email.query',  ['name' => $request->name, 'phone' => $request->phone, 'email' => $request->email, 'mage' => $request->message], function ($msg) use ($email, $request)
            {
                $msg->from('support@gari-import.com.bd', 'Gari-import');
                $msg->subject('Send Form My Gari-import');
                $msg->to($email);
            });
        }
        Toastr::success('Your Query has been submitted', 'Success');
        return redirect()->back();
    }

    public function paymentSuccess()
    {
        $settings = GenarelSetting::first();
        $seoSettings = CmsPage::where('id', 12)->first();
        return view('fontend.payment.success', compact('settings', 'seoSettings'));
    }

    public function paymentError()
    {
        $settings = GenarelSetting::first();
        $seoSettings = CmsPage::where('id', 12)->first();
        return view('fontend.payment.error', compact('settings', 'seoSettings'));
    }

    public function verifyAuctionSheet(){
        $seoSettings = CmsPage::where('id', 4)->first();
        $settings = GenarelSetting::first();
        return view('fontend.verify-auction.verify-auction-sheet', compact('seoSettings', 'settings'));
    }

    public function chassisCheck(Request $request){
        $seoSettings = CmsPage::where('id', 4)->first();
        $settings = GenarelSetting::first();
        $keyCode = "984365_45242e53362d2cf550a0764272a7bb51";
        $chassisData = [
            'chassis' => $request->chassis,
            'date' => date("Y-m-d"),
            'year' => 'Year',
            'code' => $keyCode,
            'key' => isset($request->key)?$request->key:'',
        ];

        session(['chassisData' => $chassisData]);

        return view('fontend.verify-auction.verify-auction-sheet', compact('seoSettings', 'settings', 'chassisData'));

    }

    public function chassisCheckReport(Request $request){
        $sessionArr = [];
        if (session('chassisData')) {
            $chassisData = session('chassisData');
            $sessionArr = [
                'payment_id' => session('payment_id'),
                'cus_name' => session('cus_name'),
                'cus_email' => session('cus_email'),
            ];
            $arr = r_get($chassisData['code'], $chassisData['chassis'], $chassisData['year'], '', 'dsIPw5vx59cyHwkHWR7');
            r_show($arr, $sessionArr);
            return redirect('payment-success');
        }
    }

    public function chassisReport($urlId){
        $seoSettings = CmsPage::where('id', 4)->first();
        $settings = GenarelSetting::first();
        $chassis = AuctionSheetReport::where('url_id', $urlId)->first();
        $chassisData = [
            'url_id' => $urlId,
            'name'  => $chassis->payment->name,
            'email' => $chassis->payment->email,
            'phone' => $chassis->payment->phone,
            'reportData' => json_decode($chassis->reports, true)
        ];
        return view('fontend.verify-auction.report', compact('seoSettings', 'settings', 'chassisData'));
    }

    public function reportPdfview(Request $request, $urlId)
    {
        $seoSettings = CmsPage::where('id', 4)->first();
        $settings = GenarelSetting::first('logo');
        $chassis = AuctionSheetReport::where('url_id', $urlId)->first();
        $chassisData = [
            'url_id' => $urlId,
            'name'  => $chassis->payment->name,
            'email' => $chassis->payment->email,
            'phone' => $chassis->payment->phone,
            'reportData' => json_decode($chassis->reports, true)
        ];

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('pdf.report', compact('chassisData', 'seoSettings', 'settings'));
        return $pdf->download($chassisData['reportData'][0]['chassis'].'.pdf');
//        return $pdf->stream($chassisData['reportData'][0]['chassis'].'.pdf');


    }

    public function search(Request $request)
    {
        $search_txt = $request->search;
        $stocks = Stock::with('images')
            ->where('make', 'like', '%'.$search_txt.'%')
            ->orWhere('color', 'like', '%'.$search_txt.'%')
            ->orWhere('model', 'like', '%'.$search_txt.'%')
            ->orWhere('grade', 'like', '%'.$search_txt.'%')
            ->orWhere('chasis_code', 'like', '%'.$search_txt.'%')
            ->orWhere('year', 'like', '%'.$search_txt.'%')
            ->orWhere('engine_cc', 'like', '%'.$search_txt.'%')
            ->orWhere('mileage', 'like', '%'.$search_txt.'%')
            ->orWhere('fuel', 'like', '%'.$search_txt.'%')
            ->orWhere('transmission', 'like', '%'.$search_txt.'%')
            ->orWhere('seat', 'like', '%'.$search_txt.'%')
            ->orWhere('fob', 'like', '%'.$search_txt.'%')
            ->orWhere('door', 'like', '%'.$search_txt.'%')
            ->orWhere('description', 'like', '%'.$search_txt.'%')
            ->orWhere('price', 'like', '%'.$search_txt.'%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        $settings = GenarelSetting::first();
        $seoSettings = CmsPage::where('id', 4)->first();
        return view('fontend.stock-list.stock-list', compact('settings','stocks', 'seoSettings'));
    }

    public function stockInquiry(Request $request)
    {
        $this->validate($request, [
            'port' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        try {
            $inquiry = new Inquiry();
            $inquiry->inquiry_id = $request->inquiry_id;
            $inquiry->port = $request->port;
            $inquiry->name = $request->name;
            $inquiry->email = $request->email;
            $inquiry->inquiry_type = $request->inquiry_type;
            $inquiry->phone = $request->phone;
            $inquiry->message = $request->message;
            //dd($inquiry);
            if($inquiry->save()){
                $email = 'support@gari-import.com.bd';
                Mail::send('fontend.email.inquiry',  ['port' => $request->port,'name' => $request->name, 'phone' => $request->phone, 'email' => $request->email, 'inquiry_type' => $request->inquiry_type, 'mage' => $request->message], function ($msg) use ($email, $request)
                {
                    $msg->from('support@gari-import.com.bd', 'Gari-import');
                    $msg->subject('Send Form My Gari-import');
                    $msg->to($email);
                });
            }
            \Brian2694\Toastr\Facades\Toastr::success('Inquiry successfully submitted', 'Success');
            return redirect()->back();
        } catch (\Exception $exception){
            return  redirect()->back()->with('error', $exception->getMessage());
        }

    }



}
