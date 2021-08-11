<template>
  <v-app>
    <Navbar/>
    <v-main class="mx-4 mb-4">
      <router-view />
    </v-main>
  </v-app>
</template>

<script>
export default {
  name: "app",
  components: {
    Navbar: () => import("./Components/Navbar.vue"),
  },
};
</script>