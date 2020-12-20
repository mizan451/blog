<template>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-around">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
              </div>

              <form role="form" @submit.prevent="udateCategory()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="categoryId">Category Name</label>
                    <input type="text" class="form-control" id="categoryId" 
                     v-model="form.cat_name" name="cat_name" 
                    :class="{ 'is-invalid': form.errors.has('cat_name') }">
      <has-error :form="form" field="cat_name"></has-error>
                        
                  </div> 
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
</template>
<script>
export default {
   name :'EditCategory',
   mounted(){
        axios.get(`/editcategory/${this.$route.params.categoryid}`)
        .then(response=>{
            this.form.fill(response.data.category)
        })
        
   },
     data () {
    return {
      form: new Form({
        cat_name: '',
        
      })
    }
  },
    methods:{
      udateCategory(){
         this.form.post(`/update-category/${this.$route.params.categoryid}`)
         .then(res=>{
            this.$router.push('/category-list')
            Toast.fire({
            icon: 'success',
            title: ' Category Added  Successfully'
            })
          })
        .catch(err=>{
          //this.errors = err.response.data.errors
        })
      }
    }
}
</script>
