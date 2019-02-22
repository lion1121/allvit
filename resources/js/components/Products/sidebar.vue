<template>
    <div class="sidebar nobottommargin w-100">
        <div class="widget clearfix" v-for="(filter, elem) in filters" v-if="Object.keys(filter).length > 0">

            <template v-if="elem === 'vendor'">
                <h4>Производитель</h4>
                <div v-for="(item, index) in filter">
                    <input v-bind:id="'vendor-' + index" class="checkbox-style" :data-vendor="index"
                           v-bind:name="'vendor-' + index"
                           type="checkbox"
                           @click="activateFilter(elem,index)"
                           :value="index"
                           v-model="clickedFilters">

                    <template v-if="clickedFilters.includes(index) && clickedFilters.length > 0">
                        <label v-bind:for="'vendor-' + index" class="checkbox-style-3-label">{{index}}
                            <span class="badge badge-pill badge-primary right font-size-16">
                           {{item}}
                        </span>
                        </label>
                    </template>
                    <template v-if="!clickedFilters.includes(index) && clickedFilters.length > 0">
                        <label v-bind:for="'vendor-' + index" class="checkbox-style-3-label">{{index}}
                            <span class="badge badge-pill badge-primary right font-size-16">
                           {{'+' + item}}
                        </span>
                        </label>
                    </template>
                    <template v-if="clickedFilters.length === 0">
                        <label v-bind:for="'vendor-' + index" class="checkbox-style-3-label">{{index}}
                            <span class="badge badge-pill badge-primary right font-size-16">
                           {{item}}
                        </span>
                        </label>
                    </template>
                </div>
            </template>

            <template v-if="elem === 'taste'">
                <h4>Вкус</h4>
                <div v-for="(quantity, key) in filter">
                    <input v-bind:id="'vendor-' + key" class="checkbox-style" :data-vendor="key"
                           v-bind:name="'vendor-' + key"
                           type="checkbox"
                           @click="activateFilter(elem,key)"
                           :value="key"
                           v-model="clickedFilters"
                            :disabled="quantity === 0">

                    <template v-if="clickedFilters.includes(key) && clickedFilters.length > 0">
                        <label v-bind:for="'vendor-' + key" :class="{disabledLabel : quantity === 0}" class="checkbox-style-3-label">{{key}}
                            <span class="badge badge-pill badge-primary right font-size-16">
                           {{quantity}}
                        </span>
                        </label>
                    </template>
                    <template v-if="!clickedFilters.includes(key) && clickedFilters.length > 0">
                        <label v-bind:for="'vendor-' + key" :class="{disabledLabel : quantity === 0 }" class="checkbox-style-3-label">{{key}}
                            <span class="badge badge-pill badge-primary right font-size-16">
                           {{'+' + quantity}}
                        </span>
                        </label>
                    </template>
                    <template v-if="clickedFilters.length === 0">
                        <label v-bind:for="'vendor-' + key" :class="{disabledLabel : quantity === 0}" class="checkbox-style-3-label">{{key}}
                            <span class="badge badge-pill badge-primary right font-size-16">
                           {{quantity}}
                        </span>
                        </label>
                    </template>
                </div>
            </template>

            <template v-if="elem === 'color'">
                <h4>Цвет</h4>
                <div v-for="(quantity, key) in filter">
                    <input v-bind:id="'vendor-' + key" class="checkbox-style" :data-vendor="key"
                           v-bind:name="'vendor-' + key"
                           type="checkbox"
                           @click="activateFilter(elem,key)"
                           :value="key"
                           v-model="clickedFilters"
                           :disabled="quantity === 0">

                    <template v-if="clickedFilters.includes(key) && clickedFilters.length > 0">
                        <label v-bind:for="'vendor-' + key" :class="{disabledLabel : quantity === 0}" class="checkbox-style-3-label">{{key}}
                            <span class="badge badge-pill badge-primary right font-size-16">
                           {{quantity}}
                        </span>
                        </label>
                    </template>
                    <template v-if="!clickedFilters.includes(key) && clickedFilters.length > 0">
                        <label v-bind:for="'vendor-' + key" :class="{disabledLabel : quantity === 0 }" class="checkbox-style-3-label">{{key}}
                            <span class="badge badge-pill badge-primary right font-size-16">
                           {{'+' + quantity}}
                        </span>
                        </label>
                    </template>
                    <template v-if="clickedFilters.length === 0">
                        <label v-bind:for="'vendor-' + key" :class="{disabledLabel : quantity === 0}" class="checkbox-style-3-label">{{key}}
                            <span class="badge badge-pill badge-primary right font-size-16">
                           {{quantity}}
                        </span>
                        </label>
                    </template>
                </div>
            </template>

            <template v-if="elem === 'goals'">
                <h4>Цель</h4>
                <div v-for="(quantity, key) in filter">
                    <input v-bind:id="'vendor-' + key" class="checkbox-style" :data-vendor="key"
                           v-bind:name="'vendor-' + key"
                           type="checkbox"
                           @click="activateFilter(elem,key)"
                           :value="key"
                           v-model="clickedFilters"
                           :disabled="quantity === 0">

                    <template v-if="clickedFilters.includes(key) && clickedFilters.length > 0">
                        <label v-bind:for="'vendor-' + key" :class="{disabledLabel : quantity === 0}" class="checkbox-style-3-label">{{key}}
                            <span class="badge badge-pill badge-primary right font-size-16">
                           {{quantity}}
                        </span>
                        </label>
                    </template>
                    <template v-if="!clickedFilters.includes(key) && clickedFilters.length > 0">
                        <label v-bind:for="'vendor-' + key" :class="{disabledLabel : quantity === 0 }" class="checkbox-style-3-label">{{key}}
                            <span class="badge badge-pill badge-primary right font-size-16">
                           {{'+' + quantity}}
                        </span>
                        </label>
                    </template>
                    <template v-if="clickedFilters.length === 0">
                        <label v-bind:for="'vendor-' + key" :class="{disabledLabel : quantity === 0}" class="checkbox-style-3-label">{{key}}
                            <span class="badge badge-pill badge-primary right font-size-16">
                           {{quantity}}
                        </span>
                        </label>
                    </template>
                </div>
            </template>

            <template v-if="elem === 'ingredients'">
                <h4>Ингридиенты</h4>
                <div v-for="(quantity, key) in filter">
                    <input v-bind:id="'vendor-' + key" class="checkbox-style" :data-vendor="key"
                           v-bind:name="'vendor-' + key"
                           type="checkbox"
                           @click="activateFilter(elem,key)"
                           :value="key"
                           v-model="clickedFilters"
                           :disabled="quantity === 0">

                    <template v-if="clickedFilters.includes(key) && clickedFilters.length > 0">
                        <label v-bind:for="'vendor-' + key" :class="{disabledLabel : quantity === 0}" class="checkbox-style-3-label">{{key}}
                            <span class="badge badge-pill badge-primary right font-size-16">
                           {{quantity}}
                        </span>
                        </label>
                    </template>
                    <template v-if="!clickedFilters.includes(key) && clickedFilters.length > 0">
                        <label v-bind:for="'vendor-' + key" :class="{disabledLabel : quantity === 0 }" class="checkbox-style-3-label">{{key}}
                            <span class="badge badge-pill badge-primary right font-size-16">
                           {{'+' + quantity}}
                        </span>
                        </label>
                    </template>
                    <template v-if="clickedFilters.length === 0">
                        <label v-bind:for="'vendor-' + key" :class="{disabledLabel : quantity === 0}" class="checkbox-style-3-label">{{key}}
                            <span class="badge badge-pill badge-primary right font-size-16">
                           {{quantity}}
                        </span>
                        </label>
                    </template>
                </div>
            </template>

        </div>
    </div>
</template>

<script>

    export default {
        name: "sidebar",
        mounted() {
        },
        data() {
            return {
                clickedFilters: Object.values(_.omit(this.$route.query, ['page'])),
                // selectedFilter: _.omit(this.$route.query, ['page']),
                selectedFilter: {},
                trigger: false,
            }
        },
        props: ['filters', 'updatedFilters'],
        methods: {
            activateFilter(key, value) {
                console.log(this.clickedFilters);
                this.trigger = true;
                //removing get parameter
                this.selectedFilter = _.omit(this.$route.query, ['page']);

                if (this.clickedFilters.includes(value)) {
                    // check is url already has get parameter
                    if (this.selectedFilter.hasOwnProperty(key) && this.selectedFilter[key].split(',').length > 1) {
                        //if parameters value > 1 -> convert to array
                        let params = this.selectedFilter[key].split(',');
                        // delete clicked (checkbox) value
                        params = _.remove(params, function (n) {
                            console.log(params);
                            return n !== value;
                        });
                        this.selectedFilter[key] = _.join(params, ',');
                    } else {
                        this.selectedFilter = _.omit(this.selectedFilter, key);
                    }

                    this.$router.replace({
                        query: {
                            ...this.selectedFilter,
                            page: 1
                        }
                    });
                } else {
                    // add extra value to get parameter
                    if (this.selectedFilter.hasOwnProperty(key)) {
                        this.selectedFilter[key] += ',' + value;
                    } else {
                        this.selectedFilter = Object.assign({}, this.selectedFilter, {[key]: value});
                    }
                    this.$router.replace({
                        query: {
                            ...this.selectedFilter,
                            page: 1
                        }
                    });
                    this.clickedFilters.push = value;
                }
            }
        },

    }
</script>

<style scoped>

</style>