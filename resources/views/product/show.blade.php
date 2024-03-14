@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Продукт</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap w-25">
                        <tr>
                            <td>ID</td>
                            <td>{{$product->id}}</td>
                        </tr>
                        <tr>
                            <td>Название</td>
                            <td>{{$product->title}}</td>
                        </tr>
                        <tr>
                            <td>Описание</td>
                            <td>{{$product->description}}</td>
                        </tr>
                        <tr>
                            <td>Контент</td>
                            <td>{{$product->content}}</td>
                        </tr>
                        <tr>
                            <td>Изображение</td>
                            <td><img src="{{url("storage/" . $product->preview_image)}}" width="100" height="100" alt="preview_image"></td>
                        </tr>
                        <tr>
                            <td>Цена</td>
                            <td>{{$product->price}}</td>
                        </tr>
                        <tr>
                            <td>Кол-во</td>
                            <td>{{$product->count}}</td>
                        </tr>
                        <tr>
                            <td>Публикация</td>
                            <td>{{$product->publishedTitle}}</td>
                        </tr>
                        <tr>
                            <td>Теги</td>
                            @foreach($tags as $tag)
                                <td>{{$tag->title}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Цвета</td>
                            @foreach($colors as $color)
                                <td>{{$color->title}}</td>
                            @endforeach
                        </tr>
                    </table>
                    <div class="d-flex p-3">
                        <div class="mr-3">
                            <a href="{{route('product.index')}}" class="btn btn-secondary">Назад</a>
                        </div>
                        <div class="mr-3">
                            <a href="{{route('product.edit',$product)}}"
                               class="btn btn-outline-primary">Редактировать</a>
                        </div>

                        <form action="{{route('product.destroy',$product)}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-outline-danger" value="Удалить">
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
