<template>
    <form action="" class="form-row"  @submit.prevent="submit">
        <div v-if="errors"  class="bg-warning">
           <ul v-for="errorsMessage in errorsMessages">
               <li>{{errorsMessage}}</li>
           </ul>
        </div>
        <div v-if="success"  class="bg-success">
            <p>Промокод успешно добавлен!</p>
        </div>
        <div class="form-group">
            <label for="promoName"></label>
            <input type="text" name="promoName" id="promoName" class="form-control"
                   placeholder="Введите название промокода" required v-model="form.name">
        </div>
        <div class="form-group">
            <label for="">Колличество</label>
            <input type="text" class="form-control" required v-model="form.quantity">
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
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2" v-model="promoRadioSum" @click="radioSumActive" :checked="promoRadioSum">
                <label class="form-check-label" for="exampleRadios2">
                    Сумма в гривне
                </label>
            </div>
            <div class="col-xs-8">
                <input type="text" class="form-control" v-if="promoRadioSum" placeholder="Введите скидку в гривне" required v-model="form.sumValue">
                <input type="text" class="form-control" v-if="promoRadioPersent" placeholder="Введите скидку в %" required v-model="form.persentValue">
            </div>
        </div>

        <div class="form-group col-xs-12">
            <label for="started">Действует с: <input id="started" type="date" class="form-control" v-model="form.started"></label>
            <label for="finished">по:<input id="finished" type="date" class="form-control" v-model="form.finished"></label>
        </div>
        <div class="form-group col-xs-12">
            <label for="status">Активировать промокод <input type="checkbox" id="status" v-model="form.status"></label>
        </div>
        <div class="form-group">
            <div class="promo_categories_wrapper d-inline-block">
                Применить промокод к категориям
                <div class="col-xs-12">
                    <promo-category></promo-category>
                </div>
            </div>
            <div class="promo_products_wrapper d-inline-block">
                Применить промокод к товарам
                <div class="col-xs-12">
                    <promo-product></promo-product>
                </div>
            </div>

        </div>
        <div class="form-group">
            <button class="btn btn-default">Добавить</button>
        </div>
    </form>
</template>

<script>
    import axios from 'axios';

    import promoCategoty from './promoCategory';
    import promoProduct from './promoProduct';

    export default {
        mounted() {
            //get ajax request. If url has id - return promocode
            let url = window.location.href;
            if(url.includes('admin/promocodes/edit')){
                let urlArray = url.split('/');
                this.promoId = urlArray[urlArray.length - 1];
            }

            if(this.promoId !== null){
                axios.post('/ajax/getCategories', {id: this.promoId}).then(response => {
                    this.form.name = response.data.name;
                    this.form.quantity = response.data.quantity;
                    this.form.started = response.data.started_at.split(' ')[0];
                    this.form.finished = response.data.finished_at.split(' ')[0];
                    this.form.status = response.data.status;
                    if(response.data.summ !== ''){
                        this.promoRadioSum = true;
                        this.promoRadioPercent = true;
                        this.form.sumValue = response.data.summ
                    } else {
                        this.promoRadioPersent = true;
                    }
                    console.log(response.data);
                }).catch(() => console.warn('Something went wrong. Categories not loaded'));
            }

        },
        data() {
            return {
                promoRadioPersent: true,
                promoRadioSum: false,
                errors:false,
                success:false,
                errorsMessages:[],
                promoId:null,
                form: {
                    name:'',
                    quantity:0,
                    persentValue:null,
                    sumValue:null,
                    started:'',
                    finished:'',
                    categories:{},
                    products:{},
                    status:false,
                }
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
            },
            submit(){
                axios.post('/ajax/addPromocode', this.form)
                    .then(res => {
                        if (res.data.errors){
                            this.errors = true;
                            this.errorsMessages = res.data.errors
                        } else {
                            this.success = true
                        }
                        console.log(res.data)
                    })
                    .catch(() => console.warn('Oh. Something went wrong. Promocode doesn\'t created'));
            }
        },
        created() {
            this.$root.$on('addCategory', (categories) => {
                this.form.categories = categories;
                // console.log(this.form.categories);
            });
            this.$root.$on('addProduct', (products) => {
                this.form.products = products;
                // console.log(this.form.products);
            })
        },
        components:{
            'promo-category': promoCategoty,
            'promo-product' : promoProduct
        }
    }
</script>
