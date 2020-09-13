<template>
  <div>
    <div class="mb-2 article-box">
      <template v-if="article">
        <div v-html="article"></div>
      </template>
      <template v-else>
        <Loading></Loading>
      </template>
    </div>
    <div class="row article-data-row">
      <div class="col-2">
        <div class="article-data-title">大会</div>
      </div>
      <div class="col-10">
        <span v-for="competition in news.competitions" :key="competition.id" class="article-data">
          <router-link :to="'/competition/'+competition.id">{{ competition.name }}</router-link>
        </span>
      </div>
    </div>
    <div class="row article-data-row">
      <div class="col-2">
        <div class="article-data-title">棋士</div>
      </div>
      <div class="col-10">
        <span v-for="player in news.players" :key="player.id" class="article-data">
          <router-link :to="'/player/'+player.id">{{ player.name }}</router-link>
        </span>
      </div>
    </div>
  </div>
</template>

<script>
import Loading from '../Loading.vue'

export default {
  components: {
    Loading
  },
  props: {
    news: {
      required: true,
      type: Object,
    },
  },
  data() {
    return {
      article: ''
    }
  },
  created() {
    axios.get('/api/news/article/' + this.news.id)
      .then(res => {
        this.article = res.data
      })
  }

};
</script>