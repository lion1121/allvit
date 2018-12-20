@extends('voyager::master')
@section('content')
    <div class="container">
        <h2>Добавить промокод</h2>
        <div class="row">
            <div class="col-xs-6">
                <form action="" class="form-row">
                    @csrf
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
                        <label for="prodCategoriesList">Действует с:
                            <select class="form-control" name="prodCategoriesList" id="prodCategoriesList">
                                <option value="">Категории товара</option>
                            </select>
                        </label>
                        <label for="productslist">Действует с:
                            <select class="form-control" name="productslist" id="productslist">
                                <option value="">Товары</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default">Добавить</button>
                    </div>
                </form>
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
@stop