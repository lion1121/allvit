<template>
    <form action="" class="form-row">
        <div class="form-group">
            <label for="promoName"></label>
            <input type="text" name="promoName" id="promoName" class="form-control"
                   placeholder="Введите название промокода" required>
        </div>
        <div class="form-group">
            <label for="">Колличество</label>
            <input type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"
                       v-model="promoRadioPersent" @click="radioPersentActive"
                       checked>
                <label class="form-check-label" for="exampleRadios1">
                    % от суммы
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" v-model="promoRadioSum" @click="radioSumActive">
                <label class="form-check-label" for="exampleRadios2">
                    Сумма в гривне
                </label>
            </div>
            <div class="col-xs-8">
                <input type="text" class="form-control" v-if="promoRadioSum" placeholder="Введите скидку в гривне" required>
                <input type="text" class="form-control" v-if="promoRadioPersent" placeholder="Введите скидку в %" required>
            </div>
        </div>

        <div class="form-group col-xs-12">
            <label for="started">Действует с: <input id="started" type="date" class="form-control"></label>
            <label for="finished">по:<input id="finished" type="date" class="form-control"></label>
        </div>
        <div class="form-group">
            <div class="promo_categories_wrapper d-inline-block">

            </div>
            <div class="promo_products_wrapper d-inline-block">

            </div>
            Для товаров
            <div class="col-xs-12">
                <lablel>Добавить категорию <input class="form-control" type="text" name="" id=""></lablel>
                <lablel>Добавить товар <input class="form-control" type="text" name="" id=""></lablel>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-default">Добавить</button>
        </div>
    </form>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                promoRadioPersent: false,
                promoRadioSum: false,
                form: {}
            }
        },
        methods: {
            radioPersentActive() {
                this.promoRadioPersent = true;
                this.promoRadioSum = false;
            },
            radioSumActive() {
                this.promoRadioSum = true;
                this.promoRadioPersent = false;
            }
        }
    }
</script>
