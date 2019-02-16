<template>
    <div class="sidebar nobottommargin w-100">

        <div class="widget clearfix" v-for="(filter, elem) in filters" v-if="Object.keys(filter).length > 0">

            <template v-if="elem === 'vendors'">
                <h4>Производитель</h4>
                <div v-for="(item, index) in filter">
                    <input v-bind:id="'vendor-' + index" class="checkbox-style" data-vendor="" v-bind:name="'vendor-' + index"
                           type="checkbox">
                    <label v-bind:for="'vendor-' + index" class="checkbox-style-3-label">{{index}} ({{item}})</label>
                </div>
            </template>

            <template v-if="elem === 'tastes'">
                <h4>Вкус</h4>
                <div v-for="(item, index) in filter">
                    <input v-bind:id="'vendor-' + index" class="checkbox-style" data-vendor="" v-bind:name="'vendor-' + index"
                           type="checkbox">
                    <label v-bind:for="'vendor-' + index" class="checkbox-style-3-label">{{index}} ({{item}})</label>
                </div>
            </template>

            <template v-if="elem === 'colors'">
                <h4>Цвет</h4>
                <div v-for="(item, index) in filter">
                    <input v-bind:id="'vendor-' + index" class="checkbox-style" data-vendor="" v-bind:name="'vendor-' + index"
                           type="checkbox">
                    <label v-bind:for="'vendor-' + index" class="checkbox-style-3-label">{{index}} ({{item}})</label>
                </div>
            </template>

            <template v-if="elem === 'allGoals'">
                <h4>Цель</h4>
                <div v-for="(item, index) in filter">
                    <input v-bind:id="'vendor-' + index" class="checkbox-style" data-vendor="" v-bind:name="'vendor-' + index"
                           type="checkbox">
                    <label v-bind:for="'vendor-' + index" class="checkbox-style-3-label">{{index}} ({{item}})</label>
                </div>
            </template>

            <template v-if="elem === 'allIngredients'">
                <h4>Ингридиенты</h4>
                <div v-for="(item, index) in filter">
                    <input v-bind:id="'vendor-' + index" class="checkbox-style" data-vendor="" v-bind:name="'vendor-' + index"
                           type="checkbox">
                    <label v-bind:for="'vendor-' + index" class="checkbox-style-3-label">{{index}} ({{item}})</label>
                </div>
            </template>

            <template v-if="elem === 'price'">
                <h4>Цена</h4>
                {{filter}}
            </template>
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