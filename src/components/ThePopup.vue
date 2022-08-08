<template>
  <div class="popup">
    <i
      class="fas fa-times close"
      id="closeFeedbackScreen"
      @click="this.$store.commit('setShowPopupForm', !this.showPopupForm)"
    ></i>
    <div class="popup-inner">
      <h3>Заметили ошибку?</h3>
      <p>Вам что-то понравилось, или наоборот - нет?</p>
      <p><strong>Дайте нам знать!</strong></p>
      <TheTextarea v-model="textArea" />
      <p style="font-size: var(--font-small)">*Сообщения полностью анонимны</p>
      <TheBtn id="sendFeedback" @click="sendFeedback">Отправить</TheBtn>
    </div>
  </div>
</template>

<script>
export default {
  name: "ThePopup",
  data() {
    return {
      textArea: "",
    };
  },
  methods: {
    sendFeedback() {
      const formData = new FormData();
      formData.append("feedback", this.textArea);

      fetch("feedback.php", {
        method: "post",
        body: formData,
      });
      this.textArea = "";
      this.$store.commit("setShowPopupForm", false);
      alert("Мы благодарны Вам за Ваше мнение.");
    },
  },
};
</script>

<style lang="scss" scoped>
.popup {
  position: fixed;
  bottom: 0;
  right: 0;
  left: 0;
  padding: 1rem;
  background-color: white;
  z-index: 3;
  box-shadow: 0 0 25px rgba(0, 0, 0, 0.3);
  width: calc(min(400px, 100%));
}

.popup-inner {
  display: flex;
  flex-direction: column;
  gap: 0.5rem;
}

.close {
  position: absolute;
  right: 1rem;
  top: 1rem;
  cursor: pointer;
}

@media (min-width: 768px) {
  .popup {
    position: fixed;
    bottom: 1rem;
    right: 1rem;
    left: initial;
    padding: 1rem;
    background-color: white;
    z-index: 3;
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.3);
    width: calc(min(400px, 100%));
  }
}
</style>