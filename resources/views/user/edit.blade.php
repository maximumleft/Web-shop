@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать пользователя</h1>
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
            <div class="row">
                <form action="{{route('user.update',$user)}}" method="POST" class="w-25">
                    @csrf
                    @method('patch')
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" value="{{$user->name}}" class="form-control" name="name" placeholder="Имя">
                        </div>
                        <div class="form-group">
                            <label>Surname</label>
                            <input type="text" value="{{$user->surname}}" class="form-control" name="surname" placeholder="Фамилия">
                        </div>
                        <div class="form-group">
                            <label>Patronymic</label>
                            <input type="text" value="{{$user->patronymic}}" class="form-control" name="patronymic" placeholder="Отчество">
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input type="text" value="{{$user->age}}" class="form-control" name="age" placeholder="Возраст">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" value="{{$user->address}}" class="form-control" name="address" placeholder="Адрес">
                        </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="custom-select form-control-border" name="gender" id="example">
                            <option {{$user->gender == 1 || old('gender') == 1 ? ' selected': ''}} value="1">Мужской</option>
                            <option {{$user->gender == 2 || old('gender') == 2 ? ' selected': ''}} value="2">Женский</option>
                        </select>
                    </div>
                        <a href="{{route('user.index')}}" class="btn btn-secondary">Назад</a>
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </form>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
