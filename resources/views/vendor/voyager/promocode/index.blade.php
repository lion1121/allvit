@extends('vendor.voyager.custom_voyager')

@section('content')
    <div class="container" id="admin_app">
        <h2>Добавить промокод</h2>
        <div class="row">
            <div class="col-xs-6">
                <add-promocode-component></add-promocode-component>
            </div>
        </div>
        <div class="row">
            <h2>Все промокоды:</h2>
            <form action="" class="form-inline">
                <div class="form-group">
                    <label for="">Найти промокод </label><input type="text" class="form-control">
                    <button class="btn btn-default">Найти:</button>
                </div>
            </form>
            <table class="table table-bordered table-hover table-danger">
                <thead>
                <th>Имя</th>
                <th>Кол-во</th>
                <th>Статус</th>
                <th>С</th>
                <th>По</th>
                <th>Операция</th>
                </thead>
                <tbody>
                @foreach($promocodes as $promocode)

                <tr>
                    <td>{{$promocode->name}}</td>
                    <td>{{$promocode->quantity}}</td>
                    @if($promocode->status === 0)
                    <td>Неактивен</td>
                        @else
                        <td>Активен</td>
                    @endif
                    <td>{{$promocode->started_at}}</td>
                    <td>{{$promocode->finished_at}}</td>
                    <td><button class="btn btn-danger">Удалить</button>
                        <a class="btn btn-info" style="margin-left: 20px" href="{{route('promocode.edit',['id'=>$promocode->id])}}">Редактировать</a>
                    </td>
                </tr>
                 @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
