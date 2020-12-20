<template>
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-around">
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title"> Category List</h2>
                <div class="card-tools">
                    <button class="btn btn-primary">
                        <router-link to="/add-category">Add Category</router-link>
                        </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th> Sl</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr v-for="(category,index ) in getallcategory" :key="category.id">
                    <td>{{index}}</td>
                    <td>{{category.cat_name}}</td>
                    <td>{{category.created_at | timeformat}}</td>
                    <td>
                        <router-link :to="`/edit-category/${category.id}`">Edit</router-link>
                        <a href="" @click.prevent="deletecategory(category.id)">Delete</a>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

</template>
<script>
export default {
    name:'List',
    mounted(){
       this.$store.dispatch("allcategory")
    },
    computed:{
        getallcategory(){
           return this.$store.getters.getCategory
         }
    },
    methods: {
      deletecategory(id){
          axios.get('/category/'+id)
          .then(res=>{
             this.$store.dispatch("allcategory")
             Toast.fire({
             icon: 'success',
             title: ' Category Delete  Successfully'
            })
          })
      }
    }
}
</script>
<style>

</style>