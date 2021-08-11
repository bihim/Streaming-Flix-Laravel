<template>
  <nav>
    <v-app-bar color="deep-purple accent-4" dark prominent>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Streaming Flix Admin Panel</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn :to="{name:'team'}" text>
        <span>Logout</span>
        <v-icon right>mdi-logout</v-icon>
      </v-btn>
    </v-app-bar>

    <v-navigation-drawer v-model="drawer" absolute bottom temporary>
      <v-list nav dense>
        <v-list-item-group
          v-model="group"
          active-class="deep-purple--text text--accent-4"
          v-for="link in links"
          :key="link.text"
        >
          <v-list-item :to="{name: link.name}">
            <v-list-item-icon>
              <v-icon>{{ link.icon }}</v-icon>
            </v-list-item-icon>
            <v-list-item-title>{{ link.text }}</v-list-item-title>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      drawer: false,
      links: [
        { icon: "mdi-view-dashboard", text: "Dashboard", name: "dashboard" },
        { icon: "mdi-folder", text: "My Projects", name: "projects" },
        { icon: "mdi-account", text: "Team", name: "team" },
      ],
    };
  },
};
</script>