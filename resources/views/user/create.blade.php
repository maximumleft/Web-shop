@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить пользователя</h1>
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
                <form action="{{route('user.store')}}" method="POST" class="w-25">
                    @csrf
                    <div class="form-group">
                        <input type="text" value="{{old('name')}}" class="form-control" name="name" placeholder="Имя">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{old('surname')}}" class="form-control" name="surname" placeholder="Фамилия">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{old('patronymic')}}" class="form-control" name="patronymic" placeholder="Отчество">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{old('age')}}" class="form-control" name="age" placeholder="Возраст">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{old('email')}}" class="form-control" name="email" placeholder="Почта">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{old('address')}}" class="form-control" name="address" placeholder="Адрес">
                    </div>
                    <div class="form-group">
                        <select class="custom-select form-control-border" name="gender">
                            <option {{old('gender') == 1 ? ' selected': ''}} value="1">Мужской</option>
                            <option {{old('gender') == 2 ? ' selected': ''}} value="2">Женский</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Пароль">
                    </div>
                    <div class="form-group">
                        <label>Confirm password</label>
                        <input type="text" class="form-control" name="password_confirmation" placeholder="Пароль">
                    </div>
                    <a href="{{route('user.index')}}" class="btn btn-secondary">Назад</a>
                    <input type="submit" class="btn btn-primary" value="Добавить">
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
