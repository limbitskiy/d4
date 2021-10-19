<template>
  <div class="navbar">
    <img class="logo" src="@/assets/images/logo.webp" />
    <div class="nav-btn-group">
      <i class="fa fa-mobile" aria-hidden="true"
        ><span>+38 (050) 340-35-47</span></i
      >

      <nav-btn :class="{ 'btn-orange': cart.length > 0 }" @click="openCart()">
        <i class="fas fa-shopping-cart"></i>
      </nav-btn>

      <nav-btn @click="homeBtn">
        <i class="fas fa-home"></i>
      </nav-btn>

      <div class="lang-module">
        <span @click="this.$emit('changeLang', 0)">рус</span>
        <span @click="this.$emit('changeLang', 1)">укр</span>
      </div>
    </div>
  </div>
  <slide-out-cart
    :cart="cart"
    :cartOpen="cartOpen"
    :currentLang="currentLang"
    @removeFromCart="this.$emit('removeFromCart', $event)"
    @order="order"
    @changeQuantity="this.$emit('changeQuantity', $event)"
  ></slide-out-cart>
</template>

<script>
import SlideOutCart from "./SlideOutCart.vue";
export default {
  data() {
    return {
      cartOpen: false,
    };
  },
  components: { SlideOutCart },
  props: ["cart", "currentLang"],
  emits: [
    "removeFromCart",
    "order",
    "home-btn",
    "changeLang",
    "changeQuantity",
  ],
  methods: {
    order() {
      this.$emit("order");
      this.cartOpen = false;
    },
    homeBtn() {
      this.$emit("home-btn");
      this.cartOpen = false;
    },
    openCart() {
      this.cartOpen = !this.cartOpen;
      if (this.cartLength === 0 && this.cartOpen) {
        this.closeCartTimer();
      }
    },
    closeCartTimer() {
      setTimeout(() => {
        this.cartOpen = false;
      }, 1000);
    },
  },
  computed: {
    cartLength() {
      return this.cart.length;
    },
  },
  watch: {
    cartLength() {
      if (this.cartLength == 1 && !this.cartOpen) {
        this.cartOpen = true;
      }
      if (this.cartLength === 0) {
        this.closeCartTimer();
      }
    },
  },
};
</script>

<style scoped>
/* other */

* {
  --navbar-bg: #f3f3f3;
}

/* navbar */

.navbar {
  display: grid;
  grid-template-columns: 8em 1fr 1fr 8em;
  grid-template-areas: "..... logo btn-group .....";
  width: 100%;
  background-color: var(--navbar-bg);
  box-shadow: var(--modal-shadow);
  z-index: 10;
  position: fixed;
}

.logo {
  grid-area: logo;
  height: 80px;
  font-weight: 700;
  font-size: 20px;
}

.nav-btn-group {
  display: grid;
  grid-template-columns: 8fr 50px 50px 50px;
  grid-auto-flow: column;
  grid-area: btn-group;
  align-items: center;
  justify-items: center;
}

.nav-btn-group i {
  justify-self: end;
}

.nav-btn-group .fa-mobile > span {
  margin: 0 1em 0 0.5em;
  font-family: "Open Sans", sans-serif;
  font-weight: 500;
}

.lang-module {
  display: flex;
  flex-direction: column;
  color: grey;
  font-size: 0.9em;
}

.lang-module span {
  cursor: pointer;
}

.lang-module span:hover {
  color: var(--accent-color);
}
</style>