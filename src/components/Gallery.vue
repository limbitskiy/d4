<script>
export default {
  name: "Gallery",
  props: ["modalGallery"],
  data() {
    return {
      enlargedPicture: this.modalGallery[0],
    };
  },
  methods: {
    enlargeThumbnail(pic) {
      const currentPic = document.querySelector(".gallery-enlarged>img");
      setTimeout(() => {
        this.enlargedPicture = pic;
        currentPic.classList.toggle("fade");
      }, 300);
      currentPic.classList.toggle("fade");
    },
  },
};
</script>

<template>
  <div class="gallery-enlarged">
    <img :src="'/images/' + this.enlargedPicture" />
  </div>
  <div class="gallery-thumbnails">
    <div
      v-for="(picture, index) in this.modalGallery"
      :key="index"
      class="gallery-inner"
    >
      <img
        class="thumbnail"
        :src="'/images/' + picture"
        alt=""
        @click="enlargeThumbnail(picture)"
      />
    </div>
  </div>
</template>

<style lang="scss" scoped>
.fade {
  opacity: 0;
}

.gallery-thumbnails {
  display: grid;
  gap: 5px;
  grid-auto-flow: column;
}

.gallery-enlarged {
  display: grid;
  place-items: center;

  img {
    transition: opacity 0.3s ease;
  }
}

.thumbnail {
  width: 100%;
  border-radius: 0.3rem;
  border: 1px solid rgb(221, 221, 221);
  cursor: pointer;
  transition: border-color 0.2s ease;

  &:hover {
    opacity: 0.5;
    border-color: var(--accent-green);
  }
}
</style>