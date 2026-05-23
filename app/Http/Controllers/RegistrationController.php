<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function register($id)
    {
        $exists = Registration::where(
            'user_id',
            auth()->id()
        )
        ->where(
            'event_id',
            $id
        )
        ->exists();

        if ($exists) {

            return back()->with(
                'error',
                'Bạn đã đăng ký sự kiện này rồi'
            );
        }

        Registration::create([

            'user_id' => auth()->id(),

            'event_id' => $id,

            'status' => 'pending'

        ]);

        return back()->with(
            'success',
            'Đăng ký thành công'
        );
    }
    public function myRegistrations()
    {
        $registrations = Registration::where(
            'user_id',
            auth()->id()
        )
        ->latest()
        ->get();

        return view(
            'registrations.index',
            compact('registrations')
        );
    }
    public function index()
    {
        $registrations = Registration::latest()->get();

        return view(
            'registrations.admin',
            compact('registrations')
        );
    }
    public function approve($id)
    {
        $registration = Registration::findOrFail($id);

        $registration->update([
            'status' => 'approved'
        ]);

        return back()->with(
            'success',
            'Đã duyệt đăng ký'
        );
    }
    public function cancel($id)
    {
        $registration = Registration::findOrFail($id);

        $registration->update([
            'status' => 'cancelled'
        ]);

        return back()->with(
            'success',
            'Đã hủy đăng ký'
        );
    }
}