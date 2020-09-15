<template>
  <AuthCard title="パスワード変更">
    <UserData></UserData>
    <form @submit.prevent="edit">
      <div class="form-group">
        <label for="password">現在のパスワード</label>
        <input
          type="password"
          v-model="editForm.password"
          class="form-control"
          id="password"
          placeholder="現在のパスワード"
        />
        <div v-if="editErrors.password" class="text-danger">{{ editErrors.password[0] }}</div>
      </div>
      <div class="form-group">
        <label for="new-password">新しいパスワード</label>
        <input
          type="password"
          v-model="editForm.new_password"
          class="form-control"
          id="new-password"
          placeholder="新しいパスワード"
        />
        <div v-if="editErrors.new_password" class="text-danger">{{ editErrors.new_password[0] }}</div>
      </div>
      <div class="form-group">
        <label for="new-password-confirmation">新しいパスワードを確認</label>
        <input
          type="password"
          v-model="editForm.new_password_confirmation"
          class="form-control"
          id="new-password-confirmation"
          placeholder="新しいパスワードを確認"
        />
      </div>
      <button type="submit" class="btn btn-success btn-lg btn-block" :disabled="!canEdit">変更</button>
    </form>
    <template v-if="editButtonDisabled">
      <Loading></Loading>
    </template>
  </AuthCard>
</template>

<script>
import AuthCard from "../../components/auth/AuthCard.vue";
import UserData from '../../components/auth/UserData.vue'
import Loading from "../../components/LodingWide.vue";
import { OK, UNPROCESSABLE_ENTITY } from "../../util";
export default {
  components: {
    AuthCard,
    UserData,
    Loading
  },
  data() {
    return {
      editForm: {
        password: "",
        new_password: "",
        new_password_confirmation: "",
      },
      editErrors: {
        password: [],
        new_password: [],
      },
      editButtonDisabled: false,
    };
  },
  computed: {
    canEdit() {
      return (
        this.editForm.password &&
        this.editForm.new_password &&
        this.editForm.new_password_confirmation &&
        !this.editButtonDisabled
      );
    },
  },
  methods: {
    async edit() {
      this.editButtonDisabled = true;
      const res = await axios.put("/api/user/edit/password", this.editForm);
      if (res.status === OK) {
        this.$store.commit("auth/setUser", res.data);
        this.$store.commit("message/setContent", "パスワードを変更しました。");
        this.$router.push("/settings");
      } else if (res.status === UNPROCESSABLE_ENTITY) {
        this.editErrors = res.data.errors;
      }
      this.editButtonDisabled = false;
    },
  },
};
</script>