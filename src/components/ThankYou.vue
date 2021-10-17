<template>
  <div class="ty-message">
    <p>
      Спасибо за заказ. Ожидайте звонка от нашего менеджера в кратчайшие сроки.
    </p>
    <gen-btn @click="this.homeBtn">На главную</gen-btn>
  </div>
</template>

<script>
export default {
  emits: ["home-btn"],
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