<?php

namespace App\Http\Controllers;

use App\Models\Trashcan;
use Illuminate\Http\Request;

class TrashcanController extends Controller
{
    public function index() {
        return view('trashcans.index');
    }
}
