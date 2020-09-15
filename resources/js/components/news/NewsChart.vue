<template>
  <div class="row">
    <div v-for="news in newsList" :key="news.id" class="col-md-6">
      <News :item="news"></News>
    </div>
  </div>
</template>

<script>
import News from './News.vue'
export default {
  components: {
    News
  },
  props: {
    newsList: {
      required: false,
      type: Array,
      default: []
    }
  }
}
</script>