<template>
  <div class="checkout-cart">
    <h4 class="ct-title">
      {{ this.translation[this.currentLang].callbackModalYourOrder }}
    </h4>
    <ul class="ct-content">
      <li v-for="(product, index) in cart" :key="index">
        {{ product.name[currentLang] }}
        <span> x{{ product.quantity }} </span>
        <span> {{ product.price + "грн" }} </span>
      </li>
    </ul>
    <div class="ct-total-box">
      <span>{{ this.translation[this.currentLang].callbackModalTotal }}</span>
      <strong>{{ this.total + "грн" }}</strong>
    </div>
  </div>
</template>

<script>
import { translationsArray } from "@/language/CheckoutCart.js";

export default {
  data() {
    return {
      translation: translationsArray,
    };
  },
  props: ["cart", "currentLang"],
  computed: {
    total() {
      return this.cart.reduce((sum, item) => {
        return (sum += item.price * item.quantity);
      }, 0);
    },
  },
};
</script>

<style scoped>
* {
  padding: 0;
  margin: 0;
}

.checkout-cart {
  display: grid;
  grid-auto-flow: column;
  grid-template-rows: 0.5fr auto 1fr;
  align-items: center;
  margin: 1em 0;
  border: var(--grey-border);
  border-radius: 3px;
}

.ct-title {
  text-align: center;
  padding: 0.5em 0;
  background-color: var(--accent-color);
  color: white;
}

.ct-content {
  margin: 1em;
}

.ct-content li {
  display: grid;
  grid-template-columns: auto 35px 50px;
  font-size: var(--font-small);
  padding: 0.3em;
  margin: 0.2em 0;
}

.ct-content li:nth-child(2n + 1) {
  background-color: var(--background-color);
}

.ct-total-box {
  display: flex;
  justify-content: space-between;
  margin: 0 1em;
  border-top: var(--grey-border);
}

.ct-total-box strong,
.ct-total-box span {
  padding: 0.6em 0;
  line-height: 1.2em;
}
</style>