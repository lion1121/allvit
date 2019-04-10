<template>
    <form id="customerFrom" @submit="checkForm">
        <div>
            <ul v-if="form.errors.length">
                <li v-for="error in form.errors">{{error}}</li>
            </ul>
        </div>
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Имя</label>
            <div class="col-sm-10">
                <input v-model="form.name" type="text" class="form-control" id="inputName" placeholder="Имя">
            </div>

        </div>
        <div class="form-group row">
            <label for="inputSurname" class="col-sm-2 col-form-label">Фамилия</label>
            <div class="col-sm-10">
                <input v-model="form.surname" type="text" class="form-control" id="inputSurname" placeholder="Фамилия">
            </div>
            <p v-if="form.errors.hasOwnProperty('surname')"><b>{{form.errors.surname}}</b></p>
        </div>
        <div class="form-group row">
            <label for="inputPhone" class="col-sm-2 col-form-label">Телефон</label>
            <div class="col-sm-10">
                <input v-model="form.phone" type="text" class="form-control" id="inputPhone" placeholder="Телефон"
                       required>
            </div>
            <p v-if="form.errors.hasOwnProperty('phone')"><b>{{form.errors.phone}}</b></p>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <input v-model="form.email" type="email" class="form-control" id="inputEmail" placeholder="E-mail">
            </div>
            <p ><b>{{form.errors.email}}</b></p>
        </div>
        <div class="form-group">
            <label for="inputExtra">Дополнительно</label>
            <textarea v-model="form.extra" class="form-control" id="inputExtra" rows="3"></textarea>
        </div>


        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" >Продолжить
                </button>
            </div>
        </div>
    </form>

</template>

<script>
    export default {
        name: "cart-customer-form",
        data() {
            return {
                form: {
                    name: null,
                    surname: null,
                    phone: null,
                    email: null,
                    extra: null,
                    errors: []
                }
            }
        },
        methods: {
            checkForm(e) {
                if (this.form.name && this.form.surname && this.form.phone && this.form.email) {
                    this.$emit('formValidated');
                }
                this.form.errors = [];
                if(!this.form.name) this.form.errors.push('Введите Ваше имя');
                if(!this.form.surname) this.form.errors.push('Введите Вашу фамилию');
                if(!this.form.phone) this.form.errors.push('Введите Ваш телефон');
                if(!this.form.email) this.form.errors.push('Введите Ваш email');
                e.preventDefault();
            }
        },
        computed:{
             form: function () {
                if (this.form.errors.length > 0){
                    this.$emit('formNonFiled')
                }
            }
        }

    }
</script>

<style scoped>

</style>