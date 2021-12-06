<template>
  <ul class="popup-cart">
    <p v-if="this.cart.length === 0" class="empty-cart-message">
      <i>{{ this.translation[this.currentLang].emptyCart }}</i>
    </p>
    <li v-for="(product, index) in cart" :key="index">
      <div class="popup-item-section">
        <img :src="'/images/' + product.image" />
      </div>

      <div class="popup-item-section">
        <span class="cart-item-name">{{ product.name[currentLang] }}</span>
      </div>

      <div class="popup-item-section">
        <span class="cart-item-packing">{{ product.select }}</span>
      </div>

      <div class="popup-item-section">
        <span>x</span>
        <input
          class="cart-item-quantity"
          type="number"
          min="1"
          max="99"
          :value="product.quantity"
          @change="this.$emit('changeQuantity', [$event, product])"
        />
      </div>

      <div class="popup-item-section">
        <span class="cart-item-price"
          >{{ product.price[product.select] }}грн</span
        >
      </div>

      <div
        class="popup-item-section"
        @click="this.$emit('removeFromCart', product)"
      >
        <i class="fas fa-trash"></i>
      </div>
    </li>
    <p class="total" v-if="this.cart.length > 0">
      {{ this.translation[this.currentLang].totalTitle }}
      <span>{{ this.total }}</span> грн
    </p>
  </ul>
</template>

<script>
import { translationsArray } from "@/language/Cart.js";

export default {
  name: "Cart",
  data() {
    return {
      translation: translationsArray,
    };
  },
  props: ["cart", "cartOpen", "currentLang"],
  emits: ["removeFromCart", "order", "changeQuantity"],
  methods: {},
  computed: {
    total() {
      return this.cart.reduce((sum, item) => {
        return (sum += item.price[item.select] * item.quantity);
      }, 0);
    },
    cartLength() {
      return this.cart.length;
    },
  },
  watch: {},
};
</script>

<style lang="scss" scoped>
/* other */
* {
  padding: 0;
  margin: 0;

  --grey-popup: #f3f3f3;
}

.cart-item-name {
  font-size: var(--font-small);
  padding: 5px;
}
.popup-cart {
  > li {
    display: grid;
    grid-template-columns: 0.7fr 2fr 30px 30px 55px 30px;
    grid-gap: 0.5em;
    justify-items: center;
    align-items: center;
    border-bottom: 1px solid #dad7d7;
    height: 80px;
    i {
      color: grey;
      cursor: pointer;
      &:hover {
        color: #000;
      }
    }
  }
  input {
    width: 1.2em;
    height: 2em;
    border: none;
    color: rgb(97, 97, 97);
    text-align: center;
    background-color: var(--grey-popup);
    &::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    &::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    &:focus-visible {
      outline: none;
      border: 1px solid rgb(168, 168, 168);
      border-radius: 2px;
    }
  }
  input[type="number"] {
    -moz-appearance: textfield;
  }
  .total {
    text-align: center;
    font-size: var(--font-big);
    margin: 1em;
    > span {
      font-size: var(--font-bigger);
      font-weight: 600;
    }
  }
  .empty-cart-message {
    padding: 1em 3em;
    text-align: center;
  }
  img {
    height: 60px;
  }
}

@media screen and (max-width: 480px) {
  .popup-cart > li {
    grid-template-columns: 1px 1fr 30px 30px 55px 30px;
  }
  img {
    display: none;
    width: 0;
  }
}
</style>