<template>
  <div>
    <div class="mb-2 article-box">
      <NewsArticle></NewsArticle>
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
import Vue from 'vue'

export default {
  props: {
    news: {
      required: true,
      type: Object,
    },
  },
  created() {
    Vue.component('NewsArticle', () => import('./article/' + this.news.id))
  }

};
</script>