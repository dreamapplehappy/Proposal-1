@extends('layouts.default')

@section('title')
@parent
| 首页
@stop

@section('styles')
@stop

@section('body')
<div class="row">
<div class="col-md-8 col-md-offset-2">
    <div class="topics-list">
    <div class="fc"><i class="fa fa-users fa-1x"></i>  还没有过期的提议</div>
    <hr />
    @foreach($topics_not_pass as $topic)
    <section class="list-group">
    <div href="#" class="list-group-item">
        <div class="imp">{{$topic->importance}}</div>
        <div class="badge">{{ $topic->vote_count }} <i class="icon-like size-20"></i></div>
        <a href="{{ route('topic.show',$topic->id) }}" class="list-group-item-heading">{{ $topic->title }}<span class="glyphicon glyphicon-fire"></span></a>
        <div class="list-group-item-text">{{ $topic->user->name }}在{{ date('Y-m-d', strtotime($topic->updated_at)) }}发表提议，投票的截止日期是：{{$topic->deadline}}</div>
    </div>
    </section> 
    @endforeach
</div>
</div>
</div>
<div class="row">
<div class="col-md-7 col-md-offset-5">
    {{ $topics_not_pass->links() }}
</div>
</div>
<div id="show_time">
    <canvas id="canvas" height="100px" style="display: block;">
        当前浏览器不支持Canvas，请更换浏览器后再试
    </canvas>
</div>

<div class="row-c">
<div class="col-md-8 col-md-offset-2">
    <div class="topics-list">
    <div class="fc"><i class="fa fa-users fa-1x"></i> 已经过期的提议</div>
    <hr />
    @foreach($topics_pass as $topic)
    <section class="list-group">
    <div href="#" class="list-group-item">
        <div class="imp">{{$topic->importance}}</div>
        <div class="badge">{{ $topic->vote_count }} <i class="icon-like size-20"></i></div>
        <a href="{{ route('topic.show',$topic->id) }}" class="list-group-item-heading">{{ $topic->title }}<span class="glyphicon glyphicon-fire"></span></a>
        <div class="list-group-item-text">{{ $topic->user->name }}在{{ date('Y-m-d', strtotime($topic->updated_at)) }}发表提议，投票的截止日期是：</div>
    </div>
    </section> 
    @endforeach
</div>
</div>
</div>
<div class="row">
<div class="col-md-7 col-md-offset-5">
    {{ $topics_pass->links() }}
</div>
</div>
@stop


@section('scripts')
<script src="{{ asset('js/time.animation.js') }}"></script>
<script src="{{ asset('js/importance.js') }}"></script>
@stop
