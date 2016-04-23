<?php

namespace App\Http\Controllers\Backend;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Backend\CompanyCreateRequest;
use App\Http\Requests\Backend\CompanyEditRequest;

class CompanyController extends BackendController
{
    public function index()
    {
        $companies = Company::latest()->paginate(25);
        return view("backend.company.index", [
            "companies" => $companies,
        ]);
    }

    public function create()
    {
        return view("backend.company.create");
    }

    public function store(CompanyCreateRequest $request)
    {
        $company = new Company;
        $company->name = $request->get("name");
        $company->slug = $request->get("slug");
        $company->sector_id = $request->get("sector_id");
        $company->town_id = $request->get("town_id");
        $company->content = $request->get("content");
        $company->phone = $request->get("phone");
        $company->fax = $request->get("fax");
        $company->email = $request->get("email");
        $company->website = $request->get("website");
        $company->facebook = $request->get("facebook");
        $company->twitter = $request->get("twitter");
        $company->google = $request->get("google");
        $company->latitude = $request->get("latitude");
        $company->longitude = $request->get("longitude");
        $company->is_brand = $request->has("is_brand") ? true : false;
        $company->is_active = $request->has("is_active") ? true : false;

        if($request->hasFile("image")){
            $filename = str_slug($company->name).".".$request->file("image")->getClientOriginalExtension();
            while(\File::exists(public_path("uploads/company/".$filename)))
                $filename = str_slug($company->name)."-".str_random(3).".".$request->file("image")->getClientOriginalExtension();
            $request->file("image")->move(public_path("uploads/company"), $filename);
            $company->image = "uploads/company/".$filename;
        }
        $company->user_id = auth()->user()->id;
        $company->save();

        return redirect()->route("backend.company.index")->with("success", "Company successfully created!");
    }

    public function edit(Company $company)
    {
        return view("backend.company.edit", [
            "company" => $company,
        ]);
    }

    public function update(CompanyEditRequest $request, Company $company)
    {
        $company->name = $request->get("name");
        $company->slug = $request->get("slug");
        $company->sector_id = $request->get("sector_id");
        $company->town_id = $request->get("town_id");
        $company->content = $request->get("content");
        $company->phone = $request->get("phone");
        $company->fax = $request->get("fax");
        $company->email = $request->get("email");
        $company->website = $request->get("website");
        $company->facebook = $request->get("facebook");
        $company->twitter = $request->get("twitter");
        $company->google = $request->get("google");
        $company->latitude = $request->get("latitude");
        $company->longitude = $request->get("longitude");
        $company->is_brand = $request->has("is_brand") ? true : false;
        $company->is_active = $request->has("is_active") ? true : false;

        if($request->hasFile("image")){
            if($company->image && \File::exists(public_path($company->image)))
                \File::delete(public_path($company->image));
            $filename = str_slug($company->name).".".$request->file("image")->getClientOriginalExtension();
            while(\File::exists(public_path("uploads/company/".$filename)))
                $filename = str_slug($company->name)."-".str_random(3).".".$request->file("image")->getClientOriginalExtension();
            $request->file("image")->move(public_path("uploads/company"), $filename);
            $company->image = "uploads/company/".$filename;
        }
        $company->save();

        return redirect()->route("backend.company.index")->with("success", "Company successfully updated!");
    }

    public function brandToggle(Company $company)
    {
        $company->is_brand = !$company->is_brand;
        $company->save();

        return redirect()->route("backend.company.index")->with("success", "Company brand status successfully changed!");
    }

    public function activeToggle(Company $company)
    {
        $company->is_active = !$company->is_active;
        $company->save();

        return redirect()->route("backend.company.index")->with("success", "Company brand status successfully changed!");
    }

    public function destroy(Company $company)
    {
        if($company->image && \File::exists(public_path($company->image)))
            \File::delete($company->image);
        $company->delete();

        return redirect()->route("backend.company.index")->with("success", "Company successfully deleted!");
    }
}
