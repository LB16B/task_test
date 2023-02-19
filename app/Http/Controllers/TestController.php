<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        // Eloquent
        //全件取得 allでコレクション型
        $values = Test::all();

        $count = Test::count();

        // 指定したidのインスタンスを返す
        $first = Test::findOrFail(1);

        // 条件指定
        $whereBBB = Test::where('text', '=', 'bbb');

        // クエリビルダ
        $queryBuilder = DB::table('tests')->where('text', '=', 'aaa')
        ->select('id', 'text')
        ->get();

        // 処理を止めて内容確認
        dd($values, $count, $first, $whereBBB ,$queryBuilder);

        //compact()でViewに変数を渡す
        return view('tests.test', compact('values'));

    }
}
