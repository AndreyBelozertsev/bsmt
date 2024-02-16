<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forms\CreateProductForm;

class MasterController extends Controller
{
    public function index()
    {
        return view('master.page.index', ['form' => CreateProductForm::make()]);
    }
}
