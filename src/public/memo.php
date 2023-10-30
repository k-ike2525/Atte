<!DOCTYPE html>


value="{{ $contact['password'] }}" readonly

value="{{ $contact['email'] }}" readonly

value="{{ $contact['name'] }}" readonly


<p>{{$message}}</p>

public function getSignip()
{
    $pram = ['message' => '登録してください。'];
    return view('register')

}


public function store(Request $request)
{
$contact = $request->only(['name', 'email', 'password',]);
return view('register', compact('contact'));
}

    use HasFactory;
    protected $fillable = [
    'name',
    'email',
    'password',
    ];


    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
    Schema::create('authors', function (Blueprint $table) {
    $table->id();
    $table->name();
    $table->email();
    $table->password();
    });
    }

/////// DB 確認　バリデーション　////////

    class RegisteredUserController extends Controller


やることリスト
・未実装：ダミーデータ


テーブル：
・users_table
・workings_table
・breakings_table

Model作成 : 1対多リレーション
app/working.php
app/breaking.php

public function scopeCategorySearch($query, $users_id)
{
if (!empty($users_id)) {
$query->where('users_id', $users_id);
}
}




ルート作成 : web.php

押す（/home）
表示（/attendance）

Route::group(['middleware' => 'auth'], function() {
Route::post('/home', 'AttendanceController@punchIn')->name('');
Route::post('/attendance', 'AttendanceController@punchOut')->name('');
});


Route::group(['middleware' => 'guest'], function() {
Route::get('/home', 'Auth\RegisteredUserController@create')->name('register');
Route::post('/register', 'Auth\RegisteredUserController@store')->name('register');
});

　
コントローラー　：　AttendanceController.php


public function search(Request $request)
{
$todos = Todo::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
$categories = Category::all();

return view('index', compact('todos', 'categories'));
}

View : attendance.blade.php