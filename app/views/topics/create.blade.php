@extends('layouts.default')

@section('title')
Yours @parent
@stop

@section('styles')
<!-- <link rel="stylesheet" href="{{ asset('css/input.css')}}"> -->
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@stop

@section('body')

@if(!isset($topic)){{ Form::open(array('route' =>'topic.store', 'role' => 'form', 'class' => 'form-horizontal')) }}
@else {{ Form::open(array('route'=>['topic.update', $topic->id],'method' => 'patch', 'role' => 'form', 'class' => 'from-horizontal')) }}
@endif

	{{ Form::hidden('user_id',Auth::id()) }}
	<div class="form-group my-title">
		<span class="span title">提议标题</span>
		{{ Form::text('title', isset($topic)?$topic->title:null, array('class' => 'form-control', 'placeholder' => '提议标题')) }}
	</div>
	<div class="form-group my-deadline-date">
		<span class="span deadline-date">截止日期</span>
		<div class="deadline"><input class="input-label" type="text" disabled="disabled" value="截止日期"><input class="deadline-date" name="date" type="date"><input class="deadline-time" name="time" type="time"></div>
	</div>
	<div class="form-group my-deadline">
		<span class="span deadline-time">截止日期</span>
		{{ Form::text('deadline', isset($topic)?$topic->deadline:null, array('id' => 'deadline', 'class' => 'form-control', 'placeholder' => '截止日期')) }}
	</div>
	<div class="form-group my-importance">
		<span class="span importance">重要程度</span>
		{{ Form::select('importance', array('0' => '一般', '1' => '重要','2' => '很重要', '3' => '非常重要'), isset($topic)?$topic->importance:null, array('class' => 'form-control', 'placeholder' => '重要程度')) }}
	</div>
	<div class="form-group my-content" id="editor">
		<span class="span content">提议内容</span>
		<textarea v-model="input" name="body" class="form-control" rows="15" placeholder ="提议内容">{{{ isset($topic)?$topic->body:null }}}</textarea>
		<div v-html="input | marked"></div>
	</div>
	<div class="form-group">
		{{ Form::submit('提交', array('class' => 'btn btn-primary post-btn', 'id' => 'article-create')) }}
	</div>
	{{ Form::close() }}

@stop

@section('scripts')
<script src="{{ asset('js/span.js') }}"></script>
@stop
