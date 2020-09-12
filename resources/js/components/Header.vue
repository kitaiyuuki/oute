<template>
  <div class="sticky-top">
    <header class="header">
      <nav class="navbar navbar-expand-md py-0">
        <div class="container">
          <router-link to="/" class="navbar-brand">
            <img class="img-fluid" :src="'/image/logo.png'" alt="ロゴ" />
          </router-link>
          <button
            @click="isCollapseDisplay = !isCollapseDisplay"
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbar-content"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbar-content">
            <ul class="navbar-nav">
              <li class="nav-item">
                <router-link to="/" class="nav-link">ニュース</router-link>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">大会</a>
                <div class="dropdown-menu">
                  <router-link to="/competition/1" class="dropdown-item">名人戦</router-link>
                  <router-link to="/competition/2" class="dropdown-item">竜王戦</router-link>
                  <div class="dropdown-divider d-none d-md-block"></div>
                  <router-link to="/competition" class="dropdown-item">全ての大会</router-link>
                </div>
              </li>
              <li class="nav-item">
                <router-link to="/player" class="nav-link">棋士</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/" class="nav-link">対局日程</router-link>
              </li>
              <li class="nav-item">
                <router-link to="/settings" class="nav-link">設定</router-link>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <div v-if="isCollapseDisplay" @click="collapseHidden" class="navbar-back-overlay"></div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isCollapseDisplay: false
    }
  },
  methods: {
    collapseHidden() {
      this.isCollapseDisplay = false
      $('.collapse').collapse('hide')
    }
  },
  watch: {
    $route: {
      handler() {
        this.collapseHidden()
      }
    }
  }
}
</script>