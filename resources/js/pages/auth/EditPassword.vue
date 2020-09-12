<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="card rounded-0">
          <div class="card-header">
            <h3 class="text-center mb-0">パスワード変更</h3>
          </div>
          <div class="card-body">
            <div class="mb-2">
                <p class="lead text-truncate text-center font-weight-bold mb-0">{{ username }}</p>
            </div>
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
          </div>
        </div>
      </div>
    </div>
    <template v-if="editButtonDisabled">
      <Loading></Loading>
    </template>
  </div>
</template>

<script>
import Loading from "../../components/LodingWide.vue";
export default {
  components: {
    Loading,
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
        new_password: []
      },
      editButtonDisabled: false,
    };
  },
  computed: {
    username() {
        return this.$store.getters['auth/username']
    },
    canEdit() {
      return (
        this.editForm.password && this.editForm.new_password && this.editForm.new_password_confirmation&& !this.editButtonDisabled
      );
    },
  },
  methods: {
    async edit() {
      this.editButtonDisabled = true;
      const res = await axios.put("/api/user/edit/password", this.editForm);
      if (res.status === 200) {
        this.$store.commit("auth/setUser", res.data);
        this.$store.commit('message/setContent', 'パスワードを変更しました。')
        this.$router.push("/settings");
      } else if (res.status === 422) {
        this.editErrors = res.data.errors;
      }
      this.editButtonDisabled = false;
    },
  },
};
</script>