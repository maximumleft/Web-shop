@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить продукт</h1>
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
                <form action="{{route('product.store')}}" method="POST" class="w-25">
                    @csrf
                    <div class="form-group">
                        <input type="text" value="{{old('title')}}" class="form-control" name="title" placeholder="Название">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{old('description')}}" class="form-control" name="description" placeholder="Описание">
                    </div>
                    <div class="form-group">
                        <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Контент"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{old('price')}}" class="form-control" name="price" placeholder="Цена">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{old('count')}}" class="form-control" name="count" placeholder="Кол-во">
                    </div>

                    <div class="form-group">
                        <label>Категории</label>
                        <select class="form-control select2" style="width: 100%;">
                            <option selected="selected">Alabama</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Цвета</label>
                        <div class="select2-purple">
                            <select class="select2" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                <option>Alabama</option>
                                <option>Alaska</option>
                                <option>California</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group" data-select2-id="42">
                        <label>Теги</label>
                        <div class="select2-purple" data-select2-id="41">
                            <select name="tag_ids[]" class="select2 select2-hidden-accessible" multiple="" data-placeholder="Выберите тег"
                                    data-dropdown-css-class="select2-purple" style="width: 100%;" data-select2-id="15"
                                    tabindex="-1" aria-hidden="true">
{{--                                @foreach($tags as $tag)--}}
                                    <option>aaa</option>
                                    <option>aaa</option>
{{--                                @endforeach--}}
                            </select><span class="dropdown-wrapper" aria-hidden="true"></span>
                        </div>
                    </div>

                    <a href="{{route('product.index')}}" class="btn btn-secondary">Назад</a>
                    <input type="submit" class="btn btn-primary" value="Добавить">
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
