<template>
  <div id="app">
    <div class="flex flex-col min-h-screen w-full">
      <navbar></navbar>
      <div class="flex flex-grow bg-amber-100">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from "./components/Navbar.vue";

export default {
  name: "App",
  components: {
    Navbar,
  },
};
</script>
