<template>
    
    <div class="body justify-content-center align-items-center" id="event">


        <div class="header">
            <div class="d-flex justify-content-between">
                <h1 class="text-wlc">Welcome :{{result.Reference}}</h1>
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


        <table class="table text-center ">
            <thead>
                <tr class="table-header">
                    <th> Id </th>
                    <th> Date </th>
                    <th> Horaire </th>
                    <th> Type de Consultation </th>
                    <th> Action </th>
                </tr>
            </thead>

            <tbody>

                <tr v-for="result in results" :key="result.Id">
                    <td scope="row">{{result.Id}}</td>
                    <td>{{result.date}}</td>
                    <td>{{result.Horaire}}</td>
                    <td>{{result.T_Consultation}}</td>

                    <td> 
                        <div class="d-flex justify-content-center" id="action">

                            <button type="submit" class="btn btn-warning" name="update" v-on:click = "edit_appointment=true;getId(result.Id);edit()">
                                Update &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
                            &nbsp;
                                    
                            <button type="submit" class="btn btn-danger" name="submit" v-on:click = "delete_appointment=true;getId(result.Id)">
                                Delete &nbsp;<i class="fa fa-trash" aria-hidden="true"></i>
                            </button>

                        </div>
                    </td> 
                </tr>

            </tbody>
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
                    <form class="text-center align-items-center">

                        <input class="form-control"  placeholder="Date" type="Date" v-model="date" >
                        <div>
                            <select class="form-control" id="input" type="Time" v-model="Horaire">
                                <option disabled selected> Choix d'horaire </option>
                                <option>8-10</option>
                                <option>10-12</option>
                                <option>14-16</option>
                                <option>16-18</option>
                            </select>
                        </div>
                        <input class="form-control"  placeholder="Type de Consultation" type="text" v-model="T_Consultation" >
                        <input class="form-control"  placeholder="Reference" type="text" v-model="Reference" >
                    
                        <button type="button" class="submit-btn" @click="Ajouter">
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
                    <form class="text-center align-items-center">

                        <input class="form-control" v-model="date" placeholder="Date" type="Date">
                        <div>
                            <select class="form-control" id="input" type="Time" v-model="Horaire">
                                <option disabled selected> Choix d'horaire </option>
                                <option>8-10</option>
                                <option>10-12</option>
                                <option>14-16</option>
                                <option>16-18</option>
                            </select>
                        </div>
                        <input class="form-control" v-model="T_Consultation" placeholder="Type de Consultation" type="text">

                        <button type="button" class="submit-btn" @click=" Update">
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

                        <button type="button" id="delete-btn" class="btn btn-danger" @click="Delete">
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
            delete_appointment: false,

            results : [],
            Id:"",
            date :"",
            Horaire :"",
            T_Consultation:"",
            Reference:"",

            clientRef: localStorage.getItem("userkey")

        }
    },

    mounted(){
        this.index();
    },

    methods: {

        index(){
            fetch (`http://localhost/Reservation/RdvCont/index/${this.clientRef}`)
            .then(res => res.json())
            .then(data => this.results = data)
            .catch(err =>console.log(err.message))
        },

        async Ajouter(){
            await fetch ("http://localhost/Reservation/RdvCont/ajouter",{
                method: "POST",

                body: JSON.stringify({   
                    date:this.date,
                    Horaire:this.Horaire,
                    T_Consultation:this.T_Consultation,
                    Reference:this.Reference
                }),

            }).then(res=>{
                console.log(res);
            }).catch(err=>console.log(err));
             this.Id="";
            this.date ="";
            this.Horaire ="";
            this.T_Consultation="";
            this.Reference="";
            this.add_appointment=false;
            this.index();
        },
        async edit(){
            const response= await fetch ("http://localhost/Reservation/RdvCont/edit",{
                method: "POST",

                body: JSON.stringify({   
                    Id:this.Id,

                }),

            });
            const data=await response.json();
            console.log(data);
            this.Id=data.Id;
            this.date =data.date;
            this.Horaire =data.Horaire;
            this.T_Consultation=data.T_Consultation;

        },
        async Update(){

            console.log(this.date);

            await fetch(
                "http://localhost/Reservation/RdvCont/update",{
                    method: "PUT",
                    body: JSON.stringify({   
                        Id:this.Id,
                        "Date":this.date,
                        Horaire:this.Horaire,
                        T_Consultation:this.T_Consultation})
                }
            );
            // const data = await response.json();
            this.edit_appointment=false;
            this.index();
        },

        async Delete(){
            await fetch ("http://localhost/Reservation/RdvCont/delete",{
                method: "POST",

                body: JSON.stringify({   
                    Id:this.Id,

                }),

            }).then(res=>{
                console.log(res);
            }).catch(err=>console.log(err));
            this.delete_appointment=false;
            this.index();
        },
        
        getId(id){
            this.Id=id;
            console.log(id);
        }
    },  
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