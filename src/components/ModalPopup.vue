<script>
export default {
  name: "ModalPopup",
  methods: {
    close() {
      this.$emit("close");
    },
  },
};
</script>

<template>
  <transition name="modal-fade">
    <div class="modal-backdrop">
      <div
        class="modal"
        role="dialog"
        aria-labelledby="modalTitle"
        aria-describedby="modalDescription"
      >
        <header class="modal-header">
          <slot name="name">Default product name</slot>
          <button
            type="button"
            class="btn-close"
            @click="close"
            aria-label="Close modal"
          >
            x
          </button>
        </header>

        <div class="modal-body">
          <div class="gallery">
            <!-- <slot name="big-img"></slot> -->
            <slot name="gallery"></slot>
          </div>

          <div class="modal-text">
            <div class="desc">
              <slot name="desc"> This is the default full description </slot>
            </div>

            <div class="props">
              <slot name="props">These are the default props </slot>
              <button
                type="button"
                class="btn-green"
                @click="close"
                aria-label="Close modal"
              >
                Close me!
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </transition>
</template>

<style lang="scss" scoped>
.modal-backdrop {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(0, 0, 0, 0.3);
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal {
  background: #ffffff;
  box-shadow: 2px 2px 20px 1px;
  overflow-x: auto;
  margin: 0 0.5em;
}

.modal-header {
  position: relative;
  display: flex;
  justify-content: center;
}

.modal-body {
  display: grid;
  grid-template-columns: 1fr 2fr;
}

.modal-header,
.gallery,
.desc,
.props {
  padding: 15px;
  display: flex;
}

.gallery {
  display: grid;
  grid-auto-flow: row;
  grid-template-rows: 2fr 1fr;
}

.props {
  border-top: 1px solid #eeeeee;
  flex-direction: column;
}

.desc {
  position: relative;
  padding: 20px 10px;
}

.btn-close {
  position: absolute;
  top: 0;
  right: 0;
  border: none;
  font-size: 20px;
  padding: 0 5px;
  cursor: pointer;
  font-weight: bold;
  color: var(--accent-green);
  background: transparent;
}

.btn-green {
  color: white;
  background: #4aae9b;
  border: 1px solid #4aae9b;
  border-radius: 2px;
}

.modal-fade-enter,
.modal-fade-leave-to {
  opacity: 0;
}

.modal-fade-enter-active,
.modal-fade-leave-active {
  transition: opacity 0.5s ease;
}
</style>