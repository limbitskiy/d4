<script>
export default {
  name: "Gallery",
  props: ["modalGallery"],
  data() {
    return {
      enlargedPicture: this.modalGallery[0],
      // modalName: "",
      // modalHeader: "",
      // modalBody: "",
      // modalFooter: "",
    };
  },
  methods: {
    enlargeThumbnail(pic) {
      this.enlargedPicture = pic;
    },
  },
};
</script>

<template>
  <div class="gallery-enlarged">
    <img :src="require('../assets/images/' + this.enlargedPicture)" />
  </div>
  <div class="gallery-thumbnails">
    <div
      v-for="(picture, index) in this.modalGallery"
      :key="index"
      class="gallery-inner"
    >
      <img
        class="thumbnail"
        :src="require('../assets/images/' + picture)"
        alt=""
        @click="enlargeThumbnail(picture)"
      />
    </div>
  </div>
</template>

<style lang="scss" scoped>
</style>