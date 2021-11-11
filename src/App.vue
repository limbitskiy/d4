<script>
import Navbar from "@/components/Navbar.vue";
import FooterComp from "@/components/FooterComp.vue";
import MainLayout from "@/components/MainLayout.vue";
import products from "@/products.json";

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
      this.cart.quantity = 1;
      this.cart.splice(this.cart.indexOf(product), 1);
    },
    addToCart(product) {
      if (this.cart.includes(product)) return;
      this.cart.push(product);
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
      this.products.forEach((item) => {
        item.quantity = 1;
        item.select = Object.entries(item.price)[0][0];
      });
    },
    resetQuantity() {
      this.products.forEach((item) => {
        item.quantity = 1;
      });
    },
  },
  mounted() {
    // console.log(Object.entries(this.products[0].price)[0][0]);
  },
  // async mounted() {
  //   const res = await fetch("./products.json");
  //   const data = await res.json();
  //   this.products = data;
  //   console.log(this.products);
  // },
};
</script>

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
    @reset-quantity="resetQuantity"
    @removeFromCart="removeFromCart"
    @changeQuantity="changeQuantity"
  />

  <footer-comp :currentLang="currentLang" />
</template>

<style>
/*variables*/

* {
  padding: 0;
  margin: 0;

  --accent-color: rgb(231, 162, 33);
  --accent-green: #27a92c;

  --grey-border: 1px solid #d7d7d7;

  --modal-shadow: 1px 1px 5px #b7b7b7;

  --font-small: 0.9em;
  --font-big: 1.25em;
  --font-bigger: 1.3em;
  --font-large: 1.8em;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: rgb(80, 80, 80);
  font-size: 16px;
  position: relative;
}
</style>
