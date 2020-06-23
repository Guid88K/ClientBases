@extends('layouts.app')

@section('content')
    @if( (Auth::check()))
        <div class="row justify-content-center">
            <div class="col-9 mb-2">
                <form class="form-inline  my-2 my-lg-0 justify-content-start" action="{{url('/sort')}}" method="get">
                    <div class="col-2">
                        <input class="form-control w-75" name="name" placeholder="Ім'я" >
                    </div>
                    <div class="col-2">
                        <input class="form-control w-75" name="surname" placeholder="Прізвище">
                    </div>
                    <div class="col-3">
                        <input class="form-control w-75" name="address" placeholder="Адреса">
                    </div>
                    <div class="col-3">
                        <input class="form-control w-75" name="telephone" placeholder="Телефон">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-dark mx-2  ">Пошук</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-1">

            </div>

            <div class="col-9">
                <div class="row  mb-1">

                </div>


                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ім'я</th>
                        <th scope="col">Фамілія</th>
                        <th scope="col">Адрес</th>
                        <th scope="col">Телефон</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <th scope="row">{{$client->id}}</th>
                            <td>{{$client->name}}</td>
                            <td>{{$client->surname}}</td>
                            <td>{{$client->address}}</td>
                            <td>{{$client->telephone}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-2">
                    <a href="{{url('/client/create')}}">
                    <button type="button" class="btn btn-dark ">Додати клієнта</button>
                </a>

            </div>

        </div>
    @endif

@endsection
