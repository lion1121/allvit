<template>
    <div class="postcontent nobottommargin col_last" id="productsWrapper">
        <p v-for="product in products">{{product}}</p>
    </div>
</template>

<script>
    export default {
        name: "products",
        data(){
          return {
              products: {}
          }
        },
        props: ['products'],
        mounted(){
            console.log(this.props);
        }
    }
</script>

<style scoped>

</style>