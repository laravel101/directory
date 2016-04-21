<?php

namespace App\Http\Controllers\Backend;

use App\Sector;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\Backend\SectorCreateRequest;
use App\Http\Requests\Backend\SectorEditRequest;

class SectorController extends BackendController
{
    public function index($parent = null)
    {
        $sectors = is_null($parent) ? Sector::whereNull("parent_id")->latest()->paginate(20) : $parent->subs()->latest()->paginate(20);
        return view("backend.sector.index", [
            "sectors" => $sectors,
            "parent"  => $parent
        ]);
    }

    public function create($parent)
    {
        $parent = $parent === 0 ? null : Sector::where("slug", $parent)->first();
        return view("backend.sector.create", [
            "parent" => $parent,
        ]);
    }

    public function store(SectorCreateRequest $request)
    {
        $sector = new Sector;
        $sector->name = $request->get("name");
        $sector->slug = $request->get("slug");
        $sector->icon = $request->get("icon");
        $sector->parent_id = $request->get("parent_id") == 0 ? null : $request->get("parent_id");
        $sector->save();

        return redirect()->route("backend.sector.index")->with("success", "Sector successfully created!");
    }

    public function edit(Sector $sector)
    {
        return view("backend.sector.edit", [
            "sector" => $sector,
        ]);
    }

    public function update(SectorEditRequest $request, Sector $sector)
    {
        $sector->name = $request->get("name");
        $sector->slug = $request->get("slug");
        $sector->icon = $request->get("icon");
        $sector->parent_id = $request->get("parent_id") == 0 ? null : $request->get("parent_id");
        $sector->save();

        return redirect()->route("backend.sector.index")->with("success", "Sector successfully updated!");
    }

    public function destroy(Sector $sector)
    {
        $sector->delete();

        return redirect()->route("backend.sector.index")->with("success", "Sector successfully deleted!");
    }
}
