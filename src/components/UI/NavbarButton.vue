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
  --green-color: #27a92c;
  --green-lighten: rgb(50, 199, 55);
  --green-darken: rgb(24, 122, 27);

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
  /* z-index: 3; */
  width: 2.6rem;
  height: 2.6rem;
  border: none;
  border-radius: 0.6rem;
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

button.btn-active {
  background-color: var(--green-color);
}

button.btn-active:hover {
  background-color: var(--green-lighten);
}

button.btn-active:active {
  background-color: var(--green-darken);
}
</style>