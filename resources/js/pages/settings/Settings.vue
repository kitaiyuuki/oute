<template>
  <div class="container">
    <h2 class="page-title">設定</h2>
    <template v-if="isLogin">
      <div class="mb-2">
        <p class="lead text-truncate text-center font-weight-bold mb-0">{{ username }}</p>
      </div>
      <div class="row mb-2">
        <div class="col">
          <hr />
        </div>
        <h3 class="col-auto align-middle mb-0">お気に入り</h3>
        <div class="col">
          <hr />
        </div>
      </div>
      <div class="list-group mb-2">
        <router-link
          to="/competition/favorite"
          class="list-group-item list-group-item-action rounded-0 icon-list"
        >
          <div class="list-group-icon-box settings-icon-box">
            <span class="list-group-icon competition-icon"></span>
          </div>
          <span>大会</span>
          <span class="badge badge-secondary badge-pill settings-badge">{{ user.competition_count }}</span>
        </router-link>
        <router-link
          to="/player/favorite"
          class="list-group-item list-group-item-action rounded-0 icon-list"
        >
          <div class="list-group-icon-box settings-icon-box">
            <span class="list-group-icon player-icon"></span>
          </div>
          <span>棋士</span>
          <span class="badge badge-secondary badge-pill settings-badge">{{ user.player_count }}</span>
        </router-link>
      </div>
      <div class="row mb-2">
        <div class="col">
          <hr />
        </div>
        <h3 class="col-auto align-middle mb-0">履歴</h3>
        <div class="col">
          <hr />
        </div>
      </div>
      <div class="list-group mb-2">
        <router-link to="/history" class="list-group-item list-group-item-action rounded-0 icon-list">
          <div class="list-group-icon-box settings-icon-box">
            <span class="list-group-icon history-icon"></span>
          </div>
          <span>履歴</span>
        </router-link>
      </div>
      <div class="row mb-2">
        <div class="col">
          <hr />
        </div>
        <h3 class="col-auto align-middle mb-0">アカウント管理</h3>
        <div class="col">
          <hr />
        </div>
      </div>
      <div class="list-group mb-2">
        <router-link to="/edit/username" class="list-group-item list-group-item-action rounded-0 icon-list">
          <div class="list-group-icon-box settings-icon-box">
            <span class="list-group-icon username-icon"></span>
          </div>
          <span>ユーザー名変更</span>
        </router-link>
        <router-link to="/edit/password" class="list-group-item list-group-item-action rounded-0 icon-list">
          <div class="list-group-icon-box settings-icon-box">
            <span class="list-group-icon password-icon"></span>
          </div>
          <span>パスワード変更</span>
        </router-link>
        <button
          @click="logout"
          :disabled="buttonDisabled"
          class="list-group-item list-group-item-action rounded-0 logout-button icon-list"
        >
          <div class="list-group-icon-box settings-icon-box">
            <span class="list-group-icon logout-icon"></span>
          </div>
          <span>ログアウト</span>
        </button>
        <router-link to="/delete" class="list-group-item list-group-item-action rounded-0 icon-list">
          <div class="list-group-icon-box settings-icon-box">
            <span class="list-group-icon delete-icon"></span>
          </div>
          <span>アカウント削除</span>
        </router-link>
      </div>
    </template>
    <div v-else class="row mb-2">
      <div class="col-md-6">
        <router-link to="/register" class="btn btn-secondary btn-block rounded-0 mb-2">新規登録</router-link>
      </div>
      <div class="col-md-6">
        <router-link to="/login" class="btn btn-info btn-block text-white rounded-0 mb-2">ログイン</router-link>
      </div>
    </div>
    <template v-if="buttonDisabled">
        <Loading></Loading>
    </template>
  </div>
</template>

<script>
import Loading from '../../components/LodingWide.vue'
export default {
  components: {
    Loading
  },
  data() {
    return {
      buttonDisabled: false,
      user: {},
    };
  },
  computed: {
    isLogin() {
      return this.$store.getters["auth/check"];
    },
    username() {
      return this.$store.getters["auth/username"];
    },
  },
  methods: {
    async logout() {
      this.buttonDisabled = true;
      await axios.post("/api/logout").then((res) => {
        this.$store.commit("auth/setUser", null);
        this.$store.commit('message/setContent', 'ログアウトしました。')
        this.$router.push("/");
      });
      this.buttonDisabled = false;
    },
  },
  async created() {
    if (this.isLogin) {
      await axios.get("/api/user").then((res) => {
        this.user = res.data;
      });
    }
  },
};
</script>