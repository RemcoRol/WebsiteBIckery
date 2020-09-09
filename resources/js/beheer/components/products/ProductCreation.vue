<template>
    <form method="POST" enctype="multipart/form-data" @submit.prevent="submit">
        <div class="loader" v-if="loading"></div>
        <fieldset :disabled="loading">
        <div class="form-group">
            <label>Zichtbaarheid:</label>
            <select class="custom-select" name="product_hidden" v-model="formFields.product_hidden">
                <option value="0">Zichtbaar</option>
                <option value="1">Verborgen</option>
            </select>
            <div v-if="errors && errors.product_hidden" class="text-danger">{{ errors.product_hidden[0] }}</div>
        </div>

        <div class="form-group">
            <label>Product naam:</label>
            <input type="text" name="product_name" class="form-control" placeholder="Product naam"
                   v-model="formFields.product_name">
            <div v-if="errors && errors.product_name" class="text-danger">{{ errors.product_name[0] }}</div>
        </div>
        <div class="form-group">
            <label>Merk:</label>
            <select ref="brandsList" class="form-control" name="brand_id" v-model="formFields.brand_id">
                <option v-for="(brand, index) in brands"
                        :key="brand.id"
                        :value="brand.id"
                >{{brand.brand_name}}
                </option>
            </select>
            <div v-if="errors && errors.brand_id" class="text-danger">{{ errors.brand_id[0] }}</div>
        </div>
        <div class="form-group">
            <label>Product afbeelding:</label>
            <input type="file" name="product_image" class="form-control" v-on:change="onImageChange">
            <div v-if="errors && errors.product_image" class="text-danger">{{ errors.product_image[0] }}</div>
        </div>
        <button type="submit" class="btn btn-primary float-right" value="">Opslaan</button>
        </fieldset>
    </form>
</template>

<script>
export default {
    props: ['brands'],
    data() {
        return {
            fields: {},
            errors: {},
            loading: false,
            formFields: {
                product_hidden: '0',
                product_name: '',
                brand_id: '1',
                product_image: ''
            },
        }
    },
    methods: {
        submit() {
            this.loading = true;
            let formData = new FormData();

            console.log(this.formFields);

            formData.append("product_hidden", this.formFields.product_hidden);
            formData.append("product_name", this.formFields.product_name);
            formData.append("brand_id", this.formFields.brand_id);
            formData.append("product_image", this.formFields.product_image);

            console.log(formData);

            this.errors = {};
            axios.post('/beheer/producten/create', formData).then(response => {
                if (response.status === 200) {
                    this.loading = false;
                    flash('Product is successvol aangemaakt!');
                    this.clearForm();
                }
            }).catch(error => {
                if (error.response.status === 422) {
                    this.loading = false;
                    this.errors = error.response.data.errors || {};
                }
            });
        },
        onImageChange(e) {
            this.formFields.product_image = e.target.files[0];
        },
        clearForm() {
            this.formFields.product_hidden = '';
            this.formFields.product_name = '';
            this.formFields.brand_id = '';
            this.formFields.product_image = '';
        }
    },
}
</script>
