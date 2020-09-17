<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\ContactQuery;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(Contact $contact)
    {
        return view('admin.contact.edit', compact('contact'));
    }

    public function contactUpdate(Request $request, Contact $contact)
    {
        $this->validate($request, [
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'web_site' => 'required',
        ]);
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->web_site = $request->web_site;
        $contact->map = $request->map;
        $contact->save();
        Toastr::success('Contact information has been successfully inserted', 'Success');
        return redirect()->back();
    }

    public function showContactQuery()
    {
        $showQuery = ContactQuery::OrderBy('id', 'desc')->get();
        return view('admin.contact.list', compact('showQuery'));
    }
    public function showContactQueryDetails($id)
    {
        $showQueryDetails = ContactQuery::find($id);
        return view('admin.contact.details', compact('showQueryDetails'));
    }

    public function deleteQuery(Request $request)
    {
        ContactQuery::find($request->id)->delete();
        Toastr::success('Contact query delete successfully', 'Success');
        return redirect()->back();
    }
}
