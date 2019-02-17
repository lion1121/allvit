<template>
    <div class="sidebar nobottommargin w-100">
        <div class="widget clearfix" v-for="(filter, elem) in filters" v-if="Object.keys(filter).length > 0">

            <h4 v-if="elem === 'vendor'">Производитель</h4>
            <h4 v-if="elem === 'taste'">Вкус</h4>
            <h4 v-if="elem === 'color'">Цвет</h4>
            <h4 v-if="elem === 'allGoals'">Цель</h4>
            <h4 v-if="elem === 'allIngredients'">Ингридиенты</h4>
            <!--<h4 >{{elem}}</h4>-->
            <div v-for="(item, index) in filter">
                <input
                        v-bind:id="'vendor-' + index" class="checkbox-style" data-vendor=""
                        v-bind:name="'vendor-' + index"
                        type="checkbox"
                        @click="activateFilter(elem,index)"
                        :value="index"
                        v-model.string="clickedFilters[elem]">
                <label v-bind:for="'vendor-' + index" class="checkbox-style-3-label">{{index}} ({{item}})</label>
                <div>{{selectedFilter[elem]}} ---- {{index}}</div>
            </div>

            <!--<template v-if="elem === 'vendors'">-->
                <!--<h4>Производитель</h4>-->
                <!--<div v-for="(item, index) in filter">-->
                    <!--<input v-bind:id="'vendor-' + index" class="checkbox-style" data-vendor="" v-bind:name="'vendor-' + index"-->
                           <!--type="checkbox">-->
                    <!--<label v-bind:for="'vendor-' + index" class="checkbox-style-3-label">{{index}} ({{item}})</label>-->
                <!--</div>-->
            <!--</template>-->

            <!--<template v-if="elem === 'tastes'">-->
                <!--<h4>Вкус</h4>-->
                <!--<div v-for="(item, index) in filter">-->
                    <!--<input v-bind:id="'vendor-' + index" class="checkbox-style" data-vendor="" v-bind:name="'vendor-' + index"-->
                           <!--type="checkbox">-->
                    <!--<label v-bind:for="'vendor-' + index" class="checkbox-style-3-label">{{index}} ({{item}})</label>-->
                <!--</div>-->
            <!--</template>-->

            <!--<template v-if="elem === 'colors'">-->
                <!--<h4>Цвет</h4>-->
                <!--<div v-for="(item, index) in filter">-->
                    <!--<input v-bind:id="'vendor-' + index" class="checkbox-style" data-vendor="" v-bind:name="'vendor-' + index"-->
                           <!--type="checkbox">-->
                    <!--<label v-bind:for="'vendor-' + index" class="checkbox-style-3-label">{{index}} ({{item}})</label>-->
                <!--</div>-->
            <!--</template>-->

            <!--<template v-if="elem === 'allGoals'">-->
                <!--<h4>Цель</h4>-->
                <!--<div v-for="(item, index) in filter">-->
                    <!--<input v-bind:id="'vendor-' + index" class="checkbox-style" data-vendor="" v-bind:name="'vendor-' + index"-->
                           <!--type="checkbox">-->
                    <!--<label v-bind:for="'vendor-' + index" class="checkbox-style-3-label">{{index}} ({{item}})</label>-->
                <!--</div>-->
            <!--</template>-->

            <!--<template v-if="elem === 'allIngredients'">-->
                <!--<h4>Ингридиенты</h4>-->
                <!--<div v-for="(item, index) in filter">-->
                    <!--<input v-bind:id="'vendor-' + index" class="checkbox-style" data-vendor="" v-bind:name="'vendor-' + index"-->
                           <!--type="checkbox">-->
                    <!--<label v-bind:for="'vendor-' + index" class="checkbox-style-3-label">{{index}} ({{item}})</label>-->
                <!--</div>-->
            <!--</template>-->

            <!--<template v-if="elem === 'price'">-->
                <!--<h4>Цена</h4>-->
                <!--{{filter}}-->
            <!--</template>-->
        </div>
    </div>
</template>

<script>
    export default {
        name: "sidebar",
        mounted() {
            console.log(this.selectedFilter);
        },
        data(){
          return {
              clickedFilters:{},
              selectedFilter: _.omit(this.$route.query, ['page']),
          }
        },
        props: ['filters'],
        methods: {
            activateFilter(key, value){

                this.selectedFilter = Object.assign({}, this.selectedFilter, {[key]: value});
                this.$router.replace({
                    query:{
                        ...this.selectedFilter,
                        page: 1
                    }
                });
                this.clickedFilters = this.selectedFilter;
            }
        }
    }
</script>

<style scoped>

</style>