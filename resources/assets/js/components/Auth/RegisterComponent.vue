<template>

    <div class="register-component">

        <div class="card-header">Register</div>

        <div class="card-body">
            <form @submit.prevent="registration">

                <div class="alert alert-danger" v-if="error_show">
                    {{ error_msg }}
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" autofocus v-model="name">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" required v-model="email">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required v-model="password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</template>

<script>
    import store from '../../store/store'
    export default {
        name: "RegisterComponent",
        props: [

        ],
        data(){
            return{
                name: '',
                email: '',
                password: '',
                error_show: false,
                error_msg: ''
            }
        },
        methods:{
            registration(){
                console.log('registration');

                axios.post('/api/auth/register', {
                    name: this.name,
                    email: this.email,
                    password: this.password
                }).then(response => {
                    // login user, store the token and redirect to dashboard
                    localStorage.setItem('token', response.data.access_token);
                    localStorage.setItem('user', response.data.user.name);

                    store.commit('loginUser');
                    this.$router.push({ name: 'home' });
                }).catch(error => {
                    console.log(error.response);
                    this.error_show = true;
                    this.error_msg = error.response.data.message; // todo error array to ul!
                });
            }
        }
    }
</script>

<style scoped>

</style>