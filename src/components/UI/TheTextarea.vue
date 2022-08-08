<template>
  <textarea
    :value="modelValue"
    @input="this.$emit('update:modelValue', $event.target.value)"
  ></textarea>
</template>

<script>
export default {
  name: "TheTextarea",
  props: ["modelValue"],
};
</script>

<style lang="scss" scoped>
textarea {
  width: 100%;
  height: 100px;
  padding: 0.5rem;
}
</style>