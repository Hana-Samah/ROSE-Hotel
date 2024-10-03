<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

// الصفحة الرئيسية للموقع
route::get('/', [AdminController::class, 'home']);

// الصفحة الرئيسية للوحة التحكم
route::get('/home', [AdminController::class, 'index'])->name('home');

// عرض صفحة الاتصال
Route::get('/contact', function () {
    return view('home.contact');
});

// عرض صفحة من نحن
Route::get('/about', function () {
    return view('home.about');
});

// عرض معرض الصور
Route::get('/gallery', [HomeController::class, 'showGallery']);

// إنشاء غرفة جديدة
route::get('/create_room', [AdminController::class, 'create_room']);

// إضافة غرفة جديدة
route::post('/add_room', [AdminController::class, 'add_room']);

// عرض الغرف
route::get('/view_room', [AdminController::class, 'view_room']);

// حذف غرفة
route::get('/room_delete/{id}', [AdminController::class, 'room_delete']);

// تحديث غرفة معينة
route::get('/room_update/{id}', [AdminController::class, 'room_update']);

// تعديل بيانات غرفة معينة
route::post('/edit_room/{id}', [AdminController::class, 'edit_room']);

// عرض تفاصيل غرفة معينة
route::get('/room_details/{id}', [HomeController::class, 'room_details']);

// إضافة حجز لغرفة معينة
route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);

// عرض جميع الحجوزات
route::get('/bookings', [AdminController::class, 'bookings']);

// حذف حجز معين
route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking']);

// قبول حجز معين
route::get('/approve_book/{id}', [AdminController::class, 'approve_book']);

// رفض حجز معين
route::get('/rejected_book/{id}', [AdminController::class, 'rejected_book']);

// عرض معرض الصور للإدارة
route::get('/view_gallary', [AdminController::class, 'view_gallary']);

// رفع صورة جديدة إلى المعرض
route::post('/upload_gallary', [AdminController::class, 'upload_gallary']);

// حذف صورة من المعرض
route::get('/delete_gallary/{id}', [AdminController::class, 'delete_gallary']);

// معالجة نموذج الاتصال
route::post('/contact', [HomeController::class, 'contact']);

// عرض جميع الرسائل الواردة
route::get('/all_messages', [AdminController::class, 'all_messages']);

// إرسال بريد إلكتروني لشخص معين
route::get('/send_email/{id}', [AdminController::class, 'send_email']);

// إرسال بريد إلكتروني باستخدام POST
route::post('/mail/{id}', [AdminController::class, 'mail']);

// عرض جميع الغرف
route::get('/our_room', [HomeController::class, 'our_room']);

// تسجيل الدخول باستخدام Google
route::get('auth/google', [GoogleController::class, 'googlepage']);

// استقبال رد من Google بعد تسجيل الدخول
route::get('auth/google/callback', [GoogleController::class, 'googlecallback']);

// تسجيل الدخول باستخدام Facebook
Route::get('auth/facebook', [FacebookController::class, 'facebookpage']);

// استقبال رد من Facebook بعد تسجيل الدخول
Route::get('auth/facebook/callback', [FacebookController::class, 'facebookredirect']);

// إضافة تقييم لغرفة معينة
Route::post('add_review/{room_id}', [HomeController::class, 'add_review']);

// عرض جميع التقييمات
Route::get('view_reviews', [AdminController::class, 'view_reviews']);

// حذف تقييم معين
route::get('/delete_reviews/{id}', [AdminController::class, 'delete_reviews']);

// تحديث عدد الزوار
Route::get('/update-visitor-count', [HomeController::class, 'updateVisitorCount']);

// تخزين البيانات في الكوكيز
Route::get('/store-data', [HomeController::class, 'storeData']);

// قراءة البيانات من الكوكيز وعرضها كـ JSON
Route::get('/get-data', function (Request $request) {
    // قراءة البيانات من الكوكيز
    $ipAddress = $request->cookie('ip_address');
    $location = json_decode($request->cookie('location'), true);
    $uiLanguage = $request->cookie('ui_language');

    // عرض البيانات كـ JSON
    return response()->json([
        'ip_address' => $ipAddress,
        'location' => $location,
        'ui_language' => $uiLanguage
    ]);
});

// عرض صفحة الموافقة على الكوكيز
Route::get('/cookie-consent', function () {
    return view('cookie-consent');
});

// معالجة قبول الكوكيز
Route::post('/accept-cookies', function () {
    // إنشاء كوكيز لتحديد قبول المستخدم
    Cookie::queue(Cookie::make('cookie_consent', 'accepted', 60 * 24 * 30)); // لمدة 30 يومًا
    return redirect()->back()->with('message', 'Cookies accepted');
});

// معالجة رفض الكوكيز
Route::post('/reject-cookies', function () {
    // إنشاء كوكيز لتحديد رفض المستخدم
    Cookie::queue(Cookie::make('cookie_consent', 'rejected', 60 * 24 * 30)); // لمدة 30 يومًا
    return redirect()->back()->with('message', 'Cookies rejected');
});
