@extends('welcome')

@section('content')
    <dic class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                <div class="card mt-2">
                    <div class="card-header">
                        {{$post->name}}
                    </div>
                    <div class="card-body text-center">
                        <img src="{{'/public/storage/' . $post->photo}}" class="card-img-top w-50" alt="{{$post->name}}">
                        <p class="card-text">Описание: {{$post->full_description}}</p>
                        <p class="card-text">Автор: {{$post->user->fullName}}</p>
                        <p class="card-text">Дата создания: {{$post->created_at}}</p>
                        <p class="card-text">Дата редактирования: {{$post->updated_at}}</p>
                        <p class="card-text">Теги: {{$post->tag}}</p>
                        @if($post->user_id == Auth::user()->id)
                            <a href="{{route('posts.edit', ['post' => $post->id])}}" class="btn btn-primary">Редактировать</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Удалить
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </dic>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Удалить товар {{$post->name}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Вы точно хотите удалить товар
                    {{$post->name}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <form action="{{route('posts.destroy', ['post' => $post->id])}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" class="btn btn-danger">Да, я точно хочу удалить данный пост</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
