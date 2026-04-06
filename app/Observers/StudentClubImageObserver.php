<?php

namespace App\Observers;

use App\Models\ProjectImage;
use App\Models\StudentClubImage;
use App\Traits\FileManagable;

class StudentClubImageObserver
{
    use FileManagable;

    /**
     * @param StudentClubImage $studentClubImage
     * @return void
     */
    public function deleting(StudentClubImage $studentClubImage): void
    {
        $this->deleteFile('student_club_images', $studentClubImage->image);
    }
}
