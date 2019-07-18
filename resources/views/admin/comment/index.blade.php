@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Comment Management</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        {!! implode('<br>', $errors->all()) !!}
                    </div>
                    @endif

                    @foreach ($article->hasManyComments as $comment)
                    <hr>
                    <div class="comment">
                        <h4>{{ $comment->content }}</h4>
                        <div class="content">
                            <p>Nickname: {{ $comment->nickname }}</p>
                            <p>Email: {{ $comment->email }}</p>
                            <p>Website: {{ $comment->website }}</p>
                        </div>
                    </div>
                    <a href="{{ url('admin/articles/'.$article->id.'/comments/'.$comment->id.'/edit') }}" class="btn btn-success">编辑</a>
                    <form action="{{ url('admin/articles/'.$article->id.'/comments/'.$comment->id) }}" method="POST" style="display: inline;">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">删除</button>
                    </form>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection