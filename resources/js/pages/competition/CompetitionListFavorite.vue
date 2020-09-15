<template>
  <div class="container">
    <h2 class="page-title">お気に入りの棋士</h2>
    <template v-if="display">
      <CompetitionChart :competition-list="competitionList" @onFavorite="onFavorite"></CompetitionChart>
      <Pagination :current-page="currentPage" :last-page="lastPage" :path="$route.path+'?'"></Pagination>
    </template>
    <template v-else>
      <Loading></Loading>
    </template>
  </div>
</template>

<script>
import Pagination from "../../components/Pagination.vue";
import CompetitionChart from "../../components/competition/CompetitionChart.vue";
import Loading from "../../components/Loading.vue";

export default {
  components: {
    Pagination,
    Loading,
    CompetitionChart,
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
      competitionList: [],
      currentPage: 0,
      lastPage: 0,
      display: false,
    };
  },
  methods: {
    fetchCompetitionList() {
      this.display = false;
      axios.get("/api/competition/favorite?page=" + this.page).then((res) => {
        this.competitionList = res.data.data;
        this.currentPage = res.data.current_page;
        this.lastPage = res.data.last_page;
        this.display = true;
      });
    },
    onFavorite(value) {
      this.competitionList = value;
    },
  },
  watch: {
    $route: {
      handler() {
        this.fetchCompetitionList();
      },
      immediate: true,
    },
  },
};
</script>