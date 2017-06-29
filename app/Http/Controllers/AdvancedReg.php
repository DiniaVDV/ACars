<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ConfirmUser;
use Mail;
use App\Mail\Register;


class AdvancedReg extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:150',
            'email' => 'required|max:250|email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::where('email', $request->input('email'))->first(); //делаем выборку из базы по введенному email

        if(!empty($user->email))
        {
            if($user->status == 0)
            {
                return  back()->with('message', 'Такой email уже зарегестрирован, но не подтвержден. Проверьте почту или <a href="repeat_confirm">запросите</a> повторное подтверждение email.');
            }
            else
            {
                return back()->with('message', "Пользователь с таким email уже зарегестрирован. Забыли пароль?");
            }
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'remember_token' => bcrypt($request->input('_token')),
        ]);

        if($user)
        {
            $email = $user->email;
            $token = str_random(32);
            $model = new ConfirmUser;
            $model->email = $email;
            $model->token = $token;
            $model->save();

            Mail::to($email)->send(new Register($user, $token));


            return back()->with('message','Для завершении регистрации нужно перейти по <a href="register/confirm/'.$token.'">ссылки</a> для подтверждения почты.');
        }
        else {
            return back()->with('message','Ошибка, попробуй позже');
        }
    }

    public function confirm($token)
    {
        $model = ConfirmUser::where('token','=',$token)->firstOrFail(); //выбираем запись с переданным токеном, если такого нет то будет ошибка 404
        $user = User::where('email','=',$model->email)->first(); //выбираем пользователя почта которого соответствует переданному токену
        $user->status = 1; // меняем статус на 1
        $user->save();  // сохраняем изменения
        $model->delete(); //Удаляем запись из confirm_users
        return "Регистрация закончена";
    }

    public function getRepeat()
    {
        return view('auth.repeat');
    }

    public function postRepeat(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first(); //делаем выборку из таблицы users по указанному email

        if(!empty($user->email)) // проверяем, что email существует
        {
            if($user->status == 0 )
            {
                $user->touch(); // это метод, который обновляет поле updated_at на текущее время.
                $confirm = ConfirmUser::where('email', $request->input('email'))->first(); //делаем выборку из таблицы confrim_users
                $confirm->touch(); // тоже обновляем поле updated_at

                Mail::to($user->email)->send(new Register($user, $confirm->token));

                return back()->with('message','Письмо для активации успешно выслано на указанный адрес'); //возвращаем пользователя обратно с сообщением, что письмо отправленно
            }
            else {
                return back()->with('message',"Такой email уже подтвержден");}
        }
        else { return back()->with('message',"Нет пользователя с таким email");}

    }
}
