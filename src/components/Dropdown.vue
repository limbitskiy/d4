<template>
  <div class="dropdown-wrap">
    <slot name="cart-body"></slot>
    <slot name="cart-btn"></slot>
  </div>
</template>

<script>
export default {
  name: "Dropdown",
};
</script>

<style lang="scss" scoped>
/* other */
* {
  padding: 0;
  margin: 0;

  --grey-popup: #f3f3f3;
}

.dropdown-wrap {
  position: fixed;
  right: 2em;
  top: 100px;
  display: grid;
  z-index: 11;
  background-color: var(--grey-popup);
  list-style: none;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #dfdfdf;
  box-shadow: 3px 3px 6px rgba(0, 0, 0, 0.3);
}

@media screen and (max-width: 550px) {
  .dropdown-wrap {
    right: 5px;
    left: 5px;
    top: 55px;
    padding: 5px;
    overflow-x: hidden;
  }
}
</style>