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
        <button
          type="button"
          class="btn-close"
          @click="close"
          aria-label="Close modal"
        >
          <i class="fas fa-times"></i>
        </button>
        <div class="modal-title">
          <slot name="name">Default product name</slot>
        </div>
        <div class="modal-gallery">
          <slot name="gallery"></slot>
        </div>
        <div class="modal-desc">
          <slot name="desc"> This is the default full description</slot>
        </div>
        <div class="modal-props">
          <slot name="props">These are the default props</slot>
        </div>
        <div class="modal-related">
          <slot name="related">These are the default related products</slot>
        </div>
      </div>
    </div>
  </transition>
</template>

<style lang="scss" scoped>
h3 {
  text-align: center;
  margin-bottom: 1.5rem;
}

.btn-close {
  position: absolute;
  top: 0.5rem;
  right: 0.5rem;
  border: none;
  font-size: 1.3rem;
  padding: 0 5px;
  cursor: pointer;
  font-weight: bold;
  color: var(--grey-general);
  background: transparent;
  &:hover {
    color: black;
  }
}

.modal-backdrop {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(255, 255, 255, 0.65);
  display: grid;
}

.modal {
  display: grid;
  gap: 1.5rem;
  grid-template:
    "title"
    "gallery"
    "desc"
    "props"
    "related" / 1fr;
  background: #ffffff;
  overflow-x: auto;
  margin-block: 3rem 0;
  padding: 1rem;
  position: relative;
  height: auto;
  // -ms-overflow-style: none; /* IE and Edge */
  // scrollbar-width: none; /* Firefox */

  // &::-webkit-scrollbar {
  //   display: none;
  // }
}

.modal-title {
  grid-area: title;
  font-size: var(--font-big);
  font-weight: 600;
  text-align: center;
  margin-bottom: 0.5rem;
}

.modal-gallery {
  grid-area: gallery;
}

.modal-desc {
  grid-area: desc;
}

.modal-props {
  grid-area: props;
}

.modal-related {
  grid-area: related;
}

.modal-fade-enter,
.modal-fade-leave-to {
  opacity: 0;
}

.modal-fade-enter-active,
.modal-fade-leave-active {
  transition: opacity 0.1s ease;
}

@media (min-width: 500px) {
  .modal {
    box-shadow: 2px 2px 20px 3px rgb(0 0 0 / 30%);
    margin-inline: 10%;
    margin-block: 4.2rem 1rem;
  }
}

@media (min-width: 850px) {
  .modal-backdrop {
    place-items: center;
  }

  .modal {
    grid-template:
      "title title"
      "gallery desc"
      "gallery props"
      "related related" / 1fr 2fr;
    max-height: 80vh;
    width: 90vw;
  }
}
</style>