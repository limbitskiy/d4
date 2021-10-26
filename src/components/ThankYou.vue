<template>
  <div class="ty-message">
    <p>
      {{ this.translation[this.currentLang].msg }}
    </p>
    <gen-btn @click="this.homeBtn">{{
      this.translation[this.currentLang].homeBtn
    }}</gen-btn>
  </div>
</template>

<script>
import { translationsArray } from "@/language/ThankYou.js";

export default {
  data() {
    return {
      translation: translationsArray,
    };
  },
  emits: ["home-btn"],
  props: ["currentLang"],
  methods: {
    homeBtn() {
      this.$emit("home-btn");
      this.cartOpen = false;
    },
  },
};
</script>

<style scoped>
.ty-message {
  text-align: center;
}
</style>