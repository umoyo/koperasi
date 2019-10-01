<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Admin;
use App\Notifikasi;
use Artisan;
use Hash;
use Carbon\Carbon;
use App\Events\MyEvent;
use Barryvdh\DomPDF\Facade as PDF;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    

    public function index()
    {

        return view('admin.admin');
    }

}