@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                @if(session()->has('success'))
                    @if(session()->get('success'))
                        <div class="alert alert-success">Ваш заказ успешно отменен!</div>
                    @else
                        <div class="alert alert-danger">Вы не имеете доступа к данному заказу!</div>
                    @endif
                @endif
                    <div class="card mt-2">
                        <div class="card-header">
                            {{ $user->role->name }}: {{$user->fullname}}
                        </div>
                        <div class="card-body text-center">
                            <img src="/public/storage/{{$user->avatar}}" class="card-img-top w-25 h-25" alt="{{$user->name}}">
                            <p class="card-text">ФИО: {{$user->fullname}}</p>
                            <p class="card-text">Почта: {{$user->email}}</p>
                            <p class="card-text">Дата рождения: {{$user->updated_at}}</p>
                            <p class="card-text">Роль: {{ $user->role->name }}</p>
                            <a href="{{route('admin.user.edit', ['user' => $user->id])}}" class="btn btn-primary">Редактировать</a>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" href="{{route('admin.user.destroy', ['user' => $user->id])}}" class="btn btn-danger mt-2">Удалить</button>
                        </div>
                    </div>
                </div>
            <div class="col"></div>
            </div>
        </div>
    </div>
</div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Удалить аккаунт {{$user->fullname}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Вы точно хотите удалить товар?<br>
                    {{$user->fullname}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <form action="{{route('admin.user.destroy', ['user' => $user->id])}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" class="btn btn-danger">Да я точно хочу удалить данный товар!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
