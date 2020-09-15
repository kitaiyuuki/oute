<template>
  <div class="container">
    <h2 class="page-title">棋士</h2>
    <Search :search="search" placeholder-text="棋士を検索" @search="onSearch"></Search>
    <template v-if="display">
      <PlayerChart :player-list="playerList" @onFavorite="onFavorite"></PlayerChart>
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
import PlayerChart from "../../components/player/PlayerChart.vue"
import Loading from "../../components/Loading.vue";

export default {
  components: {
    Pagination,
    Search,
    PlayerChart,
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
      playerList: [],
      currentPage: 0,
      lastPage: 0,
      display: false,
    };
  },
  methods: {
    fetchPlayerList() {
      this.display = false;
      axios
        .get("/api/player?search=" + this.search + "&page=" + this.page)
        .then((res) => {
          this.playerList = res.data.data;
          this.currentPage = res.data.current_page;
          this.lastPage = res.data.last_page;
          this.display = true;
        });
    },
    onSearch(searchValue) {
      if (searchValue === this.search && this.page === 1) {
        return false;
      }
      this.$router.push("/player?search=" + searchValue);
    },
    onFavorite(value) {
      this.playerList = value
    }
  },
  watch: {
    $route: {
      handler() {
        this.fetchPlayerList();
      },
      immediate: true,
    },
  },
};
</script>