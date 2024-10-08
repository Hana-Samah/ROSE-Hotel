<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;
use App\Models\Gallary;
use App\Models\Review; // إضافة هذا السطر لاستيراد نموذج Review
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Visitor;



class HomeController extends Controller
{
    

    public function room_details($id)
    {
        $room = Room::with('reviews')->find($id);

        if (!$room) {
            return redirect()->back()->with('message', 'Room not found');
        }

        return view('home.room_details', [
            'room' => $room,
            'reviews' => $room->reviews
        ]);
    }

    public function add_review(Request $request, $room_id)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'review' => 'required|string',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        $review = new Review();
        $review->room_id = $room_id;
        $review->user_name = $request->user_name;
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->save();

        return redirect()->back()->with('message', 'Review added successfully');
    }



    public function add_booking(Request $request , $id){

        $request->validate([
            'startDate'=>'required|date',
            'endDate'=>'date|after:startDate',
        ]);

        $data = new Booking;
        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;


        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $isBooked = Booking::where('room_id',$id)
        ->where('start_date','<=',$endDate)
        ->where('end_date','>=',$startDate)->exists();

        if($isBooked){
            return redirect()->back()->with('message','Room is already booked please try different date');
        }else
        {

            $data->start_date = $request->startDate;
            $data->end_date = $request->endDate;
    
            $data->save();
            return redirect()->back()->with('message','Room Booked Successfully');
    
        }

    }

    public function contact(Request $request){
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        $contact->save();
        return redirect()->back()->with('message','Message Sent Successfully');
        
    }

    public function showGallery()
    {
        // جلب بيانات المعرض من قاعدة البيانات
        $gallary = Gallary::all();
    
        // التحقق من البيانات
        if ($gallary->isEmpty()) {
            // معالجة حالة عدم وجود بيانات
            $gallary = []; // يمكن تعيين مصفوفة فارغة بدلاً من false
        }
    
        return view('home.gallery', compact('gallary'));
    }

    public function our_room(){
        $room=Room::all();
        return view('home.our_rooms',compact('room'));
    }


    public function updateVisitorCount()
    {
        $today = date('Y-m-d');
    
        // تحقق مما إذا كان هناك سجل لليوم الحالي
        $visitor = Visitor::firstOrNew(['visit_date' => $today]);
        $visitor->visit_count++;
        $visitor->save();
    
        return response()->json([
            'today' => $visitor->visit_count,
            'total' => Visitor::sum('visit_count')
        ]);
    }

    public function storeData(Request $request)
    {
        // 1. الحصول على عنوان الـ IP
        $ipAddress = $request->ip();

        // 2. الحصول على الموقع باستخدام API خارجية مثل ipinfo.io
        $locationData = file_get_contents("http://ipinfo.io/{$ipAddress}/json");
        $location = json_decode($locationData, true);

        // 3. الحصول على لغة الواجهة المفضلة
        $uiLanguage = $request->getPreferredLanguage();

        // 4. إنشاء استجابة جديدة وتخزين البيانات في الكوكيز
        $response = new \Illuminate\Http\Response('Cookie data stored');

        // تخزين عنوان الـ IP
        $response->withCookie(cookie('ip_address', $ipAddress, 60 * 24)); // تخزين لمدة يوم واحد

        // تخزين الموقع
        $response->withCookie(cookie('location', json_encode($location), 60 * 24)); // تخزين لمدة يوم واحد

        // تخزين لغة الواجهة
        $response->withCookie(cookie('ui_language', $uiLanguage, 60 * 24)); // تخزين لمدة يوم واحد

        return $response;
    }
    
    

}
