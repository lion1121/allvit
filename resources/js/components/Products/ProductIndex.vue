<template>
    <div class="clearfix">
        <div class="postcontent nobottommargin col_last" id="productsWrapper">
            <template v-if="products.length > 0">
                <products :products="products" :meta="meta"></products>
            </template>
            <template v-else>
                No results
            </template>
            <pagination :meta="meta" v-on:pagination:switched="getProducts"></pagination>

        </div>
        <div class="sidebar nobottommargin">
            <div class="sidebar-widgets-wrap ts-wrap ">
                <sidebar :filters="filters"></sidebar>
                <template>
                    <div class="mt-4">
                        <h4>Цена</h4>
                        <price-filter :filters="filters"></price-filter>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>

<script>
    import sidebar from "./sidebar.vue"
    import products from "./products.vue"
    import pagination from "./pagination.vue"
    import priceFilter from "./filters/price-filter.vue"

    import axios from 'axios';


    export default {
        name: "ProductIndex",
        data() {
            return {
                products: {},
                filters: {},
                meta: {},
            }
        },
        components: {
            'sidebar': sidebar,
            'products': products,
            'pagination': pagination,
            'price-filter': priceFilter,
        },
        mounted() {
            this.getProducts();
        },
        watch: {
            '$route.query': {
                handler(query) {
                    this.getProducts(1, query);
                },
                deep: true
            }
        },
        methods: {
            getProducts(page = this.$route.query.page, query = this.$route.query) {
                axios.get('/api' + this.$route.fullPath, {
                    params: {
                        page: page,
                        ...query
                    }
                }).then(response => {
                    console.log(response);
                    this.products = response.data.data[1].data;
                    this.filters = response.data.data[0];
                    this.meta = response.data.meta;
                }).catch(() => console.warn('Something went wrong.'));
            }
        }
    }
</script>

<style scoped>

</style>