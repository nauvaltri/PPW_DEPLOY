<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\datacvs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\RegisterEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class LoginRegisterController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard', 'dashboards', 'edit', 'update', 'delete'
        ]);
    }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
            'image_profile' => 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('image_profile')) {

            $image = $request->file('image_profile');

            $folderPathOriginal = public_path('storage/photos/original');
            $folderPathThumbnail = public_path('storage/photos/thumbnail');
            $folderPathSquare = public_path('storage/photos/square');

            if (!File::isDirectory($folderPathOriginal)) {
                File::makeDirectory($folderPathOriginal, 0777, true, true);
            }
            if (!File::isDirectory($folderPathThumbnail)) {
                File::makeDirectory($folderPathThumbnail, 0777, true, true);
            }
            if (!File::isDirectory($folderPathSquare)) {
                File::makeDirectory($folderPathSquare, 0777, true, true);
            }

            $filenameWithExt = $request->file('image_profile')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image_profile')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;

            // Simpan gambar asli
            $path = $request->file('image_profile')->storeAs('photos/original', $filenameSimpan);

            // Buat thumbnail dengan lebar dan tinggi yang diinginkan
            $thumbnailPath = public_path('storage/photos/thumbnail/' . $filenameSimpan);
            Image::make($image)
                ->fit(150, 150)
                ->save($thumbnailPath);

            // Buat versi persegi dengan lebar dan tinggi yang sama
            $squarePath = public_path('storage/photos/square/' . $filenameSimpan);
            Image::make($image)
                ->fit(300, 300)
                ->save($squarePath);

            $path = $filenameSimpan;
        } else {
            $path = null;
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image_profile' => $filenameSimpan
        ]);

        Mail::to($request->email)->send(new RegisterEmail($request));

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')
            ->withSuccess('You have successfully registered & logged in!');
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }

    /**
     * Display a dashboard to authenticated users.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        if (Auth::check()) {
            $datas = User::all();
            return view('auth.dashboard', compact('datas'));
        }

        return redirect()->route('login')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }

    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    }

    public function edit(Request $request, String $id)
    {

        $accounts = User::find($id)->first();
        return view('auth.edit', compact('accounts'));
    }

    public function update(Request $request, String $id)
    {

        $accounts = User::findOrFail($id);

        if ($request->hasFile('image_profile')) {
            $filenameWithExt = $request->file('image_profile')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image_profile')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;

            $photo = $accounts->image_profile;

            // Hapus gambar asli
            $originalPath = public_path('storage/photos/original/' . $photo);
            if (File::exists($originalPath)) {
                File::delete($originalPath);
            }
            //simpan gambar asli
            $path = $request->file('image_profile')->storeAs('photos/original', $filenameSimpan);

            // Hapus gambar thumbnail
            $thumbnailPath = public_path('storage/photos/thumbnail/' . $photo);
            if (File::exists($thumbnailPath)) {
                File::delete($thumbnailPath);
            }

            // Buat thumbnail dengan lebar dan tinggi yang diinginkan
            $thumbnailPath = public_path('storage/photos/thumbnail/' . $filenameSimpan);
            Image::make($request->image_profile)
                ->fit(150, 150)
                ->save($thumbnailPath);

            // Hapus gambar square
            $squarePath = public_path('storage/photos/square/' . $photo);
            if (File::exists($squarePath)) {
                File::delete($squarePath);
            }

            // Buat versi square dengan lebar dan tinggi yang sama
            $squarePath = public_path('storage/photos/square/' . $filenameSimpan);
            Image::make($request->image_profile)
                ->fit(300, 300)
                ->save($squarePath);

            $path = $filenameSimpan;
        }

        $accounts->update([
            'name'   => $request->name,
            'email'   => $request->email,
            'image_profile' => $filenameSimpan
        ]);

        return redirect()->route('dashboard')
            ->withSuccess('Profil berhasil terupdate.');
    }

    public function delete(String $id)
    {

        $accounts = User::find($id);

        $photo = $accounts->image_profile;

        // Hapus gambar asli
        $originalPath = public_path('storage/photos/original/' . $photo);
        if (File::exists($originalPath)) {
            File::delete($originalPath);
        }
        // Hapus gambar thumbnail
        $thumbnailPath = public_path('storage/photos/thumbnail/' . $photo);
        if (File::exists($thumbnailPath)) {
            File::delete($thumbnailPath);
        }
        // Hapus gambar square
        $squarePath = public_path('storage/photos/square/' . $photo);
        if (File::exists($squarePath)) {
            File::delete($squarePath);
        }

        $accounts->update([
            'image_profile'     => null,
        ]);

        return redirect()->route('dashboard')
            ->withSuccess('gambar berhasil di hapus.');
    }
}
