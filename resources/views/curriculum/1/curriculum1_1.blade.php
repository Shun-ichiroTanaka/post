@extends('layouts.app')
@section('content')
<div id="app">
    <p>ここにカリキュラム内容を記述</p>
    <p>curriculum_id: <?php echo $curriculum_id; ?></p>
    <p>curriculum_page: <?php echo $curriculum_page; ?></p>
    <p>user_id: <?php echo $user_id; ?></p>
    <p>curriculum_maxpage: <?php echo $curriculum_maxpage; ?></p>
    <a href="{{$view_nexturl}}">next_page</a>
</div>
@endsection
