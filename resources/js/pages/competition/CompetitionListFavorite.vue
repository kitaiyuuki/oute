<template>
  <div class="container">
    <h2 class="page-title">お気に入りの大会</h2>
    <template v-if="display">
      <ul class="list-group">
        <li v-for="(competition, i) in competitionList" :key="competition.id" class="list-group-item rounded-0 icon-list">
          <router-link :to="'/competition/'+competition.id" class=" text-truncate favorite-list-link">{{ competition.name }}</router-link>
          <button type="button" @click="onFavorite(competition.id, competition.is_favorite, i)" class="list-group-icon-box favorite-button">
            <span :class="{'active': competition.is_favorite}" class="favorite-icon list-group-icon"></span>
          </button>
        </li>
      </ul>
      <Pagination :current-page="currentPage" :last-page="lastPage" :path="$route.path+'?'"></Pagination>
    </template>
    <template v-else>
      <Loading></Loading>
    </template>
  </div>
</template>

<script>
import Pagination from '../../components/Pagination.vue'
import Loading from '../../components/Loading.vue'

export default {
    components: {
        Pagination,
        Loading
    },
    props: {
      page: {
        required: false,
        type: Number,
        default: 1
      }
    },
    data() {
      return {
        competitionList: [],
        currentPage: 0,
        lastPage: 0,
        display: false
      }
    },
    methods: {
      fetchCompetitionList() {
        this.display = false
        axios.get('/api/competition/favorite?page='+this.page)
          .then(res => {
            this.competitionList = res.data.data
            this.currentPage = res.data.current_page
            this.lastPage = res.data.last_page
            this.display = true
        })
      },
      favorite(id, i) {
        this.competitionList[i].is_favorite = true
        this.competitionList[i].favorite_count += 1
        axios.post('/api/competition/'+id+'/favorite')
      },
      notFavorite(id, i) {
        this.competitionList[i].is_favorite = false
        this.competitionList[i].favorite_count -= 1
        axios.delete('/api/competition/'+id+'/favorite')
      },
      onFavorite(id, is_favorite, i) {
        if (!this.$store.getters['auth/check']) {
          alert('お気に入り機能を使うにはログインしてください。')
          return false
        }
        if (is_favorite) {
          this.notFavorite(id, i);
        } else {
          this.favorite(id, i)
        }
      }
    },
    watch: {
      $route: {
        handler() {
          this.fetchCompetitionList()
        },
        immediate: true
      }
    }
}
</script>