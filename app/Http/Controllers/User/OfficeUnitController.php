<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\Dashboard\Office\Unit\CreateRequest as OfficeUnitCreateRequest;
use App\Http\Requests\Dashboard\Office\Unit\UpdateRequest as OfficeUnitUpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\OfficeUnit;
use App\Models\Office;
use Illuminate\Http\Request;

class OfficeUnitController extends Controller
{
    public function index(Office $office)
    {
        return view('dashboard.offices.units.index', ['office' => $office, 'units' => $office->units()->paginate(1)]);
    }

    public function create(Office $office, OfficeUnit $unit)
    {
        return view('dashboard.offices.units.create', ['office' => $office, 'unit' => $unit]);
    }

    public function store(OfficeUnitCreateRequest $request, Office $office)
    {
        $unit = $office->units()->create($request->validated());
        return redirect('offices/units/' . $unit->id);
    }

    public function show(OfficeUnit $unit)
    {
        return view('dashboard.offices.units.show', ['unit' => $unit]);
    }

    public function edit(OfficeUnit $unit)
    {
        return view('dashboard.offices.units.edit', [
            'unit' => $unit
        ]);
    }

    public function update(OfficeUnitUpdateRequest $request, OfficeUnit $unit)
    {
        $unit->update($request->validated());
        return redirect('offices/units/' . $unit->id);
    }

    public function destroy(OfficeUnit $unit)
    {
        $unit->delete();
        return redirect('offices/' . $unit->office->id . '/units');
    }
}
