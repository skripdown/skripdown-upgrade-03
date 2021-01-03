<?php


namespace App\Http\back;


use Illuminate\Support\Facades\Mail;

class _Mail
{

    public static function client_registration($model) {
        $type = 'client-registration';
        $model->mail_type = $type;

        Mail::to($model->email)->send(new \App\Mail\Mail($model));
    }

    public static function client_registration_fail($model) {
        $type = 'client-registration-fail';
        $model->mail_type = $type;

        Mail::to($model->email)->send(new \App\Mail\Mail($model));
    }
}
