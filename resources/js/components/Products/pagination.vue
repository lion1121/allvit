<template>
    <nav aria-label="Page navigation example" class="mb-5 clearfix">
        <ul class="pagination">
            <li :class="{' disabled ': meta.current_page == 1}" class="page-item">
                <a class="page-link" href="#" @click.prevent="switched(meta.current_page - 1)">
                    <span>&laquo;</span>
                </a>
            </li>
            <li class=" page-item" v-bind:class="{' active ' : meta.current_page === x}" v-for="x in meta.last_page">
                <a class="page-link" href="#" @click.prevent="switched(x)">{{x}}</a>
            </li>
            <li :class="{' disabled ': meta.last_page == meta.current_page}" class="page-item">
                <a class="page-link" href="#" @click.prevent="switched(meta.current_page + 1)">
                    <span>&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        name: "pagination",
        props: ['meta'],
        methods:{
            switched(page){
                if(this.pageIsOutOfBounds(page)){
                    return;
                }
                this.$emit('pagination:switched', page);
                this.$router.replace({
                    query: Object.assign({}, this.$route.query, {page})
                });
            },
            pageIsOutOfBounds(page){
                return page <= 0 || page > this.meta.last_page;
            }
        }
    }
</script>

<style scoped>

</style>