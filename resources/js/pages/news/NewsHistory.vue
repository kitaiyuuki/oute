<template>
  <div class="container">
    <h2 class="page-title">履歴</h2>
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
import NewsChart from '../../components/news/NewsChart.vue'
import Pagination from "../../components/Pagination.vue";
import Loading from '../../components/Loading.vue'

export default {
  components: {
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
    fetchNewsList() {
      this.display = false
      axios.get('/api/news/history?page='+this.page)
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
        this.fetchNewsList();
      },
      immediate: true,
    },
  },
};
</script>