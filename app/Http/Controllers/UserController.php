<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $view = 'auth.';
    protected $redirect = 'index';

    public function index(Request $request)
    {
        // dd(98);
        $settings = User::orderBy('id', 'DESC');
        if (request('search')) {
            $key = request('search');
            $settings = $settings->where('name', 'LIKE', '%'.$key.'%');
        }

        $settings = $settings->paginate('2');
        return view('auth.index', compact('settings'));
    }

    public function create()
    {
        return view($this->view . 'create');
    }

    public function store()
    {
        $validatedData =  $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone_no' => 'required|numeric',
            'password' => 'required',
            'image' => 'required|mimes:png,jpg,pdf'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $setting = User::create($validatedData);
        if (request()->hasFile('image')) {
            $extension = request('image')->getClientOriginalExtension();
            $fileName = time() . rand(1000, 9999) . '.' . $extension;
            $path = 'images/product/';
            request('image')->move($path, $fileName);
            $validatedData['image'] = $path . $fileName;
        }
        $validatedData['user_id'] = $setting->id;
        userInfo::create($validatedData);
        Session::flash('success', 'User has been created!');
        return redirect('index');
        // dd(request()->all());
    }
    public function show($id)
    {
        $setting = User::findOrFail($id);
        return view($this->view . 'show', compact('setting'));
    }

    public function edit($id)
    {
        $setting = User::findOrFail($id);
        return view($this->view . 'edit', compact('setting'));
        dd(request()->all());
    }

    public function update($id)
    {
        $validatedData =  $this->validate(request(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_no' => 'required|numeric',
            'image' => 'required|mimes:png,jpg,pdf'
        ]);

        // $validatedData['password'] = Hash::make($validatedData['password']);
        // $setting = User::create($validatedData);

        $setting = User::findOrFail($id);
        $setting->update($validatedData);
        if (request('image')) {

            if (request()->hasFile('image')) {
                $extension = request('image')->getClientOriginalExtension();
                $fileName = time() . rand(1000, 9999) . '.' . $extension;
                $path = 'images/product/';
                request('image')->move($path, $fileName);
                $validatedData['image'] = $path . $fileName;
                $previousImage = public_path() . '/' . $setting->userInfo->image;
                if (is_file($previousImage) && file_exists($previousImage)) {
                    unlink($previousImage);
                }
            }
        }
        $setting->userInfo->update($validatedData);
        // $validatedData['user_id'] = $setting->id;
        // userInfo::create($validatedData);
        Session::flash('success', 'User has been update!');
        return redirect('index');
    }
    public function delete($id)
    {
        $setting = User::findOrFail($id);
        $previousImage = public_path() . '/' . $setting->userInfo->image;
        if (is_file($previousImage) && file_exists($previousImage)) {
            unlink($previousImage);
        }
        $setting->userInfo->delete();
        $setting->delete();
        Session::flash('success', 'Product has been deleted!');
        return redirect($this->redirect);
    }

    public function getHome(Request $request)
    {
        if (Auth::check()) {
            $settings = User::orderBy('id', 'DESC');
            if (request('search')) {
                $key = request('search');
                $settings = $settings->where('name', 'LIKE', '%'.$key.'%');
            }

            $settings = $settings->paginate('2');
            return view('auth.index', compact('settings'));
        } else {
            return view('auth.login');
        }
    }


    public function showLogin()
    {
        if (Auth::check()) {
            return redirect('');
        } else {
            return view('auth.login');
        }
    }

    public function login(Request $request)
    {
        // dd(request()->all());
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->intended('/index');
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return view('auth.login');
    }
}
