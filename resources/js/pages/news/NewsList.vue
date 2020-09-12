<template>
  <div class="container">
    <h2 class="page-title">最新ニュース</h2>
    <div class="btn-group w-100 mb-3">
      <router-link to="/" type="button" class="btn btn-outline-dark rounded-0 active">最新</router-link>
      <router-link to="/news/attention" type="button" class="btn btn-outline-dark rounded-0">注目</router-link>
    </div>
    <template v-if="display">
      <div v-if="newsList">
        <div class="row">
            <div v-for="news in newsList" :key="news.id" class="col-md-6">
              <News :item="news"></News>
            </div>
        </div>
      </div>
      <Pagination :current-page="currentPage" :last-page="lastPage" :path="$route.path+'?'"></Pagination>
    </template>
    <template v-else>
      <Loading></Loading>
    </template>
  </div>
</template>

<script>
import News from "../../components/news/News.vue";
import Pagination from "../../components/Pagination.vue";
import Loading from "../../components/Loading.vue"

export default {
  components: {
    News,
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
      axios.get('/api/news?page='+this.page)
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