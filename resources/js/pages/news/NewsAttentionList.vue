<template>
  <div class="container">
    <h2 class="page-title">注目ニュース</h2>
    <NewsListTab :tab="2"></NewsListTab>
    <template v-if="display">
      <NewsChart :newsList="newsList"></NewsChart>
      <Pagination :current-page="currentPage" :last-page="lastPage" :path="$route.path+'?'"></Pagination>
    </template>
    <template v-else>
      <Loading></Loading>
    </template>
  </div>
</template>

<script>
import News from "../../components/news/News.vue"
import NewsListTab from '../../components/news/NewsListTab.vue'
import NewsChart from '../../components/news/NewsChart.vue'
import Pagination from "../../components/Pagination.vue"
import Loading from '../../components/Loading.vue'

export default {
  components: {
    News,
    NewsListTab,
    NewsChart,
    Pagination,
    Loading
  },
  props: {
    page: {
      required: false,
      type: Number,
      default: 1,
    },
  },
  data() {
    return {
      newsList: [],
      currentPage: 0,
      lastPage: 0,
      display: false
    };
  },
  methods: {
    fetchNews() {
      this.display = false
      axios.get('/api/news/attention?page='+this.page)
        .then(res => {
          this.newsList = res.data.data;
          this.currentPage = res.data.current_page;
          this.lastPage = res.data.last_page;
          this.display = true
      })
    },
  },
  watch: {
    $route: {
      handler() {
        this.fetchNews();
      },
      immediate: true,
    },
  },
};
</script>