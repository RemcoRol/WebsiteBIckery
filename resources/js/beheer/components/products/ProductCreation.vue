<template>
  <form method="POST" enctype="multipart/form-data" @submit.prevent="submit">
    <div class="form-group">
      <label>Product naam:</label>
      <input type="text" name="product_name" class="form-control" placeholder="Product naam" v-model="fields.product_name">
      <div v-if="errors && errors.product_name" class="text-danger">{{ errors.product_name[0] }}</div>
    </div>
    <div class="form-group">
      <label>Merk:</label>
      <select ref="brandsList" class="form-control" name="brand_id" v-model="fields.brand_id">
        <option v-for="(brand, index) in brands"
                :key="brand.id"
                :value="brand.id"
                :selected="index === 0"
                >{{brand.brand_name}}
        </option>
      </option>
      </select>
      <div v-if="errors && errors.brand_id" class="text-danger">{{ errors.brand_id[0] }}</div>
    </div>
    <div class="form-group">
      <label>Product afbeelding:</label>
      <input type="file" name="product_image" class="form-control" v-on:change="onImageChange">
      <div v-if="errors && errors.product_image" class="text-danger">{{ errors.product_image[0] }}</div>
    </div>
    <button type="submit" class="btn btn-primary float-right">Opslaan</button>
  </form>
</template>

<script>
export default {
  props: ['brands'],
  data() {
    return {
      fields: {},
      errors: {}
    }
  },
  methods: {
    submit() {
      this.errors = {};
      axios.post('/beheer/producten/create', this.fields).then(response => {
        console.log(response);
      }).catch(error => {
        if (error.response.status === 422) {
          this.errors = error.response.data.errors || {};
        }
      });
    },
    onImageChange(e) {
        console.log(e.target.files[0]);
        this.image = e.target.files[0];
    },
  },
}
</script>
