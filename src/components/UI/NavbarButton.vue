<template>
  <button>
    <slot></slot>
  </button>
</template>

<script>
export default {
  name: "nav-btn",
};
</script>

<style scoped>
* {
  --orange-btn: rgb(231, 162, 33);
  --orange-btn-darken: rgb(124, 89, 25);
  --orange-btn-lighten: rgb(255, 187, 61);

  --grey-btn: #bdbdbd;
  --grey-btn-darken: #909090;
  --grey-btn-dark: #494949;
}

/* buttons */

button {
  cursor: pointer;
  z-index: 3;
  padding: 12px;
  border: none;
  border-radius: 3px;
  color: #fff;
  background-color: var(--grey-btn);
  transition: background-color 200ms ease-in-out;
}

button:hover {
  background-color: var(--grey-btn-darken);
}

button:active {
  background-color: var(--grey-btn-dark);
}

button.btn-orange {
  background-color: var(--orange-btn);
}

button.btn-orange:hover {
  background-color: var(--orange-btn-lighten);
}

button.btn-orange:active {
  background-color: var(--orange-btn-darken);
}
</style>