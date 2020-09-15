<template>
  <AuthCard title="新規登録">
    <p>
      <router-link to="/login" class="auth-link">ログインはこちらから</router-link>
    </p>
    <form @submit.prevent="register">
      <div class="form-group">
        <label for="username">ユーザー名</label>
        <input
          type="text"
          v-model="registerForm.name"
          class="form-control"
          id="username"
          placeholder="ユーザー名"
        />
        <div v-if="registerErrors.name" class="text-danger">{{ registerErrors.name[0] }}</div>
      </div>
      <div class="form-group">
        <label for="email">メールアドレス</label>
        <input
          type="text"
          v-model="registerForm.email"
          class="form-control"
          id="email"
          placeholder="メールアドレス"
        />
        <div v-if="registerErrors.email" class="text-danger">{{ registerErrors.email[0] }}</div>
      </div>
      <div class="form-group">
        <label for="password">パスワード</label>
        <input
          type="password"
          v-model="registerForm.password"
          class="form-control"
          id="password"
          placeholder="パスワード"
        />
        <div v-if="registerErrors.password" class="text-danger">{{ registerErrors.password[0] }}</div>
        <small class="form-text text-muted">パスワードは8文字以上にしてください。</small>
      </div>
      <div class="form-group">
        <label for="password-confirmation">パスワード確認</label>
        <input
          type="password"
          v-model="registerForm.password_confirmation"
          class="form-control"
          id="password_confirmation"
          placeholder="パスワードを確認"
        />
      </div>
      <button type="submit" class="btn btn-success btn-lg btn-block" :disabled="!canRegister">登録</button>
    </form>
    <template v-if="registerButtonDisabled">
      <Loading></Loading>
    </template>
  </AuthCard>
</template>

<script>
import AuthCard from "../../components/auth/AuthCard.vue";
import Loading from "../../components/LodingWide.vue";
import {CREATED, UNPROCESSABLE_ENTITY} from '../../util'
export default {
  components: {
    AuthCard,
    Loading,
  },
  data() {
    return {
      registerForm: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
      registerErrors: {
        name: [],
        email: [],
        password: [],
      },
      registerButtonDisabled: false,
    };
  },
  computed: {
    canRegister() {
      return (
        this.registerForm.name &&
        this.registerForm.email &&
        this.registerForm.password &&
        this.registerForm.password_confirmation &&
        !this.registerButtonDisabled
      );
    },
  },
  methods: {
    async register() {
      this.registerButtonDisabled = true;
      const res = await axios.post("/api/register", this.registerForm);
      if (res.status === CREATED) {
        this.$store.commit("auth/setUser", res.data);
        this.$store.commit("message/setContent", "登録に成功しました。");
        this.$router.push("/");
      } else if (res.status === UNPROCESSABLE_ENTITY) {
        this.registerErrors = res.data.errors;
      }
      this.registerButtonDisabled = false;
    },
  },
};
</script>