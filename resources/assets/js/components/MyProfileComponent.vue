<template>
    <div>

        <div class="card-header">My profile</div>

        <div class="card-body">

            <h1 class="text-center"></h1>
            <form>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" v-model="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email" v-model="email">
                    </div>
                </div>
            </form>

        </div>

    </div>
</template>

<script>
    import  store from '../store/store'
    export default {
        name: "MyProfileComponent",
        data(){
          return{
            name: '',
              email: ''
          }
        },
        created: function () {
            console.log('created');
            this.getUserData();
        },
        methods:{
            getUserData: function () {
                axios({
                    method:'get',
                    url: '/api/auth/me',
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('token'),
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                }).then(response => {
                    console.log(response);
                    response = response.data;
                    // this.$router.push({ name: 'home' });

                    this.name = response.data.name;
                    this.email = response.data.email;

                }).catch(error => {
                    console.log('error');
                    localStorage.removeItem('token');
                    localStorage.removeItem('user');
                    store.commit('logoutUser');
                    this.$router.push({ name: 'login' });
                });
            }
        }
    }
</script>

<style scoped>

</style>