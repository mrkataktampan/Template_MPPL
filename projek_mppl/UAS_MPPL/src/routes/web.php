<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Livewire\ShowHomePage;

/* NOTE: Do Not Remove
/ Livewire asset handling if using sub folder in domain
*/
Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});
/*
/ END
*/
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/struk/{payment}', function (Payment $payment) {
    $qrData = match(strtolower($payment->method)) {
        'dana' => 'https://link.dana.id/merchant-qr',
        'gopay' => 'https://link.gopay.id/merchant-qr',
        'qris' => 'https://link.qris.id/merchant-qr',
        default => 'https://default.qr',
    };

    return view('Struk.struk', [
        'payment' => $payment,
        'qrData' => $qrData,
    ]);
})->name('filament.struk');

Route::get('/struk/download/{payment}', function (Payment $payment) {
    $qrData = match(strtolower($payment->method)) {
        'dana' => 'https://link.dana.id/merchant-qr',
        'gopay' => 'https://link.gopay.id/merchant-qr',
        'qris' => 'https://link.qris.id/merchant-qr',
        default => 'https://default.qr',
    };

    $qrBase64 = base64_encode(
        QrCode::format('png')->size(200)->generate($qrData)
    );

    $pdf = Pdf::loadView('Struk.struk_download', [
        'payment' => $payment,
        'qrCode' => $qrBase64,
    ]);

    return $pdf->download('struk-' . $payment->id . '.pdf');
})->name('filament.struk.download');

// Route::get('/', ShowHomePage::class)->name('home');

Route::get('/', function () {
    return view('components.pages.home');
})->name('home');
Route::get('/about', function () {
    return view('components.pages.about');
})->name('about');
Route::get('/order', function () {
    return view('components.pages.order');
})->name('order');