<template>
    <div>
        <vue-tags-input
                v-model="tag"
                :tags="tags"
                :autocomplete-items="autocompleteItems"
                :add-only-from-autocomplete="true"
                @tags-changed="update"
                placeholder="список товаров">
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
        data() {
            return {
                tag: '',
                tags: [],
                autocompleteItems: [],
                debounce: null,
            };
        },
        methods: {
            update(newTags) {
                this.autocompleteItems = [];
                this.tags = newTags;
                this.$root.$emit('addProduct', this.tags)
            },
            initItems() {
                if (this.tag.length === 0) return;
                const url = `/ajax/getProduct/${this.tag}`;
                clearTimeout(this.debounce);
                this.debounce = setTimeout(() => {
                    axios.get(url).then(response => {
                        this.autocompleteItems = response.data.map(a => {
                            return {
                                text: a.name,
                                id:a.id,
                            };
                        });
                    }).catch(() => console.warn('Oh. Something went wrong'));
                }, 600);
            },
        },
        watch: {
            'tag': 'initItems',
        },
    };
</script>