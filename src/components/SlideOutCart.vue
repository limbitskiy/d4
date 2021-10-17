<template>
  <ul class="popup-cart">
    <p v-if="this.cart.length === 0" class="empty-cart-message">
      {{ this.translation[this.currentLang].emptyCart }}
    </p>
    <li v-for="(product, index) in cart" :key="index">
      <div class="popup-item-section">
        <img :src="product.image" />
      </div>

      <div class="popup-item-section">
        <span class="cart-item-name">{{ product.name[currentLang] }}</span>
      </div>

      <div class="popup-item-section">
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
        <span class="cart-item-price">{{ product.price }}грн</span>
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
    <gen-btn v-if="this.cart.length > 0" @click="this.$emit('order')">
      {{ this.translation[this.currentLang].orderTitle }}
    </gen-btn>
  </ul>
</template>

<script>
import { translationsArray } from "@/language/SlideOutCart.js";

export default {
  data() {
    return {
      translation: translationsArray,
    };
  },
  props: ["cart", "cartOpen", "currentLang"],
  emits: ["removeFromCart", "order", "changeQuantity"],
  methods: {
    showCart() {
      let cartPopup = document.querySelector(".popup-cart");
      cartPopup.style.transform = "translateX(0)";
    },
    hideCart() {
      let cartPopup = document.querySelector(".popup-cart");
      cartPopup.style.transform = "translateX(500px)";
    },
  },
  computed: {
    total() {
      return this.cart.reduce((sum, item) => {
        return (sum += item.price * item.quantity);
      }, 0);
    },
    cartLength() {
      return this.cart.length;
    },
  },
  watch: {
    cartOpen() {
      if (this.cartOpen) {
        this.showCart();
      } else {
        this.hideCart();
      }
    },
  },
};
</script>

<style scoped>
/* other */
* {
  padding: 0;
  margin: 0;

  --grey-popup: #f3f3f3;
}

.popup-cart {
  position: fixed;
  right: 1em;
  top: 100px;
  display: grid;
  max-width: 335px;
  z-index: 11;
  background-color: var(--grey-popup);
  list-style: none;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #dfdfdf;
  transform: translateX(500px);
  transition: transform 100ms ease-in-out;
}

.cart-item-name {
  font-size: var(--font-small);
}

.popup-cart > li {
  display: grid;
  grid-template-columns: 1fr 2fr 25px 55px 25px;
  grid-gap: 0.5em;
  justify-items: center;
  align-items: center;
  border-bottom: 1px solid #dad7d7;
  height: 80px;
}

.popup-cart > li i {
  color: grey;
  cursor: pointer;
}

.popup-cart > li i:hover {
  color: #000;
}

.popup-cart input {
  width: 1.2em;
  height: 2em;
  border: none;
  color: rgb(97, 97, 97);
  text-align: center;
  background-color: var(--grey-popup);
}

.popup-cart input::-webkit-outer-spin-button,
.popup-cart input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

.popup-cart input[type="number"] {
  -moz-appearance: textfield;
}

.popup-cart input:focus-visible {
  outline: none;
  border: 1px solid rgb(168, 168, 168);
  border-radius: 2px;
}

.popup-cart .total {
  text-align: center;
  font-size: var(--font-big);
  margin: 1em;
}

.popup-cart .total > span {
  font-size: var(--font-bigger);
  font-weight: 600;
}

.popup-cart .empty-cart-message {
  padding: 1em 3em;
}

.popup-cart img {
  height: 60px;
}
</style>