<template>
  <div class="col-md-12">
    <div class="box-body">
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-block">
            <div class="box-body d-flex align-items-center">
              <div class="form-group col-lg-3">
                <label>Название(ru)</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="position_name_ru"
                />
              </div>
              <div class="form-group col-lg-3">
                <label>Название(ru)</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="position_name_kz"
                />
              </div>
              <div class="form-group col-lg-3">
                <label>Название(ru)</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="position_name_en"
                />
              </div>
              <div class="form-group col-lg-3 m-b-0">
                <button id="send" @click="send" class="btn btn-primary">Сохранить</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <table id="showed" class="table table-bordered table-striped">
        <thead>
          <tr style="border: 1px">
            <th style="width: 30px">№</th>
            <th>Название(ru)</th>
            <th>Название(kz)</th>
            <th>Название(en)</th>
            <th></th>
          </tr>
        </thead>

        <tbody v-for="res in data" v-bind:key="res.id">
          <tr>
            <td>{{ res.position_id }}</td>
            <td>{{ res.position_name_ru }}</td>
            <td>{{ res.position_name_kz }}</td>
            <td>{{ res.position_name_en }}</td>
            <td>
              <i class="fas fa-trash" @click="remove(res.position_id)"></i>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  components: {},
  data: function() {
    return {
      data: [],
      position_name_ru: "",
      position_name_kz: "",
      position_name_en: ""
    };
  },
  mounted() {
    this.update();
  },
  methods: {
    update: function() {
      axios.get("/get-position").then(response => {
        this.data = response.data;
      });
    },
    send: function() {
      axios.post("/admin/position", {
          position_name_ru: this.position_name_ru,
          position_name_kz: this.position_name_kz,
          position_name_en: this.position_name_en
        }).then(this.update());
    },
    remove: function(index) {
      axios.delete("/admin/position/" + index).then(this.update());
    }
  }
};
</script>

<style>
.dataTables_empty{
  display: none;
}
</style>