<template>
  <div class="flex flex-col flex-grow p-10">
    <div class="w-full max-h-full bg-white rounded p-10 space-y-5">
      <div class="flex justify-between">
        <p class="text-3xl">{{ building.comune }}</p>
        <div>
          <p
            class="bg-amber-500 px-4 py-1 rounded-full"
            v-if="building.gestione_remota"
          >
            Gestione remota
          </p>
        </div>
      </div>

      <div class="flex text-2xl items-center">
        <p>
          Provincia:
          <span class="text-current-300">({{ building.provincia }})</span>
        </p>
      </div>

      <div class="flex space-x-10">
        <img :src="building.immagine" alt="" class="w-1/3" />
        <div class="w-1/3 text-lg text-justify">{{ building.descrizione }}</div>
      </div>

      <div class="flex text-xl space-x-10">
        <div class="flex flex-col">
          <p class="font-semibold py-1">Dati condominio</p>
          <div class="grid grid-cols-2 gap-5">
            <p class="">Nome:</p>
            <p>{{ building.nome }}</p>
          </div>
          <div class="grid grid-cols-2 gap-5">
            <p class="">Contabilizzazione:</p>
            <p>{{ building.contabilizzazione }}</p>
          </div>
          <div class="grid grid-cols-2 gap-5">
            <p class="">Tipo sonda:</p>
            <p>{{ building.tipo_sonda }}</p>
          </div>
          <div class="grid grid-cols-2 gap-5">
            <p class="">Tipo dispositivi:</p>
            <p>{{ building.tipo_dispositivi }}</p>
          </div>
        </div>

        <div class="flex flex-col">
          <div class="grid grid-cols-2 gap-5">
            <p class="">Indirizzo:</p>
            <p>{{ building.indirizzo }}</p>
          </div>
          <div class="grid grid-cols-2 gap-5">
            <p class="">CAP:</p>
            <p>{{ building.cap }}</p>
          </div>
          <div class="grid grid-cols-2 gap-5">
            <p class="">Numero appartamenti:</p>
            <p>{{ building.numero_appartamenti }}</p>
          </div>
          <div class="grid grid-cols-2 gap-5">
            <p class="">Consumo annuo:</p>
            <p>{{ building.consumo_annuo }}</p>
          </div>
        </div>
      </div>

      <div class="flex justify-end">
        <div class="flex justify-end space-x-2">
          <div
            class="w-10 h-10 flex justify-center text-yellow-300 items-center rounded-full border-2 border-yellow-300 cursor-pointer hover:bg-yellow-300 hover:text-white transform duration-300"
            @click="edit()"
          >
            <span class="material-icons text-2xl"> mode_edit_outline </span>
          </div>
          <div
            class="w-10 h-10 flex justify-center text-red-400 items-center rounded-full border-2 border-red-400 cursor-pointer hover:bg-red-400 hover:text-white transform duration-300"
            @click="remove()"
          >
            <span class="material-icons text-2xl"> delete_outline </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Detail",

  data() {
    return {
      building: {},
    };
  },

  async mounted() {
    this.building = (
      await axios.get(
        "http://localhost:8000/api/buildings/" + this.$route.params.id
      )
    ).data;
  },

  methods: {
    async remove() {
      this.response = await axios.delete(
        "http://localhost:8000/api/buildings/" + this.$route.params.id
      );
      this.$router.push("/");
    },

    edit() {
      this.$router.push("/buildings/edit/" + this.$route.params.id);
    },
  },
};
</script>
