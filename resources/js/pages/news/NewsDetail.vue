<template>
  <div class="container">
    <template v-if="display">
      <article class="article-wrapper">
        <div class="article-header">
          <h1>{{ news.title }}</h1>
          <div>
            <span class="text-muted">{{ news.date }}</span>
          </div>
        </div>
        <div class="mb-2">
          <img class="img-fluid w-100" :src="news.url" alt="見出し" />
        </div>
        <div class="article-body">
          <div class="btn-group w-100 mb-3">
            <button @click="tab = 1" type="button"
              class="btn btn-outline-dark rounded-0" :class="{'active': tab === 1}">内容</button>
            <button @click="tab = 2" type="button"
              class="btn btn-outline-dark rounded-0" :class="{'active': tab === 2}">コメント({{ news.comments.length }})</button>
          </div>
          <NewsContent :news="news" v-show="tab === 1"></NewsContent>
          <NewsComment @addcomment="addComment" :id="id" :commentList="news.comments" v-show="tab === 2"></NewsComment>
        </div>
      </article>
    </template>
    <template v-else>
      <Loading></Loading>
    </template>
  </div>
</template>

<script>
import NewsContent from '../../components/news/NewsContent.vue'
import NewsComment from '../../components/news/NewsComment.vue'
import Loading from '../../components/Loading.vue'

export default {
  components: {
    NewsContent,
    NewsComment,
    Loading
  },
  props: {
    id: {
      required: true,
      type: Number
    }
  },
  data() {
    return {
      tab: 1,
      news: { comments: []},
      display: false
    }
  },
  methods: {
    addComment(newComment) {
      this.news.comments.unshift(newComment)
    }
  },
  created() {
    this.display = false
    axios.get('/api/news/'+this.id)
      .then(res => {
        this.news = res.data
        this.display = true
    })
  }
};
</script>