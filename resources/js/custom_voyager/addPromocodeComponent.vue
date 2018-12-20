<template>
    <form action="" class="form-row" >
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
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label" for="exampleRadios1">
                    % от суммы
                </label>
                <input type="text" class="form-control">

            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                    Сумма в гривне
                </label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="">Действует с: <input type="date" class="form-control"></label>
            <label for="">по:<input type="date" class="form-control"></label>
        </div>
        <div class="form-group">
            Для товаров
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
        data(){
          return {
              form: {
                  test: ''
              }
          }
        }
    }
</script>
