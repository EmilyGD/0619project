<?php

namespace App\Livewire\Backend\Traits\ImageUploads;

use Livewire\WithFileUploads;


trait WithUploadSingleImage
{
    use WithFileUploads;

    // 單張圖片 綁定wire:model
    public $singleImage;
    public $maxFileSize = "3072";  //設定圖片大小預設是3072kb = 3MB

    // 如果需要改變單張上傳的圖片大小使用此方法
    public function setSingleImageMaxFileSize($size)
    {
        $this->maxFileSize = $size;
    }

    // 驗證單張圖片
    public function updatedWithUploadSingleImage()
    {
        $mbStr = floor($this->maxFileSize / 1024); //計算mb

        try {
            $this->validateOnly('singleImage', [
                'singleImage' => ['image', 'max:' . $this->maxFileSize],
            ], [
                'singleImage.max' => '圖片超過' . $mbStr . 'MB'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->singleImage = null;
            $this->addError("singleImage", "圖片大小超過" . $mbStr . "MB，或格式不符合");
        }
    }

    // 上傳單張圖片
    public function uploadSingleImage()
    {
        $mbStr = floor($this->maxFileSize / 1024); //計算mb

        $this->validate(
            [
                'singleImage' => ['image', 'max:' . $this->maxFileSize],
            ],
            [
                'singleImage.max' => '圖片超過' . $mbStr . 'MB'
            ]
        );

        $imgPath = $this->singleImage->store('images/' . date("Ymd"), "public");

        return $imgPath;
    }

    // 預設圖片
    public function getBase64ImageProperty()
    {
        return "data:image/png;base64,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";
    }
}
