<?php

namespace NiceShop\Http\Controllers;

use NiceShop\License;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use NiceShop\Http\Middleware\RedirectIfShouldNotCreateLicense;

class LicenseController extends Controller
{
    public function __construct()
    {
        $this->middleware(RedirectIfShouldNotCreateLicense::class);
    }


    public function create(): Factory|View|Application
    {
        return view('license.create');
    }


    public function store(License $license): RedirectResponse
    {
        request()->validate(
            [
                'purchase_code' => 'required',
                'username' => 'required',
            ],
            [
                'purchase_code.required' => 'شماره سفارش الزامی است',
                'username.required' => 'نام کاربری الزامی است',
            ]
        );

        $license->activate(request('username'), request('purchase_code'));

        return redirect()->intended();
    }
}
