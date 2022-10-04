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
                @if(Auth::user()->role_id == 3)
                    <h2>Мои заказы</h2>
                @endif
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    @forelse($users as $subkey => $item)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#order_{{ $subkey }}" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    <div class="p-1">Пользователь: {{$item->id}}</div>
                                </button>
                            </h2>
                            <div id="order_{{ $subkey }}" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">ФИО</th>
                                            <th scope="col">Почта</th>
                                            <th scope="col">Аватар</th>
                                            <th scope="col">Дата рождения</th>
                                            <th scope="col">Роль</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($item->items as $key => $role)
                                            <tr>
                                                <th scope="row">{{$key}}</th>
                                                <td>{{$items->fullname}}</td>
                                                <td>{{$items->email}}</td>
                                                <td><img src="/public/storage/{{$items->photo}}" class="card-img-top w-550 h-550" alt="{{$items->name}}"></td>
                                                <td>{{$items->name}}</td>
                                                <td>{{$items->name}}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <ul class="list-group">
                                        <li class="list-group-item">Номер заказа: {{$item->id}}</li>
                                        <li class="list-group-item">Статус заказа: {{$item->status}}</li>
                                        <li class="list-group-item">Дата заказа: {{$item->created_at}}</li>
                                        <li class="list-group-item">Дата изменения: {{$item->updated_at}}</li>
                                        <li class="list-group-item">Адрес доставки: {{$item->address}}</li>
                                    </ul>
                                    @if($item->status == 'Новый')
                                        <p class="small">Вы можете отменить заказ, если данный заказ является новым!</p>
                                        <a href="{{route('order.cancel', ['order' => $item->id])}}" class="btn btn-danger mb-1">Отменить заказ</a>
                                        @if(Auth::user()->role == 'admin')
                                            <a href="{{route('completed', ['order' => $item->id])}}" class="btn btn-success mb-1">Заказ завершен</a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger">Вы не сделали не одного заказа!</div>
                    @endforelse
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
