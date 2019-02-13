<template>
    <div class="sidebar nobottommargin w-100">
        <div class="widget clearfix" v-for="(filter, elem) in filters" v-if="Object.keys(filter).length > 0">
            {{filter.length}}
            <h4 v-if="elem === 'vendors'">Производитель</h4>
            <h4 v-if="elem === 'tastes'">Вкус</h4>
            <h4 v-if="elem === 'colors'">Цвет</h4>
            <h4 v-if="elem === 'allGoals'">Цель</h4>
            <h4 v-if="elem === 'allIngredients'">Ингридиенты</h4>
            <!--<h4 >{{elem}}</h4>-->
            <div v-for="(item, index) in filter">
                <input v-bind:id="'vendor-' + index" class="checkbox-style" data-vendor="" v-bind:name="'vendor-' + index"
                       type="checkbox">
                <label v-bind:for="'vendor-' + index" class="checkbox-style-3-label">{{index}} ({{item}})</label>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "sidebar",
        mounted() {
        },
        data(){
          return {
              filterName:'',
          }
        },
        props: ['filters'],
        methods: {
            checkName(elem) {

            }
        }
    }
</script>

<style scoped>

</style>