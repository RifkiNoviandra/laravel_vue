<template>
    <div class="container-fluid px-3 py-3">
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#CreateModal" @click="create_check">Create</button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Latitude</th>
                    <th scope="col">Longitude</th>
                    <th scope="col">Image</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="i in data">
                    <th scope="row">{{ i.id }}</th>
                    <th>{{i.name}}</th>
                    <th>{{ i.location }}</th>
                    <th>{{ i.latitude }}</th>
                    <th>{{ i.longitude }}</th>
                    <th><img :src="`/images/${i.image}`" alt=""></th>
                    <th>{{ i.rating }}</th>
                    <th>{{ i.description }}</th>
                    <th>
                        <button type="button" class="btn btn-warning mb-3 me-3" data-bs-toggle="modal" data-bs-target="#CreateModal" @click="update_data(i)">Update</button>
                        <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" :data-bs-target="`#DeleteModal${i.id}`">Delete</button>
                    </th>

                    <div class="modal fade" :id="`DeleteModal${i.id}`" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalDelete">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are You Sure Delete Data With Id {{i.id}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click="delete_data(i)">Delete</button>
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </tr>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="CreateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Destination</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent = insert_data ref="form">
                        <label for="Name">Name :</label>
                        <input type="text" class="form-control" id="Name" v-model="Name">
                        <label for="Location">Location :</label>
                        <input type="text" class="form-control" id="Location" v-model="Location">
                        <label for="Latitude">Latitude :</label>
                        <input type="text" class="form-control" id="Latitude" v-model="Latitude">
                        <label for="Longitude">Longitude :</label>
                        <input type="text" class="form-control" id="Longitude" v-model="Longitude">
                        <label for="Rating">Rating :</label>
                        <input type="text" class="form-control" id="Rating" v-model="Rating">
                        <label for="Description">Description :</label>
                        <textarea id="Description" class="form-control" v-model="Description"></textarea>
                        <label for="Image">Image :</label>
                        <input type="file" class="form-control" id="Image" ref="Images">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
export default {
    name: 'dashboard_admin',
    data(){
        return {
            data : [],
            Id: "",
            Name : "",
            Location: "",
            Latitude: "",
            Longitude: "",
            Rating: "",
            Description: "",
            Images: ""
        }
    },
    methods: {
        async get_data(){
            let path = await window.axios.get('/api/destination')
            this.data = path.data.data
        },

        async insert_data(){
            let form_data = new FormData
            form_data.append("image" , this.$refs.Images.files[0])
            form_data.append("name" , this.Name)
            form_data.append("location" , this.Location)
            form_data.append("latitude" , this.Latitude)
            form_data.append("longitude" , this.Longitude)
            form_data.append("rating" , this.Rating)
            form_data.append("description" , this.Description)
            let path
            if (this.id !== ""){
                path = await window.axios.post(`/api/destination/update/${this.id}` , form_data , {headers: { "Content-Type" : "multipart/form-data"}})
            }else{
                path = await window.axios.post('/api/destination/create' , form_data , {headers: { "Content-Type" : "multipart/form-data"}})
            }
            console.log(path.data.message);
            this.get_data();
            this.Name = ""
            this.Location = ""
            this.Latitude = ""
            this.Longitude = ""
            this.Rating = ""
            this.Description = ""
            this.$refs.form.reset()
        },

        async update_data(data){
            this.Name = data.name
            this.Location = data.location
            this.Latitude = data.latitude
            this.Longitude = data.longitude
            this.Rating = data.rating
            this.Description = data.description
            this.id = data.id
            this.$refs.form.reset()
        },

        async create_check(){
            this.id = ""
            this.Name = ""
            this.Location = ""
            this.Latitude = ""
            this.Longitude = ""
            this.Rating = ""
            this.Description = ""
            // this.$refs.images.reset()
            this.$refs.form.reset()
        },

        async delete_data(data){
            let path = await window.axios.delete(`/api/destination/delete/${data.id}`)
            this.get_data();
        }
    },
    mounted() {
        this.get_data();
    }
};
</script>

<style scoped>
  #wrapper{
      width: 100vw;
      height: 100vh;
  }

  img{
      width: 200px;
      height: 150px;
  }
</style>
