<template>
  <div class="prod-card" v-if="isMobile">
    <router-link
      :to="{
        name: 'Product',
        params: { slug: product.slug },
      }"
    >
      <img :src="'/images/' + product.gallery[0]" />
      <div class="prod-text">
        <h3 class="prod-title">
          {{ product.name[currentLang] }}
        </h3>
        <span class="prod-price" v-if="product.canBuy && product.priceForKg"
          >&#8372;{{ product.priceForKg }}
          <p class="price-comment">*{{ localize.priceForKg }}</p></span
        >
        <span
          v-else-if="this.product.canBuy && !this.product.priceForKg"
          class="prod-price"
          >&#8372;{{ this.price }}</span
        >
      </div>
    </router-link>
  </div>

  <div class="prod-card" v-else>
    <img :src="'/images/' + product.gallery[0]" />
    <div class="prod-text">
      <h3 class="prod-title">
        {{ product.name[currentLang] }}
      </h3>
      <span class="prod-price" v-if="product.canBuy && product.priceForKg"
        >&#8372;{{ product.priceForKg }}
        <p class="price-comment">*{{ localize.priceForKg }}</p></span
      >
      <span
        v-else-if="this.product.canBuy && !this.product.priceForKg"
        class="prod-price"
        >&#8372;{{ this.price }}</span
      >
      <router-link
        :to="{
          name: 'Product',
          params: { slug: product.slug, meta: product.meta },
        }"
      >
        <TheBtn>{{ localize.productDetails }}</TheBtn>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: "CatalogItem",
  props: {
    product: {
      type: Object,
      required: true,
    },
  },
  computed: {
    isMobile() {
      return innerWidth < 768;
    },
    price() {
      return Object.values(this.product.prices)[0];
    },
  },
};
</script>

<style lang="scss" scoped>
.catalog .prod-card {
  --card-shadow: 3px 3px 25px rgba(0, 0, 0, 0.2);

  box-shadow: var(--card-shadow);
  font-family: "Roboto", sans-serif;
  flex: 0 1 300px;
  text-align: center;

  button {
    margin-top: 1rem;
    opacity: 0;
  }

  img {
    width: 100%;
    height: 350px;
    object-fit: cover;
    justify-self: center;
    transition: transform 0.3s ease;
  }

  .prod-title {
    font-weight: 500;
  }

  .prod-text {
    display: flex;
    flex-direction: column;
    gap: 0.8rem;
    width: 100%;
    height: 150px;
    padding: 1rem;
    align-items: center;
    justify-content: center;
    background-color: white;
    transition: transform 0.3s ease;
  }

  .prod-price {
    font-size: var(--font-size-15);
    font-weight: 500;
    color: var(--accent-color2);
  }

  .price-comment {
    font-size: var(--font-xsmall);
    font-weight: initial;
    color: var(--medium-grey-color);
    margin-top: 0.5rem;
  }
}

.catalog-big .prod-card {
  flex: 0 1 510px;
}

@media (min-width: 768px) {
  .catalog .prod-card {
    box-shadow: none;
    overflow: hidden;
    transition: box-shadow 0.3s ease;

    button:hover {
      background-color: var(--accent-color2);
    }

    &:hover {
      box-shadow: var(--card-shadow);

      img {
        transform: scale(1.1);
      }

      .prod-text {
        transform: translateY(-50px);

        button {
          opacity: 1;
        }
      }
    }

    .prod-text {
      padding: 2.5rem 1rem 0;
    }
  }
}
</style>