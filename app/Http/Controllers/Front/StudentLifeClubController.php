<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\StudentLifeClub;

class StudentLifeClubController extends Controller
{
    public function index()
    {
        $studentLifeClub = StudentLifeClub::with('translations')->firstOrCreate([]);

        return view('front.studentLifeClub.index', [
            'studentLifeClub' => $studentLifeClub,
            'metaTitle'       => $studentLifeClub->meta_title,
            'metaDescription' => $studentLifeClub->meta_description,
            'metaKeywords'    => $studentLifeClub->meta_keywords,
        ]);
    }
}
