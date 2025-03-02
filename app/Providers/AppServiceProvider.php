<?php

namespace App\Providers;

use Illuminate\Validation\Rules\Exists;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Set presence verifier
        Validator::resolver(function ($translator, $data, $rules, $messages, $attributes) {
            return new \Illuminate\Validation\Validator($translator, $data, $rules, $messages, $attributes);
        });
    }
}

