<script>
export default {
  name: "ModalPopup",
  methods: {
    close() {
      this.$emit("close");
    },
    getClickTarget(e) {
      if (e.srcElement.classList.contains("modal-backdrop")) {
        this.$emit("close");
      }
    },
  },
};
</script>

<template>
  <transition name="modal-fade">
    <div class="modal-backdrop" @click="getClickTarget">
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
  background-color: rgba(255, 255, 255, 0.596);
  display: grid;
}

.modal {
  background: #ffffff;
  overflow-x: auto;
  margin: 50px 0;
  padding: 1rem;
  height: calc(100vh - 50px);
  -ms-overflow-style: none; /* IE and Edge */
  scrollbar-width: none; /* Firefox */

  &::-webkit-scrollbar {
    display: none;
  }
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
  font-size: 1.7rem;
  padding: 0 5px;
  cursor: pointer;
  font-weight: bold;
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

@media (min-width: 450px) {
  .modal {
    box-shadow: 2px 2px 20px 3px rgb(0 0 0 / 30%);
    margin-inline: 10%;
  }
}

@media (min-width: 850px) {
  .modal-backdrop {
    place-items: center;
  }

  .modal {
    border-radius: 1rem;

    height: auto;
  }

  .modal-body {
    grid-template-columns: 1fr 2fr;
  }
}
</style>