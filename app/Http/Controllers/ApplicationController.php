<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function new_application(Request $request)
    {

        $request->validate([
            "email"=>"required|email",
            "name"=>"required|max:50",
        ],[
            "email.required"=>"Поле Email не заполнено!",
            "email.email"=>"Укажите действительный адрес почты!",
            "name.required"=>"Поле Имя не заполнено!",
            "name.max"=>"Имя должно быть не более 50 символов!",
        ]);

        $application_info = $request->all();

        Application::create([
            "email"=>$application_info["email"],
            "name"=>$application_info["name"],
            "course_id"=>$application_info["course"],
        ]);

        return redirect("/");
    }

    public function confirm($id_application)
    {
        $application = Application::find($id_application);

        $application->is_confirm = 1;

        $application->save();

        return redirect("/admin");
    }


}
