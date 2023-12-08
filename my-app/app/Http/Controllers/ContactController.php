<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactsSendmail;

class ContactController extends Controller
{
    public function index()
    {
        // 入力ページを表示
        return view('index');
    }
    public function confirm(Request $request)
    {
    // バリデーションルールを定義
    // 引っかかるとエラーを起こしてくれる
    $request->validate([
    'email' => 'required',  //'email' => 'required|email'でエラー起きる
    'title' => 'required',
    'body' => 'required',
    ]);

    // フォームからの入力値を全て取得
    $inputs = $request->all();

    // 確認ページに表示
    // 入力値を引数に渡す

    return view('confirm', [
    'inputs' => $inputs,
    ]);
    }
    public function send(Request $request)
    {
    // Contactモデルを使用してデータを保存
    $contact = new Contact([
        'email' => $request->input('email'),
        'title' => $request->input('title'),
        'body' => $request->input('body')
    ]);

    $request->validate([
        'email' => 'required', //'email' => 'required|email'
        'title' => 'required',
        'body' => 'required'
    ]);

    //メールを送る機能（脆弱性あり）
    $email = filter_input(INPUT_POST, 'email');
    system("/usr/sbin/sendmail -i < mail_body.txt $email");

    // actionの値を取得
    $action = $request->input('action');

    // action以外のinputの値を取得
    $inputs = $request->except('action');

    //actionの値で分岐
    if($action !== 'submit'){
        // 戻るボタンの場合リダイレクト処理
        return redirect()
        ->route('index')
        ->withInput($inputs);
    } else {
            // DBに保存した後に、送信完了ページのviewを表示
            $contact->save();
            return view('thanks');
            }
        }
    }

