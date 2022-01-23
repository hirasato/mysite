<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 以下を追記することでSite Modelが扱えるようになる
use App\Site;
// 以下を追記することでHistory Modelが扱えるようになる
use App\History;
// 以下を追記することでStar Modelが扱えるようになる
use App\Star;

use Carbon\Carbon;

class SiteController extends Controller
{
    //
     public function add()
  {
      return view('admin.site.create');
  }
  
   public function create(Request $request)
  {
  
       // Varidationを行う
      $this->validate($request, Site::$rules);
      
      $site = new Site;
      $form = $request->all();
      
      // フォームから画像が送信されてきたら、保存して、$site->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $site->image_path = basename($path);
      } else {
          $site->image_path = null;
      }
      
      
      
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      
      
      
      // データベースに保存する
      $site->fill($form);
      $site->save();
      
      // メインページにリダイレクトする
      return redirect('/admin/site/main');
  }
      //一覧ページ
   public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Site::where('title', $cond_title)->get();
      } else {
          // それ以外はすべての投稿を取得する
          $posts = Site::all();
      }
      return view('admin.site.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
    //編集ページ
   public function edit(Request $request)
  {
      // Site Modelからデータを取得する
      $site = Site::find($request->id);
      if (empty($site)) {
        abort(404);    
      }
      return view('admin.site.edit', ['site_form' => $site]);
  }
    //メインページ
   public function main(Request $request)
  {
     $posts = Site::all();
     
      return view('admin.site.main', ['posts' => $posts]);
  }

   //更新
  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Site::$rules);
      // Site Modelからデータを取得する
      $site = Site::find($request->id);
      // 送信されてきたフォームデータを格納する
      $site_form = $request->all();
       if ($request->remove == 'true') {
          $site_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $site_form['image_path'] = basename($path);
      } else {
          $site_form['image_path'] = $site->image_path;
      }

      unset($site_form['image']);
      unset($site_form['remove']);
      unset($site_form['_token']);
      // 該当するデータを上書きして保存する
      $site->fill($site_form)->save();
      
        $history = new History();
        $history->site_id = $site->id;
        $history->edited_at = Carbon::now();
        $history->save();
        
      return redirect('admin/site/');
  }
  //削除
  public function delete(Request $request)
  {
      // 該当するSite Modelを取得
      $site = Site::find($request->id);
      // 削除する
      $site->delete();
      return redirect('admin/site/');
  }  

}