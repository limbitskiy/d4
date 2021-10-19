<template>
  <div class="info-wrap">
    <div class="info-modal">
      <thank-you
        :currentLang="currentLang"
        @home-btn="this.$emit('home-btn')"
        @reset-quantity="this.$emit('reset-quantity')"
      ></thank-you>
    </div>
  </div>
</template>

<script>
import ThankYou from "@/components/ThankYou.vue";
export default {
  data() {
    return {};
  },
  components: { ThankYou },
  props: ["currentLang"],
  emits: ["home-btn", "reset-quantity"],
  methods: {},
  computed: {},
};
</script>

<style scoped>
* {
  padding: 0;
  margin: 0;

  --background-color: #ececec;
}

.info-wrap {
  display: grid;
  padding-top: 80px;
  align-content: center;
  justify-items: center;
  min-height: calc(100vh - 404px);
  background-color: var(--background-color);
}

.info-modal {
  display: grid;
  align-items: center;
  margin: 3em auto;
  background-color: #fff;
  padding: 3em 5em;
  border-radius: 5px;
  box-shadow: var(--modal-shadow);
  color: var(--text-color);
}
</style>