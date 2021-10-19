<template>
  <section class="product-catalog">
    <h3 class="subtitle">Каталог</h3>
    <div class="catalog">
      <div
        v-for="(product, index) in products"
        :key="index"
        class="product-card"
      >
        <img :src="require('../assets/images/' + product.image)" alt="" />
        <h3 class="product-name">{{ product.name[currentLang] }}</h3>
        <div class="price-wrap">
          <span class="product-subtitle">{{
            this.translation[this.currentLang].price
          }}</span>
          <span class="product-price">{{ product.price }}грн</span>
        </div>
        <div class="product-desc">
          <p class="product-subtitle">
            {{ this.translation[this.currentLang].description }}
          </p>
          <p class="product-desc">{{ product.desc[currentLang] }}</p>
        </div>
        <gen-btn @click="this.$emit('addToCart', product)" class="to-cart-btn">
          В корзину
        </gen-btn>
      </div>
    </div>
    <!-- </div> -->
  </section>
</template>

<script>
import { translationsArray } from "@/language/Catalog.js";

export default {
  data() {
    return {
      translation: translationsArray,
    };
  },
  props: ["products", "currentLang"],
  emits: ["addToCart"],
  methods: {},
};
</script>

<style scoped>
/* other */
* {
  padding: 0;
  margin: 0;

  --arrow-color: rgb(120, 120, 120);
  --arrow-hover: rgb(80, 80, 80);

  --green-color: #27a92c;
  --green-color-lighten: rgb(143, 143, 143);
  --green-color-darken: rgb(38, 156, 42);
}

.subtitle {
  font-family: "Ubuntu", sans-serif;
  text-align: center;
  margin-bottom: 1.2em;
  font-weight: 400;
  font-size: 36px;
  color: var(--grey-text);
}

/* product card */

.product-catalog {
  position: relative;
}

.catalog {
  display: grid;
  grid-template-columns: repeat(3, 368px);
  grid-gap: 3em;
  /* width: 150vw; */
  transition: transform 200ms ease-in-out;
}

.product-card {
  display: grid;
  grid-auto-flow: row;
  grid-template-rows: 250px 1fr 1fr auto 2fr;
  align-items: center;
  border: 1px solid #dfdfdf;
  border-radius: 5px;
  padding: 0 1.2em;
  background-color: #fff;
  user-select: none;
  -moz-user-select: none;
}

.product-card img {
  justify-self: center;
}

.product-name {
  font-weight: 600;
  color: var(--grey-text);
}

.product-subtitle {
  font-weight: 600;
}

.price-wrap {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.product-price {
  font-size: var(--font-big);
  color: var(--green-color);
}

.product-card button {
  justify-self: center;
}
</style>