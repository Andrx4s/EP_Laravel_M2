@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8">
                <h2 class="mt-3">Все роли</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Наименование</th>
                        <th scope="col">Наименование на английском</th>
                        <th scope="col">Изменить</th>
                        <th scope="col">Удалить</th>
                    </tr>
                    </thead>
                    <tbody>
                        <form method="POST">
                            @csrf
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->en_name}}</td>
                                    <td><button class="btn btn-success" id="roleEdit_{{$role->id}}" type="submit">Редактирование</button></td>
                                    <td><button class="btn btn-danger" id="roleDelete_{{$role->id}}" type="submit">Удаление</button></td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection


