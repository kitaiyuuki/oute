<template>
  <div class="btn-group w-100 mb-3">
    <router-link to="/" type="button" :class="{'active': tab === 1}" class="btn btn-outline-dark rounded-0">最新</router-link>
    <router-link to="/news/attention" type="button" :class="{'active': tab === 2}" class="btn btn-outline-dark rounded-0">注目</router-link>
  </div>
</template>

<script>
export default {
  props: {
    tab: {
      required: true,
      type: Number
    }
  }
}
</script>