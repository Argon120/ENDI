<template>
  <div class="flex p-10 justify-between bg-amber-500 sticky top-0 items-center">
    <div>
      <router-link to="/">
        <p class="text-2xl">ENDI</p>
      </router-link>
    </div>

    <div>
      <router-link to="/lands/create" class="text-xl"
        >Aggiungi condominio</router-link
      >
    </div>
  </div>
</template>

<script>
export default {
  name: "Navbar",
};
</script>

<style></style>
