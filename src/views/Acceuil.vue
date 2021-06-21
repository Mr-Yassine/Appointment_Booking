<template>

    <div class="bg">
        <div class="card" style="width: 55rem; height: 35rem;">

            <div class="card-body d-flex justify-content-center align-items-center">
                
                <div class="card 1" style="width: 18rem;">
                    <img class="card-img-top" src="../../public/img/patient.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">I'am a Patient</h5>
                        <p class="card-text">Some quick example text to build on the card.</p>
                        <router-link to="/login" tag="button" class="submit-btn"> Take an appointment </router-link>
                    </div>
                </div>

                <div class="col-md-1">
                </div>
                
                <div class="card 2" style="width: 18rem;">
                    <img class="card-img-top" src="../../public/img/new-pat.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">New User</h5>
                        <p class="card-text">Some quick example text to build on the card.</p>
                        <router-link to="/registration" tag="button" class="submit-btn"> Get my Reference </router-link>
                    </div>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
export default {
    name : 'Acceuil'
}
</script>

<style scoped>

    @import url('https://fonts.googleapis.com/css2?family=Oswald&display=swap');

    .bg{
        background-color: blue;
        padding: 4% 22%;
        height: 100vh
    }

    .card-title{
        font-family: 'Oswald', sans-serif;
        font-size: 25px;
        font: bold
    }


    .submit-btn{
        background-color: rgb(43, 64, 180);
        border-radius: 4px;
        font: bold;
        color: rgb(255, 255, 255);
        transition-duration: 0.4s;
        padding: 12px 32px;
        text-align: center;
        text-decoration: none;
        cursor: pointer
    }

    .submit-btn:hover {
        background-color: #ffffff; 
        border-color: rgb(43, 64, 180);
        color: rgb(43, 64, 180)
    }

</style> 