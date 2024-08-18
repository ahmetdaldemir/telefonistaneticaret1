<?php

namespace App\Service;

use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageUploadService
{
    protected $uploadPath;

    public function __construct($uploadPath)
    {
        $this->uploadPath = $uploadPath;
    }

    /**
     * Resmi yükle ve boyutlandır.
     *
     * @param UploadedFile $file
     * @param int $width
     * @param int $height
     * @param bool $createThumbnail
     * @param int $thumbWidth
     * @param int $thumbHeight
     * @return string Dosya adı
     */
    public function uploadImage(UploadedFile $file, $width, $height, $createThumbnail = true, $thumbWidth = 100, $thumbHeight = 80)
    {
        // Orijinal dosya adını al ve uzantısını bul
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();

        // Resmi belirtilen boyutlarda yeniden boyutlandır
        $image = Image::make($file->getRealPath());
        $image->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        // Yeni dosya adını oluştur ve resmi kaydet
        $newFilename = $filename . '.' . $extension;
        $image->save($this->uploadPath . '/' . $newFilename);

        // Thumbnail oluşturulacaksa
        if ($createThumbnail) {
            $this->createThumbnail($file, $filename, $extension, $thumbWidth, $thumbHeight);
        }

        return $newFilename;
    }

    /**
     * Thumbnail oluştur.
     *
     * @param UploadedFile $file
     * @param string $filename
     * @param string $extension
     * @param int $thumbWidth
     * @param int $thumbHeight
     * @return void
     */
    protected function createThumbnail(UploadedFile $file, $filename, $extension, $thumbWidth, $thumbHeight)
    {
        $thumbnail = Image::make($file->getRealPath());
        $thumbnail->resize($thumbWidth, $thumbHeight, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        // Thumbnail dosya adını oluştur
        $thumbFilename = $filename . '-thumb-' . $thumbWidth . '-' . $thumbHeight . '.' . $extension;
        $thumbnail->save($this->uploadPath . '/' . $thumbFilename);
    }
}