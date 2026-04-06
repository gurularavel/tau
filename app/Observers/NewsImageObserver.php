<?php

namespace App\Observers;

use App\Models\NewsImage;
use App\Traits\FileManagable;

class NewsImageObserver
{
    use FileManagable;

    /**
     * @param NewsImage $newsImage
     * @return void
     */
    public function deleting(NewsImage $newsImage): void
    {
        $this->deleteFile('news_images', $newsImage->image);
    }
}
