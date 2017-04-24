<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SearchController extends Controller
{
    public function getSearchingLessons(Request $request) {
        $lessonObj = new Lesson();
        $lessons = $lessonObj->getLessonsByKeyword($request->get("q"));
        return response($lessons,200);
    }
}
