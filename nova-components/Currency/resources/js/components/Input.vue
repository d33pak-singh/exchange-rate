<template>
  <input
    type="number"
    class="input"
    :min="1"
    :max="Infinity"
    :value="value"
    v-on="listeners"
  >
</template>

<script>
export default {
  props: {
    value: {
      type: Number
    }
  },
  computed: {
    listeners () {
      return {
        ...this.$listeners,
        input: event => this.$emit('input', event.target.value)
      }
    }
  }
}
</script>

<style lang="scss" scoped>
.input {
    max-height: 40px;
    width: 250px;
    border: 1px solid #e9ecef;
    border-radius: 3px;
    font-size: .875rem;
    flex: 1 0;
    line-height: 1.65;
    height: 2.5em;
    margin: 0 auto;
    margin-bottom: 20px;
    padding: 0 .5rem;
    text-align: left;
    max-width: 100%;
    vertical-align: top;
    // Firefox-specific hack
    -moz-appearance: textfield;

    &::-webkit-inner-spin-button,
    &::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    &:focus {
      outline: 0;
      box-shadow: 0 0 0 0.2rem #0288d1;
    }
}
</style>
