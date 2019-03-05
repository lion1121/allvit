<template>

    <div class="container clearfix">
        <sort-filter></sort-filter>
        <div class="postcontent nobottommargin col_last" id="productsWrapper">
            <template v-if="products.length > 0">
                <products :products="products" :meta="meta"></products>
            </template>
            <template v-else>
                No results
            </template>
            <pagination :meta="meta"></pagination>

        </div>
        <div class="sidebar nobottommargin">
            <div class="sidebar-widgets-wrap ts-wrap ">
                <template>
                    <div class="mb-3">
                        <h4 class="mb-5">Цена</h4>
                        <price-filter :filters="filters" :updatedFilters="updatedFilters"></price-filter>
                    </div>
                </template>
                <sidebar :fitersNoPrice="fitersNoPrice" :updatedFilters="updatedFilters"></sidebar>
            </div>
        </div>
    </div>
</template>

<script>
    import sidebar from "./sidebar.vue"
    import products from "./products.vue"
    import pagination from "./pagination.vue"
    import priceFilter from "./filters/price-filter.vue"
    import sortFilter from "./filters/sort-filter.vue"

    import axios from 'axios';


    export default {
        name: "ProductIndex",
        data() {
            return {
                products: {},
                filters: {},
                meta: {},
                updatedFilters: {}
            }
        },
        components: {
            'sidebar': sidebar,
            'products': products,
            'pagination': pagination,
            'price-filter': priceFilter,
            'sort-filter': sortFilter,
        },
        mounted() {
            this.getProducts();
        },
        computed: {
            fitersNoPrice: function () {
                let fitersWithoutPrice = Object.assign({}, this.filters);
                delete fitersWithoutPrice.price;
                return fitersWithoutPrice;
            }
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
                    this.products = response.data.data[2].data;
                    this.updatedFilters = response.data.data[0];
                    this.filters = response.data.data[1];
                    this.meta = response.data.meta;
                }).catch(() => console.warn('Something went wrong.'));
            }
        }
    }
</script>

<style scoped>

</style>