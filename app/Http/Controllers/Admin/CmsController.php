<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Bank;
use App\CmsPage;
use App\CmsPageSetting;
use App\Faq;
use App\Http\Controllers\Controller;
use App\ImportRegulation;
use App\News;
use App\Shipping;
use App\Stock;
use App\TermsCondition;
use App\Vehicle;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\TestFixture\C;
use Validator;

class CmsController extends Controller
{

    public function index()
    {
        $page = CmsPage::all();
        return view('admin.cms.index', compact('page'));
    }

    public function newPage()
    {
        return view('admin.cms.new-page');
    }

    public function shippingInfo(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        if ($request->id) {
            $shippingUpdate = Shipping::find($request->id);
            $shippingUpdate->body = $request->body;
            $shippingUpdate->update();

            CmsPage::updateOrCreate(
                [
                    'id' => $request->cms_page_id,
                ],
                [
                    'title' => $request->title,
                    'meta_keyword' => $request->meta_keyword,
                    'meta_description' => $request->meta_description,
                ]);
            Toastr::success('Shipping info update successfully', 'Success');
            return redirect()->back();
        }
        $shipping = new Shipping();
        $shipping->body = $request->body;
        $shipping->save();

        Toastr::success('Shipping info insert successfully', 'Success');
        return redirect()->back();
    }

    public function importRegulationStore(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        if ($request->id) {
            $importRegulation = ImportRegulation::find($request->id);
            $importRegulation->body = $request->body;
            $importRegulation->update();

            CmsPage::updateOrCreate(
                [
                    'id' => $request->cms_page_id,
                ],
                [
                    'title' => $request->title,
                    'meta_keyword' => $request->meta_keyword,
                    'meta_description' => $request->meta_description,
                ]);
            Toastr::success('Import Regulation update successfully', 'Success');
            return redirect()->back();
        }
        $importRegulation = new ImportRegulation();
        $importRegulation->body = $request->body;
        $importRegulation->save();

        Toastr::success('Import Regulation insert successfully', 'Success');
        return redirect()->back();
    }

    public function pageStore(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'title'  => 'required',
            'status'  => 'required',
        ]);

        $page = CmsPage::create([
            'name' => $request->name,
            'title' => $request->title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
        ]);
        Toastr::success('New Page insert successfully', 'Success');
        return redirect('/add-pages');
    }

    public function pageInactive(CmsPage $cmspage)
    {
        $cmspage->status = 0;
        $cmspage->save();
        Toastr::success('CMS page has been successfully inactive', 'Success');
        return redirect()->back();
    }

    public function pageActive(CmsPage $cmspage)
    {
        $cmspage->status = 1;
        $cmspage->save();
        Toastr::success('CMS page has been successfully inactive', 'Success');
        return redirect()->back();
    }

    public function pageEdit(CmsPage $cmspage)
    {
        $data = CmsPageSetting::where('settings_key', 'slider_img')->get();
        $brandLogo = CmsPageSetting::where('settings_key', 'car_brand_logo')->get();
        $aboutShow = About::first();
        $vehicleShow = Vehicle::first();
        $showStockList = Stock::with('images')->get();
        $showBank = Bank::first();
        $termsConditions = TermsCondition::first();
        $shippingInfo = Shipping::first();
        $importRegulation = ImportRegulation::first();
        return view('admin.cms.edit', compact('cmspage', 'data',
                                                    'brandLogo', 'aboutShow',
                                                    'vehicleShow', 'showStockList',
                                                    'showBank', 'termsConditions',
                                                    'shippingInfo', 'importRegulation'));
    }

//    public function pageDelete(Request $request, CmsPage $cmspage)
//    {
//        $cmspage->delete();
//        return redirect()->back()->with('success', 'CMS page has been successfully delete');
//    }


    public function cmsPageSetting(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'slider' => 'sometimes',
            'slider.*' => '|mimes:jpeg,jpg,png',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $cmsId = $request->cms_page_id;
        $settingKeys = $request->settings_key;

        if ($request->hasFile('service_box_icon_1')) {
            $image = $this->imageUpload($request->service_box_icon_1, 'service_box_icon_1');
            CmsPageSetting::updateOrCreate(
                [
                    'cms_page_id' => $cmsId,
                    'settings_key' => 'service_box_icon_1',
                ],
                [
                    'value'       => $image,
                    'status'       => 1,
                ]);
        }

        if ($request->hasFile('service_box_icon_2')) {
            $image2 = $this->imageUpload($request->service_box_icon_2, 'service_box_icon_2');
            CmsPageSetting::updateOrCreate(
                [
                    'cms_page_id' => $cmsId,
                    'settings_key' => 'service_box_icon_2',
                ],
                [
                    'value'       => $image2,
                    'status'       => 1,
                ]);
        }

        if ($request->hasFile('service_box_icon_3')) {
            $image3 = $this->imageUpload($request->service_box_icon_3, 'service_box_icon_3');
            CmsPageSetting::updateOrCreate(
                [
                    'cms_page_id' => $cmsId,
                    'settings_key' => 'service_box_icon_3',
                ],
                [
                    'value'       => $image3,
                    'status'       => 1,
                ]);
        }

        // Slider multiple image upload create and update
        $images = array();
        if($files = $request->file('slider')){
            //return $files;
            foreach($files as $key =>  $file){
                list($width, $height) = getimagesize($file);
                if ($width == 1920 && $height == 600){
                    $name = 'slider'.'_'. rand() .'.' . $file->getClientOriginalExtension();
                    $file->move(public_path().'/images',$name);
                    $images[]=$name;
                    //return $images
                }else{
                    return redirect()->back()
                        ->withErrors('required image size is: Width 1920px and Height 600px')
                        ->withInput();
                }
            }

            //dd($images);
            $settingsData = CmsPageSetting::where('cms_page_id', $cmsId)->where('settings_key', 'slider_img')->first();
            if (!empty($settingsData)) {
                $oldImage =  json_decode($settingsData->value, true);
                if (!empty($oldImage)) {
                    $images = array_merge($oldImage, $images);
                }
            }
            //dd($images);

            CmsPageSetting::updateOrCreate(
                [
                    'cms_page_id' => $cmsId,
                    'settings_key' => 'slider_img',
                ],
                [
                    'value'=>  json_encode($images),
                    'status'       => 1,
                ]
            );
        }

        // Brand logo multiple image upload create and update
        $brandLogo = array();
        if($files = $request->file('brand_logo')){
            foreach($files as $file){
                $name = 'brand'.'_'. rand() .'.' . $file->getClientOriginalName();
                $file->move(public_path().'/images',$name);
                $brandLogo[]=$name;
            }

            $settingsBrandLogoData = CmsPageSetting::where('cms_page_id', $cmsId)->where('settings_key', 'car_brand_logo')->first();
            if (!empty($settingsBrandLogoData)) {
                $oldImageBrandLogo =  json_decode($settingsBrandLogoData->value, true);
                if (!empty($oldImageBrandLogo)) {
                    $brandLogo = array_merge($oldImageBrandLogo, $brandLogo);
                }
            }

            CmsPageSetting::updateOrCreate(
                [
                    'cms_page_id' => $cmsId,
                    'settings_key' => 'car_brand_logo',
                ],
                [
                    'value'=>  json_encode($brandLogo),
                    'status'       => 1,
                ]
            );
        }


        foreach ($settingKeys as $key => $data) {
            //return $data;

            CmsPageSetting::updateOrCreate(
                [
                    'cms_page_id' => $cmsId,
                    'settings_key' =>   trim($key, "'"),
                ],
                [
                    'value'       => $data,
                    'status'       => 1,
                ]);
        }

        CmsPage::updateOrCreate(
            [
                'id' => $request->cms_page_id,
            ],
            [
                'title' => $request->title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
            ]);

        Toastr::success('Data insert successfully', 'Success');

        return redirect()->back();

    }

    public function seoStore(Request $request)
    {
        CmsPage::updateOrCreate(
            [
                'id' => $request->cms_page_id,
            ],
            [
                'title' => $request->title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
            ]);
        \Brian2694\Toastr\Facades\Toastr::success('Data insert successfully', 'Success');
        return redirect()->back();
    }
    // News Module work
    public function showNewsForm()
    {
        $showNews = News::get();
        return view('admin.news.list', compact('showNews'));
    }

    public function newsFormShow()
    {
        return view('admin.news.create');
    }

    public function newsStore(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);
        $news = new News();
        $news->title = $request->title;
        $news->description = $request->description;
        $news->save();
        Toastr::success('News has been successfully inserted', 'Success');
        return redirect('/admin/news-list');
    }

    public function newsEdit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function newsUpdate(Request $request, News $news)
    {
        $news->title = $request->title;
        $news->description = $request->description;
        $news->save();
        Toastr::success('News has been successfully updated', 'Success');
        return redirect('/admin/news-list');
    }

    public function newspublished(News $news)
    {
        $news->status =0;
        $news->save();
        Toastr::success('News has been successfully Unpublished', 'Success');
        return redirect()->back();
    }

    public function newsUnpublished(News $news)
    {
        $news->status = 1;
        $news->save();
        Toastr::success('News has been successfully published', 'Success');
        return redirect()->back();
    }

    public function newsDelete(Request $request)
    {
        $news = News::find($request->id);
        $news->delete();
        Toastr::success('News has been successfully Delete', 'Success');
        return redirect()->back();
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('editorImages'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('editorImages/'.$fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
    //FAQ

    public function faqList()
    {
        $showFaq = Faq::get();
        return view('admin.faq.list', compact('showFaq'));
    }

    public function faqCreate()
    {
        return view('admin.faq.create');
    }

    public function faqEdit(Faq $faq)
    {
        return view('admin.faq.edit', compact('faq'));
    }

    public function faqStore(Request $request)
    {
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required'
        ]);
        $faq = new Faq();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        Toastr::success('Faq has been successfully inserted', 'Success');
        return redirect('/admin/faq-list');
    }

    public function faqUpdate(Request $request, Faq $faq)
    {
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required'
        ]);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        Toastr::success('Faq has been successfully Update', 'Success');
        return redirect('/admin/faq-list');
    }

    public function faqPublished(Faq $faq)
    {
        $faq->status = 0;
        $faq->save();
        Toastr::success('Faq has been successfully Unpublished', 'Success');
        return redirect()->back();
    }

    public function faqUnpublished(Faq $faq)
    {
        $faq->status = 1;
        $faq->save();
        Toastr::success('Faq has been successfully Published', 'Success');
        return redirect()->back();
    }

    public function faqDelete(Request $request)
    {
        $faq = Faq::find($request->id);
        $faq->delete();
        Toastr::success('Faq has been successfully Delete', 'Success');
        return redirect()->back();
    }

    function imageUpload($image, $name){
        $img = CmsPageSetting::where('settings_key', $name)->first();
        if ($img) {
            if (file_exists(public_path().'/images/'.$img->value)) {
                unlink(public_path().'/images/'.$img->value);
            }
        }
        $imageName = $image->getClientOriginalExtension();
        $fileName = rand(). $name .'.'.$imageName;
        $image->move(public_path().'/images', $fileName);
        return  $fileName;
    }

    public function sliderDelete($img){

        $sliderImg = json_decode(getCmsPageData('slider_img')['value'], true);
        if (($key = array_search($img, $sliderImg)) !== false) {
            unset($sliderImg[$key]);
        }
        CmsPageSetting::updateOrCreate(
            [
                'cms_page_id' => 1,
                'settings_key' => 'slider_img',
            ],
            [
                'value'=>  json_encode($sliderImg),
                'status'       => 1,
            ]
        );
        if (file_exists(public_path().'/images/'.$img)) {
            unlink(public_path().'/images/'.$img);
        }

        Toastr::success('Slider Image delete successfully', 'Success');
        return redirect()->back();
    }

    public function brandLogoDelete($img){

        $brandImg = json_decode(getCmsPageData('car_brand_logo')['value'], true);
        if (($key = array_search($img, $brandImg)) !== false) {
            unset($brandImg[$key]);
        }
        CmsPageSetting::updateOrCreate(
            [
                'cms_page_id' => 1,
                'settings_key' => 'car_brand_logo',
            ],
            [
                'value'=>  json_encode($brandImg),
                'status'       => 1,
            ]
        );
        if (file_exists(public_path().'/images/'.$img)) {
            unlink(public_path().'/images/'.$img);
        }

        Toastr::success('Brand logo Image delete successfully', 'Success');
        return redirect()->back();
    }
}
