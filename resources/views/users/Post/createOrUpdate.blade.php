@extends('welcome')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                @if(isset($post))
                    <h1>Редактирование {{$post->name}}</h1>
                    @if(session()->has('success'))
                        <div class="alert alert-success">Пост успешно отредактирован!</div>
                    @endif
                @else
                    <h1>Создание нового поста</h1>
                    @if(session()->has('success'))
                        <div class="alert alert-success">Пост успешно создан!</div>
                    @endif
                @endif
                <form method="post" action="{{(isset($post) ? route('posts.update', ['post' => $post->id]) : route('posts.store'))}}" enctype="multipart/form-data">
                    @csrf
                    @isset($post)
                        <input type="hidden" name="_method" value="PUT">
                    @endisset
                    <div class="mb-3">
                        <label for="inputName" class="form-label">Наименование:</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Наименование роли: Пользователь" aria-describedby="invalidInputName" value="{{ old('name') }}">
                        @error('name') <div id="invalidInputName" class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputFull_description" class="form-label">Описание:</label>
                        <textarea maxlength="255" type="text" name="full_description" class="form-control @error('full_description') is-invalid @enderror" id="inputFull_description" placeholder="Описание:" aria-describedby="invalidInputFull_description">{{ old('full_description') }}</textarea>
                        @error('full_description') <div id="invalidInputFull_description" class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputShort_description" class="form-label">Краткое описание:</label>
                        <textarea maxlength="50" type="text" name="short_description" class="form-control @error('short_description') is-invalid @enderror" id="inputShort_description" placeholder="Краткое описание:" aria-describedby="invalidInputShort_description">{{ old('short_description') }}</textarea>
                        @error('short_description') <div id="invalidInputShort_description" class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputTag" class="form-label">Теги:</label>
                        <textarea type="text" name="tag" class="form-control @error('tag') is-invalid @enderror" id="inputTag" placeholder="#тег, #тег" aria-describedby="invalidInputTag">{{ old('tag') }}</textarea>
                        @error('tag') <div id="invalidInputTag" class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputFile" class="form-label">Выберите изображение:</label>
                        <input name="photo_file" class="form-control @error('photo_file') is-invalid @enderror" type="file" id="inputFile" aria-describedby="invalidInputFile">
                        @error('photo_file') <div id="invalidInputFile" class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        @if(isset($post))
                            Отредактировать пост
                        @else
                            Создать новый пост
                        @endif
                    </button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
