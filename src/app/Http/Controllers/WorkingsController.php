<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Workings;
use Carbon\Carbon;

class WorkingsController extends Controller
{
    //勤務開始
    public function punchIn()
    {

        // 認証中ユーザーを$userに代入する
        $user = Auth::user();

        // データベースに勤務開始時刻を登録
        $timestamp = Workings::create([
            'users_id' => $user->id,
            'start_time' => Carbon::now()
        ]);

        session([
            'punchInSuccess' => true,    // 勤務開始ボタンを非活性
            'breakInSuccess' => true,  // 休憩開始ボタンを活性
            'breakOutSuccess' => false, // 休憩終了ボタンを非活性
            'punchOutSuccess' => false, // 勤務終了ボタンを活性
        ]);

        return redirect()->back();
    }
    

    //退勤時
    public function punchOut()
    {
        //認証中ユーザーを$userに代入をする。
        $user=Auth::user();

        //Workingsテーブルのusers_idに、最新のものを取得し、$timestampに代入をする。
        $timestamp=Workings::where('users_id',$user->id)->latest()->first();

        //$timestampのend_timeカラムに、Carbonで取得をした時刻をDBに入れる。
        $timestamp->update([
            'end_time'=> Carbon::now()
        ]);

        // 全てのボタンを活性にする
        session(['breakInSuccess' => false]);
        session(['punchInSuccess' => false]);
        session(['breakOutSuccess' => false]);
        session(['punchOutSuccess' => false]);

        return redirect()->back();
    }
}