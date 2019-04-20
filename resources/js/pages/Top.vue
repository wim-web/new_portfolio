<template>
  <div class="wrapper">
    <Header />
    <main>
      <router-view></router-view>
    </main>
  </div>
</template>

<script>

import Header from '../components/Header'

export default {
    components: {
        Header,
    },
}
</script>