<template>
  <button>
    <slot></slot>
  </button>
</template>

<script>
export default {
  name: "gen-btn",
};
</script>

<style scoped>
* {
  --btn-color: #27a92c;
  --btn-lighten: rgb(50, 199, 55);
  --btn-darken: rgb(24, 122, 27);
}

button {
  cursor: pointer;
  /* z-index: 3; */
  padding: 0.8em 2em;
  border: none;
  border-radius: 0.6rem;
  color: #fff;
  background-color: var(--btn-color);
  font-weight: 600;
  transition: background-color 200ms ease-in-out;
}

button:hover {
  background-color: var(--btn-lighten);
}

button:active {
  background-color: var(--btn-darken);
}
</style>