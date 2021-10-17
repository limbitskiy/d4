<template>
  <navbar
    :cart="cart"
    :currentLang="currentLang"
    @removeFromCart="removeFromCart"
    @order="changeView('callback-form')"
    @home-btn="changeView('main-content')"
    @changeLang="changeLang"
    @changeQuantity="changeQuantity"
  />
  <main-layout
    :products="products"
    :cart="cart"
    :currentLang="currentLang"
    :currentComponent="currentComponent"
    @clear-cart="clearCart"
    @addToCart="addToCart"
    @home-btn="changeView('main-content')"
    @modal-window="changeView('modal-window')"
  />

  <footer-comp :currentLang="currentLang" />
</template>

<script>
import Navbar from "@/components/Navbar.vue";
import FooterComp from "@/components/FooterComp.vue";
import MainLayout from "@/components/MainLayout.vue";
import { products } from "@/Products.js";

export default {
  name: "App",
  components: {
    Navbar,
    FooterComp,
    MainLayout,
  },
  data() {
    return {
      products: products,
      cart: [],
      currentLang: 0,
      currentComponent: "main-content",
    };
  },
  methods: {
    removeFromCart(product) {
      this.cart.splice(this.cart.indexOf(product), 1);
    },
    addToCart(product) {
      if (!this.cart.includes(product)) {
        this.cart.push(product);
      }
    },
    changeView(page) {
      this.cartIsOpen = false;
      this.currentComponent = page;
      setTimeout(() => {
        window.scrollTo(0, 0);
      }, 300);
    },
    changeLang(lang) {
      this.currentLang = lang;
    },
    changeQuantity(event) {
      let e = event[0];
      let prod = event[1];
      let thisProduct = this.cart.find((item) => item.id === prod.id);
      thisProduct.quantity = e.target.value;
    },
    clearCart() {
      this.cart = [];
    },
  },
};
</script>

<style>
/*variables*/

* {
  --accent-color: rgb(231, 162, 33);
  --grey-border: 1px solid #d7d7d7;

  --modal-shadow: 1px 1px 5px #b7b7b7;

  --font-small: 0.9em;
  --font-big: 1.25em;
  --font-bigger: 1.3em;
  --font-large: 2em;
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: rgb(80, 80, 80);
  font-size: 16px;
}
</style>
