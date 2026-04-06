<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Program;

use function PHPSTORM_META\map;

class ProgramController extends Controller
{
    public function show(Program $program)
    {
        abort_unless($program->is_active == Program::IS_ACTIVE, 404);

        $metaTitle = $program->meta_title;
        $metaKeywords = $program->meta_keywords;
        $metaDescription = $program->meta_description;

        // ✅ MAIN PROGRAM
        $mainDynamics = $program->dynamics();

        $rows = [];
        foreach ($mainDynamics as $dynamic) {
            $rows[$dynamic->layout_row][] = $dynamic;
        }

        ksort($rows);

        // ✅ CHILD PROGRAMS
        $childRows = [];

        foreach ($program->programs_list as $program_list) {
            $childProgramRows = [];

            foreach ($program_list->dynamics() as $dynamic) {
                $childProgramRows[$dynamic->layout_row][] = $dynamic;
            }

            $childRows[$program_list->id] = $childProgramRows;
        }

        ksort($childRows);

        return view('front.programs.show', compact('program', 'rows', 'childRows', 'metaTitle', 'metaKeywords', 'metaDescription'));
    }
}
