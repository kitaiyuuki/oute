<template>
  <div class="container">
    <h2 class="page-title">大会</h2>
    <Search :search="search" placeholder-text="大会を検索" @search="onSearch"></Search>
    <template v-if="display">
      <CompetitionChart :competition-list="competitionList" @onFavorite="onFavorite"></CompetitionChart>
      <Pagination
        :current-page="currentPage"
        :last-page="lastPage"
        :path="$route.path+'?search='+search+'&'"
      ></Pagination>
    </template>
    <template v-else>
      <Loading></Loading>
    </template>
  </div>
</template>

<script>
import Pagination from "../../components/Pagination.vue";
import Search from "../../components/Search.vue";
import CompetitionChart from "../../components/competition/CompetitionChart.vue"
import Loading from "../../components/Loading.vue";

export default {
  components: {
    Pagination,
    Search,
    CompetitionChart,
    Loading
  },
  props: {
    page: {
      required: false,
      type: Number,
      default: 1,
    },
    search: {
      required: false,
      type: String,
      default: "",
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
      axios
        .get("/api/competition?search=" + this.search + "&page=" + this.page)
        .then((res) => {
          this.competitionList = res.data.data;
          this.currentPage = res.data.current_page;
          this.lastPage = res.data.last_page;
          this.display = true;
        });
    },
    onSearch(searchValue) {
      if (searchValue === this.search && this.page === 1) {
        return false;
      }
      this.$router.push("/competition?search=" + searchValue);
    },
    onFavorite(value) {
      this.competitionList = value
    }
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