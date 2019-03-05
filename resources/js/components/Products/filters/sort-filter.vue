<template>
    <div class="row flex justify-content-end mt-2">
        <p><span>Сортировать по:</span>
            <select name="" id="" v-model="sortType"  @change="changeSort(sortType)">
                <option v-for="item in options" :value="item.value">{{item.text}}</option>
            </select>
        </p>
    </div>
</template>

<script>
    export default {
        name: "sort-filter",
        data(){
            return {
                sortType: 'rating,desc',
                options: [
                    { text: 'По популярности', value: 'rating,desc' },
                    { text: 'От дорогих к дешевым', value: 'price,desc' },
                    { text: 'От дешевых к дорогим', value: 'price,asc' }
                ],
                selectedFilter:{},
            }
        },
        methods:{
            changeSort(value){
                console.log(this.$route.query.sort);
                //get filters from URL
                this.selectedFilter =_.omit(this.$route.query, ['page']);
                //Add sort filter to existing filters
                this.selectedFilter = Object.assign({},this.selectedFilter, {['sort']: value});
                //Send new request
                this.$router.replace({
                    query: {
                        ...this.selectedFilter,
                        page: 1
                    }
                });
            }
        }
    }
</script>

<style scoped>

</style>