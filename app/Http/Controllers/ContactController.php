<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('contact-us');
    }
    public function contactHandler(Request $req)
    {
        date_default_timezone_set('Asia/Jakarta');
        $details = [
            'name' => $req->name,
            'email' => $req->email,
            'message' => $req->message,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $data = Contact::create($details);

        if ($data) {
            Mail::to($req->email)->send(new ContactMail($details));
            return response()->json([
                "success" => true,
                "message" => "Pesan telah dikirim!"
            ]);
        }
    }
}
