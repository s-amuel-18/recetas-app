<template>
  <button class="btn btn-danger btn-sm" @click="eliminarReceta">
    <i class="fas fa-trash"></i>
  </button>
</template>

<script>
export default {
  props: ["receta_id"],
  methods: {
    eliminarReceta() {
      // alert();

      this.$swal({
        title: "¿Estas Seguro?",
        text: "Si eliminas la Receta no pordras recuperarla, ¿Realmente deseas eliminarla?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
        cancelButtonText: "No",
      }).then((result) => {
        if (result.isConfirmed) {
          let params = {
            id: this.receta_id,
          };

          axios
            .post("/recetas/" + this.receta_id + "/delete", {
              params,
              _method: "delete",
            })
            .then((resp) => {
              //   console.log(resp);
               this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
            //    console.log(resp)
              this.$swal({
                title: "Eliminado",
                text: "Se ha eliminado Correctamente",
                icon: "success",
              });
            })
            .catch((err) => {
              this.$swal({
                title: "Error",
                text: "Ha ocurrido un error",
                icon: "error",
              });
            //   console.log(err);
            });
        }
      });
    },
  },
};
</script>
