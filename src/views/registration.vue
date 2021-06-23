<template>

    <div class="bg">
        <div class="card" style="width: 55rem; height: 35rem;">

            <h2 class="card-title">Enter your information</h2>  

            <div class="card-body d-flex justify-content-center align-items-center">
                <div class="form">
                    <div class="d-flex flex-row">
                        <input v-model="Nom" placeholder="Nom" type="text">
                        <input v-model="Prenom" placeholder="Prenom" type="text">
                    </div>

                    <div class="d-flex flex-row">
                        <input v-model="Email" placeholder="Email" type="Email">
                        <input v-model="Age" placeholder="Age" type="Age">
                    </div>

                    <div class="d-flex flex-row">
                        <input v-model="Tel" placeholder="Telephone" type="Tel">
                        <input v-model="Reference" placeholder="CIN" type="text">
                    </div>
                    <button type="submit" @click="Ajouter" class="submit-btn">
                        submit 
                    </button>

                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name:'registration',
        data(){
            return{
                Nom :"",
                Prenom :"",
                Email:"",
                Age:"",
                Tel :"",
                Reference:""
            }
        },
        methods: {
            async Ajouter(){
                await fetch ("http://localhost/Reservation/usersCont/add",{
                    method: "POST",
                   
                    body: JSON.stringify({
                        
                        Nom:this.Nom,
                        Prenom:this.Prenom,
                        Email:this.Email,
                        Age:this.Age,
                        Tel:this.Tel,
                        Reference:this.Reference,
                    }),
                }).then(res=>{
                    console.log(res);
                }).catch(err=>console.log(err));
                this.$router.push("/Login/"+this.Reference);
            }
        },  
    }
   
</script>
    

<style scoped>

    .bg{
        background-color: blue;
        padding: 4% 22%;
        height: 100vh
    }

    .card-title{
        font-family: 'Oswald', sans-serif;
        font-size: 35px;
        font: bold;
        margin-top: 4vh
    }

    input {
        width: auto;
        padding: 12px 20px;
        margin: 8px 10px;
        box-sizing: border-box;
        border: none;
        border-bottom: 2px solid red
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
        margin-top: 4vh
    }

    .submit-btn:hover {
        background-color: #ffffff; 
        border-color: rgb(43, 64, 180);
        color: rgb(43, 64, 180)
    }
</style>