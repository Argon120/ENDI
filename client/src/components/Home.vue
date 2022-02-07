<template>
  <div class="flex flex-col flex-grow p-10">
    <div class="grid grid-cols-4 gap-10">
      <div
        class="bg-white p-5 rounded shadow-2xl transform hover:-translate-y-2 duration-300 cursor-pointer"
        v-for="building in buildings"
        :key="building.id"
        @click="goToDetail(building.id)"
      >
        <div class="flex flex-col space-y-4">
          <div class="flex items-center justify-between p-2">
            <p class="text-2xl font-medium">{{ building.comune }}</p>
            <p class="text-2xl font-medium">({{ building.provincia }})</p>
          </div>
          <div>
            <img :src="building.immagine" alt="" />
          </div>
          <div>
            <p class="text-lg flex justify-between">
              Nome: <span>{{ building.nome }}</span>
            </p>
            <p class="text-lg flex justify-between">
              Indirizzo: <span>{{ building.indirizzo }}</span>
            </p>
            <p class="text-lg flex justify-between">
              CAP: <span>{{ building.cap }}</span>
            </p>
            <p class="text-lg flex justify-between">
              Numero appartamenti:
              <span>{{ building.numero_appartamenti }}</span>
            </p>
            <p class="text-lg flex justify-between">
              Consumo annuo: <span>{{ building.consumo_annuo }} uc</span>
            </p>
            <p class="text-lg flex justify-between">
              Contabilizzazione: <span>{{ building.contabilizzazione }}</span>
            </p>
            <p class="text-lg flex justify-between">
              Tipo sonda: <span>{{ building.tipo_sonda }}</span>
            </p>
            <p class="text-lg flex justify-between">
              Tipo dispositivi: <span>{{ building.tipo_dispositivi }}</span>
            </p>
          </div>
          <div class="w-auto">
            <p
              v-if="building.gestione_remota"
              class="bg-amber-500 rounded-full px-3 flex w-min ml-auto"
            >
              Gestione remota
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Home",

  data() {
    return {
      buildings: [],
    };
  },

  async mounted() {
    this.buildings = (
      await axios.get("http://localhost:8000/api/buildings")
    ).data;
  },

  methods: {
    goToDetail(id) {
      this.$router.push("/buildings/" + id);
    },
  },
};
</script>

<style></style>
