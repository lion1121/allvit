@extends('voyager::master')
@section('content')
    <div class="container">
        <h2>Добавить промокод</h2>
        <div class="row">
            <div class="col-xs-6">
                <form action="" class="form-row">
                    <div class="form-group">
                        <label for="promoName"></label>
                        <input type="text" name="promoName" id="promoName" class="form-control"
                               placeholder="Введите название промокода">
                    </div>
                    <div class="form-group">
                        <label for="">Колличество</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Действует с: <input type="date" class="form-control"></label>

                        <label for="">по:<input type="date" class="form-control"></label>

                    </div>
                    <div class="form-group">
                        <button class="btn btn-default">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@stop