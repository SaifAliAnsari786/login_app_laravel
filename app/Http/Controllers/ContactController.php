<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    protected $view = 'contacts.';
    protected $redirect = 'contacts';

    public function index()
    {
        $settings = User::paginate(5);
        return view('contacts.index', compact('settings'));
    }

    public function create()
    {
        $users = User::all();
        return view($this->view . 'create', compact('users'));
    }


    public function store()
    {
        $validateData =  $this->validate(request(),[
            'phone_no' => 'required|array',
            'phone_no.*' => 'required|numeric',
        ]);
        // dd(request()->all());
        foreach (request('phone_no') as $index => $value) {
            $user = User::findOrFail(request('user_id'));
            $setting = new Contact($validateData);
            $setting->user_id = $user->id;
            $setting->phone_no = $value;
            $setting->save();
            Session::flash('success', 'User has been Created!');

        }
        return redirect($this->redirect);
    }

    public function show(Contact $contact)
    {

    }

    public function edit($id)
    {
        $setting = User::findOrFail($id);
        $users = User::all();
        return view($this->view . 'edit', compact('setting', 'users'));
    }
    public function update($id)
    {
        $validateData =  $this->validate(request(),[
            'phone_no' => 'required|array',
            'phone_no.*' => 'required|numeric',
        ]);

        $setting = User::findOrFail($id);
        $setting->contacts()->delete();
        foreach (request('phone_no') as $index => $value) {
        $contact = new Contact($validateData);
            $contact->user_id = $setting->id; // Assuming user_id is the foreign key for the contacts relationship
            $contact->phone_no = $value;
            $contact->save();
            Session::flash('success', 'User has been Update!');
        }
        return redirect($this->redirect);
    }

    public function destroy($id)
    {
        $setting = User::findOrFail($id);
        $setting->contacts()->delete();
        return redirect($this->redirect);
    }
}
