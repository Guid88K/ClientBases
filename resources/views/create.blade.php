@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-3">

        </div>
        <div class="col-6">
            <form method="post" action="{{ route('client.store') }}">

                @csrf
                <div class="form-group">

                    <label for="exampleInputEmail1">Ім'я</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Прізвище</label>
                    <input type="text" class="form-control" name="surname">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Адрес</label>
                    <input type="text" class="form-control" name="address">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Телефон</label>
                    <input type="text" class="form-control" name="telephone">
                </div>

                <button type="submit" class="btn btn-dark">Прийняти</button>
            </form>
        </div>
        <div class="col-3">

        </div>
    </div>

@endsection
