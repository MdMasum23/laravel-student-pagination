<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Correct import for the Request class
use App\Models\Student;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        // Get the search query inputs
        $searchId = $request->input('id');
        $searchName = $request->input('name');
        $searchEmail = $request->input('email');

        // Fetch students with optional search filters
        $students = Student::when($searchId, function ($query, $searchId) {
                return $query->where('id', $searchId);
            })
            ->when($searchName, function ($query, $searchName) {
                return $query->where('name', 'like', "%{$searchName}%");
            })
            ->when($searchEmail, function ($query, $searchEmail) {
                return $query->where('email', 'like', "%{$searchEmail}%");
            })
            ->paginate(10);

        return view('index', compact('students'));
    }
}


