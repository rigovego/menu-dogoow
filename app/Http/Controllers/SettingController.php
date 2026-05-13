<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => ['required'],
        ]);

        $setting = Setting::first();

        if (!$setting || !Hash::check($request->password, $setting->admin_password)) {
            return back()->withInput()->with('error', 'Contraseña incorrecta.');
        }

        session(['admin_authenticated' => true]);

        return redirect()->route('admin.dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_authenticated');

        return redirect()->route('admin.login')->with('success', 'Sesión cerrada correctamente.');
    }

    public function edit()
    {
        $setting = Setting::first();

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        $data = $request->validate([
            'primary_color' => ['required', 'string', 'max:20'],
            'background_color' => ['required', 'string', 'max:20'],
            'background_image_url' => ['nullable', 'url'],
            'promo_text' => ['nullable', 'string', 'max:255'],
            'promo_active' => ['nullable', 'boolean'],
            'admin_password' => ['nullable', 'string', 'min:4'],
        ]);

        $data['promo_active'] = $request->has('promo_active');

        if (!empty($data['admin_password'])) {
            $data['admin_password'] = Hash::make($data['admin_password']);
        } else {
            unset($data['admin_password']);
        }

        $setting->update($data);

        return back()->with('success', 'Configuración actualizada correctamente.');
    }
}