<template>
    <form>
        <div class="col_full">
            <select class="sm-form-control">
                <option value="AX">&#197;land Islands</option>
                <option value="AF">Afghanistan</option>
                <option value="AL">Albania</option>
                <option value="DZ">Algeria</option>
                <option value="AD">Andorra</option>
                <option value="AO">Angola</option>
            </select>
        </div>
        <div class="col_half">
            <input type="text" class="sm-form-control" placeholder="State / Country"/>
        </div>

        <div class="col_half col_last">
            <input type="text" class="sm-form-control" placeholder="PostCode / Zip"/>
        </div>
        <a href="#" class="button button-3d nomargin button-black">Update Totals</a>
    </form>
</template>

<script>
    export default {
        name: "cart-delivery"
    }
</script>

<style scoped>

</style>