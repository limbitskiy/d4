<template>
  <main>
    <div class="cta">
      <div class="cta-text">
        <h1>
          {{ localize.jTitle }}
        </h1>
        <p>{{ localize.jSubtitle1 }}</p>
      </div>
      <img src="/images/polihim4001.jpg" />
    </div>

    <div class="container">
      <div class="padding-top-4">
        <Catalog
          v-if="productsLoaded"
          :products="this.products"
          :size="(size = 'small')"
          >Каталог</Catalog
        >
      </div>
      <!-- <div>
        <Catalog
          v-if="productsLoaded"
          :products="this.secondCatalog"
          :size="(size = 'big')"
          >{{ localize.readyChoices }}</Catalog
        >
      </div> -->
    </div>

    <div class="section">
      <div class="title-box">
        <h2 class="section-title">
          {{ localize.aboutTitle }}
        </h2>
        <p class="section-subtitle">
          {{ localize.aboutSubtitle }}
        </p>
      </div>
      <div class="about-body">
        <AboutItem :image="'/images/about1.jpg'">
          {{ localize.about1 }}
        </AboutItem>
        <AboutItem :image="'/images/about2.jpg'">
          {{ localize.about2 }}
        </AboutItem>
        <AboutItem :image="'/images/about3.jpg'">
          {{ localize.about3 }}
        </AboutItem>
      </div>
    </div>

    <div class="w-body">
      <WhyusItem :icon="'/images/w-icon1.png'" bgColor="#2d5e904a">
        <template v-slot:title>{{ localize.wOneTitle }}</template>
        <template v-slot:body>{{ localize.wOneDesc }}</template>
      </WhyusItem>

      <WhyusItem :icon="'/images/w-icon2.png'" bgColor="#ffa10145">
        <template v-slot:title>{{ localize.wTwoTitle }}</template>
        <template v-slot:body>{{ localize.wTwoDesc }}</template>
      </WhyusItem>

      <WhyusItem :icon="'/images/w-icon3.png'" bgColor="#2d5e904a">
        <template v-slot:title>{{ localize.wThreeTitle }}</template>
        <template v-slot:body>{{ localize.wThreeDesc }}</template>
      </WhyusItem>
    </div>
  </main>
</template>

<script>
import Catalog from "@/components/Catalog.vue";
import AboutItem from "@/components/AboutItem.vue";
import WhyusItem from "@/components/WhyusItem.vue";

export default {
  name: "Main",
  components: { Catalog, AboutItem, WhyusItem },
  computed: {
    productsLoaded() {
      return this.$store.state.productsLoaded;
    },
    products() {
      return this.$store.state.products;
    },
  },
};
</script>

<style lang="scss" scoped>
.cta {
  display: grid;
  place-items: center;
  padding: 3rem 0;
  color: white;
  text-align: center;

  h1 {
    font-size: clamp(1.5rem, calc(1.5rem + 2vw), 3rem);
    color: var(--grey-color);
    max-width: min-content;
    line-height: 3rem;
    background-color: white;
    padding: 2rem;
    border-top: 2px solid #222;
    border-bottom: 2px solid #222;
  }

  li {
    font-size: clamp(1rem, calc(1rem + 1vw), 1.5rem);
    font-weight: 500;
    line-height: 2rem;
  }

  img {
    display: none;
  }

  p {
    color: #222;
    font-size: clamp(1rem, calc(1rem + 1vw), 1.5rem);
    font-weight: 500;
    line-height: 2rem;
    margin-top: 1rem;
  }
}

.about-body {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  gap: 2rem;

  > p {
    max-width: 50vw;
  }
}

.w-body {
  font-family: "Roboto", sans-serif;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

@media (min-width: 768px) {
  .cta {
    grid-template-columns: 1.5fr 1fr;
    padding: 0;

    h1 {
      max-width: 25ch;
      text-align: left;
    }

    li {
      margin-left: 4em;
      line-height: 2.6rem;
    }

    img {
      display: block;
      width: 100%;
      object-fit: cover;
      padding: 3rem;
    }
  }

  .w-body {
    flex-direction: row;
  }
}
</style>