<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerUtama;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SalesOrderController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PurchaseOrderController;


// Route::get('/siswa/tampil', [SiswaController::class, 'tampil']);
// Route::get('/buku/tampil', [SiswaController::class, 'tampil']);
// Route::get('/bukusiswa/tampil', [SiswaController::class, 'tampil']);

// Route::get('/sepatu1/tampil', [ControllerUtama::class, 'tampil']);
// Route::get('/sales1', [ControllerUtama::class, 'tampil']);

// Route::get('/order/tampil', [OrderController::class, 'tampil']);
// Route::resources(['/'=> ControllerUtama::class,
//                   'brand'=> ControllerUtama::class,
//                   'sepatu1'=> ControllerUtama::class,
//                   'sepatu2'=> ControllerUtama::class,
//                   'sepatu3'=> ControllerUtama::class,
//                   'sales1'=> ControllerUtama::class,
//                   'sales2'=> ControllerUtama::class,
//                   'sales3'=> ControllerUtama::class,
//                   'kategoritoko'=> ControllerUtama::class,
//                   'toko'=> ControllerUtama::class,


//                   'order'=> OrderController::class,
//                 ]); //ingat2 ada s di resources dan bukan koma tapi tanda panah

// Route::post('/order/validasi', [SalesOrderController::class, 'validasi']);
// Route::post('/order/adddatasales1', [SalesOrderController::class, 'Show'])->name('adddatasales1');
// Route::post('/order/adddatasales1', [SalesOrderController::class, 'adddatasales1'])->name('adddatasales1');
Route::resources(['/'=> SalesOrderController::class,
                  // 'order'=> OrderController::class,
                  'order'=> SalesOrderController::class,
                  'purchase'=> PurchaseOrderController::class,
                ]); //ingat2 ada s di resources dan bukan koma tapi tanda panah

Route::resources(['master'=>MasterController::class,
                  'brand'=> MasterController::class,
                  'sepatu1'=> MasterController::class,
                  'sepatu2'=> MasterController::class,
                  'sepatu3'=> MasterController::class,
                  'sales1'=> MasterController::class,
                  'sales2'=> MasterController::class,
                  'sales3'=> MasterController::class,
                  'kategori'=> MasterController::class,
                  'toko'=> MasterController::class,
                ]);            

Route::post('order/tabledit/action', [SalesOrderController::class, 'action'])->name('tabledit.action');
