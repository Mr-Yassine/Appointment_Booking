<template>
    
    <div class="body justify-content-center align-items-center" id="event">


        <div class="header">
            <div class="d-flex justify-content-between">
                <h1 class="text-wlc">Welcome</h1>
                <div class="text-end">
                    <router-link to="/" tag="button" class="btn btn-danger"> 
                        Log-Out &nbsp;<i class="fa fa-sign-out" aria-hidden="true"></i>
                    </router-link>
                </div>  
            </div>       
        </div>

        <br>
        <div class="alert alert-success" v-show="alert_success==true"> Success Alert </div>
        <div class="alert alert-danger" v-show="alert_error==true"> Error Alert </div>
        <button type="button" class="submit-btn" v-on:click = "add_appointment=true">
            New appointment &nbsp; <i class="fa fa-plus" aria-hidden="true"></i> 
        </button>

        <!-- <router-link to="/Ajouter" tag="button" class="submit-btn"> 
            New appointment &nbsp; <i class="fa fa-plus" aria-hidden="true"></i>    
        </router-link> -->


        <table class="table text-center ">
            <thead>
                <tr class="table-header">
                    <th> Id </th>
                    <th> Date </th>
                    <th> Horaire </th>
                    <th> Type de Consultation </th>
                    <th> Action </th>
                </tr>

                <tr>
                    <td> 1 </td>
                    <td> 01-07-2021 </td>
                    <td> 10-11 </td>
                    <td> Controle </td>
                    <td> 
                        <div class="d-flex justify-content-center" id="action">

                            <button type="submit" class="btn btn-warning" name="update" v-on:click = "edit_appointment=true">
                                Update &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
                            &nbsp;
                                    
                            <button type="submit" class="btn btn-danger" name="submit" v-on:click = "delete_appointment=true">
                                Delete &nbsp;<i class="fa fa-trash" aria-hidden="true"></i>
                            </button>

                        </div>
                    </td>
                </tr>

            </thead>
        </table>

        <br>

        <!----------------------------------------------------------------->
        <!-- Add appointment -->
        <!----------------------------------------------------------------->
        <div class="overlay" v-if="add_appointment==true">

            <div class="card">
                <div class = "d-flex justify-content-around">
                    <h2 class="card-title">Take your appointment</h2> 
                    <button type="button" class="close" v-on:click ="add_appointment=false">
                        <span aria-hidden="true">&times;</span>
                    </button> 
                </div>
                        
                <div class="card-body d-flex justify-content-center align-items-center">
                    <form action="#" method="POST" class="text-center align-items-center">

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
                    
                        <button type="button" class="submit-btn" v-on:click ="add_appointment=false">
                            Submit
                        </button> 
                        <!-- <router-link to="/Reservation" tag="button" class="submit-btn"> Submit </router-link> -->
                    </form>
                </div>
            </div>
        </div>


        <!----------------------------------------------------------------->
        <!-- Edit appointment -->
        <!----------------------------------------------------------------->
        <div class="overlay" v-if="edit_appointment==true">

            <div class="card">
                <div class = "d-flex justify-content-around">
                    <h2 class="card-title">Edit your appointment</h2> 
                    <button type="button" class="close" v-on:click ="edit_appointment=false">
                        <span aria-hidden="true">&times;</span>
                    </button> 
                </div>
                        
                <div class="card-body d-flex justify-content-center align-items-center">
                    <form action="#" method="POST" class="text-center align-items-center">

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

                        <button type="button" class="submit-btn" v-on:click ="edit_appointment=false">
                            Update
                        </button> 
                    </form>
                </div>
            </div>
        </div>

        <!----------------------------------------------------------------->
        <!-- Delete appointment -->
        <!----------------------------------------------------------------->
        <div class="overlay" v-if="delete_appointment==true">

            <div class="card" style="width: 40rem; height: 25rem;">
                <div class = "d-flex justify-content-around">
                    <h2 class="card-title">Delete your appointment</h2> 
                    <button type="button" class="close" v-on:click ="delete_appointment=false">
                        <span aria-hidden="true">&times;</span>
                    </button> 
                </div>
                        
                <div class="card-body d-flex justify-content-center align-items-center">
                    <form action="#" method="POST" class="text-center align-items-center">

                        <p class="delete_msg"> Are you sure that you wanna delete your appointment !!? </p>

                        <button type="button" id="delete-btn" class="btn btn-danger" v-on:click ="delete_appointment=false">
                            Delete
                        </button> 
                    </form>
                </div>
            </div>
        </div>


    </div> 
</template>

<script>
export default {
    name: 'Reservation',
    data() {
        return {
            add_appointment: false,
            alert_success: false,
            alert_error: false,
            edit_appointment: false,
            delete_appointment: false
        }
    }
}
</script>

    
<style scoped>

    .body{
        padding: 4rem 8rem;
    }

    .header{
        width: 80vw;
        justify-content: center
    }

    .text-wlc{
        font-family: 'Oswald', sans-serif;
        font-size: 35px;
        font: bold
    }

    .table-header{
        background-color: rgb(200, 200, 250)
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
        margin-bottom: 8vh;
        margin-top: 4vh
    }

    .submit-btn:hover {
        background-color: #ffffff; 
        border-color: rgb(43, 64, 180);
        color: rgb(43, 64, 180)
    }

    /*popup*/

    .overlay{
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.6)
    }

    .card{
        width: 40rem;
        height: 35rem;
        margin: 0 auto;
        float: none; 
        margin-top: 6rem;
    }

    .card-title{
        font-family: 'Oswald', sans-serif;
        font-size: 35px;
        font: bold;
        margin-top: 4vh
    }

    .close {
        float: right;
        font-size: 2.5rem;
        font-weight: 700;
        line-height: 2.7;
        text-shadow: 0 1px 0 #fff;
        opacity: 100;
        cursor: pointer;
    }

    input {
        width: 20rem;
        padding: 2px 5px;
        margin: 8px 0px;
        box-sizing: border-box;
        border: none;
        border-bottom: 2px solid red;
        border-radius: 0;
        margin-bottom: 2vh
    }

    #input{
        width: 20rem;
        padding: 2px 5px;
        margin: 8px 0px;
        box-sizing: border-box;
        border: none;
        border-bottom: 2px solid red;
        border-radius: 0;
        margin-bottom: 2vh
    }

    .delete_msg{
        font-family: 'Oswald', sans-serif;
        font-size: 32px;
        font: bold;
        margin-top: -6vh;
        color: red
    }

    #delete-btn{
        margin-top: 4vh;
        transition-duration: 0.4s;
        padding: 12px 32px;
        text-align: center;
        text-decoration: none;
        cursor: pointer
    }

    #delete-btn:hover {
        background-color: #ffffff; 
        border-color: red;
        color: red
    }

   
</style>