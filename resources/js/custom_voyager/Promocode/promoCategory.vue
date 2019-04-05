<template>
    <div>
        <p>{{categories}}</p>
        <vue-tags-input
                v-model="tag"
                :tags="categories || tags"
                :autocomplete-items="autocompleteItems"
                :add-only-from-autocomplete="true"
                @tags-changed="update"
                placeholder="список категорий">
        </vue-tags-input>
    </div>
</template>


<script>
    import VueTagsInput from '@johmun/vue-tags-input';
    import axios from 'axios';

    export default {
        components: {
            VueTagsInput,
        },
        mounted(){

        },
        data() {
            return {
                tag: '',
                tags: [],
                autocompleteItems: [],
                debounce: null,
            };
        },
        props:['categories'],
        methods: {
            update(newTags) {
                console.log(categories);
               if(categories === undefined){
                   this.autocompleteItems = [];
                   this.tags = newTags;
                   this.$root.$emit('addCategory', this.tags);
                   console.log(this.tags)
                   console.log(this.tags)

               } else {
                   console.log(this.tags)
               }
            },
            initItems() {
                if (this.tag.length === 0) return;
                const url = `/ajax/getCategories`;
                clearTimeout(this.debounce);
                this.debounce = setTimeout(() => {
                    console.log(this.tags);
                    axios.post('/ajax/getAllCategories', {category: this.tag}).then(response => {
                        this.autocompleteItems = response.data.map(a => {
                            return {
                                text: a.name,
                                id:a.id,
                            };
                        });

                    }).catch(() => console.warn('Oh. Something went wrong'));
                }, 250);
            },
        },
        watch: {
            'tag': 'initItems',
        },
    };
</script>