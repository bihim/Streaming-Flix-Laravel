<template>
  <div class="home">
    <v-col align="center" class="mt-3">
      <v-card
        class="d-inline-flex pa-2 rounded-xl"
        color="deep-purple lighten-1 white--text"
      >
        <h1>Add Videos</h1>
      </v-card>
      <v-row class="mt-5 mx-8">
        <v-text-field
          label="Enter Movie Name"
          placeholder="Movie Name"
          class="mr-1"
          outlined
        >
        </v-text-field>
        <v-text-field
          label="Enter Movie Year"
          placeholder="Movie Year"
          class="ml-1"
          outlined
        ></v-text-field>
      </v-row>
      <v-textarea outlined class="mx-8">
        <template v-slot:label>
          <div>Enter Movie Description</div>
        </template>
      </v-textarea>
      <v-row class="mt-2 mx-8">
        <v-text-field
          label="Enter Movie Category"
          placeholder="Funny/Horror/Superhero..etc"
          class="mr-1"
          outlined
        >
        </v-text-field>
        <v-text-field
          label="Enter Movie Image Link"
          placeholder="Image url of movie poster"
          class="ml-1"
          outlined
        ></v-text-field>
      </v-row>
      <v-radio-group v-model="selectedOptionId" row class="mx-8" mandatory>
        <v-radio
          v-on:click="selectedOptionButton"
          v-for="option in options"
          :label="option.label"
          :key="option.id"
          :value="option.id"
        ></v-radio>
      </v-radio-group>
      <template v-if="isUpload">
        <v-file-input
          color="mx-8"
          outlined
          accept="video/*"
          label="File input"
          v-model="file"
        ></v-file-input>
      </template>
      <template v-else>
        <v-text-field
          label="Enter Movie Link"
          placeholder=".mp4/.avi/.mkv supported"
          class="mx-8"
          outlined
        >
        </v-text-field>
      </template>

      <v-btn
        v-on:click="formSubmit(); load = true"
        :loading="load"
        :disabled="load"
        color="deep-purple accent-4 white--text"
        class="mt-8">
        Submit
      </v-btn>
    </v-col>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "",
      file: "",
      success: "",
      isUpload: false,
      loader: null,
      load: false,
      selectedOptionId: null,
      options: [
        {
          id: 1,
          label: "Add Video Url",
          value: 1,
          type: "add",
          isUpload: false,
        },
        {
          id: 2,
          label: "Upload Video",
          value: 2,
          type: "upload",
          isUpload: true,
        },
      ],
    };
  },
  methods: {
    selectedOptionButton: function () {
      if (!this.selectedOptionId) {
        return "";
      }
      console.log(
        //this.options.find((o) => o.id === this.selectedOptionId).isUpload
        this.isUpload
      );
      this.isUpload = this.options.find(
        (o) => o.id === this.selectedOptionId
      ).isUpload;
    },
    formSubmit() {
      this.load = !this.load;
      //e.preventDefault();
      let existingObj = this;

      const config = {
        headers: {
          "content-type": "multipart/form-data",
        },
      };

      let data = new FormData();
      data.append("file", this.file);
      axios
        .post("/upload", data, config)
        .then(function (res) {
          existingObj.success = res.data.success;
          this.load = !this.load;
          this.loader = null;
        })
        .catch(function (err) {
          existingObj.output = err;
          this.load = !this.load;
          this.loader = null;
        });
    },
  },
};
</script>
