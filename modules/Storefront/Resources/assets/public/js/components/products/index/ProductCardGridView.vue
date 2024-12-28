<template>
    <div class="grid-view-products-item">
        <ProductCard :product="product" :isPartner="isPartner" />
    </div>
</template>

<script>
import ProductCard from "./../../ProductCard.vue";

export default {
    components: { ProductCard },

    props: {
        product: Object,
        isPartner: Boolean, // اضافه کردن prop برای دریافت مقدار
    },
    computed: {
        item() {
            console.log("Is Partner TTT:", this.isPartner);
            return {
                ...(this.isPartner),
            };
        },
    },
};
</script>
