<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $query = Activity::query();

        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        return $query->select('slug', 'category')->get();
    }
}
