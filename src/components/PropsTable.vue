<script>
export default {
  name: "PropsTable",
  props: ["modalProps"],
};
</script>

<template>
  <table class="props-table">
    <tr>
      <th colspan="2">Характеристики</th>
    </tr>
    <tr v-for="(propkey, propvalue, index) in this.modalProps" :key="index">
      <td>{{ propvalue }}</td>
      <td>{{ propkey }}</td>
    </tr>
  </table>
</template>

<style lang="scss" scoped>
.props-table {
  font-family: "Noto Sans", Arial, sans-serif;
  font-size: 14px;
  width: 100%;
  border-collapse: collapse;
  table-layout: fixed;
  border: 1px solid #e8e8e8;
  th {
    padding: 5px;
    text-align: left;
    font-weight: normal;
    background: #e5e2e2;
  }
  td {
    width: 50%;
    padding: 5px;
    border-top: 1px #e5e5e5 solid;
    word-break: break-all;
    &:first-child {
      border-right: 1px #e5e5e5 solid;
    }
  }
}
</style>