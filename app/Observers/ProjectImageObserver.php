<?php

namespace App\Observers;

use App\Models\ProjectImage;
use App\Traits\FileManagable;

class ProjectImageObserver
{
    use FileManagable;

    /**
     * @param ProjectImage $projectImage
     * @return void
     */
    public function deleting(ProjectImage $projectImage): void
    {
        $this->deleteFile('project_images', $projectImage->image);
    }
}
