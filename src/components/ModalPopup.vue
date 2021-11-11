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
            <i class="fas fa-times"></i>
          </button>
        </header>

        <div class="modal-body">
          <div class="gallery">
            <slot name="gallery"></slot>
          </div>

          <div class="modal-text">
            <div class="desc">
              <slot name="desc"> This is the default full description </slot>
            </div>

            <div class="props">
              <slot name="props">These are the default props </slot>
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
  display: grid;
  place-items: center;
}

.modal {
  background: #ffffff;
  box-shadow: 2px 2px 20px 1px;
  overflow-x: auto;
  margin: 0 3em;
}

.modal-header {
  font-size: 16px;
  font-weight: 600;
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
  padding: 1em;
  display: flex;
}

.gallery {
  display: grid;
  grid-auto-flow: row;
  grid-template-rows: 2fr 1fr;
}

.props {
  flex-direction: column;
}

.desc {
  position: relative;
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
  padding: 3px 5px;
  color: var(--grey-general);
  background: transparent;
  &:hover {
    color: black;
  }
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