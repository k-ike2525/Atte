<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Breakings;
use Carbon\Carbon;

class BreakingsController extends Controller
{
    //休憩開始
    public function breakIn()
    {
        //認証中ユーザーを$userに代入をする。
        $user = Auth::user();

        $timestamp = Breakings::create([
            'breakings_id' => $user->id,
            'breakings_start_time' => Carbon::now()
        ]);

        // 勤務終了ボタンと休憩終了ボタンを活性状態にする
        session(['punchOutSuccess' => false]);
        session(['breakOutSuccess' => true]);
        session(['breakInSuccess' => false]);

        return redirect()->back();
        }

    //休憩終了
    public function breakOut()
    {
        //認証中ユーザーを$userに代入をする。
        $user=Auth::user();

        //breakingsテーブルのbreakings_idに、最新のものを取得し、$timestampに代入をする。
        $timestamp=Breakings::where('breakings_id',$user->id)->latest()->first();

        //$timestampのbreakings_end_timeカラムに、Carbonで取得をした時刻をDBに入れる。
        $timestamp->update([
            'breakings_end_time'=> Carbon::now()
        ]);

        // 休憩開始ボタンと勤務終了ボタンを活性状態にする
        session(['punchOutSuccess' => false]);
        session(['breakInSuccess' => true]);
        session(['punchInSuccess' => true]);
        session(['breakOutSuccess' => false]);

        return redirect()->back();
}

}