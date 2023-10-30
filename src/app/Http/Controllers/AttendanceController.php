<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Breakings;
use App\Workings;
use Carbon\Carbon; // 必要な場所でCarbonをインポート

class AttendanceController extends Controller
{
    public function index()
    {
        $items = [];
        $page = request()->get('page', 1);
        $perPage = 5;

        $date = Carbon::parse(request()->get('date', now()))->format('Y-m-d');

        // 各ユーザーに対して最新の勤怠情報と休憩情報を取得
        $users = User::all();

        foreach ($users as $user) {
            // ユーザーごとに同一日の勤怠情報を取得
            $workings = Workings::where('users_id', $user->id)
                ->whereDate('created_at', $date)
                ->get();

            $latestWork = null;
            $breakTotal = 0; // 休憩時間のデフォルトを 0 に設定
            $oldestStartTime = strtotime("23:59:59"); // 初期値を一日の最終時間に設定

            foreach ($workings as $work) {
                // ユーザーごとに最新の休憩情報を取得して合計を計算
                $breaks = Breakings::where('breakings_id', $work->id)->get();

                foreach ($breaks as $break) {
                    $start_time = strtotime($break->breakings_start_time);
                    $end_time = strtotime($break->breakings_end_time);

                    if ($start_time !== false && $end_time !== false) {
                        $breakTotal += $end_time - $start_time;
                    }
                }

                $workStart = strtotime($work->start_time);

                // 一番古い start_time を探す
                if ($workStart !== false && $workStart < $oldestStartTime) {
                    $oldestStartTime = $workStart;
                }

                if ($latestWork === null || $work->created_at > $latestWork->created_at) {
                    $latestWork = $work;
                }
            }

            if ($latestWork) {
                // 勤務時間トータルを計算
                $workEnd = ($latestWork->end_time === null) ? strtotime("00:00:00") : strtotime($latestWork->end_time);
                $workDuration = ($workEnd === strtotime("00:00:00")) ? $workEnd === strtotime("00:00:00") : $workEnd - $oldestStartTime - $breakTotal;

                $items[] = [
                    'user' => $user,
                    'work' => [
                        'start_time' => date('H:i:s', $oldestStartTime),
                        'end_time' => date('H:i:s', $workEnd),
                    ],
                    'breaktotal' => gmdate('H:i:s', $breakTotal),
                    'workstotal' => gmdate('H:i:s', $workDuration),
                    'created_at' => Carbon::parse($latestWork->created_at)->format('Y-m-d'),
                ];
            }
        }

        $previousDate = Carbon::parse($date)->subDay()->format('Y-m-d');
        $nextDate = Carbon::parse($date)->addDay()->format('Y-m-d');

        $paginatedItems = new LengthAwarePaginator(
            array_slice($items, ($page - 1) * $perPage, $perPage),
            count($items),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('attendance', [
            'items' => $paginatedItems,
            'previousDate' => $previousDate,
            'nextDate' => $nextDate,
        ]);
    }
}