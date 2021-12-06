<script>
import Catalog from "./Catalog.vue";
import { translationsArray } from "@/language/MainComponent.js";

export default {
  data() {
    return {
      translation: translationsArray,
    };
  },
  props: ["products", "currentLang"],
  emits: ["addToCart", "openModalPopup"],
  components: { Catalog },
  created() {},
};
</script>

<template>
  <div class="container">
    <div class="jumbotron">
      <div class="cta">
        <h1>
          {{ this.translation[this.currentLang].ctaTitle }}
        </h1>
        <span>{{ this.translation[this.currentLang].ctaSubTitle }}</span>
      </div>
      <img src="/images/jumbotron.png" />
    </div>
    <h3 class="subtitle">Каталог</h3>
    <catalog
      :products="products"
      :currentLang="currentLang"
      @addToCart="this.$emit('addToCart', $event)"
      @openModalPopup="this.$emit('openModalPopup', $event)"
    />
    <section class="about">
      <h3 class="subtitle">
        {{ this.translation[this.currentLang].aboutTitle }}
      </h3>
      <div class="about-body">
        <p>
          {{ this.translation[this.currentLang].aboutBody }}
        </p>
        <img src="/images/about.jpg" alt="" />
      </div>
    </section>
    <section class="why-us">
      <h3 class="subtitle">
        {{ this.translation[this.currentLang].whyUsTitle }}
      </h3>
      <div class="why-us-items">
        <div class="why-us-item">
          <img src="/images/factory.svg" alt="" />
          <div class="why-us-desc">
            {{ this.translation[this.currentLang].whyUsOneTitle }}<br />
            <span>{{ this.translation[this.currentLang].whyUsOneDesc }}</span>
          </div>
        </div>

        <div class="why-us-item">
          <img src="/images/thumb.png" alt="" />
          <div class="why-us-desc">
            {{ this.translation[this.currentLang].whyUsTwoTitle }}<br />
            <span>{{ this.translation[this.currentLang].whyUsTwoDesc }}</span>
          </div>
        </div>

        <div class="why-us-item">
          <img src="/images/cash.png" alt="" />
          <div class="why-us-desc">
            {{ this.translation[this.currentLang].whyUsThreeTitle }}<br />
            <span>{{ this.translation[this.currentLang].whyUsThreeDesc }}</span>
          </div>
        </div>

        <div class="why-us-item">
          <img src="/images/flask.png" alt="" />
          <div class="why-us-desc">
            {{ this.translation[this.currentLang].whyUsFourTitle }}<br />
            <span>{{ this.translation[this.currentLang].whyUsFourDesc }}</span>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<style lang="scss" scoped>
/* other */

* {
  padding: 0;
  margin: 0;

  --item-border: 1px solid rgb(187, 187, 187);
  --grey-text: rgb(80, 80, 80);
}

section {
  padding: 5em 0;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
}

.subtitle {
  text-align: center;
  margin-bottom: 1.2em;
  font-weight: 500;
  font-size: 2.3rem;
  color: var(--grey-text);
  position: relative;

  &:after {
    content: "";
    width: 8rem;
    height: 3px;
    background-color: var(--grey-text);
    position: absolute;
    bottom: -0.4rem;
    left: 50%;
    transform: translateX(-50%);
  }
}

/* jumbotron */

.jumbotron {
  display: grid;
  grid-template-columns: 1fr 1fr;
  place-items: center;
  gap: 4rem;
  padding-top: 80px;

  h1 {
    font-size: clamp(1.8rem, 4vw, 2.5rem);
    margin-bottom: 0.5rem;
  }

  span {
    font-size: clamp(1.2rem, 3vw, 1.5rem);
    font-weight: 400;
  }

  img {
    max-height: 500px;
  }
}

.cta {
  width: 60%;
}

/* about */

.about-body {
  display: grid;
  grid-template-columns: 1fr 1fr;
  align-items: center;
  justify-items: center;
  grid-gap: 3em;

  > p {
    line-height: 1.5em;
  }

  img {
    max-height: 350px;
  }
}

/* why us */

.why-us-items {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 3em;
  justify-content: center;
}

.why-us-item {
  border: var(--item-border);
  border-radius: 5px;
  text-align: center;
  padding: 30px;
  background-color: #fff;

  > img {
    width: 80px;
    height: 80px;
    margin: 10px 0;
  }
}

.why-us-desc {
  font-weight: 600;
  text-align: center;

  > span {
    font-weight: 400;
  }
}

/* media */

@media (max-width: 1200px) {
  .container {
    width: 100%;
  }

  .why-us-items {
    grid-template-columns: repeat(2, 300px);
  }
}

@media (max-width: 1000px) {
  .about-body {
    grid-template-columns: 1fr;
    grid-gap: 1em;
    padding: 1em;

    img {
      object-fit: contain;
      width: 100%;
    }
  }
}

@media (max-width: 850px) {
  .jumbotron {
    grid-template-columns: 1fr;
    padding-top: 180px;
    padding-bottom: 140px;

    img {
      display: none;
    }
  }
}

@media (max-width: 660px) {
  .why-us-items {
    grid-template-columns: 300px;
  }

  .cta {
    width: 80%;
  }

  section {
    padding: 2em 0;
  }
}
</style>