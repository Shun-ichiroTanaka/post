<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function viewcurriculum($id='1', $page='1') {
        $curriculum_id = (int)$id;
        $curriculum_page = (int)$page;
        $curriculum_page_next = $curriculum_page + 1;
        $curriculum_page_previous = $curriculum_page - 1;
        $user_id = (int)Auth::id();

        #例のような文字列を生成・・・(例)curriculum.1.curriculum1_1
        $viewfilename = 'curriculum' . '.' . $curriculum_id . '.' . 'curriculum' . $curriculum_id . '_' . $curriculum_page;
        
        #例のような文字列を生成・・・(例)http://localhost:8000/curriculum/1/2
        $view_nexturl = url('/') . '/' . 'curriculum' . '/' . $curriculum_id . '/' . $curriculum_page_next;
        $view_previousurl = url('/') . '/' . 'curriculum' . '/' . $curriculum_id . '/' . $curriculum_page_previous;

        #初めてカリキュラムを参照するときは進捗状況を追加する
        if (CurriculumProgression::where(['user_id' => $user_id, 'curriculum_id' => $curriculum_id])->count() == 0) {
            $curriculumprogression = new CurriculumProgression;
            $curriculumprogression->fill(['user_id' => $user_id, 'curriculum_id' => $curriculum_id]);
            $curriculumprogression->save();
        }

        #カリキュラムンの全ページ数を取得
        $curriculum_maxpage = Curriculum::where(['id' => $curriculum_id])->first()->max_page;

        #カリキュラムの進捗を更新
        $curriculumprogression = CurriculumProgression::where(['user_id' => $user_id, 'curriculum_id' => $curriculum_id]);
        if ($curriculum_page > $curriculumprogression->first()->current_page) {
            $curriculumprogression->update(['current_page' => (int)$curriculum_page]);
        }

        #viewに送るデータを準備
        $data = [
            'curriculum_id' => $curriculum_id,
            'curriculum_page' => $curriculum_page,
            'curriculum_page_next' => $curriculum_page_next,
            'viewfilename' => $viewfilename,
            'view_nexturl' => $view_nexturl,
            'view_previousurl' => $view_previousurl,
            'user_id' => $user_id,
            'curriculum_maxpage' => $curriculum_maxpage,
            'test' => $test,
        ];

        #viewの表示
        return view($viewfilename, $data);
    }
}
