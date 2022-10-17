<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\ProfileHistory;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function add()
    {
        // dd('add');
        return view('admin.profile.create');
    }


     public function create(Request $request)
    {
        // 以下を追記
        // Validationを行う
        $this->validate($request, Profile::$rules);

        $profile = new Profile;
        $form = $request->all();

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);

        // データベースに保存する
        $profile->fill($form);
        // dd($profile);
        $profile->save();

        return redirect('admin/profile/create');
    }  

    public function edit(Request $request)
    {
        // dd($request->id);
        // Profile Modelからデータを取得する
        $profile = Profile::find($request->id);
        // dd($profile);
        if (empty($profile)) {
            abort(404);
        }
        
        $profile_history_list = ProfileHistory::all();
        return view('admin.profile.edit', ['profile' => $profile, 'profile_history_list' => $profile_history_list]);
    }


    public function update(Request $request)
    {

      // Varidationを行う
      $this->validate($request, Profile::$rules);

      // 既存のプロフィールデータを削除
      Profile::truncate();

      $profile = new Profile;
      $form = $request->all();

      unset($form['_token']);

      $profile->fill($form);
      $profile->save();
      
      $profile_history = new ProfileHistory;
      $profile_history->edited_at = Carbon::now();
      $profile_history->save();  

      return redirect('admin/profile/edit?id=' . $profile->id);
    }  
    
    
}
