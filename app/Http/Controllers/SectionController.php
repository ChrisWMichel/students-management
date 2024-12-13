<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Resources\SectionResource;
use App\Http\Requests\Api\ListSectionRequest;

class SectionController extends Controller
{
    public function __invoke(ListSectionRequest $request)
    {
        //dd($request->all());
        $sections = Section::where('class_room_id', $request->class_room_id)->get();

        return SectionResource::collection($sections);

    }

}
