<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\SeperAdmin;
use App\Notifikasi;
use Artisan;
use Hash;
use Carbon\Carbon;
use App\Events\MyEvent;
use Barryvdh\DomPDF\Facade as PDF;

class SuperadminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:superadmin');
    }
    

    public function index()
    {

        return view('admin.superadmin');
    }

}