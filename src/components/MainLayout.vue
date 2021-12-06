<script>
import MainContent from "@/components/MainContent.vue";
import CallbackForm from "@/components/CallbackForm.vue";
import ModalWindow from "@/components/ModalWindow.vue";
import ModalPopup from "@/components/ModalPopup.vue";
import Gallery from "@/components/Gallery.vue";
import PropsTable from "@/components/PropsTable.vue";

export default {
  components: {
    MainContent,
    CallbackForm,
    ModalWindow,
    ModalPopup,
    Gallery,
    PropsTable,
  },
  props: ["products", "cart", "currentLang", "currentComponent"],
  emits: [
    "clear-cart",
    "addToCart",
    "home-btn",
    "modal-window",
    "reset-quantity",
    "changeQuantity",
    "removeFromCart",
  ],
  data() {
    return {
      isModalVisible: false,
      modalGallery: "",
      modalProps: "",
    };
  },
  methods: {
    closeModal() {
      this.isModalVisible = false;
      window.onscroll = function () {};
    },
    openModalPopup(prod) {
      const scrollTop = document.documentElement.scrollTop;
      const scrollLeft = document.documentElement.scrollLeft;
      window.onscroll = () => {
        window.scrollTo(scrollLeft, scrollTop);
      };
      this.modalName = prod.name[this.currentLang];
      this.modalGallery = prod.gallery;
      this.enlargedPicture = this.modalGallery[0];
      this.modalProps = prod.props;
      this.modalDesc = prod.fullDesc[this.currentLang];
      this.isModalVisible = true;
    },
  },
};
</script>

<template>
  <transition name="component-fade" mode="out-in">
    <main-content
      v-if="currentComponent === 'main-content'"
      :products="products"
      :currentLang="currentLang"
      @addToCart="this.$emit('addToCart', $event)"
      @openModalPopup="openModalPopup"
    />
  </transition>
  <transition name="component-fade" mode="out-in">
    <callback-form
      v-if="currentComponent === 'callback-form'"
      :currentLang="currentLang"
      :cart="cart"
      @clear-cart="this.$emit('clear-cart')"
      @home-btn="this.$emit('home-btn')"
      @modal-window="this.$emit('modal-window')"
      @removeFromCart="this.$emit('removeFromCart', $event)"
      @changeQuantity="this.$emit('changeQuantity', $event)"
    />
  </transition>
  <transition name="component-fade" mode="out-in">
    <modal-window
      v-if="currentComponent === 'modal-window'"
      :currentLang="currentLang"
      @home-btn="this.$emit('home-btn')"
      @reset-quantity="this.$emit('reset-quantity')"
    ></modal-window>
  </transition>

  <transition name="component-fade" mode="out-in">
    <ModalPopup v-if="isModalVisible" @close="closeModal">
      <template v-slot:name>{{ this.modalName }}</template>
      <template v-slot:gallery>
        <Gallery :modalGallery="modalGallery" />
      </template>
      <template v-slot:desc>{{ this.modalDesc }}</template>
      <template v-slot:props>
        <PropsTable :modalProps="modalProps" />
      </template>
    </ModalPopup>
  </transition>
</template>

<style>
/* transitions */

.component-fade-enter-active,
.component-fade-leave-active {
  transition: opacity 0.3s ease;
}

.component-fade-enter-from,
.component-fade-leave-to {
  opacity: 0;
}
</style>