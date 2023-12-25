<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationController extends Controller
{
    public function index()
    {
        return view('organization.index', [
            'title' => 'Organization',
            'organizations' => Organization::all()
        ]);
    }

}
