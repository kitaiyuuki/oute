import Vue from 'vue'
import VueRouter from 'vue-router'

import store from './store'

import Login from './pages/auth/Login.vue'
import Register from './pages/auth/Register.vue'
import EditUsername from './pages/auth/EditUsername.vue'
import EditUserimage from './pages/auth/EditUserimage.vue'
import EditPassword from './pages/auth/EditPassword.vue'
import Delete from './pages/auth/Delete.vue'

import NewsList from './pages/news/NewsList.vue'
import NewsAttentionList from './pages/news/NewsAttentionList.vue'
import NewsDetail from './pages/news/NewsDetail.vue'
import NewsHistory from './pages/news/NewsHistory.vue'

import CompetitionList from './pages/competition/CompetitionList.vue'
import CompetitionDetail from './pages/competition/CompetitionDetail.vue'
import CompetitionListFavorite from './pages/competition/CompetitionListFavorite.vue'

import PlayerList from './pages/player/PlayerList.vue'
import PlayerDetail from './pages/player/PlayerDetail.vue'
import PlayerListFavorite from './pages/player/PlayerListFavorite.vue'

import Settings from './pages/settings/Settings.vue'

import NotFound from './pages/errors/NotFound.vue'

Vue.use(VueRouter)

const redirectIfAuth = next => {
  if (store.getters['auth/check']) {
    next('/')
  } else {
    next()
  }
}

const redirectIfGuest = next => {
  if (store.getters['auth/check']) {
    next()
  } else {
    next('/login')
  }
}

const redirectIfNaN = (next, data) => {
  if (isNaN(data)) {
    next('/404')
  } else {
    next()
  }
}

export default new VueRouter({
  mode: 'history',
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition
    } else {
      if (to.hash) {
        return {
          selector: to.hash
        }
      } else {
        return {
          x: 0,
          y: 0
        }
      }
    }
  },
  routes: [{
      path: '/login',
      component: Login,
      beforeEnter(to, from, next) {
        redirectIfAuth(next)
      }
    },
    {
      path: '/register',
      component: Register,
      beforeEnter(to, from, next) {
        redirectIfAuth(next)
      }
    },
    {
      path: '/edit/username',
      component: EditUsername,
      beforeEnter(to, from, next) {
        redirectIfGuest(next)
      },
    },
    {
      path: '/edit/userimage',
      component: EditUserimage,
      beforeEnter(to, from, next) {
        redirectIfGuest(next)
      }
    },
    {
      path: '/edit/password',
      component: EditPassword,
      beforeEnter(to, from, next) {
        redirectIfGuest(next)
      }
    },
    {
      path: '/delete',
      component: Delete,
      beforeEnter(to, from, next) {
        redirectIfGuest(next)
      }
    },
    {
      path: '/',
      component: NewsList,
      props: route => {
        const page = route.query.page
        return {
          page: isNaN(page) ? 1 : page * 1
        }
      }
    },
    {
      path: '/news/attention',
      component: NewsAttentionList,
      props: route => {
        const page = route.query.page
        return {
          page: isNaN(page) ? 1 : page * 1
        }
      }
    },
    {
      path: '/history',
      component: NewsHistory,
      props: route => {
        const page = route.query.page
        return {
          page: isNaN(page) ? 1 : page * 1
        }
      },
      beforeEnter(to, from, next) {
        redirectIfGuest(next)
      }
    },
    {
      path: '/news/:id',
      component: NewsDetail,
      props: route => {
        return {
          id: Number(route.params.id)
        }
      },
      beforeEnter(to, from, next) {
        redirectIfNaN(next, to.params.id)
      }
    },
    {
      path: '/competition',
      component: CompetitionList,
      props: route => {
        const page = route.query.page
        return {
          page: isNaN(page) ? 1 : page * 1,
          search: route.query.search
        }
      }
    },
    {
      path: '/competition/favorite',
      component: CompetitionListFavorite,
      props: route => {
        const page = route.query.page
        return {
          page: isNaN(page) ? 1 : page * 1
        }
      },
      beforeEnter(to, from, next) {
        redirectIfGuest(next)
      }
    },
    {
      path: '/competition/:id',
      component: CompetitionDetail,
      props: route => {
        const page = route.query.page
        return {
          page: isNaN(page) ? 1 : page * 1,
          id: Number(route.params.id)
        }
      },
      beforeEnter(to, from, next) {
        redirectIfNaN(next, to.params.id)
      }
    },
    {
      path: '/player',
      component: PlayerList,
      props: route => {
        const page = route.query.page
        return {
          page: isNaN(page) ? 1 : page * 1,
          search: route.query.search
        }
      }
    },
    {
      path: '/player/favorite',
      component: PlayerListFavorite,
      props: route => {
        const page = route.query.page
        return {
          page: isNaN(page) ? 1 : page * 1
        }
      },
      beforeEnter(to, from, next) {
        redirectIfGuest(next)
      }
    },
    {
      path: '/player/:id',
      component: PlayerDetail,
      props: route => {
        const page = route.query.page
        return {
          page: isNaN(page) ? 1 : page * 1,
          id: Number(route.params.id)
        }
      },
      beforeEnter(to, from, next) {
        redirectIfNaN(next, to.params.id)
      }
    },
    {
      path: '/settings',
      component: Settings
    },
    {
      path: '*',
      component: NotFound
    }
  ]
})
