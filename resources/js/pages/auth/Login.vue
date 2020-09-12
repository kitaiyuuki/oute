<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="card rounded-0">
          <div class="card-header">
            <h3 class="text-center mb-0">ログイン</h3>
          </div>
          <div class="card-body">
            <div v-if="loginErrors" class="alert-danger">メールアドレスまたはパスワードが違います。</div>
            <p>
              <router-link to="/register" class="auth-link">新規登録はこちらから</router-link>
            </p>
            <form @submit.prevent="login">
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input
                  type="text"
                  v-model="loginForm.email"
                  class="form-control"
                  id="email"
                  placeholder="メールアドレス"
                />
              </div>
              <div class="form-group">
                <label for="password">パスワード</label>
                <input
                  type="password"
                  v-model="loginForm.password"
                  class="form-control"
                  id="password"
                  placeholder="パスワード"
                />
              </div>
              <button
                type="submit"
                class="btn btn-success btn-lg btn-block"
                :disabled="!canLogin"
              >ログイン</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <template v-if="loginButtonDisabled">
      <Loading></Loading>
    </template>
  </div>
</template>

<script>
import { OK, UNPROCESSABLE_ENTITY } from "../../util";
import Loading from '../../components/LodingWide.vue'
export default {
  components: {
    Loading
  },
  data() {
    return {
      loginForm: {
        email: "",
        password: "",
      },
      loginErrors: false,
      loginButtonDisabled: false,
    };
  },
  computed: {
    canLogin() {
      return this.loginForm.email && this.loginForm.password && !this.loginButtonDisabled
    }
  },
  methods: {
    async login() {
      this.loginButtonDisabled = true;
      const res = await axios.post("/api/login", this.loginForm);
      if (res.status === OK) {
        this.$store.commit("auth/setUser", res.data);
        this.$store.commit('message/setContent', res.data.name + ' としてログイン')
        this.$router.push("/");
      } else if (res.status === UNPROCESSABLE_ENTITY) {
        this.loginErrors = true;
      }
      this.loginButtonDisabled = false;
    },
  },
};
</script>