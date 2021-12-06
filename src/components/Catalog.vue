<script>
import { translationsArray } from "@/language/Catalog.js";

export default {
  data() {
    return {
      translation: translationsArray,
    };
  },
  props: ["products", "currentLang"],
  emits: ["addToCart", "openModalPopup"],
  methods: {},
};
</script>

<template>
  <section class="product-catalog">
    <div class="catalog">
      <div v-for="product in products" :key="product.id" class="product-card">
        <img
          :src="'/images/' + product.image"
          alt=""
          @click="this.$emit('openModalPopup', product)"
        />
        <h3 class="product-name" @click="this.$emit('openModalPopup', product)">
          {{ product.name[currentLang] }}
        </h3>
        <!-- <h3 class="product-name">
          {{ product.name[currentLang] }}
        </h3> -->
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

<style lang="scss" scoped>
/* other */
* {
  --item-border: 1px solid rgb(187, 187, 187);
  --green-color: #27a92c;
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
  border: 1px solid transparent;
  border-radius: 0.6rem;
  padding: 1.2em;
  background-color: #fff;
  user-select: none;
  -moz-user-select: none;
  transition: border-color 0.4s ease-in-out;

  &:hover {
    border-color: var(--green-color);
  }

  &:hover .product-name {
    color: white;
  }

  &:hover .product-name:before {
    transform: scaleX(1);
  }

  & img,
  & button {
    justify-self: center;
  }

  img {
    cursor: pointer;
  }
}

.product-name {
  font-weight: 600;
  color: var(--green-color);
  margin-bottom: 0.5em;
  cursor: pointer;
  transition: color 0.4s ease-in-out;
  position: relative;
  z-index: 0;

  &:before {
    content: "";
    position: absolute;
    top: -5px;
    bottom: -5px;
    left: -10px;
    right: -10px;
    background-color: var(--green-color);
    z-index: -1;
    border-radius: 3px;
    transform: scaleX(0);
    transform-origin: left;
    transition: all 0.3s ease;
  }
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
    grid-template-columns: 95%;
  }

  .product-card {
    border-color: var(--green-color);
  }
}
</style>