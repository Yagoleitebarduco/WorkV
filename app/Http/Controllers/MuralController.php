<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Skills;

class MuralController extends Controller
{
    public function showToMuralScreen() {
        return view('Home.User.Mural');
    }

    // New Work Screen
    public function showToNewWorkScreen() {
        $currentDate = Carbon::now()->format('Y-m-d');
        $skills = Skills::all();
        return view('Home.Company.NewWork', compact('currentDate', 'skills'));
    }

    public function storeNewWork(Request $request) {

    }
}
