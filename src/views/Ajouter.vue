<template>

    <div class="bg">
        <div class="card" style="width: 55rem; height: 35rem;">

            <h2 class="card-title">Take your appointment</h2>  

            <div class="card-body d-flex justify-content-center align-items-center">
                <form class="text-center align-items-center">

                    <input class="form-control" v-model="Nom" placeholder="Date" type="Date">
                    <div>
                        <select class="form-control" id="input" type="Time">
                            <option disabled selected> Choix d'horaire </option>
                            <option>8-10</option>
                            <option>10-12</option>
                            <option>14-16</option>
                            <option>16-18</option>
                        </select>
                    </div>
                    <input class="form-control" v-model="T_cons" placeholder="Type de Consultation" type="text">
                    <input class="form-control" v-model="Reference" placeholder="CIN" type="text">
         
                    <router-link to="/Reservation" tag="button" class="submit-btn"> Submit </router-link>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name:'ajouter'
    }
</script>
    

<style scoped>

    .bg{
        background-color: blue;
        padding: 4% 22%;
    }

    .card-title{
        font-family: 'Oswald', sans-serif;
        font-size: 35px;
        font: bold;
        margin-top: 4vh;
    }

    input {
        width: 18rem;
        padding: 2px 5px;
        margin: 8px 0px;
        box-sizing: border-box;
        border: none;
        border-bottom: 2px solid red;
        border-radius: 0;
        margin-bottom: 2vh;
    }

    #input{
        width: 18rem;
        padding: 2px 5px;
        margin: 8px 0px;
        box-sizing: border-box;
        border: none;
        border-bottom: 2px solid red;
        border-radius: 0;
        margin-bottom: 2vh;
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
        cursor: pointer;
        margin-top: 4vh;
    }

    .submit-btn:hover {
        background-color: #ffffff; 
        border-color: rgb(43, 64, 180);
        color: rgb(43, 64, 180);
    }
</style>