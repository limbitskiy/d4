<template>
  <div class="info-wrap">
    <div class="container-small">
      <div class="info-modal">
        <thank-you
          :currentLang="currentLang"
          @home-btn="this.$emit('home-btn')"
          @reset-quantity="this.$emit('reset-quantity')"
        ></thank-you>
      </div>
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

.container-small {
  max-width: 800px;
  margin: 0 auto;
}

.info-wrap {
  padding-top: 80px;
  min-height: calc(100vh - 404px);
  background-color: var(--background-color);
}

.info-modal {
  margin: 3em auto;
  background-color: #fff;
  padding: 3em 5em;
  border-radius: 5px;
  box-shadow: var(--modal-shadow);
  color: var(--text-color);
}

@media screen and (max-width: 500px) {
  .info-modal {
    padding: 3em 1em;
  }
}
</style>