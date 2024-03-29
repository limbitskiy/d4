<script>
import Sidebar from "@/components/Sidebar.vue";
import Cart from "@/components/Cart.vue";
import TheFooter from "@/components/TheFooter.vue";
import ThePopup from "@/components/ThePopup.vue";

export default {
  components: { Sidebar, Cart, TheFooter, ThePopup },
  computed: {
    translationsLoaded() {
      return this.$store.state.translationsLoaded;
    },
    sidebarOpen() {
      return this.$store.state.sidebarOpen;
    },
  },
  created() {
    this.$store.dispatch("fetchProducts");
    this.$store.dispatch("fetchTranslations");

    setTimeout(() => {
      this.$store.commit("setShowPopupForm", true);
    }, 3000);
  },
};
</script>

<template>
  <div v-if="translationsLoaded">
    <header id="nav" class="navigation">
      <router-link to="/">
        <div class="home-btn">
          <i class="fas fa-home"></i>
          <span class="only-desktop">{{ localize.homeBtn }}</span>
        </div>
      </router-link>

      <transition name="slide">
        <Sidebar v-if="this.$store.state.sidebarOpen">
          <Cart />
        </Sidebar>
      </transition>

      <div class="nav-right">
        <div class="header-phone">
          <i class="fa fa-mobile only-desktop" aria-hidden="true"></i>
          <a id="header-phone" href="tel:+38(050)340-35-47"
            >+38(050)340-35-47</a
          >
        </div>
        <LangSwitch />
        <hamburger @click="this.$store.dispatch('toggleSidebarOpen')" />
      </div>
    </header>

    <transition name="fade">
      <ThePopup v-if="this.showPopupForm" />
    </transition>

    <router-view :key="this.$route.path" />

    <TheFooter />
  </div>
</template>

<style lang="scss">
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;

  --hero-image: url("/images/cta-bg.jpg") center/cover no-repeat;
  --footer-image: url("/images/cta-bg-dark.jpg") center/cover no-repeat;

  --accent-color1: #2d5e90;
  --accent-color2: #ffa101;

  --nav-height: 50px;

  --grey-color: rgb(71, 71, 71);
  --medium-grey-color: #938e8e;
  --lightgrey-color: #c4c4c4;

  --font-size-08: 0.8rem;
  --font-size-13: 1.3rem;
  --font-size-15: 1.5rem;

  --font-xsmall: 0.8rem;
  --font-small: 0.9rem;
  --font-big: 1.2rem;
  --font-bigger: 1.4rem;
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: var(--grey-color);
}

a {
  color: var(--accent-color1);
  text-decoration: none;
}

ol {
  margin-left: 3vw;

  li::marker {
    font-weight: 700;
  }
}

ul {
  list-style: none;
}

header {
  position: fixed;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: white;
  box-shadow: 3px 3px 12px rgba(0, 0, 0, 0.1);
  width: 100%;
  height: var(--nav-height);
  padding: 5px 1rem;
  z-index: 10;

  .home-btn {
    display: flex;
    gap: 0.5rem;
    color: var(--accent-color2);
  }

  .header-phone {
    display: flex;
    align-items: center;

    a {
      font-size: var(--font-small);
      color: var(--black-color);

      &:hover {
        color: var(--accent-color2);
      }
    }
  }

  a {
    font-weight: bold;
    color: var(--accent-color1);

    &.router-link-exact-active {
      color: var(--accent-color2);
    }
  }

  .nav-right {
    display: flex;
    align-items: center;
  }
}

main {
  padding-top: 50px;
  min-height: 100vh;
}

.only-desktop {
  display: none;
}

.container {
  padding-inline: 1rem;
}

.small-container {
  width: 100%;
  padding-inline: 5px;
  height: 100%;
  display: grid;
  place-items: center;
  justify-items: stretch;
}

.section {
  padding: 4rem 0;
}

.padding-top-4 {
  padding-top: 4rem;
}

// .padding-bottom-4 {
//   padding-bottom: 4rem;
// }

.btn-group {
  display: flex;

  button:first-of-type {
    background-color: var(--accent-color2);
  }
}

.form-btn-group {
  justify-content: space-between;
}

.product-btn-group {
  gap: 1rem;
}

.btn-center {
  justify-content: center;
}

::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: #e9e9e9;
}

::-webkit-scrollbar-thumb {
  background: rgb(58, 58, 58);
  &:hover {
    background: rgb(90, 90, 90);
  }
}

.title-box {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1rem;
  text-align: center;
  margin-bottom: 2.5rem;
}

.section-title {
  font-size: clamp(1.8rem, calc(20px + 1vw), 3rem);
  font-weight: 500;
}

.section-subtitle {
  font-size: clamp(1rem, calc(1rem + 1vw), 1.3rem);
  width: 80%;
  line-height: 26px;
  color: var(--grey-color);
}

.product-desc {
  p {
    margin-bottom: 1rem;
  }
}

.slide-enter-active,
.slide-leave-active {
  transition: transform 0.2s ease;
}

.slide-enter-from,
.slide-leave-to {
  transform: translateX(100%);
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

@media (min-width: 768px) {
  .container {
    max-width: 1400px;
    margin-inline: auto;
    padding-inline: 0;
  }
  .small-container {
    max-width: 800px;
    margin-inline: auto;
  }

  .section-subtitle {
    width: 80%;
  }

  .only-desktop {
    display: block;
  }

  header {
    .header-phone {
      a {
        font-size: 1rem;
        margin-left: 0.5rem;
      }
    }
  }
}
</style>
