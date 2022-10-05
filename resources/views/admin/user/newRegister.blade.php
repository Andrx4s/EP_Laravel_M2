@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col10">
                <h1>Регистрация нового пользователя</h1>
                    <form method="POST" action="{{route('register')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="inputFullname" class="form-label">ФИО нового пользователя:</label>
                            <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror " id="inputFullname" aria-describedby="invalidFullnameFeedback" value="{{ old('fullname')}}">
                            @error('fullname') <div id="invalidFullnameFeedback" class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Электронная почта:</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror " id="inputEmail" aria-describedby="invalidEmailFeedback" value="{{old('email')}}">
                            @error('email') <div id="invalidEmailFeedback" class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputBirthday" class="form-label">Дата рождения:</label>
                            <input type="date" name="birthday" class="form-control @error('birthday') is-invalid @enderror " id="inputBirthday" aria-describedby="invalidBirthdayFeedback" value="{{old('birthday')}}">
                            @error('birthday') <div id="invaliBirthdaylFeedback" class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputFile" class="form-label">Выберите изображение для пользователя:</label>
                            <input name="photo_file" class="form-control @error('photo_file') is-invalid @enderror" type="file" id="inputFile" aria-describedby="invalidInputFile">
                            @error('photo_file') <div id="invalidInputFile" class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Пароль:</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror " id="inputPassword" aria-describedby="invalidPasswordFeedback">
                            @error('password') <div id="invalidPasswordFeedback" class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPasswordConfirmation" class="form-label">Повторите пароль:</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror " id="inputPasswordConfirmation" aria-describedby="invalidPasswordConfirmationFeedback">
                            @error('password') <div id="invalidPasswordConfirmationFeedback" class="invalid-feedback">{{$message}}</div> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Регистрация</button>
                    </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
