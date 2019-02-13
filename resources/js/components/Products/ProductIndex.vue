<template>
   <div class="clearfix">
       <div class="postcontent nobottommargin col_last" id="productsWrapper">
           <products :products="products" :meta="meta"></products>
           <pagination :meta="meta" v-on:pagination:switched="getProducts"></pagination>

       </div>
       <div class="sidebar nobottommargin">
           <div class="sidebar-widgets-wrap clearfix">
               <sidebar :filters="filters"></sidebar>
           </div>
       </div>
   </div>
</template>

<script>
    import sidebar from "./sidebar.vue"
    import products from "./products.vue"
    import pagination from "./pagination.vue"
    import axios from 'axios';
    export default {
        name: "ProductIndex",
        data() {
            return {
                products: {},
                filters: {},
                meta:{},
            }
        },
        components:{
            'sidebar':sidebar,
            'products':  products,
            'pagination': pagination,
        },
        mounted(){
            this.getProducts()
        },
        methods:{
            getProducts(page = this.$route.query.page){
                axios.get('/api' + this.$route.path, {
                    params: {
                        page: page
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