<template>
  <button>
    <slot></slot>
  </button>
</template>

<script>
export default {
  name: "gen-btn-grey",
};
</script>

<style scoped>
* {
  --btn-color: #949494;
  --btn-lighten: rgb(179, 179, 179);
  --btn-darken: #535353;
}

button {
  cursor: pointer;
  z-index: 3;
  padding: 1em 2em;
  border: none;
  border-radius: 3px;
  color: #fff;
  background-color: var(--btn-color);
  transition: background-color 200ms ease-in-out;
}

button:hover {
  background-color: var(--btn-lighten);
}

button:active {
  background-color: var(--btn-darken);
}
</style>