<template>
    <div>
        <vue-slider ref="slider" v-model="filters.price" v-bind="options" @click.native="changePrice(filters.price)"></vue-slider>
    </div>
</template>

<script>
    import vueSlider from 'vue-slider-component'
    export default {
        name: "price-filter",
        data() {
            return{
                value:[0,150],
                options: {
                    width: "100%",
                    height: 8,
                    dotSize: 16,
                    min: 0,
                    max: 500,
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
                }
            }

        },
        methods:{
          changePrice(value){
              console.log(value);
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