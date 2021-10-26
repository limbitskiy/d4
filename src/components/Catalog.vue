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
        <div class="packing-wrap">
          <span class="product-subtitle">{{
            this.translation[this.currentLang].packing
          }}</span>

          <form>
            <select v-model="product.select" class="select-packing">
              <option v-for="(packing, index) in product.packing" :key="index">
                {{ packing }}
              </option>
            </select>
          </form>
        </div>
        <div class="price-wrap">
          <span class="product-subtitle">{{
            this.translation[this.currentLang].price
          }}</span>
          <span class="product-price"
            >{{ product.price[product.select] }} грн</span
          >
        </div>
        <div v-if="product.packing.length > 1" class="price-comment">
          * {{ this.translation[this.currentLang].comment }}
        </div>
        <div v-if="product.packing.length === 1" class="price-comment">
          * {{ this.translation[this.currentLang].otherComment }}
          {{ product.price[product.select] / 11.1 }} грн
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

<style lang="scss" scoped>
/* other */
* {
  padding: 0;
  margin: 0;

  --item-border: 1px solid rgb(187, 187, 187);
  --green-color: #27a92c;
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
  justify-content: center;
  transition: transform 200ms ease-in-out;
}

.product-card {
  display: grid;
  grid-auto-flow: row;
  grid-template-rows: 250px 1fr 1fr 1fr auto 2fr;
  grid-gap: 0.5em;
  align-items: center;
  border: var(--item-border);
  border-radius: 5px;
  padding: 1.2em;
  background-color: #fff;
  user-select: none;
  -moz-user-select: none;

  & img,
  & button {
    justify-self: center;
  }
}

.product-name {
  font-weight: 600;
  color: var(--grey-text);
  margin-bottom: 0.5em;
}

.product-subtitle {
  font-weight: 600;
}

.packing-wrap,
.price-wrap {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px dotted #bebebe;
}

.product-price {
  font-size: var(--font-big);
  color: var(--green-color);
}

.price-comment {
  font-size: 14px;
}

.select-packing {
  border: none;
  background: none;
  outline: none;
  cursor: pointer;
}

@media screen and (max-width: 1200px) {
  .catalog {
    grid-template-columns: repeat(2, 368px);
  }
}

@media screen and (max-width: 800px) {
  .catalog {
    grid-template-columns: 320px;
  }
}
</style>

