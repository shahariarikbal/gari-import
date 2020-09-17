<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\CmsPage;
use App\GenarelSetting;
use App\Http\Controllers\Controller;
use App\Logo;
use App\TermsCondition;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Image;

class SettingController extends Controller
{
    public function index()
    {
        $generals = GenarelSetting::get();
        return view('admin.genarel-settings', compact('generals'));
    }

    public function edit(GenarelSetting $general)
    {
        return view('admin.general-setting-edit', compact('general'));
    }

    public function update(Request $request, GenarelSetting $general)
    {

        $this->validate($request, [
            'footer_text' => 'required',
            'contact_info' => 'required',
        ]);

        $old_logo = $general->logo;
        //dd($old_logo);
        if ($request->has('logo')) {
            //$old_logo = $general->logo;
            if (file_exists(public_path('/images/').$old_logo)) {
                unlink(public_path('/images/').$old_logo);
            }
            $image = $request->file('logo');
            $imageName = $image->getClientOriginalName();
            $fileName = time()."_logo_".$imageName;
            $directory = public_path('/images/');
            $fileUrl = $directory.$fileName;
            \Image::make($image->getRealPath())->resize(192, 90)->save($fileUrl);
            $general->logo = $fileName;
        }

        $old_fevicon = $general->favicon;
        if ($request->has('favicon')) {
            //$favicon = $general->favicon;
            if (file_exists(public_path('/images/').$old_fevicon)) {
                unlink(public_path('/images/').$old_fevicon);
            }

            $image = $request->file('favicon');
            $imageName = $image->getClientOriginalName();
            $fileName = time()."_favicon_".$imageName;
            $directory = public_path('/images/');
            $fileUrl = $directory.$fileName;
            \Image::make($image->getRealPath())->resize(10, 10)->save($fileUrl);
            $general->favicon = $fileName;
        }
        $general->hotline_number = $request->hotline_number;
        $general->email = $request->email;
        $general->instagram_link = $request->instagram_link;
        $general->facebook_link = $request->facebook_link;
        $general->twitter_link = $request->twitter_link;
        $general->pinterest_link = $request->pinterest_link;
        $general->footer_text = $request->footer_text;
        $general->contact_info = $request->contact_info;
        $general->save();
        Toastr::success('General Settings has been updated', 'Success');
        return redirect()->back();
    }

    public function aboutUs()
    {
        $aboutShow = About::first();
        return view('admin.about-us', compact('aboutShow'));
    }

    public function aboutUsStor(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        if ($request->id) {
            $aboutUpdate = About::find($request->id);
            $aboutUpdate->body = $request->body;
            $aboutUpdate->update();

            CmsPage::updateOrCreate(
                [
                    'id' => $request->cms_page_id,
                ],
                [
                    'title' => $request->title,
                    'meta_keyword' => $request->meta_keyword,
                    'meta_description' => $request->meta_description,
                ]);
            Toastr::success('AboutUs update successfully', 'Success');
            return redirect()->back();
        }
        $about = new About();
        $about->body = $request->body;
        $about->save();


        Toastr::success('AboutUs insert successfully', 'Success');
        return redirect()->back();
    }

    public function termsConditionForm()
    {
        $termsConditions = TermsCondition::first();
        return view('admin.terms-conditions', compact('termsConditions'));
    }

    public function termsConditionDataStore(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        if ($request->id) {
            $termsConditionUpdate = TermsCondition::find($request->id);
            $termsConditionUpdate->body = $request->body;
            $termsConditionUpdate->update();
            Toastr::success('Terms & conditions Update successfully', 'Success');
            return redirect()->back();
        }
        $termsCondition = new TermsCondition();
        $termsCondition->body = $request->body;
        $termsCondition->save();
        Toastr::success('Terms & conditions insert successfully', 'Success');
        return redirect()->back();
    }
}
