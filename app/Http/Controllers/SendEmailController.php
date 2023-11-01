<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use Illuminate\Http\Request;
use Mail;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail as FacadesMail;

class SendEmailController extends Controller
{
    // public function index()
    // {
    //     $content = [
    //     'name' => 'Ikhwan Hanif',
    //     'subject' => 'Coba kirim email',
    //     'body' => 'Isi email Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem sapiente beatae eos magnam soluta commodi. Alias minus, aspernatur porro, pariatur aut, quam laboriosam cupiditate natus sint beatae hic nisi quas?'
    //     ];

    //     FacadesMail::to(' ikhnif26@gmail.com')->send(new
    //     SendEmail($content));
    //     return "Email berhasil dikirim.";
    // }

    public function index()
    {
        return view('kirim-email');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        dispatch(new SendMailJob($data));
        return redirect()->route('kirim-email')
            ->with('success', 'Email berhasil dikirim');
    }
}
