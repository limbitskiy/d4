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
  <div class="gallery">
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
  </div>
</template>

<style lang="scss" scoped>
.fade {
  opacity: 0;
}

.gallery {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  gap: 2rem;
}

.gallery-thumbnails {
  display: flex;
  justify-content: center;
  gap: 0.5rem;

  .gallery-inner {
    height: 5rem;
    width: 5rem;
    object-fit: cover;
  }
}

.gallery-enlarged {
  display: grid;
  place-items: center;

  img {
    width: 90%;
    height: auto;
    max-height: 25rem;
    object-fit: contain;
    transition: opacity 0.3s ease;
  }
}

.thumbnail {
  width: 100%;
  height: 5rem;
  border-radius: 0.3rem;
  border: 1px solid rgb(221, 221, 221);
  cursor: pointer;
  object-fit: contain;
  transition: opacity 0.2s ease;

  &:hover {
    opacity: 0.5;
  }
}
</style>