@extends('layouts.default')

@section('title')
Yours @parent
@stop

@section('styles')
<!-- <link rel="stylesheet" href="{{ asset('css/input.css')}}"> -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" media="screen">
<link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" media="screen">
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@stop

@section('body')

@if(!isset($topic)){{ Form::open(array('route' =>'topic.store', 'role' => 'form', 'class' => 'form-horizontal')) }}
@else {{ Form::open(array('route'=>['topic.update', $topic->id],'method' => 'patch', 'role' => 'form', 'class' => 'from-horizontal')) }}
@endif

	{{ Form::hidden('user_id',Auth::id()) }}
	<div class="form-group my-title">
		{{ Form::text('title', isset($topic)?$topic->title:null, array('class' => 'form-control', 'placeholder' => '提议标题')) }}
	</div>
	<div class="form-group">
              <!--   <label for="dtp_input1" class="col-md-2 control-label">截止日期</label> -->
                <div class="input-group date form_datetime col-md-5"  data-date-format="yyyy-MM-dd HH:ii:ss" data-link-field="dtp_input1">
                    <!-- <input class="form-control" size="16" type="text" value="" readonly> -->
                    {{ Form::text('deadline', isset($topic)?$topic->deadline:null, array('id' => 'deadline', 'class' => 'form-control', 'placeholder' => '截止日期')) }}
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
	       <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
		<input type="hidden" id="dtp_input1" value="" /><br/>
            </div>
	<div class="form-group my-importance">
		{{ Form::select('importance', array('0' => '一般', '1' => '重要','2' => '很重要', '3' => '非常重要'), isset($topic)?$topic->importance:null, array('class' => 'form-control', 'placeholder' => '重要程度')) }}
	</div>
	<div class="form-group my-content" id="editor">
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
<script src="{{ asset('js/datatimepicker.js') }}"></script>
<script charset="UTF-8" src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>
<script charset="UTF-8" src="{{ asset('js/bootstrap-datetimepicker.zh-CN.js') }}"></script>
@stop
