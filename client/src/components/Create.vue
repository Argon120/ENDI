<template>
  <div class="flex flex-col flex-grow p-10 items-center justify-center">
    <div class="bg-white px-10 pb-10 w-1/3 rounded">
      <div>
        <p class="text-2xl font-semibold py-10">{{ title }}</p>
      </div>
      <div class="flex flex-col space-y-3">
        <div class="" v-for="building in buildings" :key="building.name">
          <div class="flex flex-col space-y-2" v-if="building.type == 'text'">
            <label :for="building.name" class="font-medium">{{
              building.label
            }}</label>
            <input
              :id="building.name"
              type="text"
              v-model="block[building.building]"
              class="border-2 border-gray-200 rounded-md px-2 outline-none py-1"
            />
          </div>

          <div
            class="flex flex-col space-y-2"
            v-if="building.type == 'textarea'"
          >
            <label :for="building.name" class="font-medium">{{
              building.label
            }}</label>
            <textarea
              cols="30"
              rows="5"
              :id="building.name"
              type="text"
              v-model="block[building.building]"
              class="border-2 border-gray-200 rounded-md px-2 outline-none py-1"
            ></textarea>
          </div>

          <div class="flex flex-col space-y-2" v-if="building.type == 'select'">
            <label :for="building.name" class="font-medium">{{
              building.label
            }}</label>
            <select
              :id="building.name"
              v-model="block[building.building]"
              class="border-2 border-gray-200 bg-white rounded-md px-2 outline-none py-1"
            >
              <option
                v-for="option in building.options"
                :key="option.code"
                :value="option.value"
              >
                {{ option.value }}
              </option>
            </select>
          </div>

          <div class="flex flex-col space-y-2" v-if="building.type == 'number'">
            <label :for="building.name" class="font-medium">{{
              building.label
            }}</label>
            <input
              :id="building.name"
              type="number"
              v-model="block[building.building]"
              class="border-2 border-gray-200 rounded-md px-2 outline-none py-1"
            />
          </div>

          <div
            class="flex space-x-4 items-center"
            v-if="building.type == 'boolean'"
          >
            <label :for="building.name" class="font-medium">{{
              building.label
            }}</label>
            <input type="checkbox" v-model="block[building.building]" />
          </div>
        </div>
      </div>

      <div class="flex justify-end mt-7">
        <button
          class="bg-amber-500 px-3 py-1 rounded text-white text-xl"
          @click="create()"
        >
          {{ confirmText }}
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Create",

  data() {
    return {
      title: "Aggiungi condominio",
      confirmText: "Crea",
      isEdit: false,
      block: {
        available: false,
      },
      buildings: [
        {
          name: "comune",
          type: "text",
          label: "Comune",
          building: "comune",
        },
        {
          name: "desc",
          type: "textarea",
          label: "Descrizione",
          building: "description",
        },
        {
          name: "image",
          type: "text",
          label: "Immagine",
          building: "immagine",
        },
        {
          name: "nome",
          type: "text",
          label: "Nome",
          building: "nome",
        },
        {
          name: "indirizzo",
          type: "text",
          label: "Indirizzo",
          building: "indirizzo",
        },
        {
          name: "cap",
          type: "number",
          label: "CAP",
          building: "cap",
        },
        {
          name: "appartamenti",
          type: "text",
          label: "Appartamenti",
          building: "appartamenti",
        },
        {
          name: "consumo annuo",
          type: "number",
          label: "Consumo annuo",
          building: "consumo_annuo",
        },
        {
          name: "contabilizzazione",
          type: "select",
          options: [
            {
              code: "",
              value: "Diretta",
            },
            {
              code: "",
              value: "Indiretta",
            },
          ],
          label: "Contabilizzazione",
          building: "contabilizzazione",
        },
        {
          name: "tipo sonda",
          type: "select",
          options: [
            {
              code: "",
              value: "Compatta",
            },
            {
              code: "",
              value: "Remota",
            },
          ],
          label: "Tipo sonda",
          building: "tipo_sonda",
        },
        {
          name: "tipo dispositivi",
          type: "select",
          options: [
            {
              code: "",
              value: "Ripartitori di calore",
            },
            {
              code: "",
              value: "Totalizzatore di calore",
            },
            {
              code: "",
              value: "Contatore di energia termica",
            },
          ],
          label: "Tipo dispositivi",
          building: "tipo_dispositivi",
        },
        {
          name: "provincia",
          type: "text",
          label: "Provincia",
          building: "provincia",
        },
        {
          name: "gestione remota",
          type: "boolean",
          label: "Gestione remota",
          building: "getione_remota",
        },
      ],
    };
  },

  async mounted() {
    console.log(this.$route.params.id);
    if (this.$route.params.id) {
      this.isEdit = true;
    }

    if (this.isEdit) {
      (this.title = "Modifica condominio"),
        (this.confirmText = "Aggiorna"),
        (this.block = (
          await axios.get(
            "http://localhost:8000/api/buildings/" + this.$route.params.id
          )
        ).data);
    }
  },

  methods: {
    async create() {
      if (!this.isEdit) {
        this.response = await axios.post(
          "http://localhost:8000/api/buildings",
          this.building
        );
        this.$router.push("/");
      } else {
        this.response = await axios.post(
          "http://localhost:8000/api/buildings/" + this.$route.params.id,
          this.building
        );
        this.$router.push("/");
      }
    },
  },
};
</script>

<style></style>
