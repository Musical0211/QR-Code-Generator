<?php

namespace App\Services;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Storage;

class QrCodeService
{
    public function generate(array $data, array $design, string $format = 'png'): string
    {
        $text = $data['type'] === 'url'
            ? $data['url']
            : json_encode($data);

        // Choose writer
        $writer = $format === 'svg'
            ? new \Endroid\QrCode\Writer\SvgWriter()
            : new PngWriter();

        $result = Builder::create()
            ->writer($writer)
            ->data($text)
            ->size(300)
            ->margin(10)
            ->build();

        // Path where file will be stored
        $fileName = 'qr_codes/' . uniqid() . '.' . $format;
        $filePath = 'public/' . $fileName;

        // Save to storage/app/public/qr_codes
        Storage::put($filePath, $result->getString());

        return 'storage/' . $fileName; // public link
    }
}
