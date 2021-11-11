<template>
  <div class="navbar">
    <div class="container nav">
      <img class="logo" src="@/assets/images/logo.webp" />
      <div class="nav-btn-group">
        <i class="fa fa-mobile" aria-hidden="true"
          ><span>+38 (050) 340-35-47</span></i
        >

        <a href="tel:+38 (050) 340-35-47">
          <i class="fa fa-mobile" aria-hidden="true"></i>
        </a>

        <nav-btn :class="{ 'btn-orange': cart.length > 0 }" @click="openCart">
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

      <transition name="slide-out">
        <Dropdown v-if="cartOpen">
          <template v-slot:cart-body>
            <Cart
              :cart="cart"
              :cartOpen="cartOpen"
              :currentLang="currentLang"
              @removeFromCart="this.$emit('removeFromCart', $event)"
              @changeQuantity="this.$emit('changeQuantity', $event)"
            />
          </template>
          <template v-slot:cart-btn>
            <gen-btn v-if="this.cart.length > 0" @click="order">
              {{ this.translation[this.currentLang].orderTitle }}
            </gen-btn>
          </template>
        </Dropdown>
      </transition>
    </div>
  </div>
</template>

<script>
import { translationsArray } from "@/language/Navbar.js";
import Cart from "@/components/Cart.vue";
import Dropdown from "@/components/Dropdown.vue";
export default {
  data() {
    return {
      translation: translationsArray,
      cartOpen: false,
    };
  },
  components: { Cart, Dropdown },
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
      if (this.cartLength > 0 && !this.cartOpen) {
        this.cartOpen = true;
      }
      if (this.cartLength === 0) {
        this.closeCartTimer();
      }
    },
  },
};
</script>

<style lang="scss" scoped>
/* other */

* {
  --navbar-bg: #f3f3f3;
  --grey-btn: #bdbdbd;
}

/* navbar */

.navbar {
  width: 100%;
  background-color: var(--navbar-bg);
  box-shadow: var(--modal-shadow);
  z-index: 10;
  position: fixed;
}

.nav {
  display: grid;
  grid-template-columns: 1fr 3fr;
  align-items: center;
}

.logo {
  height: 80px;
}

.nav-btn-group {
  display: grid;
  grid-template-columns: 8fr 50px 50px 50px;
  grid-auto-flow: column;
  align-items: center;
  justify-items: center;
  i {
    justify-self: end;
  }
  .fa-mobile > span {
    margin: 0 1em 0 0.5em;
    font-family: "Open Sans", sans-serif;
    font-size: clamp(14px, 16px, 2vw);
    font-weight: 500;
  }
}

.lang-module {
  display: flex;
  flex-direction: column;
  color: grey;
  font-size: 0.9em;
  span {
    cursor: pointer;
    &:hover {
      color: var(--accent-color);
    }
  }
}

.slide-out-enter-active {
  animation: slideOut 0.2s ease;
}

.slide-out-leave-active {
  animation: slideOut 0.3s ease reverse;
}

@keyframes slideOut {
  from {
    transform: translateX(30vw);
  }
  to {
    transform: translateX(0);
  }
}

@media screen and (max-width: 1200px) {
  .logo {
    height: 50px;
  }
}

@media screen and (max-width: 1000px) {
  @keyframes slideOut {
    from {
      transform: translateX(50vw);
    }
    to {
      transform: translateX(0);
    }
  }
}

@media screen and (max-width: 550px) {
  @keyframes slideOut {
    from {
      transform: translateX(80vw);
    }
    to {
      transform: translateX(0);
    }
  }
}

@media screen and (max-width: 500px) {
  .nav-btn-group > .fa-mobile {
    display: none;
  }

  .nav-btn-group > a {
    display: block;
    justify-self: end;
    margin-right: 4px;
    background-color: grey;
    padding: 12px 16px;
    border: none;
    border-radius: 3px;
    color: #fff;
    background-color: var(--grey-btn);
    transition: background-color 200ms ease-in-out;
  }
}

@media screen and (min-width: 500px) {
  .nav-btn-group > a {
    display: none;
  }
}
</style>