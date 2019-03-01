<template>
        <vue-slider ref="slider" v-if="this.$route.query.price"  v-model="value" v-bind="options" @click.native="changePrice(value)"></vue-slider>
        <vue-slider ref="slider" v-else v-model="value = filters.price" v-bind="options" @click.native="changePrice(filters.price)"></vue-slider>
</template>

<script>
    import vueSlider from 'vue-slider-component'
    export default {
        name: "price-filter",
        mounted(){
        },
        data() {
            return{
                price: [],
                value: this.$route.query.price ? this.$route.query.price.split(',') : this.price,
                options: {
                    width: "100%",
                    height: 8,
                    dotSize: 16,
                    min: 0,
                    max: 1500,
                    disabled: false,
                    show: true,
                    useKeyboard: true,
                    tooltip: "always",
                    formatter: "{value}",
                    enableCross: false,
                    bgStyle: {
                        "backgroundColor": "#fff",
                        "boxShadow": "inset 0.5px 0.5px 3px 1px rgba(0,0,0,.36)"
                    },
                    tooltipStyle: {
                        "backgroundColor": "#666",
                        "borderColor": "#666"
                    },
                    processStyle: {
                        "backgroundColor": "#999"
                    }
                },
                selectedFilter: {},
            }

        },
        methods:{
          changePrice(value){
              console.log(this.$route.query.price);
              //get filters from URL
              this.selectedFilter =_.omit(this.$route.query, ['page']);
              //Add price filter to existing filters
              this.selectedFilter = Object.assign({},this.selectedFilter, {['price']: _.join(value, ',')});
                //Send new request
              this.$router.replace({
                  query: {
                      ...this.selectedFilter,
                      page: 1
                  }
              });

          }
        },
        components: {
            vueSlider
        },
        props: ['filters'],
    }
</script>

<style scoped>

</style>