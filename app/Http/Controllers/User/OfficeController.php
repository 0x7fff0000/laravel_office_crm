<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Office\CreateRequest as OfficeCreateRequest;
use App\Http\Requests\Dashboard\Office\UpdateRequest as OfficeUpdateRequest;
use App\Models\Office;
use App\Services\OfficeService;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index()
    {
        return view('dashboard.offices.index', ['offices' => auth()->user()->offices()->paginate(1)]);
    }

    public function create()
    {
        return view('dashboard.offices.create', ['users' => OfficeService::getUserList()->get()]);
    }

    public function store(OfficeCreateRequest $request)
    {
        $office = auth()->user()->offices()->create($request->validated());
        return redirect('offices/' . $office->id);
    }

    public function show(Office $office)
    {
        return view('dashboard.offices.show', ['office' => $office]);
    }

    public function edit(Office $office)
    {
        return view('dashboard.offices.edit', [
            'office' => $office,
            'users' => OfficeService::getUserListExludedDirector($office)
        ]);
    }

    public function update(OfficeUpdateRequest $request, Office $office)
    {
        $office->update($request->validated());
        return redirect('offices/' . $office->id);
    }

    public function destroy(Office $office)
    {
        $office->delete();
        return redirect('offices');
    }
}
