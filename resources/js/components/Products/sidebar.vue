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
                        v-bind:id="'vendor-' + index" class="checkbox-style" :data-vendor="index"
                        v-bind:name="'vendor-' + index"
                        type="checkbox"
                        @click="activateFilter(elem,index)"
                        :value="index"
                        v-model="clickedFilters">
                <label v-bind:for="'vendor-' + index" class="checkbox-style-3-label">{{index}} ({{item}})</label>
                <div>{{clickedFilters[elem]}} ---- {{elem}}</div>
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
        },
        data(){
          return {
              clickedFilters:[],
              selectedFilter: _.omit(this.$route.query, ['page']),
              selectedFilter1:{},
          }
        },
        props: ['filters'],
        methods: {
            activateFilter(key, value){

                if(this.clickedFilters.includes(value)){
                    console.log('qweqweqwe');
                    const valueToRemove = value;
                    this.clickedFilters = this.clickedFilters.filter(item => item !== valueToRemove);
                    this.selectedFilter1 = Object.assign({}, this.selectedFilter1, {[key]: value});
                    console.log(Object.values(this.selectedFilter1));
                    // if (Object.values(this.selectedFilter).indexOf(value) > -1) {
                    //     delete this.selectedFilter;
                    // }
                    function getKeyByValue(object, value) {
                        // let key = Object.keys(object).find(key => object[key] === value);
                        // delete this.selectedFilter.Object.keys(object).find(key => object[key] === value);
                        // delete this.selectedFilter1.Object.keys(object).find(key => object[key] === value);
                        console.log(key);
                    }
                    getKeyByValue(this.selectedFilter1, value);
                    // function deleteByVal(searchValue) {
                    //
                    //     console.log(this.selectedFilter);
                    //     // Array.from(this.selectedFilter).forEach(key => {
                    //     //     const user = this.list[key];
                    //     //     if(user === searchValue){
                    //     //         console.log('111');
                    //     //     }
                    //     // });
                    // }
                    //
                    // deleteByVal(value);

                    this.$router.replace({
                        query:{
                            ...this.selectedFilter1,
                            page: 1
                        }
                    });
                } else {
                    this.selectedFilter = Object.assign({}, this.selectedFilter, {[key]: value});
                    this.$router.replace({
                        query:{
                            ...this.selectedFilter,
                            page: 1
                        }
                    });
                    this.clickedFilters.push = value;
                }



            }
        }
    }
</script>

<style scoped>

</style>