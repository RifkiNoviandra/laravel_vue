<template>
    <div class="container-fluid px-5 py-3">
        <div class="title">
            <h2>Destination</h2>
        </div>
        <div class="red-line">

        </div>
        <div class="row py-3">
            <div class="col-lg-4" v-for=" i in data ">
                <div class="card w-100 round_shape">
                    <img :src="`/images/${i.image}`" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{i.name}}</h5>
                        <div class="d-flex"><router-link :to="`/detail/${i.id}`" class="btn btn_custom ms-auto">Baca Selengkapnya</router-link></div>
                    </div>
                </div>
            </div>
    </div>
    </div>
</template>

<script>
export default {
    name: 'search',
    data(){
        return{
            data : []
        }
    },
    methods : {
        async get_search(){
            let key = this.$route.params.key
            console.log({key});
            let input = {key : key}
            let path = await window.axios.post('/api/user/search' , {key})
            this.data = path.data.data
        }
    },
    mounted() {
        this.get_search();
    }
};
</script>

<style scoped>

</style>
