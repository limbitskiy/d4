<template>
  <transition name="component-fade" mode="out-in">
    <main-content
      v-if="currentComponent === 'main-content'"
      :products="products"
      :currentLang="currentLang"
      @addToCart="this.$emit('addToCart', $event)"
    />
  </transition>
  <transition name="component-fade" mode="out-in">
    <callback-form
      v-if="currentComponent === 'callback-form'"
      :currentLang="currentLang"
      :cart="cart"
      @clear-cart="this.$emit('clear-cart')"
      @home-btn="this.$emit('home-btn')"
      @modal-window="this.$emit('modal-window')"
      @removeFromCart="this.$emit('removeFromCart', $event)"
      @changeQuantity="this.$emit('changeQuantity', $event)"
    />
  </transition>
  <transition name="component-fade" mode="out-in">
    <modal-window
      v-if="currentComponent === 'modal-window'"
      :currentLang="currentLang"
      @home-btn="this.$emit('home-btn')"
      @reset-quantity="this.$emit('reset-quantity')"
    ></modal-window>
  </transition>
</template>

<script>
import MainContent from "@/components/MainContent.vue";
import CallbackForm from "@/components/CallbackForm.vue";
import ModalWindow from "@/components/ModalWindow.vue";

export default {
  components: {
    MainContent,
    CallbackForm,
    ModalWindow,
  },
  props: ["products", "cart", "currentLang", "currentComponent"],
  emits: [
    "clear-cart",
    "addToCart",
    "home-btn",
    "modal-window",
    "reset-quantity",
    "changeQuantity",
    "removeFromCart",
  ],
  data() {
    return {};
  },
  methods: {},
};
</script>

<style>
/* transitions */

.component-fade-enter-active,
.component-fade-leave-active {
  transition: opacity 0.3s ease;
}

.component-fade-enter-from,
.component-fade-leave-to {
  opacity: 0;
}
</style>