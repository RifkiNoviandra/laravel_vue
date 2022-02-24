<template>
    <div class="container d-flex justify-content-center align-items-center" id="login">
        <div class="card ">
            <div class="card-header">
                <div class="card-title">Login</div>
            </div>
            <div class="card-body">
                <form @submit.prevent = input>
                <label for="Username">Username</label>
                <input id="Username" type="text" class="form-control mb-3"  v-model="username">
                <label for="Password">Password</label>
                <input type="password" class="form-control mb-3" id="Password" v-model="password">
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'login',
    data(){
        return {
            username : "",
            password : "",
        }
    },
    methods : {
        async input (){
            const data = {username : this.username , password : this.password}

            let id = this.$route.params.id
            let url = this.$route.params.id ? "/api/user/login" : "/api/login"
            let path = await window.axios.post(url , data)
            console.log(path);
            if (path.data.message !== 'Password Salah'){
                localStorage.setItem('token' , path.data.token);
                if (id === "user"){
                    this.$router.push('/');
                }else {
                    this.$router.push('/admin/dashboard');
                }
            }
        }
    }
};
</script>

<style scoped>
    #login{
        width: 100vw;
        height: 100vh;
    }
</style>
