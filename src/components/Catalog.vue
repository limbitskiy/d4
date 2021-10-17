<template>
  <section class="product-catalog">
    <h3 class="subtitle">Каталог</h3>
    <!-- <span @click="scrollCatalog('left')" class="catalog-arrow left-chevron"
      ><svg
        aria-hidden="true"
        focusable="false"
        data-prefix="fas"
        data-icon="chevron-left"
        class="svg-inline--fa fa-chevron-left fa-w-10"
        role="img"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 320 512"
      >
        <path
          fill="currentColor"
          d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"
        ></path></svg
    ></span>
    <span @click="scrollCatalog('right')" class="catalog-arrow right-chevron"
      ><svg
        aria-hidden="true"
        focusable="false"
        data-prefix="fas"
        data-icon="chevron-right"
        class="svg-inline--fa fa-chevron-right fa-w-10"
        role="img"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 320 512"
      >
        <path
          fill="currentColor"
          d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
        ></path></svg
    ></span> -->
    <!-- <div class="catalog-overflow"> -->
    <div class="catalog">
      <div
        v-for="(product, index) in products"
        :key="index"
        class="product-card"
      >
        <img :src="product.image" alt="" />
        <h3 class="product-name">{{ product.name[currentLang] }}</h3>
        <div class="price-wrap">
          <span class="product-subtitle">{{
            this.translations[this.currentLang].price
          }}</span>
          <span class="product-price">{{ product.price }}грн</span>
        </div>
        <div class="product-desc">
          <p class="product-subtitle">
            {{ this.translations[this.currentLang].description }}
          </p>
          <p class="product-desc">{{ product.desc[currentLang] }}</p>
        </div>
        <gen-btn @click="this.$emit('addToCart', product)" class="to-cart-btn">
          В корзину
        </gen-btn>
      </div>
    </div>
    <!-- </div> -->
  </section>
</template>

<script>
export default {
  data() {
    return {
      catalogPosition: 0,
      translations: [
        {
          price: "Цена:",
          description: "Описание:",
        },
        {
          price: "Ціна:",
          description: "Опис:",
        },
      ],
    };
  },
  props: ["products", "currentLang"],
  emits: ["addToCart"],
  methods: {
    scrollCatalog(direction) {
      let catalog = document.querySelector(".catalog");
      console.log(this.catalogPosition);
      if (direction === "left" && this.catalogPosition !== 0) {
        this.catalogPosition += 416;
      } else if (direction === "right" && this.catalogPosition > -1248) {
        this.catalogPosition -= 416;
      }
      catalog.style.transform = "translateX(" + this.catalogPosition + "px)";
    },
  },
};
</script>

<style scoped>
/* other */
* {
  padding: 0;
  margin: 0;

  --arrow-color: rgb(120, 120, 120);
  --arrow-hover: rgb(80, 80, 80);

  --green-color: #27a92c;
  --green-color-lighten: rgb(143, 143, 143);
  --green-color-darken: rgb(38, 156, 42);
}

.subtitle {
  font-family: "Ubuntu", sans-serif;
  text-align: center;
  margin-bottom: 1.2em;
  font-weight: 400;
  font-size: 36px;
  color: var(--grey-text);
}

/* product card */

.product-catalog {
  position: relative;
}

.catalog {
  display: grid;
  grid-template-columns: repeat(3, 368px);
  grid-gap: 3em;
  /* width: 150vw; */
  transition: transform 200ms ease-in-out;
}

.catalog-overflow {
  overflow-x: hidden;
}

.product-card {
  display: grid;
  grid-auto-flow: row;
  grid-template-rows: 250px 1fr 1fr auto 2fr;
  align-items: center;
  border: 1px solid #dfdfdf;
  border-radius: 5px;
  padding: 0 1.2em;
  background-color: #fff;
  user-select: none;
  -moz-user-select: none;
}

.product-card img {
  justify-self: center;
}

.product-name {
  font-weight: 600;
  color: var(--grey-text);
}

.product-subtitle {
  font-weight: 600;
}

.price-wrap {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.product-price {
  font-size: var(--font-big);
  color: var(--green-color);
}

/* .product-desc {
  font-size: var(--font-small);
} */

.product-card button {
  justify-self: center;
}

.catalog-arrow {
  position: absolute;
  top: 50%;
  height: 30px;
  width: 30px;
  z-index: 9;
  cursor: pointer;
  color: var(--arrow-color);
  user-select: none;
  -moz-user-select: none;
}

.catalog-arrow:hover {
  color: var(--arrow-hover);
}

.left-chevron {
  left: -5em;
}

.right-chevron {
  right: -5em;
}
</style>