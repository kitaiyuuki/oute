<template>
  <div>
      <form @submit.prevent="onSearch" class="mb-3">
        <div class="input-group">
          <input type="text" v-model="searchValue" class="form-control" :placeholder="placeholderText" />
          <div class="input-group-append">
            <button :disabled="!searchValue" class="btn btn-secondary" type="submit">検索</button>
          </div>
        </div>
      </form>
      <div v-if="search" class="text-center mb-3">「{{search}}」を検索</div>
  </div>
</template>

<script>
export default {
  props: {
    search: {
      required: false,
      type: String,
      default: "",
    },
    placeholderText: {
        required: false,
        type: String,
        default: 'キーワードを検索'
    }
  },
  data() {
      return {
          searchValue: ''
      }
  },
  methods: {
    onSearch() {
        if (!this.searchValue) {
            return false;
        }
        this.$emit('search', this.searchValue)
    }
  }
};
</script>