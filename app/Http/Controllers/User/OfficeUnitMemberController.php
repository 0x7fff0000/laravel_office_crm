<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Office\Unit\Member\Request as MemberRequest;
use App\Models\OfficeUnit;
use App\Models\OfficeUnitMember;
use App\Services\OfficeUnitService;
use Illuminate\Http\Request;

class OfficeUnitMemberController extends Controller
{
    public function index(OfficeUnit $unit)
    {
        return view('dashboard.offices.units.members.index', ['members' => $unit->members()->paginate(1)]);
    }

    public function create(OfficeUnit $unit)
    {
        return view('dashboard.offices.units.members.create', ['unit' => $unit]);
    }

    public function store(MemberRequest $request, OfficeUnit $unit)
    {
        $member = OfficeUnitService::createUniqueMember($unit, $request->validated()['user_id']);
        return redirect($member ? ('offices/units/members' . $member->id) : ('offices/units/' . $unit->id . '/members'));
    }

    public function show(OfficeUnitMember $member)
    {
        return view('dashboard.offices.units.members.show', ['unit' => $member]);
    }

    public function destroy(OfficeUnitMember $member)
    {
        $member->delete();
        return redirect('offices/units/' . $member->unit->id . '/members');
    }
}
