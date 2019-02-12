<template>
   <div>
       <div class="postcontent nobottommargin col_last" id="productsWrapper">
           <products :products="products" :paginateData="paginateData"></products>
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
    import axios from 'axios';
    export default {
        name: "ProductIndex",
        data() {
            return {
                products: {},
                filters: {},
                paginateData:{
                    currentPage:0,
                    firstPage:'',
                    from:0,
                    lastPage:0,
                    lastPageUrl:'',
                    path:'',
                    perPage:0,
                    prevPageUrl:'',
                    to:0,
                    total:0
                }
            }
        },
        components:{
            'sidebar':sidebar,
            'products':  products
        },

        mounted(){
            axios.get('/api' + this.$route.path).then(response => {
                console.log(response);
                this.products = response.data.data[1].data;
                this.filters = response.data.data[0];
            }).catch(() => console.warn('Something went wrong.'));
        }

    }
</script>

<style scoped>

</style>