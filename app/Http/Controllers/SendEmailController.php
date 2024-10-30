<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use App\Mail\SendEmail;
use App\Jobs\SendMailJob;


class SendEmailController extends Controller
{
    public function index()
    {
        // $content = [
        // 'name' => 'Ini Nama Pengirim',
        // 'subject' => 'Ini subject email',
        // 'body' => 'Ini adalah isi email yang dikirim dari laravel 10'
        // ];

        // Mail::to('elespeugm@gmail.com')->send(new SendEmail($content));
        // return "Email berhasil dikirim.";
        return view('emails.kirim-email');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        dispatch(new SendMailJob($data));
        return redirect()->route('kirim-email')
        ->with('success', 'Email berhasil dikirim.');
    }
}
