<template>
  <div class="container">
    <h2 class="page-title">大会</h2>
    <form @submit.prevent="onSearch" class="mb-3">
      <div class="input-group mb-3">
        <input type="text" v-model="searchValue" class="form-control" placeholder="大会を検索"/>
        <div class="input-group-append">
          <button :disabled="!searchValue" type="submit" class="btn btn-secondary">検索</button>
        </div>
      </div>
    </form>
    <div v-if="search" class="text-center mb-3">「{{ search }}」を検索</div>
    <template v-if="display">
      <ul class="list-group">
        <li v-for="(competition, i) in competitionList" :key="competition.id" class="list-group-item rounded-0 icon-list">
          <router-link :to="'/competition/'+competition.id" class=" text-truncate favorite-list-link">{{ competition.name }}</router-link>
          <button type="button" @click="onFavorite(competition.id, competition.is_favorite, i)" class="list-group-icon-box favorite-button">
            <span :class="{'active': competition.is_favorite}" class="list-group-icon favorite-icon"></span>
          </button>
        </li>
      </ul>
      <Pagination :current-page="currentPage" :last-page="lastPage" :path="$route.path+'?search='+search+'&'"></Pagination>
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
      },
      search: {
        required: false,
        type: String,
        default: ''
      }
    },
    data() {
      return {
        competitionList: [],
        currentPage: 0,
        lastPage: 0,
        searchValue: '',
        display: false
      }
    },
    methods: {
      fetchCompetitionList() {
        this.display = false
        axios.get('/api/competition?search='+this.search+'&page='+this.page)
          .then(res => {
            this.competitionList = res.data.data
            this.currentPage = res.data.current_page
            this.lastPage = res.data.last_page
            this.display = true
        })
      },
      onSearch() {
        if (!this.searchValue) {
          return false
        }
        if (this.searchValue === this.search && this.page === 1) {
          return false
        }
        this.$router.push('/competition?search='+this.searchValue)
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
          this.notFavorite(id, i)
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