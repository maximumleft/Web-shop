@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать категорию</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="col-12">
                <form action="{{route('product.update',$product)}}" method="POST" class="w-25"
                      enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <input type="text" value="{{$product->title}}" class="form-control" name="title"
                               placeholder="Название">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{$product->description}}" class="form-control" name="description"
                               placeholder="Описание">
                    </div>
                    <div class="form-group">
                        <textarea name="content" class="form-control" cols="30" rows="10"
                                  placeholder="Контент">{{$product->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{$product->price}}" class="form-control" name="price"
                               placeholder="Цена">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{$product->count}}" class="form-control" name="count"
                               placeholder="Кол-во">
                    </div>
                    <div class="form-group">
                        <select name="is_published" class="form-control select2" data-placeholder="Публикация"
                                style="width: 100%;">
                            <option value="1">Опубликован</option>
                            <option value="0">Не опубликован</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="category_id" class="form-control select2" data-placeholder="Выберите категорию"
                                style="width: 100%;">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="select2-purple">
                            <select name="colors[]" class="select2" multiple="multiple" data-placeholder="Выберите цвет"
                                    data-dropdown-css-class="select2-purple" style="width: 100%;">
                                @foreach($colors as $color)
                                    <option value="{{$color->id}}">{{$color->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group" data-select2-id="42">
                        <div class="select2-purple" data-select2-id="41">
                            <select name="tags[]" class="select2 select2-hidden-accessible" multiple=""
                                    data-placeholder="Выберите тег"
                                    data-dropdown-css-class="select2-purple" style="width: 100%;" data-select2-id="15"
                                    tabindex="-1" aria-hidden="true">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->title}}</option>
                                @endforeach
                            </select><span class="dropdown-wrapper" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>

                    <a href="{{route('product.index')}}" class="btn btn-secondary">Назад</a>
                    <input type="submit" class="btn btn-primary" value="Добавить">
                </form>
            </div>
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
