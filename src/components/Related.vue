<script>
import { translationsArray } from "@/language/Related.js";

export default {
  name: "Related",
  props: ["products", "currentLang"],
  emits: ["switchModalPopup"],
  data() {
    return {
      translation: translationsArray,
    };
  },
  methods: {},
};
</script>

<template>
  <h2>{{ this.translation[this.currentLang].title }}</h2>
  <div class="related">
    <div
      v-for="product in products"
      :key="product.id"
      class="related-item"
      @click="this.$emit('switchModalPopup', product)"
    >
      <img :src="'/images/' + product.image" />
      <span>{{ product.name[currentLang] }}</span>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.related {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 1rem;
}

.related-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1rem;
  cursor: pointer;
  text-align: center;
  padding: 0.5rem 1rem;
  width: 10rem;
  border-radius: 0.5rem;
  transition: box-shadow 0.3s ease;

  img {
    height: 10rem;
    object-fit: contain;
  }

  &:hover {
    box-shadow: 0px 0px 20px 0px rgb(0 0 0 / 30%);
  }
}

h2 {
  text-align: center;
  margin-block: 2rem 1rem;
}
</style>