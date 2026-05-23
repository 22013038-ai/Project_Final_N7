<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function register($id)
    {
        Registration::create([
            'user_id' => auth()->id(),
            'event_id' => $id,
            'status' => 'pending'
        ]);

        return back()->with(
            'success',
            'Đăng ký thành công '
        );
    }

    public function myRegistrations()
    {
        $registrations = Registration::where(
            'user_id',
            auth()->id()
        )->get();

        return view(
            'registrations.index',
            compact('registrations')
        );
    }
}