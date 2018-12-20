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
            <table class="table table-bordered table-danger">
                <thead>
                <th>Имя</th>
                <th>С</th>
                <th>По</th>
                <th>Статус</th>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
