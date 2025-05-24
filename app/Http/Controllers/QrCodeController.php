<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class QrCodeController extends Controller
{
    public function show()
    {
        $user = Auth::user();
    
        $url = url('/emergency/' . $user->uuid);
    
        // Générer le QR code SVG
        $svg = QrCode::size(300)->generate($url);
    
        // Encoder le SVG en base64
        $base64Svg = base64_encode($svg);
    
        return response()->json([
            'url' => $url,
            'qr_code_svg' => "data:image/svg+xml;base64,{$base64Svg}",
        ]);
    }

}
