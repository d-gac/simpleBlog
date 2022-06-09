@extends('AdminPanel.admin-main')

@section('title')
    Wpisy
@endsection

@section('subtitle')
    Wpisy / Edycja / {{$post->title}}
@endsection

@section('dashboard')
    <form action="{{route('post.update', $post->id)}}" method="POST">
        @csrf
        @method('PUT')
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert-danger">{{$error}}</div>
            @endforeach
        @endif
        <div class="form-floating mb-3">
            <input required name="title" type="text" class="form-control" id="title" value="{{ $post->title }}" placeholder="Tytuł wpisu...">
            <label for="title">Tytuł</label>
        </div>
        <div class="form-floating mb-3">
            <input required name="preview_content" type="text" class="form-control" id="preview_content" value="{{ $post->preview_content }}" placeholder="Treść poglądowa...">
            <label for="preview_content">Podgląd treści</label>
        </div>
        <div class="form-floating mb-3">
            <input required name="content" type="text" class="form-control" id="content" value="{{ $post->content }}" placeholder="Treść poglądowa...">
            <label for="content">Treść</label>
        </div>
        <div class="form-floating mb-3">
            <input required name="active" type="text" class="form-control" id="active" value="{{ $post->active }}" placeholder="Treść poglądowa...">
            <label for="active">Aktywny</label>
        </div>
        <div class="form-floating mb-3">
            <input required name="publication_date" type="datetime-local" class="form-control" id="publication_date" value="{{ $post->publication_date }}" placeholder="Data publikacji...">
            <label for="publication_date">Data publikacji</label>
        </div>
        <div class="mb-3">
            <label>Kategorie :</label><br/>
            <select required class="form-control" name="categories[]" multiple>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" @if(in_array($category->id, $actualCategories)) selected="selected" @endif>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary" href="{{route('post.index')}}"><i class='fa-solid fa-angles-left'></i> Powrót</a>
            <button class="btn btn-primary" type="submit">Zapisz <i class='fa-solid fa-angles-right'></i></button>
        </div>
    </form>
@endsection
