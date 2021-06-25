<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index($id, Company $company)
    {
        return view('company.index', compact('company'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'address' => 'required',
            'phone' => 'required',
            'website' => 'required',
            'slogan' => 'required',
            'description' => 'required',
        ]);

        $user_id = auth()->user()->id;
        Company::where('user_id', $user_id)->update([
            'address' => request('address'),
            'phone' => request('phone'),
            'website' => request('website'),
            'slogan' => request('slogan'),
            'description' => request('description'),
        ]);

        return redirect()->back()->with('message', 'Company Profile Updated Successfully');
    }

    public function logo(Request $request)
    {
        $this->validate($request, [
            'logo' => 'required|mimes:jpg,png,jpeg',
        ]);

        $user_id = auth()->user()->id;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $extension = $logo->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $logo->move('uploads/logo', $fileName);

            Company::where('user_id', $user_id)->update([
                'logo' => $fileName,
            ]);

            return redirect()->back()->with('message', 'Logo Updated Successfully');
        }
    }

    public function cover_photo(Request $request)
    {
        $this->validate($request, [
            'cover_photo' => 'required|mimes:jpg,png,jpeg|max:1024',
        ]);

        $user_id = auth()->user()->id;

        if ($request->hasFile('cover_photo')) {
            $cover_photo = $request->file('cover_photo');
            $extension = $cover_photo->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $cover_photo->move('uploads/cover_photo', $fileName);

            Company::where('user_id', $user_id)->update([
                'cover_photo' => $fileName,
            ]);

            return redirect()->back()->with('message', 'Cover Photo Updated Successfully');
        }
    }
}
