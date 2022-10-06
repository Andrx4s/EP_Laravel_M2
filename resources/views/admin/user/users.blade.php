@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                @if(session()->has('success'))
                    @if(session()->get('success'))
                        <div class="alert alert-success">Аккаунт успешно удален!</div>
                    @else
                        <div class="alert alert-danger">Вы не имеете доступа к данному заказу!</div>
                    @endif
                @endif
                @if(Auth::user()->role_id == 3)
                    <h2>Список пользователей</h2>
                @endif
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    @forelse($users as $key => $item)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#order_{{ $key }}" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    <div class="p-1">{{$item->role->name}}: {{$item->fullname}}</div>
                                </button>
                            </h2>
                            <div id="order_{{ $key }}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <li class="list-group-item"><img src="/public/storage/{{$item->avatar}}" class="card-img-top w-25 h-25" alt="{{$item->name}}"></li>
                                        <li class="list-group-item">ФИО: {{$item->fullname}}</li>
                                        <li class="list-group-item">Почта: {{$item->email}}</li>
                                        <li class="list-group-item">Дата рождения: {{$item->updated_at}}</li>
                                        <li class="list-group-item">Роль: {{ $item->role->name }}</li>
                                    </ul>
                                        <a href="{{route('admin.user.edit', ['user' => $item->id])}}" class="btn btn-primary mt-2">Редактировать</a>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" href="{{route('admin.user.destroy', ['user' => $item->id])}}" class="btn btn-danger mt-2">Удалить</button>
                                        <a href="{{route('admin.user.show', ['user' => $item->id])}}" class="btn btn-info text-white mt-2">Посмотреть</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger">Нет пользователей!</div>
                    @endforelse
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Удалить аккаунт {{$item->fullname}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Вы точно хотите удалить товар?<br>
                    {{$item->fullname}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <form action="{{route('admin.user.destroy', ['user' => $item->id])}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        @csrf
                        <button type="submit" class="btn btn-danger">Да я точно хочу удалить данный товар!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
