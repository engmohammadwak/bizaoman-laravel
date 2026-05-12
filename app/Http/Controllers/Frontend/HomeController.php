<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Client;
use App\Models\Service;
use App\Models\Setting;
use App\Models\TeamMember;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        $services = Service::active()->get();
        $team = TeamMember::active()->get();
        $publicClients = Client::active()->public()->get();
        $privateClients = Client::active()->private()->get();
        $certificates = Certificate::active()->get();

        return view('frontend.home', compact(
            'settings', 'services', 'team',
            'publicClients', 'privateClients', 'certificates'
        ));
    }
}
